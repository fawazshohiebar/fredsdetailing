<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Facades\Form;
use Statamic\Http\Controllers\CP\Forms\FormSubmissionsController as BaseController;

class FormSubmissionExportController extends BaseController
{
    public function export(Request $request, $form)
    {
        $form = Form::find($form);

        if (!$form) {
            abort(404);
        }

        // Get selected IDs from the request
        $selectedIds = $request->input('selections', []);
        
        // Get all submissions
        $submissions = $form->submissions();

        // Filter by selected IDs if any are provided
        if (!empty($selectedIds)) {
            $submissions = $submissions->filter(function ($submission) use ($selectedIds) {
                return in_array($submission->id(), $selectedIds);
            });
        }

        // If no selections and no explicit "export all" flag, return error
        if (empty($selectedIds) && !$request->boolean('all')) {
            return response()->json([
                'message' => 'No submissions selected for export.'
            ], 400);
        }

        // Export to CSV
        $csv = $this->generateCsv($submissions, $form);

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $form->handle() . '-submissions.csv"');
    }

    protected function generateCsv($submissions, $form)
    {
        $output = fopen('php://temp', 'r+');

        // Get all possible fields from the form blueprint
        $fields = $form->blueprint()->fields()->all()->keys()->all();
        
        // Add standard fields
        $headers = array_merge(['ID', 'Date'], $fields);
        
        fputcsv($output, $headers);

        foreach ($submissions as $submission) {
            $row = [
                $submission->id(),
                $submission->date()->format('Y-m-d H:i:s'),
            ];

            foreach ($fields as $field) {
                $row[] = $submission->get($field, '');
            }

            fputcsv($output, $row);
        }

        rewind($output);
        $csv = stream_get_contents($output);
        fclose($output);

        return $csv;
    }
}
