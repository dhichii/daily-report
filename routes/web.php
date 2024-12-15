<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/laporan', function (Request $request) {
    $request->validate([
        'result' => ['string']
    ]);

    $result = $request->result;
    echo 'result' . $result;

    Report::create(['result' => $result]);
    return redirect(route('welcome'));
})->name('submit.result');

Route::get('/laporan', function () {
    $today = Carbon::today();
    $startDate = $today->startOfWeek()->toDateString();
    $endDate = $today->endOfWeek()->toDateString();
    $totalReports = Report::select('result', DB::raw('count(*) as total'))
    ->groupBy('result')
    ->whereBetween('date', [$startDate, $endDate])
    ->get();

    echo $totalReports;
})->middleware(['auth', 'verified']);

Route::get('/laporan/export/excel', function () {
    $reports = Report::get();

    echo 'reports';
    echo $reports;
})->name('laporan.export.excel');

require __DIR__.'/auth.php';
