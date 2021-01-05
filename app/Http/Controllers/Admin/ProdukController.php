<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\DataTables;

class ProdukController extends Controller
{

    public function json()
    {
        return DataTables::of(Produk::all())
            ->addColumn('action', function ($row) {
                $action   = '<a href="/admin/produk/' . $row->uuid_produk . '/edit" class="btn btn-sm btn-primary" ><i class="fas fa-pencil-alt"></i></a>';
                $action  .= \Form::open(['url' => '/admin/produk/' . $row->uuid_produk, 'method' => 'delete', 'style' => 'float:right']);
                $action  .= "<button type='submit' class = 'btn btn-danger btn-sm' ><i class='fas fa-trash-alt'></i></button>";
                $action  .= \Form::close();

                return $action;
            })
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategori'] = Kategori::pluck('nama_kategori', 'uuid_kategori');
        return view('admin.produk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_produk'           => 'required',
                'harga_produk'          => 'required',
                'detail_produk'         => 'required',
                'uuid_kategori'         => 'required',
                'foto'                  => 'required'
            ]
        );

        $uuid_produk   =  Uuid::uuid4()->getHex();

        $images = request()->file('foto');
        $imagesUrl = $images->storeAs('produk', "{$uuid_produk}.{$images->extension()}");

        $produk = new Produk;
        $produk->uuid_produk        = $uuid_produk;
        $produk->nama_produk        = $request->nama_produk;
        $produk->harga_produk       = $request->harga_produk;
        $produk->detail_produk      = $request->detail_produk;
        $produk->foto_path          = $imagesUrl;
        $produk->uuid_kategori      = $request->uuid_kategori;
        $produk->save();

        return redirect('/admin/produk')->with('success', 'Produk Berhasil DiBuat');
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
        $data['produk'] = Produk::findOrFail($id);
        $data['kategori'] = Kategori::pluck('nama_kategori', 'uuid_kategori');
        return view('admin.produk.edit', $data);
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
        $request->validate(
            [
                'nama_produk'           => 'required',
                'harga_produk'          => 'required',
                'detail_produk'         => 'required',
                'uuid_kategori'         => 'required',
            ]
        );
        $uuid_produk   =  $id;
        $produk = Produk::findOrFail($id);
        

        if (request()->file('foto')) {
            \Storage::delete($produk->foto_path);
            $images = request()->file('foto');
            $imagesUrl = $images->storeAs('produk', "{$uuid_produk}.{$images->extension()}");
        } else {
            $imagesUrl = $produk->foto_path;
        }
        $produk->nama_produk        = $request->nama_produk;
        $produk->harga_produk       = $request->harga_produk;
        $produk->detail_produk      = $request->detail_produk;
        $produk->foto_path          = $imagesUrl;
        $produk->uuid_kategori      = $request->uuid_kategori;
        $produk->save();

        return redirect('/admin/produk')->with('update', 'Produk Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        \Storage::delete($produk->foto_path);
        $produk->delete();

        return redirect('/admin/produk')->with('delete', 'Produk Berhasil DiHapus');
    }
}
