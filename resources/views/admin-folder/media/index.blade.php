<x-app-layout title="Media">
    <div class="d-flex row-media justify-content-around">

        <div class="col card shadow p-3 bg-white m-2" style="border-radius: 0.7rem">
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
            <div class="">
                <div class="title">
                    <h5 class="fw-bold">Media</h5>
                    <div class="button text-end">
                        <a data-toggle="modal" data-target="#modal-media" class="btn m-1 btn-block btn-success"
                            style="border-radius: 2rem">Tambah Media</a>
                        <a href="{{route('media.all-media')}}" class="btn m-1 btn-block btn-success" style="border-radius: 2rem">Lihat Semua
                            Media</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class=" mt-4">
                <table id="tableMedia" class="table table-bordered" style="width: 100%; overflow-x: scroll;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
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
    <div id="modal-media" class="modal fade bd-example-modal-lg" role="dialog">
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
                    <form id="form-media" action="{{ route('media.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="mt-3">
                                <label for="exampleFormControlInput1">Gambar<sup class="text-danger">*</sup></label>
                                <div class="custom-file">
                                    <input accept="image/*" required class="form-control-file" name="gambar_media"
                                        type="file">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label style="margin-bottom:10px" class="text-dark fw">Judul<sup
                                        class="text-danger">*</sup></label>
                                <input class="form-control shadow-sm" name="judul" id="judul-media" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <p>Deskripsi<sup class="text-danger">*</sup></p>

                                <div class="form-group">
                                    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3" required>{{ old('deskripsi') }}</textarea>
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
    <div id="modal-media-edit" class="modal fade bd-example-modal-lg" role="dialog">
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
                    <form id="form-media-edit" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <div class="mt-3">
                                <label for="exampleFormControlInput1">Gambar (jika ingin mengubah gambar)</label>
                                <div class="custom-file">
                                    <input accept="image/*" class="form-control-file" name="gambar_media_edit"
                                        type="file">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label style="margin-bottom:10px" class="text-dark fw">Judul<sup
                                        class="text-danger">*</sup></label>
                                <input class="form-control shadow-sm" name="judul" id="judul-media-edit" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <p>Deskripsi<sup class="text-danger">*</sup></p>

                                <div class="form-group">
                                    <textarea id="deskripsi-edit" name="deskripsi" class="form-control"
                                        id="exampleFormControlTextarea1" rows="3" required></textarea>
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
        $(document).ready(function() {
            $('.dataTables_filter input[type="search"]').css({
                'max-width': '150px',
                'display': 'inline-block'
            });
        });
        
        let table = $('#tableMedia').DataTable({
            order: [
                [4, "desc"]
            ],
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('media.get-media') }}",
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_Row_Index',
                orderable: false,
                searchable: false
            }, {
                data: 'gambar',
                className: 'dt-body-nowrap',
            }, {
                data: 'judul',
                className: 'dt-body-nowrap',
            }, {
                data: 'deskripsi',
                searchable: false
            }, {
                data: 'updated_at',
                className: 'dt-body-nowrap',
                searchable: false
            }, {
                className: 'dt-body-nowrap',
                width:'20vw',
                data: 'action',
                searchable: false
            }],
        });

        $(document).on('click', '.modal-image', function(event) {
            // return confirm($(this).data('tanggalSP2D'));
            var link = $(this).data('link');

            $('#img-modal').attr('src', link);
            // console.log($('#img-modal'))
        });

        $(document).on('click', '.btn-edit-media', function(event) {
            // return confirm($(this).data('tanggalSP2D'));
            var judul = $(this).data('judul');
            var deskripsi = $(this).data('deskripsi');
            var link = $(this).data('link');

            // console.log(nama, harga, deskripsi)
            $('#judul-media-edit').val(judul);
            $('#deskripsi-edit').val(deskripsi);
            $('#form-media-edit').attr('action', link);
        });
    </script>
</x-app-layout>
