<div class="flex justify-center content-start flex-wrap h-screen pt-14">
   <?php 
   use App\Models\ProtocolDetail;
   $protocol = ProtocolDetail::where('id', $id)->get('file')->first();
   ?>
   <iframe src="{{$protocol->file}}" class="w-full h-full" title="Protocol Info"></iframe>
</div>