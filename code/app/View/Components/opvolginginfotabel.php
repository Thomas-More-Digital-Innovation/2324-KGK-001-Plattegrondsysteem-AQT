<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class opvolginginfotabel extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
   public function render(): View|Closure|string
   {
      $info = DB::table('dierprotocol')
      ->join('protocoldetail', 'dierprotocol.protocoldetailid', '=', 'protocoldetail.id')
      ->get();
      
      $info2 = DB::table('dierprotocol')
      ->join('diersoort', 'dierprotocol.diersoortid', '=', 'diersoort.id')
      ->get();

      return view('components.opvolging.infotabel', ['protocoldetail' => $info, 'diersoort' => $info2]);
   }
}
