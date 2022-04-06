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

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $obat = obat::where('id_obat', $id)->first();

        return view('pesan.index', compact('obat'));
    }

    public function pesan(Request $request, $id)
    {
        $obat = obat::where('id_obat', $id)->first();
        $tanggal = Carbon::now();

        //validasi status pesanan
        $cek_pesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(empty($cek_pesanan)) //jika id yang memesan masih belum ada
        {//masukkan pesanan

            //simpan pesanan ke db pemesanan
            $pemesanan = new Pemesanan;
            $pemesanan->user_id = Auth::user()->id;
            $pemesanan->tanggal = $tanggal;
            $pemesanan->status = 0;
            $pemesanan->total_harga = 0;
            $pemesanan->save();
        }

        $pesan = $request->jumlah_pesan;
        $stok = $obat->qty;
        if($pesan > $stok){
            return redirect('pesan/'.$id);
        }

        //simpan ke db pemesananDetail
        $pesanan_baru = Pemesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //agar database tidak menampilkan 2 pesanan detail dari produk yang sama
        $cek_pesanan_detail = PemesananDetail::where('barang_id', $obat->id_obat)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){ //jika kosong maka tambahkan
            $pemesanan_detail = new PemesananDetail;
            $pemesanan_detail->barang_id = $obat->id_obat;
            $pemesanan_detail->pesanan_id = $pesanan_baru->id;
            $pemesanan_detail->qty = $request->jumlah_pesan;
            $pemesanan_detail->total_harga = $obat->harga*$request->jumlah_pesan;
            $pemesanan_detail->save();
        }else{ //jika sudah ada maka tambahkan ke yg sudah ada
            $pemesanan_detail = PemesananDetail::where('barang_id', $obat->id_obat)->where('pesanan_id', $pesanan_baru->id)->first();
            $pemesanan_detail->qty = $pemesanan_detail->qty + $request->jumlah_pesan;

            //harga setelah ditambahkan
            $harga_pemesanan_detail_baru = $obat->harga * $request->jumlah_pesan;
            $pemesanan_detail->total_harga = $pemesanan_detail->total_harga + $harga_pemesanan_detail_baru;
            $pemesanan_detail->update();
        }

        //total harga pesanan
        $pemesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pemesanan->total_harga = $pemesanan->total_harga + $obat->harga * $request->jumlah_pesan;
        $pemesanan->update();

        Alert::success('Pesanan sudah ditambahkan ke keranjang');
        return redirect('cart');
    }

    public function cart()
    {
        $pemesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(!empty($pemesanan))
        {
            $pemesanan_detail = PemesananDetail::where('pesanan_id', $pemesanan->id)->get();
            return view('pesan.cart', compact('pemesanan', 'pemesanan_detail'));
        }
        return view('pesan.cart');
    }

    public function delete($id)
    {
        $pemesanan_detail = PemesananDetail::where('id', $id)->first();
        $pemesanan = Pemesanan::where('id', $pemesanan_detail->pesanan_id)->first();
        $pemesanan->total_harga = $pemesanan->total_harga-$pemesanan_detail->total_harga;
        $pemesanan->update();

        $pemesanan_detail->delete();
        Alert::success('Pesanan berhasil dihapus');
        return view('pesan.cart');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user->alamat && $user->no_hp)){
            Alert::error('Lengkapi dulu identitas');
            return redirect('profile');
        }

        $pemesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pemesanan->id;
        $pemesanan->status = 1;
        $pemesanan->update();

        $pemesanan_detail = $pemesanan_detail = PemesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach($pemesanan_detail as $detail)
        {
            $obat = obat::where('id_obat', $detail->barang_id)->first();
            $obat->qty = $obat->qty - $detail->qty;
            $obat->update();
        }

        Alert::success('Pesanan berhasil di check out');
        return redirect('history');
    }
}
