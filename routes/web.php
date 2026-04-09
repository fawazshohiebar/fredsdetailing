<?php

use Illuminate\Support\Carbon;
use App\Http\Controllers\FormSubmissionExportController;
use Illuminate\Support\Facades\Route;

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

// redirect all /ar starting routes to homepage (including /ar)
// Route::permanentRedirect('/en/{any?}', '/ar')->where('any', '.*');
Route::statamic('/{locale}/services/{slug}', 'Services.index')->name('services.show');
