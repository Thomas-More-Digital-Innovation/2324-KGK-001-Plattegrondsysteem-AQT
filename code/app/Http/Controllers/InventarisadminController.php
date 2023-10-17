<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventarisadminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $inventaris = DB::table('inventaris')->get();
                $lampkant = DB::table('lampkant')->get();
                $lamp = DB::table('lamp')->get();
                $plant = DB::table('plant')->get(); 

                $planten = DB::table('plant')
                ->join('inventaris', 'inventaris.id', '=', 'plant.id')
                ->get();
                
                $inventarisJoined = DB::table('lamp')
                ->join('lampkant', 'lampkant.lampid', '=', 'lamp.id')
                ->join('inventaris', 'inventaris.id', 'lampkant.inventarisid')
                ->orderBy('inventaris.id', 'desc')
                ->get();

                $rows = [];

                $groupedData = $inventarisJoined->groupBy('inventarisid');

                foreach ($groupedData as $inventarisid => $items) {
                    $leftLamps = [];
                    $rightLamps = [];

                    foreach ($items as $item) {
                        if ($item->position === 'links') {
                            $leftLamps[] = $item->name;
                        } elseif ($item->position === 'rechts') {
                            $rightLamps[] = $item->name;
                        }
                    }

                    $rows[] = [
                        'inventarisid' => $inventarisid,
                        'left_lamps' => implode(', ', $leftLamps),
                        'right_lamps' => implode(', ', $rightLamps),
                    ];
                }


                return view('inventarisadmin', ['planten' => $planten, 'plant' => $plant, 'inventaris' => $inventaris, 'lampkant' => $lampkant, 'lamp' => $lamp, 'inventarisJoined' => $inventarisJoined, 'rows' => $rows]);
            } else {
                abort(401);
            }
        }
    }


public function makeInventaris(Request $request)
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $inventarisId = DB::table('inventaris')->insertGetId([]);
                // 'lampkant' data voor 'lamplinks'
                if ($request->has('lamplinks')) {
                    foreach ($request->input('lamplinks') as $lampId) {
                        DB::table('lampkant')->insert([
                            'inventarisid' => $inventarisId,
                            'lampid' => $lampId,
                            'position' => 'links',
                        ]);
                    }
                }

                // 'lampkant' data voor'lamprechts'
                if ($request->has('lamprechts')) {
                    foreach ($request->input('lamprechts') as $lampId) {
                        DB::table('lampkant')->insert([
                            'inventarisid' => $inventarisId,
                            'lampid' => $lampId,
                            'position' => 'rechts'
                        ]);
                    }
                }

                return redirect()->route('inventarisadmin')->with('success', 'Inventaris created successfully');
            } else {
                abort(401);
            }
        }
    }
   public function deleteInventaris($id)
   {
      if (Auth::id()) {
         $roleID = Auth::user()->roleid;
         if ($roleID == 4) {
            if (!DB::table('dier')->where('inventarisid', '=', $id)->exists()) {
               DB::table('lampkant')->where('inventarisid', '=', $id)->delete();
               DB::table('inventaris')->where('id', '=', $id)->delete();
               return redirect()->route('inventarisadmin')->with('success', 'Inventaris deleted successfully');
            } else {
               return back()->with('error', 'Inventaris kan niet worden verwijderd omdat er nog dieren aan gekoppeld zijn.');
            }
         } else {
            abort(401);
         }
      }
   }
}