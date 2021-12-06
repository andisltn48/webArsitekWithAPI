<x-app-layout title="Daftar Desain">
    <div class="d-flex row-desain">
        <div class="card shadow p-3 bg-white m-2" style="border-radius: 0.7rem; max-width:50rem !important">
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
                    <h5 class="fw-bold">Daftar Desain</h5>
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                <div class="col" style="max-width: 15rem !important">
                    <div class="title-filter">
                        <p>Tipe Lantai</p>
                    </div>
                    <div class="form-group">
                        <select class="form-select select2 " id="filter-lantai">
                            <option value="">Semua</option>
                            <option value="2 Lantai">2 Lantai</option>
                            <option value="3 Lantai">3 Lantai</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-4 me-1 ms-1">
                <table id="tableDesain" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Desain</th>
                            <th>Deskripsi</th>
                            <th>Tipe Lantai</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Tanggal Pesan</th>
                            <th>Updatet At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="col card shadow p-3 bg-white m-2" style="border-radius: 0.7rem;max-height: 40rem !important">
            <div class="row">
                <div class="col-12 col-md-8 title">
                    <h5 class="fw-bold">Tambah Desain</h5>
                </div>
            </div>
            <hr>
            <form enctype="multipart/form-data" class="mt-2 p-2" action="{{ route('desain.store') }}"
                method="post">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label style="margin-bottom:10px" class="text-dark fw">Nama Desain<sup
                                class="text-danger">*</sup></label>
                        <div class="form-group">
                            <input class="form-control shadow-sm" name="nama_desain" value="{{ old('nama_desain') }}"
                                style="" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <p>Deskripsi<sup class="text-danger">*</sup></p>

                        <div class="form-group">
                            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                required>{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <label class="title-filter">
                            <p>Tipe Lantai<sup class="text-danger">*</sup>
                        </label>
                        <select style="margin-top:0.7rem !important" required class="form-select select2 "
                            name="tipe_lantai">
                            <option value="">Semua</option>
                            <option value="2 Lantai">2 Lantai</option>
                            <option value="3 Lantai">3 Lantai</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label style="margin-bottom: 10px" class="text-dark">Harga<sup
                                class="text-danger">*</sup></label>
                        <div class="form-group">
                            <input id="rupiah" class="form-control shadow-sm" name="harga" value="{{ old('harga') }}"
                                required>
                        </div>
                    </div>
                    <div class="text-danger">
                        @error('harga')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="mt-3">
                        <label for="exampleFormControlInput1">Gambar Desain<sup class="text-danger">*</sup></label>
                        <div class="custom-file">
                            <input multiple accept="image/*" required class="form-control-file" name="gambar_desain[]"
                                type="file">
                        </div>
                    </div>
                </div>
                <div class="col text-center mt-4">
                    <button type="submit" style="border-radius: 2rem" class="btn btn-primary shadow">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-edit" class="modal fade bd-example-modal-lg" role="dialog">
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
                    <form id="form-edit" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label class="text-dark fw">Nama Desain<sup class="text-danger">*</sup></label>
                                <input class="form-control shadow-sm" name="nama_desain_edit" id="nama_desain_edit"
                                    style="margin-top:0.3rem" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <p>Deskripsi<sup class="text-danger">*</sup></p>

                                <div class="form-group">
                                    <textarea id="deskripsi-edit" name="deskripsi_edit" class="form-control"
                                        id="exampleFormControlTextarea1" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label class="title-filter">
                                    <p>Tipe Lantai<sup class="text-danger">*</sup></p>
                                </label>
                                <select style="margin-top:-0.7rem !important" required class="form-select select2 "
                                    name="tipe_lantai_edit">
                                    <option value="">Semua</option>
                                    <option value="2 Lantai">2 Lantai</option>
                                    <option value="3 Lantai">3 Lantai</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label class="text-dark fw">Harga<sup class="text-danger">*</sup></label>
                                <input id="rupiah" class="form-control shadow-sm" name="harga_edit"
                                    style="margin-top:0.3rem !" required>
                            </div>
                            <div class="text-danger">
                                @error('harga')
                                    {{ $message }}
                                @enderror
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
    <script>
        $(document).ready(function() {
            $('.dataTables_filter input[type="search"]').css({
                'max-width': '150px',
                'display': 'inline-block'
            });
        });

        let lantai = $('#filter-lantai').val();
        let table = $('#tableDesain').DataTable({
            order: [
                [7, "desc"]
            ],
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('desain.get-desain') }}",
                data: function(d) {
                    d.lantai = lantai;
                }
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_Row_Index',
                orderable: false,
                searchable: false
            }, {
                className: 'dt-body-nowrap',
                data: 'nama_desain',
            }, {
                data: 'deskripsi',
                searchable: false
            }, {
                className: 'dt-body-nowrap',
                data: 'tipe_lantai',
                searchable: false
            }, {
                className: 'dt-body-nowrap',
                data: 'lihat',
                searchable: false
            }, {
                className: 'dt-body-nowrap',
                data: 'harga',
                searchable: false
            }, {
                className: 'dt-body-nowrap',
                data: 'created_at',
                searchable: false
            }, {
                className: 'dt-body-nowrap',
                data: 'updated_at',
                searchable: false
            }, {
                className: 'dt-body-nowrap',
                data: 'action',
                searchable: false
            }],
        });

        $('#filter-lantai').on('change', function() {
            console.log($('#filter-lantai').val());
            lantai = $('#filter-lantai').val();
            table.ajax.reload(null, false)
        })

        $(document).on('click', '.btn-edit-desain', function(event) {
            // return confirm($(this).data('tanggalSP2D'));
            var harga = $(this).data('harga');
            var nama = $(this).data('nama');
            var link = $(this).data('link');
            var deskripsi = $(this).data('deskripsi');

            // console.log(nama, harga, deskripsi)
            $("input[name='harga_edit']").val(harga);
            $('#nama_desain_edit').attr('value', nama);
            $('#form-edit').attr('action', link);
            $('#deskripsi-edit').val(deskripsi);
        });

        var rupiah = document.querySelectorAll('#rupiah');
        for (let index = 0; index < rupiah.length; index++) {
            rupiah[index].addEventListener("keyup", function(e) {
                rupiah[index].value = formatRupiah(this.value, );
            });
        };
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>
</x-app-layout>
