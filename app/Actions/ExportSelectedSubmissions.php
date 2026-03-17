<?php

namespace App\Actions;

use Statamic\Actions\Action;
use Statamic\Contracts\Forms\Submission;

class ExportSelectedSubmissions extends Action
{
    public static function title()
    {
        return 'Export Selected';
    }

    public function visibleTo($item)
    {
        return $item instanceof Submission;
    }

    public function visibleToBulk($items)
    {
        return true;
    }

    public function authorize($user, $item)
    {
        return $user->can('view form submissions');
    }

    public function run($items, $values)
    {
        $form = $items->first()->form();
        $submissions = $items;

        // Generate CSV
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

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $form->handle() . '-submissions.csv"')
            ->send();
    }
}
