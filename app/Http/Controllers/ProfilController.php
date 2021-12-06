<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visi;
use App\Models\Misi;
use Yajra\Datatables\Datatables;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-folder.profil.index');
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

    //custom func

    public function visi_store(Request $request)
    {
        $visi = Visi::create([
            'visi' => $request->visi
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan visi');
    }

    public function misi_store(Request $request)
    {
        $misi = Misi::create([
            'misi' => $request->misi
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan misi');
    }

    public function get_visi()
    {
        $visi = Visi::select('visi.*');

        $datatables = Datatables::of($visi);

        $datatables->orderColumn('updated_at', function ($query, $order) {
            $query->orderBy('visi.updated_at', $order);
        });
        return $datatables->addIndexColumn()->escapeColumns([])
        ->addColumn('action','admin-folder.profil.visi-action')
        ->toJson();
    }

    public function get_misi()
    {
        $misi = Misi::select('misi.*');

        $datatables = Datatables::of($misi);

        $datatables->orderColumn('updated_at', function ($query, $order) {
            $query->orderBy('misi.updated_at', $order);
        });
        return $datatables->addIndexColumn()->escapeColumns([])
        ->addColumn('action','admin-folder.profil.misi-action')
        ->toJson();
    }

    public function visi_update(Request $request, $id)
    {
        $visi = Visi::where('id', $id)->update([
            'visi' => $request->visi_edit
        ]);

        return redirect()->back()->with('success', 'Berhasil edit visi');
    }

    public function misi_update(Request $request, $id)
    {
        $misi = Misi::where('id', $id)->update([
            'misi' => $request->misi_edit
        ]);

        return redirect()->back()->with('success', 'Berhasil edit misi');
    }

    public function visi_destroy(Request $request, $id)
    {
        $visi = Visi::where('id', $id)->first();
        $visi->delete();

        return redirect()->back()->with('success', 'Berhasil hapus visi');
    }

    public function misi_destroy(Request $request, $id)
    {
        $misi = Misi::where('id', $id)->first();
        $misi->delete();

        return redirect()->back()->with('success', 'Berhasil hapus misi');
    }
}
