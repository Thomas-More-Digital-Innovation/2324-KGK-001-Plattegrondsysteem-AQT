<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 

class PlantController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $plant = DB::table('plant')->get(); 
                $inventaris = DB::table('inventaris')->get(); 
                $plantinventaris = DB::table('inventaris')
                ->join('plantgroep', 'inventaris.id', '=', 'plantgroep.inventarisid')
                ->join('plant', 'plantgroep.plantid', '=', 'plant.id')
                ->get()
                ->groupBy('inventarisid');

                return view('plantadmin', ['plant' => $plant, 'inventaris' => $inventaris, 'plantinventaris' => $plantinventaris]);
            } else {
                abort(401);
            }
        }
    }

    public function make(Request $request)
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {

                $plantName = $request->input('naam');
                DB::table('plant')->insert(['plantname' => $plantName]);

                return redirect()->route('plantadmin')->with('success', 'plant added successfully');
            } else {
                abort(401);
            }
        }
    }

    
    public function deleteplant($id)
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                if (!DB::table('plantgroep')->where('plantgroep.plantid', '=', $id)->exists()) {

                    $plant = DB::table('plant')->where('id', $id);
                    $plant->delete();
                    return back();
                } else {
                    return back()->with('error', 'Plant kan niet worden verwijderd omdat deze nog aan een inventaris gekoppeld is.');
                }
            } else {
                abort(401);
            }
        }
    }

    public function koppel(Request $request)
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $selectedPlantIds = $request->input('plants');
                $selectedInventarisId = $request->input('inventaris');
                foreach ($selectedPlantIds as $plantId) {
                    DB::table('plantgroep')->updateOrInsert(['plantid' => $plantId, 'inventarisid' => $selectedInventarisId]);
                }
    
                return redirect()->route('plantadmin')->with('success', 'Plants coupled to inventaris successfully');
            } else {
                abort(401);
            }
        }
    }


    public function deletePlantkoppel($plantid, $inventarisid) {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {

                if (!empty($inventarisid)) {
                    $plant = DB::table('plantgroep')
                        ->where('plantid', $plantid)
                        ->where('inventarisid', $inventarisid)
                        ->delete();
                    
                    return back();
                } else {
                    abort(400);
                }
            } else {
                abort(401);
            }
        }
    }
}