<?php

use App\Helpers\AgendaHelper;
use Illuminate\Support\Carbon;
use App\Http\Controllers\FormSubmissionExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetAgendaByDateController;

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

// Custom route to handle root path - use temporary redirect instead of permanent
Route::get('/', function() {
    // Default to Arabic
    return redirect('/en', 302); // 302 temporary redirect
});


Route::post('/cp/forms/{form}/export', [FormSubmissionExportController::class, 'export'])
    ->middleware('statamic.cp.authenticated')
    ->name('forms.submissions.export');

    
// Route::permanentRedirect('/ar', '/en');

Route::get('/{locale}/agenda/{agenda}/{date}', GetAgendaByDateController::class)->name('show_agenda_by_date');

// redirect all /ar starting routes to homepage (including /ar)
// Route::permanentRedirect('/en/{any?}', '/ar')->where('any', '.*');
