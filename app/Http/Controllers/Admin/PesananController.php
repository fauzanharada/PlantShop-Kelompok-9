<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\user\BarangPesanan;
use App\Models\User\Biodata;
use App\Models\user\KonfirmasiPesanan;
use App\Models\user\Pesan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;

class PesananController extends Controller
{

    public function json()
    {
        return DataTables::of(Pesan::whereNotNull('uuid_konfirmasi')->whereNull('Kurir'))
            ->addColumn('action', function ($row) {
                $action   = '<a href="/admin/pesanan/' . $row->uuid_pesan . '/resi" class="btn btn-sm btn-primary"  data-bs-toggle="tooltip"
                data-bs-placement="top" title="Masukkan Resi"><i class="fas fa-check-circle"></i></a>|';
                $action  .= '<a href="/admin/pesanan/' . $row->uuid_pesan . '/cek_barang" class = "btn btn-secondary btn-sm" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Cek Barang"><i class="fas fa-search"></i></a>';

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
        return view('admin.pesanan.index');
    }

    public function cek_barang($id)
    {
        $data['pesanans'] = BarangPesanan::with('produk')->where('uuid_pesan', $id)->get();
        $pesan = Pesan::findOrfail($id)->first();
        $data['konfirmasi'] = KonfirmasiPesanan::where('uuid_konfirmasi_pesanan', $pesan->uuid_konfirmasi)->first();

        return view('admin.pesanan.cekBarang', $data);
    }

    public function cetak_alamat($id)
    {
        //GET DATA BERDASARKAN ID

        $pesanan = BarangPesanan::with('produk')->where('uuid_pesan', $id)->get();
        $pesan = Pesan::where('uuid_pesan', $id)->first();
        $biodata = Biodata::where('email', $pesan->email)->first();

        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('admin.pesanan.cetakAlamat', compact('pesanan', 'pesan', 'biodata'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function resi($id)
    {
        $data['pesan'] = Pesan::findOrFail($id);
        return view('admin.pesanan.resi', $data);
    }

    public function jsonPesananDikirim()
    {
        return DataTables::of(Pesan::whereNotNull('uuid_konfirmasi'))
            ->make(true);
    }
    public function pesanan_dikirim()
    {
        return view('admin.pesanan.pesananDikirim');
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
        $pesan = Pesan::findOrFail($id);
        $pesan->kurir       = $request->kurir;
        $pesan->no_resi     = $request->no_resi;
        $pesan->save();

        return redirect('/admin/pesanan')->with('update', 'Resi Berhasil Di Input');
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
