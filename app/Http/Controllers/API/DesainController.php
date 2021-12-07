<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\DaftarDesain;
use App\Models\DaftarGambarDesain;
use App\Models\DataPemesanan;
use Illuminate\Support\Facades\File;

class DesainController extends Controller
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
        $validatedData = $request->validate([
            'harga' => ['required'],
            'nama_desain' => ['required'],
            'deskripsi' => ['required'],
            'tipe_lantai' => ['required'],
        ]);

        function RemoveSpecialChar($str) {
            $res = str_replace( array( '.' ), '', $str);

            return $res;
        }

        $harga = RemoveSpecialChar($request->harga);

        $daftardesain = DaftarDesain::create([
            'nama_desain' => $request->nama_desain,
            'deskripsi' => $request->deskripsi,
            'tipe_lantai' => $request->tipe_lantai,
            'harga' => $harga
        ]);

        return response()->json([
            'message' => 'Berhasil menyimpan desain',
            'data' => $daftardesain
        ], 200);
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
        function RemoveSpecialChar($str) {
            $res = str_replace( array( '.' ), '', $str);

            return $res;
        }

        $validatedData = $request->validate([
            'harga_edit' => ['required'],
            'nama_desain_edit' => ['required'],
            'deskripsi_edit' => ['required'],
            'tipe_lantai_edit' => ['required'],
        ]);

        $harga = RemoveSpecialChar($request->harga_edit);
        
        $daftardesain = DaftarDesain::where('id', $id)->first();
        if ($daftardesain) {
            $daftardesain->update([
                'nama_desain' => $request->nama_desain_edit ,
                'deskripsi' => $request->deskripsi_edit,
                'tipe_lantai' => $request->tipe_lantai_edit,
                'harga' =>$harga
            ]);
        }

        $datapemesanan = DataPemesanan::where('id_pesanan', $id)->get();
        foreach ($datapemesanan as $key => $value) {
            $value->update([
                'nama_pesanan' => $request->nama_desain_edit ,
                'tipe_lantai' => $request->tipe_lantai_edit,
                'harga' => $harga
            ]);
        }

        return response()->json([
            'message' => 'Berhasil update desain',
            'data' => $daftardesain
        ], 200);
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

    public function get_desain(Request $request)
    {
        $daftardesain = DaftarDesain::all();

        if ($request->input('lantai') != null) {
            $daftardesain = $daftardesain->where('tipe_lantai', $request->lantai);
        }
        // $datatables = Datatables::of($datapemesanan);
        // if ($request->get('search')['value']) {
        //     $datatables->filter(function ($query) {
        //             $keyword = request()->get('search')['value'];
        //             $query->where('nama_desain', 'like', "%" . $keyword . "%");

        // });}
        // $datatables->orderColumn('updated_at', function ($query, $order) {
        //     $query->orderBy('daftar_desain.updated_at', $order);
        // });
        // return $datatables->addIndexColumn()->escapeColumns([])
        // ->addColumn('action','admin-folder.desain.action')
        // ->addColumn('lihat','admin-folder.desain.lihat')
        // ->addColumn('deskripsi','admin-folder.desain.deskripsi')
        // ->toJson();
        return response()->json([
            'message' => 'Berhasil mendapatkan desain',
            'data' => $daftardesain
        ], 200);
    }
}
