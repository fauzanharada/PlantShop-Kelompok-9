<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json()
    {
        return Datatables::of(Kategori::all())
            ->addColumn('action', function ($row) {
                $action   = '<a href="/admin/kategori/' . $row->uuid_kategori . '/edit" class="btn btn-sm btn-primary" ><i class="fas fa-pencil-alt"></i></a>';
                $action  .= \Form::open(['url' => '/admin/kategori/' . $row->uuid_kategori, 'method' => 'delete', 'style' => 'float:right']);
                $action  .= "<button type='submit' class = 'btn btn-danger btn-sm' ><i class='fas fa-trash-alt'></i></button>";
                $action  .= \Form::close();

                return $action;
            })
            ->make(true);
    }
    public function index()
    {
        return view('admin.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $uuid_kategori = Uuid::uuid4()->getHex();

        $kategori = new Kategori;
        $kategori->uuid_kategori    = $uuid_kategori;
        $kategori->nama_kategori    = $request->nama_kategori;
        $kategori->save();

        return redirect('/admin/kategori')->with('success', 'Kategori Berhasil Ditambahkan');
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
        $data['kategori'] = Kategori::findOrFail($id);
        return view('admin.kategori.edit', $data);
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
        $request->validate([
            'nama_kategori' => 'required',
        ]);


        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori    = $request->nama_kategori;
        $kategori->save();

        return redirect('/admin/kategori')->with('update', 'Kategori Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('/admin/kategori')->with('delete', 'Kategori Berhasil Dihapus');

    }
}
