<?php

namespace App\Http\Controllers;

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
        return view('admin-folder.desain.index');
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

        $gambar = $request->gambar_desain;
        foreach ($gambar as $key => $value) {
            $file_gambar_desain = $value;
            $fileName_gambarDesain = time().'_'.$file_gambar_desain->getClientOriginalName();
            $file_gambar_desain->move(public_path('storage/gambar-desain'), $fileName_gambarDesain);
            // echo $value;

            $datagambar = DaftarGambarDesain::create([
                'id_desain' => $daftardesain->id,
                'gambar' => $fileName_gambarDesain
            ]);
        }

        return redirect()->back()->with('success', 'Desain berhasil ditambahkan');
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

        return redirect()->back()->with('success', 'Berhasil melakukan update desain');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cekid = DataPemesanan::where('id_pesanan', $id)->first();
        if ($cekid == NULL) {
            $desain = DaftarDesain::where('id', $id)->first();
            if ($desain) {
                $desain->delete();
            }
            $daftargambar = DaftarGambarDesain::where('id_desain', $id)->get();
            if ($daftargambar) {
                foreach ($daftargambar as $key => $value) {

                    if(File::exists(public_path('storage/gambar-desain/'.$value->gambar))){
                        File::delete(public_path('storage/gambar-desain/'.$value->gambar));
                    }else{
                        dd('File does not exists.');
                    }
                    $value->delete();
                }
            }

            return redirect()->back()->with('success', 'Desain berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Tidak dapat dihapus. Desain sedang dalam pemesanan!');
        }
        
    }

    public function get_desain(Request $request)
    {
        $datapemesanan = DaftarDesain::select('daftar_desain.*');

        if ($request->input('tipe') != null) {
            $datapemesanan = $datapemesanan->where('tipe_lantai', $request->status);
        }
        
        $datatables = Datatables::of($datapemesanan);
        if ($request->input('lantai') != null) {
            $datapemesanan = $datapemesanan->where('tipe_lantai', $request->lantai);
        }
        if ($request->get('search')['value']) {
            $datatables->filter(function ($query) {
                    $keyword = request()->get('search')['value'];
                    $query->where('nama_desain', 'like', "%" . $keyword . "%");

        });}
        $datatables->orderColumn('updated_at', function ($query, $order) {
            $query->orderBy('daftar_desain.updated_at', $order);
        });
        return $datatables->addIndexColumn()->escapeColumns([])
        ->addColumn('action','admin-folder.desain.action')
        ->addColumn('lihat','admin-folder.desain.lihat')
        ->addColumn('deskripsi','admin-folder.desain.deskripsi')
        ->toJson();
    }

    public function get_gambar_desain($id)
    {
        $daftargambar = DaftarGambarDesain::where('id_desain', $id)->get();
        return view('admin-folder.desain.daftar-gambar', compact('daftargambar'));
    }
}
