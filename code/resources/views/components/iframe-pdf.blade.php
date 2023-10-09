<?php
    $idtrim = trim($id, 'ds');
    
    $dierenfiche = DB::table('diersoort')
    ->where("id",$idtrim)
    ->get('file')->first();
?>

<div class="flex grow">
    <iframe src="{{$dierenfiche->file}}?page=hsn#toolbar=0" class="h-screen w-full" title="dierenfiche"></iframe>
</div>