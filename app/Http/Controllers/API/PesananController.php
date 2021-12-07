<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPemesanan;
use App\Models\Progress;
use App\Models\User;
use Auth;
use Yajra\Datatables\Datatables;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_pesanan = DataPemesanan::all()->count();
        $jumlah_pengguna = User::where('role_id', '2')->get()->count();
        $onprogress = DataPemesanan::where('status_pengerjaan', 'Dalam Pengerjaan')->get()->count();
        $selesai = DataPemesanan::where('status_pengerjaan', 'Selesai Dikerjakan')->get()->count(); 
        return response()->json([
            'jumlah_pesanan' => $jumlah_pesanan,
            'jumlah_pengguna' => $jumlah_pengguna,
            'onprogress' => $onprogress,
            'selesai' => $selesai,
        ], 200);
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

    public function get_pesanan(Request $request)
    {
        function convert($harga)
        {
            return strrev(implode('.', str_split(strrev(strval($harga)), 3)));
        };

        $datapemesanan = DataPemesanan::select('data_pemesanan.*');

        if ($request->input('status') != null) {
            $datapemesanan = $datapemesanan->where('status_pengerjaan', $request->status);
        }
        
        return response()->json([
            'data' => $datapemesanan
        ], 200);
    }
}
