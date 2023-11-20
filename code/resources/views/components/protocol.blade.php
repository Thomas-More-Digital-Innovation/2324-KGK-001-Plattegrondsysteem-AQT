@vite(['resources/js/opmerking.js'])
@vite(['resources/js/biomedisch.js'])
@vite(['resources/js/checklist.js'])
@vite(['resources/js/popup.js'])

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
setlocale(LC_TIME, 'nl_be');
$dayOfWeek = ucfirst(strftime('%A (%d/%m/%Y)', strtotime($date))); 
$count = 0;

$idtrim = trim($id, 'ds');

$diersoort = DB::table('dier')
    ->select('diersoortid')
    ->join('diersoort', 'diersoort.id', '=', 'dier.diersoortid')
    ->where('dier.id', '=', $idtrim)
    ->get();

$diersoortId = $diersoort[0]->diersoortid;

$protocolnames = DB::table('protocoldetail')
    ->join('dierprotocol', 'dierprotocol.protocoldetailid', '=', 'protocoldetail.id')
    ->where('dierprotocol.diersoortid', '=', $diersoortId)
    ->get();

$roleid =Auth()->user()->roleid;

$leerlingComment = DB::table('comment') //laatste comment van een leerling ophalen
    ->where('comment.dierid', '=', $idtrim)
    ->where('comment.leerkracht', '=', '0')
    ->get();

$leerlingPlaceholder = "vul hier een opmerking in"; //placeholder maken voor een leerling
if (count($leerlingComment) != 0){
    $leerlingPlaceholder = $leerlingComment[0]->comment;
}


$leerkrachtComment = DB::table('comment') //laatste comment van de leerkracht
    ->where('comment.dierid', '=', $idtrim)
    ->where('comment.leerkracht', '=', '1')
    ->get();

$leerkrachtPlaceholder = "vul hier een opmerking in"; //placeholder maken voor een leerkracht
if (count($leerkrachtComment) != 0){
    $leerkrachtPlaceholder = $leerkrachtComment[0]->comment; 
}

$checkitemgewicht = DB::table('checkitem') //ophalen van het laatste ingevoerde gewicht van een dier
    ->where('dierid', '=', $idtrim)
    ->where('gewicht', '!=', NULL)
    ->orderBy('datetime', 'desc')
    ->first();

    
$checkitemtemperatuur = DB::table('checkitem') //ophalen van de laatst ingevoerde temperatuur van een bepaald dier
    ->where('dierid', '=', $idtrim)
    ->where('temperatuur', '!=', NULL)
    ->orderBy('datetime', 'desc')
    ->first();

$checkboxitemsvm = DB::table('checkitem') //ophalen van alle protocollen die al uitgevoerd zijn in de voormiddag
    ->where('dierid', '=', $idtrim)
    ->where('protocoldetailid', '!=', null)
    ->whereRaw('DATE(datetime) = "'.$date.'"')
    ->whereRaw('TIME(datetime) < "12:00:00"') // Voormiddag is voor 12:00 uur
    ->get();

$checkboxitemsnm = DB::table('checkitem') //ophalen van alle protocollen die al uitgevoerd zijn in de namiddag
    ->where('dierid', '=', $idtrim)
    ->where('protocoldetailid', '!=', null)
    ->whereRaw('DATE(datetime) = "'.$date.'"')
    ->whereRaw('TIME(datetime) > "12:00:00"') // Namiddag is na 12:00 uur
    ->get();
?>

<div class="flex justify-end h-screen m-5">
    <div class="flex flex-col items-center">
        <h3>Opvolging</h3>
            <div class="p-1 height">
                <table class="border-2">
                    <thead>
                        <tr>
                            <th>To do</th>
                            <th colspan="2" class="cursor-pointer" id="datetitle"><?php echo $dayOfWeek; ?><iconify-icon icon="fluent-mdl2:date-time"></iconify-icon></th>
                            <input type="date" hidden id="datepicker">
                        </tr>
                        <tr>
                            <th></th>
                            <th>Voormiddag</th>
                            <th>Namiddag</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Hier gaan we protocol uit $protocolophalen als het protocol op deze dag al uitgevoerd is wordt deze automatisch aangevinkt-->
                        <?php foreach ($protocolnames as $protocol):?>
                            <tr class="text-center">
                            <td class="border-2 flex justify-center items-center"><a href="/protocolinfo?id={{$protocol->id}}&t={{$protocol->name}}&c=dddddd" target="_blank"><?php echo $protocol->name; ?> <iconify-icon icon="akar-icons:link-out"></iconify-icon></a></td>
                            <td class="border-2">
                                <input type="checkbox" id="checkboxvoormiddag{{$protocol->id}}"  @if ($date != date("Y-m-d")) disabled class="text-red-500 bg-red-200" @endif name="checkboxvoormiddag{{$protocol->id}}" data-dierid="{{$idtrim}}" value="{{$protocol->id}}" 
                                <?php if($checkboxitemsvm->contains('protocoldetailid', $protocol->id)) echo 'checked'; ?>>
                            </td>
                            <td class="border-2">
                                <input type="checkbox" id="checkboxnamiddag{{$protocol->id}}" @if ($date != date("Y-m-d")) disabled class="text-red-500 bg-red-200" @endif name="checkboxnamiddag{{$protocol->id}}" data-dierid="{{$idtrim}}" value="{{$protocol->id}}" 
                                <?php if($checkboxitemsnm->contains('protocoldetailid', $protocol->id)) echo 'checked'; ?>>
                            </td>
                            </tr>
                            <?php endforeach; ?>

                        <!-- Rijen voor gewicht en temperatuur -->
                        <tr class="text-center">
                            <td class="border-2">
                                Gewicht in gram
                            </td>
                            <td class="border-2" colspan="2">
                                <input type="text" id="biomedisch-gewicht" name="gewicht" placeholder="<?php echo empty($checkitemgewicht->gewicht) ? 'gewicht' : $checkitemgewicht->gewicht; ?>" data-dierid = "{{$idtrim}}">
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="border-2">
                                Temperatuur °C
                            </td>
                            <td class="border-2" colspan="2">
                                <input type="text" id="biomedisch-temperatuur" name="temperatuur" placeholder="<?php echo empty($checkitemtemperatuur->temperatuur) ? 'temperatuur' : $checkitemtemperatuur->temperatuur; ?>" data-dierid = "{{$idtrim}}">
                            </td>
                        </tr>
                    </tbody>
                </table>
        
                <!-- Opmerkingsveld van de leerkracht: hierin wordt eerst gekeken welke roleid aangemeld is om zo uit te maken of je iets mag type in dit veld -->
                <div class="w-full mt-1">
                    <label for="comment" class="block text-gray-700 font-bold">Opmerking leerkracht:</label>
                    <textarea
                        id="opmerking_Leerkracht"
                        data-dierid = "{{$idtrim}}"
                        name="opmerkingLeerkracht"
                        rows="2"
                        class="w-full px-4 py-2 rounded border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                        @if ($roleid !== 4) 
                            readonly
                        @endif
                    >{{str_replace("%2F","/",$leerkrachtPlaceholder)}}</textarea> <!--replace is omdat er een fout was met het doorsturen van "/" naar de db -->
                </div>
                <div class="w-full mt-1">
                    <label for="comment" class="block text-gray-700 font-bold">Opmerking leerling:</label>
                    <textarea
                        id="opmerking_Leerling" 
                        data-dierid = "{{$idtrim}}"
                        name="opmerkingLeerling"
                        rows="2"
                        class="w-full px-4 py-2 rounded border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                    >{{str_replace("%2F","/",$leerlingPlaceholder)}}</textarea> <!--replace is omdat er een fout was met het doorsturen van "/" naar de db -->
                </div>
            </div>
            <div id="popupTrigger" class="cursor-pointer">
    <iconify-icon icon="fa6-solid:weight-scale" width="100"></iconify-icon>
</div>
<div id="popup" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg relative w-1600 h-1200 overflow-hidden"> 
        <span id="closePopup" class="absolute top-2 right-2 text-gray-600 cursor-pointer">×</span>
        <div id="curve_chart" class="w-full h-full"></div>
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
 </div> 
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = @json($data->pluck('gewicht'));

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($data->pluck('datetime')),
            datasets: [{
                label: 'Gewicht in gram',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false,
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>