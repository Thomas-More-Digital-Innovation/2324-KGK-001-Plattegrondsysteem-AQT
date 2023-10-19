<?php
    $idtrim = trim($id, 'ds');
    
    

    $dierenfiche = DB::table('diersoort')
    ->join("dier", 'dier.diersoortid', '=', 'diersoort.id')
    ->where("dier.id",$idtrim)
    ->get('file')->first();
?>

<div class="flex grow">
    <iframe src="{{$dierenfiche->file}}" class="h-screen w-full" title="dierenfiche"></iframe>
</div>