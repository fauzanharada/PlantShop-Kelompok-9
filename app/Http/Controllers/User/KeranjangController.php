<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Keranjang;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['keranjangs'] = Keranjang::with('produk')->where('email', $id)->get();
        return view('user.keranjang.index', $data);
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
        $uuid_keranjang = Uuid::uuid4()->getHex();

        $keranjang = new Keranjang;
        $keranjang->uuid_keranjang      = $uuid_keranjang;
        $keranjang->uuid_produk         = $request->uuid_produk;
        $keranjang->email               = $request->email;
        $keranjang->save();

        return redirect('/keranjang/' . $request->email)->with('success', 'Tanaman Dimasukkan Ke Keranjang');
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
        $keranjang = Keranjang::findOrFail($id);
        $email = $keranjang->email;
        $keranjang->delete();

        return redirect('/keranjang/' . $email)->with('delete', 'Barang Berhasil Dihapus');
    }
}
