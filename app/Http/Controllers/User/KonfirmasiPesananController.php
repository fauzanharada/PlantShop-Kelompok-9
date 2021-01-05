<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\KonfirmasiPesanan;
use App\Models\user\Pesan;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class KonfirmasiPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['pesan'] = $id;
        return view('user.konfirmasi_pesanan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuid_konfirmasi_pesanan   =  Uuid::uuid4()->getHex();

        $images = request()->file('foto_bukti_pembayaran');
        $imagesUrl = $images->storeAs('bukti_pembayaran', "{$uuid_konfirmasi_pesanan}.{$images->extension()}");

        $konfirmasi_pesanan = new KonfirmasiPesanan();
        $konfirmasi_pesanan->uuid_konfirmasi_pesanan        = $uuid_konfirmasi_pesanan;
        $konfirmasi_pesanan->atas_nama                      = $request->atas_nama;
        $konfirmasi_pesanan->bank                           = $request->bank;
        $konfirmasi_pesanan->foto_bukti_pembayaran          = $imagesUrl;
        $konfirmasi_pesanan->save();

        $pesan = Pesan::findOrFail($request->uuid_pesan);
        $pesan->uuid_konfirmasi = $uuid_konfirmasi_pesanan;
        $pesan->save();

        return redirect('/pesan')->with('success', 'Terima Kasih');
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
