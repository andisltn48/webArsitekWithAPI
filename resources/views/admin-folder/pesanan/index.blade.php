<x-app-layout title="Home">
    <div class="d-flex info-data">
        <div class="col m-1">
            <div class="card shadow p-3 bg-white jumlah-aset" style="border-radius: 0.7rem">
                <div class="card-body row">
                    <div class="col">
                        <h5 class="card-title fw-bolder" id="jumlahpesanan">{{$jumlah_pesanan}}</h5>
                        <h6 class="card-subtitle mt-2 text-nowrap">Jumlah Pesanan</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col m-1">
            <div class="card shadow p-3 bg-white aset-nonaktif" style="border-radius: 0.7rem">
                <div class="card-body row">
                    <div class="col">
                        <h5 class="card-title fw-bolder" id="pengguna">{{$jumlah_pengguna}}</h5>
                        <h6 class="card-subtitle mt-2 text-nowrap">Jumlah Pengguna</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col m-1">
            <div class="card shadow p-3 bg-white aset-nonaktif" style="border-radius: 0.7rem">
                <div class="card-body row">
                    <div class="col">
                        <h5 class="card-title fw-bolder" id="dalampembuatan">{{$onprogress}}</h5>
                        <h6 class="card-subtitle mt-2 text-nowrap">On-Progress</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col m-1">
            <div class="card shadow p-3 bg-white aset-nonaktif" style="border-radius: 0.7rem">
                <div class="card-body row">
                    <div class="col">
                        <h5 class="card-title fw-bolder" id="selesai">{{$selesai}}</h5>
                        <h6 class="card-subtitle mt-2 text-nowrap">Selesai</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow p-3 bg-white mt-3" style="border-radius: 0.7rem">
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
        <div class="row">
            <div class="col-12 col-md-8 title">
                <h5 class="fw-bold">Data Pesanan</h5>
            </div>
        </div>
        <hr>
        <div class="row mt-2">
            <div class="col" style="max-width: 15rem !important">
                <div class="title-filter">
                    <p>Status Pengerjaan</p>
                </div>
                <div class="form-group">
                    <select class="form-select select2 " id="filter-status">
                        <option value="">Semua</option>
                        <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                        <option value="Dalam Pengerjaan">Dalam Pengerjaan</option>
                        <option value="Selesai Dikerjakan">Selesai Dikerjakan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-4 me-1 ms-1">
            <table id="tablePesanan" class="table table-bordered display nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat Pemesan</th>
                        <th>Kontak Pemesan</th>
                        <th>Nomor Pemesanan</th>
                        <th>Nama Desain</th>
                        <th>Tipe Lantai</th>
                        <th>Harga</th>
                        <th>Pembayaran Via</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status Pengerjaan</th>
                        <th>Updatet At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="modal-progress" class="modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Progress</h4>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <!-- body modal -->

                <div class="model-body p-4">
                    <form id="form-progress" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id_pesanan" id="id-pesanan" hidden>
                        <div class="mb-3">
                            <div class="form-group">
                                <label class="text-dark fw">Nama Pemesan<sup class="text-danger">*</sup></label>
                                <input class="form-control shadow-sm" name="nama_pemesan" id="nama-pemesan"
                                    style="margin-top:0.3rem" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="mt-3">
                                <label for="exampleFormControlInput1">Gambar<sup class="text-danger">*</sup></label>
                                <div class="custom-file">
                                    <input multiple accept="image/*" required class="form-control-file"
                                        name="gambar_progress[]" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="col text-center mt-4">
                            <button type="submit" style="border-radius: 2rem"
                                class="btn btn-primary shadow">Simpan</button>
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
    <script>
        let status = $('#filter-status').val();
        let table = $('#tablePesanan').DataTable({
            order: [
                [11, "desc"]
            ],
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pesanan.get-pesanan') }}",
                data: function(d) {
                    d.status = status;
                }
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_Row_Index',
                orderable: false,
                searchable: false
            }, {
                data: 'nama_pemesan',
            }, {
                data: 'alamat_pemesan',
                searchable: false
            }, {
                data: 'kontak_pemesan',
                searchable: false
            }, {
                data: 'no_pemesanan',
            }, {
                data: 'nama_pesanan',
                searchable: false
            }, {
                data: 'tipe_lantai',
                searchable: false
            }, {
                data: 'harga_pesanan',
                searchable: false
            }, {
                data: 'pembayaran_via',
                searchable: false
            }, {
                data: 'bukti_pembayaran',
                searchable: false
            }, {
                data: 'status_pengerjaan',
                searchable: false
            }, {
                data: 'updated_at',
                searchable: false
            }, {
                data: 'action',
                searchable: false
            }],
        });

        $('#filter-status').on('change', function() {
            console.log($('#filter-status').val());
            status = $('#filter-status').val();
            table.ajax.reload(null, false)
        })

        $(document).on('click', '.btn-update-progress', function(event) {
            // return confirm($(this).data('tanggalSP2D'));
            var id_pesanan = $(this).data('idpesanan');
            var nama = $(this).data('nama');
            var link = $(this).data('link');

            // console.log(nama, harga, deskripsi)
            $('#nama-pemesan').attr('value', nama);
            $('#id-pesanan').attr('value', id_pesanan);
            $('#form-progress').attr('action', link);
        });

        $(document).on('click', '.modal-image', function(event) {
            // return confirm($(this).data('tanggalSP2D'));
            var link = $(this).data('link');

            $('#img-modal').attr('src', link);
            // console.log($('#img-modal'))
        });

        $(document).ready(function() {
            $('.dataTables_filter input[type="search"]').css({
                'max-width': '150px',
                'display': 'inline-block'
            });
        });
    </script>
</x-app-layout>
