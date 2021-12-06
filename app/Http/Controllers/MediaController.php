<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Yajra\Datatables\Datatables;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-folder.media.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_media = $request->gambar_media;
        $fileName_gambarMedia = time().'_'.$file_media->getClientOriginalName();
        $file_media->move(public_path('storage/gambar-media'), $fileName_gambarMedia);

        $datamedia = Media::create([
            'gambar' => $fileName_gambarMedia,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan media');
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
        $cekmedia = Media::where('id', $id)->first();
        $oldfile = $cekmedia->gambar;

        if ($request->gambar_media_edit == NULL) {
            $datamedia = Media::where('id', $id)->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);
        } else {
            \File::delete(public_path('storage/gambar-media/'.$oldfile));
            $file_media = $request->gambar_media_edit;
            $fileName_gambarMedia = time().'_'.$file_media->getClientOriginalName();
            $file_media->move(public_path('storage/gambar-media'), $fileName_gambarMedia);
            $datamedia = Media::where('id', $id)->update([
                'gambar' => $fileName_gambarMedia,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil melakukan update media');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datamedia = Media::where('id', $id)->first();
        \File::delete(public_path('storage/gambar-media/'.$datamedia->gambar));
        $datamedia->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus media');
    }

    public function get_media()
    {
        $media = Media::select('media.*');

        $datatables = Datatables::of($media);

        $datatables->orderColumn('updated_at', function ($query, $order) {
            $query->orderBy('media.updated_at', $order);
        });
        return $datatables->addIndexColumn()->escapeColumns([])
        ->addColumn('gambar','admin-folder.media.lihat-gambar')
        ->addColumn('action','admin-folder.media.action')
        ->toJson();
    }

    public function all_media()
    {
        $allmedia = Media::all();
        return view('admin-folder.media.all-media', compact('allmedia'));
    }
}
