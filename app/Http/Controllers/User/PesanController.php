<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user\BarangPesanan;
use App\Models\User\Keranjang;
use App\Models\user\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pesans'] = Pesan::where('email', Auth::user()->email)->get();
        return view('user.pesan.index', $data);
    }
    
    
    public function pesan($id)
    {
        $pesanans    = Keranjang::where('email', $id)->get();
        $uuid_pesan   = Uuid::uuid4()->getHex();

        $pesan = new Pesan();
        $pesan->uuid_pesan  = $uuid_pesan;
        $pesan->email       = $id;
        $pesan->uuid_konfirmasi =  '';
        $pesan->kurir       = null;
        $pesan->no_resi     = '';
        $pesan->save();

        foreach ($pesanans as $pesanan){
            $uuid_barang_pesanan = Uuid::uuid4()->getHex();
            $barang_pesanan = new BarangPesanan();
            $barang_pesanan->uuid_barang_pesanan    = $uuid_barang_pesanan;
            $barang_pesanan->uuid_pesan             = $uuid_pesan;
            $barang_pesanan->uuid_produk            = $pesanan->uuid_produk;
            $barang_pesanan->save();

            $keranjang  = Keranjang::where('email', $pesanan->email)->first();
            $keranjang->delete();
        }
        
        return redirect('/pesan')->with('success', 'Pesanan Berhasil Dibuat');
        
    }

    public function cara_bayar(){
        return view('user.pesan.caraBayar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
