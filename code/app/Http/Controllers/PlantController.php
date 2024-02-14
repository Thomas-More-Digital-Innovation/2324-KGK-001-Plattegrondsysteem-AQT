<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Plant;
use App\Models\Inventaris;
use App\Models\Plantgroep;

class PlantController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $plant = Plant::all();
                $inventaris = Inventaris::all();

                $plantinventaris = Inventaris::join('plantgroeps', 'inventaris.id', '=', 'plantgroeps.inventarisid')
                ->join('plants', 'plantgroeps.plantid', '=', 'plants.id')
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
                
                $plant = new Plant;
                $plant->plantname = $plantName;
                $plant->save();

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
                if (!Plantgroep::where('plantid', $id)->exists()) {

                    //$plant = DB::table('plants')->where('id', $id);
                    $plant = Plant::find($id);
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
                    Plantgroep::updateOrInsert(['plantid' => $plantId, 'inventarisid' => $selectedInventarisId]);
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
                    
                    Plantgroep::where('plantid', $plantid)->where('inventarisid', $inventarisid)->delete();
                    
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