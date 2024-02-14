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
                $inventarisId = DB::table('')->insertGetId([]);
                // placeholdernathanverderwerken
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
    public function inventarisedit($id){
        if(Auth::id()){
            $roleID = Auth()->user()->roleid;
            if($roleID==4){
                $inventaris = DB::table('inventaris')->where('id', $id)->first();
                $lampkant = DB::table('lampkants')->where('inevtarisid', $id)->get();
                $lampen = DB::table('lamps')->get();
                return view('inventarisedit', ['inventaris' => $inventaris, 'lampkant'=> $lampkant, 'lampen' => $lampen]);
            }
            else{
                abort(401);
            }
        }
    }

    public function inventarisupdate($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                try {
                    $query = DB::table('protocoldetail')->where('id', $id)->update([
                        'name'=>request('name'),
                        'protocoltypeid'=>request('protocoltypeid'),
                        'icon'=>request('icon'),
                        'file'=>request('file')
                    ]);
                    return redirect('/admin/protocollen');
                } catch (QueryException $e) {
                    return back()->with('error', 'An error occurred (', $e->errorInfo[1] ,') while processing your request.');
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