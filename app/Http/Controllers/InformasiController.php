<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Yajra\Datatables\Datatables;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-folder.informasi.index');
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
        $informasi = Informasi::create([
            'informasi' => $request->informasi
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan informasi');
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
        $informasi=Informasi::where('id', $id)->update([
            'informasi' => $request->informasi_edit
        ]);

        return redirect()->back()->with('success', 'Berhasil melakukan edit informasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi=Informasi::where('id', $id)->first();
        $informasi->delete();

        return redirect()->back()->with('success', 'Berhasil melakukan hapus informasi');
    }

    public function get_info()
    {
        $informasi = Informasi::select('informasi.*');

        $datatables = Datatables::of($informasi);

        $datatables->orderColumn('updated_at', function ($query, $order) {
            $query->orderBy('informasi.updated_at', $order);
        });
        return $datatables->addIndexColumn()->escapeColumns([])
        ->addColumn('action','admin-folder.informasi.action')
        ->toJson();
    }
}
