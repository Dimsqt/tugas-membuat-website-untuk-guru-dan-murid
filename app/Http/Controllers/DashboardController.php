<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\User;

class DashboardController extends Controller
{
    // menampilkan halaman dashboard admin
    public function index()
    {
        // mengambil data statistik untuk dashboard
        $totalInformasi = Informasi::count();
        $totalUser = User::where('role', 'user')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        $informasiTerbaru = Informasi::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalInformasi',
            'totalUser',
            'totalAdmin',
            'informasiTerbaru'
        ));
    }
}
