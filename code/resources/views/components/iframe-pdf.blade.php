<?php
    use App\Models\Diersoort;

    $idtrim = trim($id, 'ds');
    
    $dierenfiche = Diersoort::join("diers", 'diers.diersoortid', '=', 'diersoort.id')
    ->where("diers.id",$idtrim)
    ->get('file')->first();
?>

<div class="flex grow">
    <iframe src="{{$dierenfiche->file}}" class="h-screen w-full" title="dierenfiche"></iframe>
</div>