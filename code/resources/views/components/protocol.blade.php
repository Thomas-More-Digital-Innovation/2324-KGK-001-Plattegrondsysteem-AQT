@vite(['resources/js/opmerking.js'])
@vite(['resources/js/biomedisch.js'])
@vite(['resources/js/checklist.js'])


<?php
setlocale(LC_TIME, 'nl_be');
$currentDate = date('Y-m-d');
$dayOfWeek = ucfirst(strftime('%A', strtotime($currentDate))); 
$count = 0;

$idtrim = trim($id, 'ds');

$protocolnames = DB::table('protocoldetail')
    ->join('dierprotocol', 'protocoldetail.id', '=', 'dierprotocol.protocoldetailid')
    ->where('dierprotocol.diersoortid', '=', $idtrim)
    ->get();



$roleid =Auth()->user()->roleid;


$leerlingComment = DB::table('comment')
    ->where('comment.dierid', '=', $idtrim)
    ->where('comment.leerkracht', '=', '0')
    ->get();

$leerlingPlaceholder = "vul hier een opmerking in";
if (count($leerlingComment) != 0){
    $leerlingPlaceholder = $leerlingComment[0]->comment;
}


$leerkrachtComment = DB::table('comment')
    ->where('comment.dierid', '=', $idtrim)
    ->where('comment.leerkracht', '=', '1')
    ->get();

$leerkrachtPlaceholder = "vul hier een opmerking in";
if (count($leerkrachtComment) != 0){
    $leerkrachtPlaceholder = $leerkrachtComment[0]->comment;
}

$checkitemgewicht = DB::table('checkitem')
    ->where('dierid', '=', $idtrim)
    ->where('gewicht', '!=', NULL)
    ->orderBy('datetime', 'desc')
    ->first();

    
$checkitemtemperatuur = DB::table('checkitem')
    ->where('dierid', '=', $idtrim)
    ->where('temperatuur', '!=', NULL)
    ->orderBy('datetime', 'desc')
    ->first();


$checkboxitemsvm = DB::table('checkitem')
    ->where('dierid', '=', $idtrim)
    ->where('protocoldetailid', '!=', null)
    ->whereRaw('DATE(datetime) = CURDATE()')
    ->whereRaw('TIME(datetime) < "12:00:00"') // Voormiddag is voor 12:00 uur
    ->get();

$checkboxitemsnm = DB::table('checkitem')
    ->where('dierid', '=', $idtrim)
    ->where('protocoldetailid', '!=', null)
    ->whereRaw('DATE(datetime) = CURDATE()')
    ->whereRaw('TIME(datetime) > "12:00:00"') // Namiddag is na 12:00 uur
    ->get();
?>

<div class="flex justify-end h-screen m-5">
    <div class="flex flex-col items-center">
        <h3>Opvolging</h3>
        <form method="post" action="process_form.php"> <!-- Replace "process_form.php" with your actual server-side script -->
            <div class="p-1 height">
                <table class="border-2">
                    <thead>
                        <tr>
                            <th>To do</th>
                            <th colspan="2"><?php echo $dayOfWeek; ?></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Voormiddag</th>
                            <th>Namiddag</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($protocolnames as $protocol):?>
                            <tr class="text-center">
                            <td class="border-2"><?php echo $protocol->name; ?></td>
                            <td class="border-2">
                                <input type="checkbox" id="checkboxvoormiddag{{$protocol->id}}" name="checkboxvoormiddag{{$protocol->id}}" data-dierid="{{$idtrim}}" value="{{$protocol->id}}" 
                                <?php if($checkboxitemsvm->contains('protocoldetailid', $protocol->id)) echo 'checked'; ?>>
                            </td>
                            <td class="border-2">
                                <input type="checkbox" id="checkboxnamiddag{{$protocol->id}}" name="checkboxnamiddag{{$protocol->id}}" data-dierid="{{$idtrim}}" value="{{$protocol->id}}" 
                                <?php if($checkboxitemsnm->contains('protocoldetailid', $protocol->id)) echo 'checked'; ?>>
                            </td>
                            </tr>
                            <?php endforeach; ?>

                        <!-- New rows for weight and temperature -->
                        <tr class="text-center">
                            <td class="border-2">
                                Gewicht
                            </td>
                            <td class="border-2" colspan="2">
                                <input type="text" id="biomedisch-gewicht" name="gewicht" placeholder="<?php echo empty($checkitemgewicht->gewicht) ? 'gewicht' : $checkitemgewicht->gewicht; ?>" data-dierid = "{{$idtrim}}">
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="border-2">
                                Temperatuur
                            </td>
                            <td class="border-2" colspan="2">
                                <input type="text" id="biomedisch-temperatuur" name="temperatuur" placeholder="<?php echo empty($checkitemtemperatuur->temperatuur) ? 'temperatuur' : $checkitemtemperatuur->temperatuur; ?>" data-dierid = "{{$idtrim}}">
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
        
                <!-- Comment fields under the table -->
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
                    >{{str_replace("%2F","/",$leerkrachtPlaceholder)}}</textarea>
                </div>
                <div class="w-full mt-1">
                    <label for="comment" class="block text-gray-700 font-bold">Opmerking leerling:</label>
                    <textarea
                        id="opmerking_Leerling" 
                        data-dierid = "{{$idtrim}}"
                        name="opmerkingLeerling"
                        rows="2"
                        class="w-full px-4 py-2 rounded border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                    >{{str_replace("%2F","/",$leerlingPlaceholder)}}</textarea>
                </div>
            </div>
        </form>
    </div>
</div>

