<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\User;
use App\Models\Obat;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pemesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('history.history', compact('pemesanan'));
    }

    public function detail($id){
        $pemesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->first();
        $pemesanan_detail = PemesananDetail::where('pesanan_id', $pemesanan->id)->get();

        return view('history.detail', compact('pemesanan', 'pemesanan_detail'));
    }
}
