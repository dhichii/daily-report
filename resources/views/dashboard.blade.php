<?php
 
$dataPoints = array(
	array("label"=> "Cukup", "y"=> 3),
	array("label"=> "Kurang", "y"=> 3),
	array("label"=> "Puas", "y"=> 3),
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
                            <tr class="row text-start">
                                <td>Selasa</td>
                                <td>22-10-2024</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>3</td>
                            </tr>
                            <tr class="row text-start border-t">
                                <td class="font-medium">Jumlah Total</td>
                                <td></td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>3</td>
                            </tr>
                            <tr class="row text-start border-t">
                                <td class="font-medium">Persentase</td>
                                <td></td>
                                <td>33%</td>
                                <td>33%</td>
                                <td>33%</td>
                                <td>100%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="rounded-lg">
                <div class="mt-6 rounded-lg" id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</x-app-layout>