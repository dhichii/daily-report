<?php

use App\Exports\ReportsExport;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Report;
use App\Utils\Day;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    $votes = Report::select(
        DB::raw('SUM(CASE WHEN result = "PUAS" THEN 1 ELSE 0 END) as puas'),
        DB::raw('SUM(CASE WHEN result = "CUKUP" THEN 1 ELSE 0 END) as cukup'),
        DB::raw('SUM(CASE WHEN result = "KURANG" THEN 1 ELSE 0 END) as kurang'),
    )
    ->groupBy('date')
    ->where('date', Carbon::today())
    ->first();

    if (!$votes) {
        $votes = (object)['puas' => 0, 'cukup' => 0, 'kurang' => 0];
    }

    return view('welcome', ['votes' => $votes]);
})->name('welcome');

Route::get('/dashboard', function () {
    $month = request('month');
    $year = request('year');
    $today = Carbon::now();
    if (!isset($month)) {
        $month = $today->month;
    }

    if (!isset($year)) {
        $year = $today->year;
    }

    $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfDay();
    $endOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();

    $totalReports = Report::select(
        'date',
        DB::raw('SUM(CASE WHEN result = "PUAS" THEN 1 ELSE 0 END) as puas'),
        DB::raw('SUM(CASE WHEN result = "CUKUP" THEN 1 ELSE 0 END) as cukup'),
        DB::raw('SUM(CASE WHEN result = "KURANG" THEN 1 ELSE 0 END) as kurang'),
        DB::raw('COUNT(*) as total')
    )
    ->whereBetween('date', [$startOfMonth, $endOfMonth])
    ->groupBy('date')
    ->orderBy('date', 'desc')
    ->get();

    $totalSum = 0;
    $totalPuas = 0;
    $totalCukup = 0;
    $totalKurang = 0;
    foreach ($totalReports as $report) {
        $report->day = Day::translate(Carbon::parse($report->date)->format('l'));
        $report->date = Carbon::parse($report->date)->format('d-m-Y');
        $totalSum += $report->total;
        $totalPuas += $report->puas;
        $totalCukup += $report->cukup;
        $totalKurang += $report->kurang;
    }

    $puasPercentage = 0;
    $cukupPercentage = 0;
    $kurangPercentage = 0;
    if ($totalPuas) {
        $puasPercentage = round($totalPuas/$totalSum*100, 2);
    }

    if ($totalCukup) {
        $cukupPercentage = round($totalCukup/$totalSum*100, 2);
    }

    if ($totalKurang) {
        $kurangPercentage = round($totalKurang/$totalSum*100, 2);
    }

    return view('dashboard', [
        'totalReports' => $totalReports,
        'totalPuas' => $totalPuas,
        'totalCukup' => $totalCukup,
        'totalKurang' => $totalKurang,
        'totalSum' => $totalSum,
        'puasPercentage' => $puasPercentage,
        'cukupPercentage' => $cukupPercentage,
        'kurangPercentage' => $kurangPercentage,
        'selectedMonth' => $month,
        'selectedYear' => $year,
    ]);
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
    return redirect(route('welcome'))->with('success', true);
})->name('submit.result');

Route::get('/laporan/export/excel', function () {
    return Excel::download(new ReportsExport, 'laporan.xlsx');
})->middleware(['auth', 'verified'])->name('laporan.export.excel');

require __DIR__.'/auth.php';
