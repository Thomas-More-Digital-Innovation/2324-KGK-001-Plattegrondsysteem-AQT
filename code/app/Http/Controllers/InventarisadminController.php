<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use App\Models\Inventaris;
use App\Models\Lampkant;
use App\Models\Lamp;
use App\Models\Plant;
use App\models\Dier;

class InventarisadminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $inventaris = Inventaris::all();
                $lampkant = Lampkant::all();
                $lamp = Lamp::all();
                $plant = Plant::all();

                $planten = Plant::join('inventaris', 'inventaris.id', '=', 'plants.id')->get();

                
                $inventarisJoined = Lamp::join('lampkants', 'lampkants.lampid', '=', 'lamps.id')
                ->join('inventaris', 'inventaris.id', '=', 'lampkants.inventarisid')
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
                $inventaris = new Inventaris();
                $inventaris->save();
    
                $inventarisId = $inventaris->id;
    
                // 'lampkant' data for 'lamplinks'
                if ($request->has('lamplinks')) {
                    foreach ($request->input('lamplinks') as $lampId) {
                        $lampkant = new Lampkant();
                        $lampkant->inventarisid = $inventarisId;
                        $lampkant->lampid = $lampId;
                        $lampkant->position = 'links';
                        $lampkant->save();
                    }
                }
    
                // 'lampkant' data for 'lamprechts'
                if ($request->has('lamprechts')) {
                    foreach ($request->input('lamprechts') as $lampId) {
                        $lampkant = new Lampkant();
                        $lampkant->inventarisid = $inventarisId;
                        $lampkant->lampid = $lampId;
                        $lampkant->position = 'rechts';
                        $lampkant->save();
                    }
                }
                    return redirect()->route('inventarisadmin')->with('success', 'Inventaris created successfully');
            } else {
                abort(401);
            }
        }
    }


    public function inventarisedit($id){
        if(Auth::id()){
            $roleID = Auth()->user()->roleid;
            if($roleID == 4){
                $inventaris = Inventaris::findOrFail($id);
                $lampkant = Lampkant::where('inventarisid', $id)->get();
                $lampen = Lamp::all();
                return view('inventarisedit', compact('inventaris', 'lampkant', 'lampen'));
            }
            else{
                abort(401);
            }
        }
    }
    
    
    public function inventarisupdate($id){
        if(Auth::id()){
            $roleID = Auth()->user()->roleid;
            if($roleID == 4){
                try {
                    $inventaris = Inventaris::findOrFail($id);
                    $inventaris->name = request('name');
                    $inventaris->protocoltypeid = request('protocoltypeid');
                    $inventaris->icon = request('icon');
                    $inventaris->file = request('file');
                    $inventaris->save();
                    
                    return redirect('/admin/protocollen');
                } catch (Exception $e) {
                    return back()->with('error', 'An error occurred ('. $e->getCode() .') while processing your request.');
                }
            }
            else{
                abort(401);
            }
        }
    }


    public function deleteInventaris($id)
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                if (!Dier::where('inventarisid', $id)->exists()) {
                    Lampkant::where('inventarisid', '=', $id)->delete();
                    Inventaris::where('id', $id)->delete();
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