<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KenanganKeluarga;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index()
{
    $kenanganCount = KenanganKeluarga::count();
    $userCount = User::count();
    $recentKenangans = KenanganKeluarga::latest()->take(5)->get();

    return view('admins.dashboard', [ // Ganti 'admins.dashboard' menjadi 'admin.dashboard'
        'kenanganCount' => $kenanganCount,
        'userCount' => $userCount,
        'recentKenangans' => $recentKenangans,
    ]);
}
}
