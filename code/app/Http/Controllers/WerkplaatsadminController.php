<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Werkplek;

class WerkplaatsadminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $werkplek = Werkplek::all();
                return view('werkplaatsadmin', ['werkplek' => $werkplek]);
            } else {
                abort(401);
            }
        }
    }

    
    public function updateWorkplaceStatus(Request $request) {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $activeWorkplaces = $request->input('active', []);

                Werkplek::whereIn('id', $activeWorkplaces)
                    ->update(['active' => true]);

                Werkplek::where('id', $activeWorkplaces)
                ->update(['active' => true]);

                Werkplek::whereNotIn('id', $activeWorkplaces)
                ->update(['active' => false]);
     
                return redirect()->route('werkplaatsadmin.index')
                ->with('success', 'Workplace status updated successfully');
            } else {
                abort(401);
            }
        }
    }
}

