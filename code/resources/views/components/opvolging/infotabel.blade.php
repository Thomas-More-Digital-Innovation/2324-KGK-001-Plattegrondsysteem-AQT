<div class="flex h-screen pt-14 flex-col overflow-y-auto">
   <table>
      <tr>
         <th>Protocol</th>
         <th class="border-x-4">Diersoort</th>
         <th></th>
         <th><iconify-icon icon="gala:add" width="40" height="40" style="color: darkgreen;"></iconify-icon></th>
      </tr>
         @php
            echo '<script>console.log("detail")</script>';
               echo '<script>console.log('.$protocoldetail.')</script>';
               echo '<script>console.log("script")</script>';
            echo '<script>console.log('.$diersoort.')</script>';
         @endphp
            @foreach ($protocoldetail as $p)
               <tr class="border-y-4">
                  @foreach ($diersoort as $d)
                     @if (($p->protocoldetailid == $d->protocoldetailid) && ($p->diersoortid == $d->diersoortid))
                        <td class="p-6">{{$p->name}}</td>
                        <td>{{$d->name}}</td>
                        <td class="text-center"><iconify-icon icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></td>
                        <td class="text-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></td>
                     @endif
                  @endforeach
               </tr>
            @endforeach
   </table>
</div>