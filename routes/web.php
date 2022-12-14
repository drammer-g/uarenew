<?php

use App\Http\Controllers\AppFileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WebFormController;
use App\Models\HomePage;
use App\Models\Page;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::get('locale/{locale}', [\App\Http\Controllers\LanguageController::class, 'changeLanguage'])->name('set_locale');

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'pages' => Page::all(),
            'texts' => HomePage::all()
        ]);
    })->name('dashboard');

    Route::patch('/dashboard/update', [HomePageController::class, 'update'])->name('home_page.update');

    Route::get('/{page}/edit', function () {
        return Inertia::render('Edit', [
            'title' => 'Title'
        ]);
    })->name('edit');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('/pages/store', [PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::patch('/pages/{page}/edit', [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

    Route::post('/images/upload', [AppFileController::class, 'imageUpload'] )->name('image.upload');

    Route::resource('webforms', WebFormController::class)->except('show');

});

Route::get('/webforms/{locale}', [WebFormController::class, 'show'])->name('webforms.show');

Route::post('/leads', [\App\Http\Controllers\LeadController::class, 'store'])->name('leads.show');

Route::group(['middleware' => ['web', 'setLocate']], function () {
    Route::get('{locale}/{slug}', [PageController::class, 'show'])->name('pages.show');
});

Route::get('/', [HomePageController::class, 'index'])->name('main');
Route::get('/{locale}', [HomePageController::class, 'index'])->name('main.locale');

Route::get('/{any}', function () {
    return redirect()->route('main');
})->where('any', '.*');
