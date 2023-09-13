<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLogGeneral;
use Illuminate\Support\Facades\Auth;

class ActivityLogGeneralController extends Controller
{
    public function index(Request $request)
{
    $query = ActivityLogGeneral::with('user')
        ->orderBy('created_at', 'desc');

    if ($request->filled('searchUser')) {
        $query->whereHas('user', function ($userQuery) use ($request) {
            $userQuery->where('name', 'like', '%' . $request->input('searchUser') . '%');
        });
    }

    if ($request->filled('searchRol')) {
        $query->where('accion', 'like', '%' . $request->input('searchRol') . '%');
    }

    if ($request->filled('searchVista')) {
        $query->where('vista', 'like', '%' . $request->input('searchVista') . '%');
    }

    if ($request->filled('searchDate')) {
        $query->whereDate('created_at', $request->input('searchDate'));
    }

    $logs = $query->get();

    return view('activity_logs.index', compact('logs'));
}



    public function logActivity($action, $description)
    {
        $userRole = Auth::user()->roles->pluck('name')->implode(', '); // Obtener roles del usuario y unirlos en una cadena
        $activityLog = new ActivityLogGeneral([
            'user_id' => Auth::user()->id,
            'accion' => $userRole,
            'vista' => $description,
        ]);
        $activityLog->save();
    }
}


