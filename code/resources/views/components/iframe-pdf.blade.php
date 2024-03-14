<?php
    $idtrim = trim($id, 'ds');
    
    

    $dierenfiche = DB::table('diersoort')
    ->join("diers", 'diers.diersoortid', '=', 'diersoort.id')
    ->where("diers.id",$idtrim)
    ->get('file')->first();
?>

<div class="flex grow">
    <iframe src="{{$dierenfiche->file}}" class="h-screen w-full" title="dierenfiche"></iframe>
</div>