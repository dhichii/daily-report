<?php

$dataPoints = array(
	array("label"=> "Puas", "y"=> $totalPuas),
	array("label"=> "Cukup", "y"=> $totalCukup),
	array("label"=> "Kurang", "y"=> $totalKurang),
);

?>

<head>
    <script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            title: {
                text: "Persentase Indeks Kepuasan Masyarakat"
            },
            subtitles: [{
                text: ""
            }],
            data: [{
                type: "pie",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - #percent%",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
    </script>
</head>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                        {{ __('Dashboard') }}
                    </h2>
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="text-left">
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Puas</th>
                                <th>Cukup</th>
                                <th>Kurang</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($totalReports as $report)
                            <tr class="row text-start">
                                <td>{{ $report['day'] }}</td>
                                <td>{{ $report['date'] }}</td>
                                <td>{{ $report['puas'] }}</td>
                                <td>{{ $report['cukup'] }}</td>
                                <td>{{ $report['kurang'] }}</td>
                                <td>{{ $report['total'] }}</td>
                            </tr>
                            @endforeach
                            <tr class="row text-start border-t">
                                <td class="font-medium">Jumlah Total</td>
                                <td></td>
                                <td>{{ $totalPuas }}</td>
                                <td>{{ $totalCukup }}</td>
                                <td>{{ $totalKurang }}</td>
                                <td>{{ $totalSum }}</td>
                            </tr>
                            <tr class="row text-start border-t">
                                <td class="font-medium">Persentase</td>
                                <td></td>
                                <td>{{ $puasPercentage . '%' }}</td>
                                <td>{{ $cukupPercentage . '%' }}</td>
                                <td>{{ $kurangPercentage . '%' }}</td>
                                <td>100%</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('laporan.export.excel') }}">
                        <x-primary-button class="mt-4">
                            {{ __('Export Excel') }}
                        </x-primary-button>
                    </a>
                </div>
            </div>
            <div class="rounded-lg">
                <div class="mt-6 rounded-lg" id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</x-app-layout>
