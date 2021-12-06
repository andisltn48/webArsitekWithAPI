<x-app-layout title="Detail Desain">
    <div class="card shadow p-3 mb-5 bg-white" style="border-radius: 0.7rem"">
    
          @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                {{ session('error') }}
            </div>
        </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @error('kontak')
            <div style="background: rgb(226, 88, 88); border-radius:0.7rem;" class="mb-4 p-3">
                {{ $message }}

            </div>
        @enderror
        <div class=" text-center">
            <h5 class="fw-bold">Pesan Desain</h5>
            <hr class="mt-2" size="5" style="width:15%;margin:auto;color:#60aa7c">
        </div>
        <div class="mt-5">
            <div class="image text-center">
                <div class="owl-carousel owl-theme" id="detail-carousel">
                    @foreach ($daftargambar as $item)
                        <a class="modal-image" href="" data-target="#modal-image-pop" data-toggle="modal"
                            data-link="{{ asset('storage/gambar-desain/' . $item->gambar) }}">
                            <img class="card-img-top img-design"
                                src="{{ asset('storage/gambar-desain/' . $item->gambar) }}" alt="">
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="description" style="padding-left: 3rem; padding-right: 3rem; margin-top: 4rem">
                <p class="fw-bolder">Nama Desain</p>
                <p style="text-align: justify !important">{{ $detaildesain->nama_desain }}</p>
            </div>
            <div class="description" style="padding-left: 3rem; padding-right: 3rem">
                <p class="fw-bolder">Harga</p>
                <p>Rp. {{ $detaildesain->harga }}</p>
            </div>
            <div class="description" style="padding-left: 3rem; padding-right: 3rem">
                <p class="fw-bolder">Deskripsi</p>
                <p style="text-align: justify !important">{{ $detaildesain->deskripsi }}</p>
            </div>
            <div class="text-center button">
                <a data-lantai="{{$detaildesain->tipe_lantai}}" data-id="{{ $detaildesain->id }}" data-harga="{{ $detaildesain->harga }}"
                    data-nama="{{ $detaildesain->nama_desain }}" data-toggle="modal" data-target="#modal-pesandesain"
                    class="btn btn-success modal-pesan" style="border-radius: 2rem">Pesan Desain</a>
            </div>
        </div>
        <div id="modal-pesandesain" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Pesan Desain</h4>
                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <!-- body modal -->

                    <div class="model-body p-4">
                        <form action="{{ route('user.store') }}" method="POST" id="form-confirm"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id_desain" id="id-desain" hidden>
                            <div class="title">
                                <p>Luas Bangunan</p>
                            </div>
                            <div class="form-group">
                                <input id="luas-bangunan" name="luas_bangunan" type="number" class="form-control">
                            </div>
                            <div class="title">
                                <p>Nama Desain</p>
                            </div>
                            <div class="form-group">
                                <input id="nama-desain" name="nama_desain" type="text" class="form-control" readonly>
                            </div>
                            <div class="title">
                                <p>Tipe Lantai</p>
                            </div>
                            <div class="form-group">
                                <input id="tipe-lantai" name="tipe_lantai" type="text" class="form-control" readonly>
                            </div>
                            <div class="mt-3">
                                <p>Harga Desain</p>
                            </div>
                            <div class="form-group">
                                <input id="harga-desain" name="harga_desain" type="text" class="form-control"
                                    readonly>
                            </div>
                            <div class="mt-3">
                                <p>Pembayaran Via<sup class="text-danger">*</sup></p>
                            </div>
                            <div class="form-group">
                                <select name="pembayaran" class="form-select" required>
                                    <option value="">Pilih</option>
                                    @foreach ($pembayaran as $key => $data)
                                        @if (Request::old('pembayaran') == $key)
                                            <option value="{{ $key }}" selected>{{ $data }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $data }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1">Bukti Pembayaran<sup
                                        class="text-danger">*</sup></label>
                                <div class="custom-file">
                                    <input accept="image/*" required class="form-control-file" name="buktipembayaran"
                                        type="file">
                                </div>
                            </div>
                            <div class="mt-3">
                                <p>Alamat<sup class="text-danger">*</sup></p>
                            </div>
                            <div class="form-group">
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    required>{{ old('alamat') }}</textarea>
                            </div>
                            <div class="mt-3">
                                <p>Whatsapp<sup class="text-danger">*</sup></p>
                            </div>
                            <div class="form-group">
                                <input id="kontak" name="kontak" required value="{{ old('kontak') }}" type="number"
                                    class="form-control">
                            </div>
                            <div class="note mt-3">
                                <p class="text-disable">*Untuk jasa pengerjaan dan berikut bahan
                                    bangunan silahkan konsultasi melalui <a href=""
                                        class="text-success"><u>Whatsapp</u></a> untuk menyesuaikan
                                    jenis bahan yg dibutuhkan bedasarkan keinginan anda</p>
                            </div>
                            <div class="mt-4 text-end">
                                <button style="border-radius: 2rem" class="btn me-1 btn-block btn-success"
                                    type="submit"><i class="f"></i>Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-image-pop" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <!-- body modal -->

                    <div class="model-body p-4">
                        <img style="width: 100%; overflow: hidden !important" id="img-modal" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var currHarga = 0;
        $(document).on('click', '.modal-image', function(event) {
            // return confirm($(this).data('tanggalSP2D'));
            var link = $(this).data('link');

            $('#img-modal').attr('src', link);
            // console.log($('#img-modal'))
        });
        
        $(document).on('click', '.modal-pesan', function(event) {
            // return confirm($(this).data('tanggalSP2D'));
            var harga = $(this).data('harga');
            var nama = $(this).data('nama');
            var lantai = $(this).data('lantai');
            var id = $(this).data('id');

            currHarga = harga

            console.log(currHarga)
            $('#harga-desain').attr('value', 'Rp. ' + harga);
            $('#nama-desain').attr('value', nama);
            $('#tipe-lantai').attr('value', lantai);
            $('#id-desain').attr('value', id);
            // console.log($('#img-modal'))
        });

        $("#luas-bangunan").on("input", function() {
            let harga = currHarga.toString().split('.').join("");
            if ($('#tipe-lantai').val() == '2 Lantai') {
                let total = harga * 2 * $("#luas-bangunan").val()
                console.log(total);
                $('#harga-desain').attr('value', formatRupiah(total, 'Rp. '));
            } else {
                let total = harga * 3 * $("#luas-bangunan").val()
                console.log(total);
                $('#harga-desain').attr('value', formatRupiah(total, 'Rp. '));
            }
        });

        function formatRupiah(angka, prefix){
			var number_string = angka.toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
    </script>

</x-app-layout>
