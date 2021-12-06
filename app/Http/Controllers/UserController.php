<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarDesain;
use App\Models\DaftarGambarDesain;
use App\Models\Progress;
use App\Models\Misi;
use App\Models\Media;
use App\Models\Informasi;
use App\Models\Visi;
use Yajra\Datatables\Datatables;
use App\Models\DataPemesanan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generateNoPemesanan()
    {
        do {
            $nopemesanan = random_int(100000, 999999);
        } while (DataPemesanan::where("no_pemesanan", $nopemesanan)->first());

        return $nopemesanan;
    }

    public function index()
    {
        $progress = Progress::where('id_pemesan', Auth::user()->id)->get();
        return view('user-folder.index', compact('progress'));
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
        function RemoveSpecialChar($str)
        {
            $res = str_replace(array('.'), '', $str);

            
            return preg_replace('~\D~', '', $res);
        }

        $file_bukti_pembayaran = $request->buktipembayaran;
        $fileName_bukti_pembayaran = time() . '_' . $file_bukti_pembayaran->getClientOriginalName();
        $file_bukti_pembayaran->move(public_path('storage/bukti-pembayaran'), $fileName_bukti_pembayaran);

        $validate = $request->validate([
            'kontak' => 'numeric'
        ]);
        $desain = DaftarDesain::where('id', $request->id_desain)->first();
        // dd(RemoveSpecialChar($desain->harga));
        $datapemesanan = DataPemesanan::create([
            'nama_pemesan' => Auth::user()->name,
            'id_pemesan' => Auth::user()->id,
            'alamat_pemesan' => $request->alamat,
            'kontak_pemesan' => $request->kontak,
            'nama_pesanan' => $desain->nama_desain,
            'id_pesanan' => $desain->id,
            'tipe_lantai' => $desain->tipe_lantai,
            'luas_bangunan' => $request->luas_bangunan,
            'harga_pesanan' => RemoveSpecialChar($request->harga_desain),
            'pembayaran_via' => $request->pembayaran,
            'bukti_pembayaran' => $fileName_bukti_pembayaran,
            'status_pengerjaan' => 'Belum Dikonfirmasi',
            'no_pemesanan'  => $this->generateNoPemesanan(),
        ]);

        return redirect()->back()->with('success', 'Berhasil melakukan pemesanan');
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

    public function company_profile()
    {
        $visi = Visi::all();
        $misi = Misi::all();
        return view('user-folder.company-profile', compact('visi', 'misi'));
    }

    public function design_index()
    {
        $daftargambar2 = DaftarDesain::where('tipe_lantai', '2 Lantai')
            ->leftJoin('daftar_gambar_desain', function ($join) {
                $join->on('daftar_gambar_desain.id_desain', '=', 'daftar_desain.id')
                    ->where('daftar_gambar_desain.id', '=', \DB::raw('(SELECT id FROM daftar_gambar_desain WHERE daftar_gambar_desain.id_desain = daftar_desain.id LIMIT 1)'));
            })->select('daftar_desain.*', 'daftar_gambar_desain.gambar')->get();
        $daftargambar3 = DaftarDesain::where('tipe_lantai', '3 Lantai')
            ->leftJoin('daftar_gambar_desain', function ($join) {
                $join->on('daftar_gambar_desain.id_desain', '=', 'daftar_desain.id')
                    ->where('daftar_gambar_desain.id', '=', \DB::raw('(SELECT id FROM daftar_gambar_desain WHERE daftar_gambar_desain.id_desain = daftar_desain.id LIMIT 1)'));
            })->select('daftar_desain.*', 'daftar_gambar_desain.gambar')->get();

        return view('user-folder.design-index', compact('daftargambar2', 'daftargambar3'));
    }

    public function detail_design(Request $request, $id)
    {
        $pembayaran = [
            'BNI' => 'BNI - 1111000000',
            'BRI' => 'BRI - 1111111111',
            'Mandiri' => 'Mandiri - 111222211'
        ];
        // dd($id);
        $detaildesain = DaftarDesain::where('id', $id)->first();
        $daftargambar = DaftarGambarDesain::where('id_desain', $id)->get();
        return view('user-folder.detail-design', compact('detaildesain', 'pembayaran', 'daftargambar'));
    }

    public function media()
    {
        $allmedia = Media::all();
        return view('user-folder.media', compact('allmedia'));
    }

    public function informasi()
    {
        $informasi = Informasi::all();
        return view('user-folder.informasi', compact('informasi'));
    }

    public function get_pesanan(Request $request)
    {
        function convert($harga)
        {
            return strrev(implode('.', str_split(strrev(strval($harga)), 3)));
        };

        $datapemesanan = DataPemesanan::where('id_pemesan', Auth::user()->id);
        
        $datatables = Datatables::of($datapemesanan);

        $datatables->orderColumn('created_at', function ($query, $order) {
            $query->orderBy('data_pemesanan.created_at', $order);
        });
        return $datatables->addIndexColumn()->escapeColumns([])
        ->toJson();
    }
}
