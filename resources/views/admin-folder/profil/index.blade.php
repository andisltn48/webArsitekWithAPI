<x-app-layout title="Profil">
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
    <div class="d-flex row-profil justify-content-around">
        <div class="col card shadow p-3 bg-white m-2" style="border-radius: 0.7rem">
            <div class="">
                <div class="title">
                    <h5 class="fw-bold">Visi</h5>
                    <div class="button text-end">
                        <a data-toggle="modal" data-target="#modal-visi" class="btn btn-block btn-success"
                            style="border-radius: 2rem">Tambah Visi</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <table id="tableVisi" class="table table-bordered col">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Visi</th>
                            <th>Update at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="col card shadow p-3 m-2 bg-white" style="border-radius: 0.7rem;max-height: 35rem !important">
            <div class="">
                <div class="title">
                    <h5 class="fw-bold">Misi</h5>
                </div>
                <div class="button text-end">
                    <a data-toggle="modal" data-target="#modal-misi" class="btn btn-block btn-success"
                        style="border-radius: 2rem">Tambah Misi</a>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <table id="tableMisi" class="table table-bordered col">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Misi</th>
                            <th>Update at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="modal-visi" class="modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Visi</h4>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <!-- body modal -->

                <div class="model-body p-4">
                    <form action="{{ route('profil.visi-store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <p>Visi<sup class="text-danger">*</sup></p>

                                <div class="form-group">
                                    <textarea style="word-break: break-all !important" id="visi" name="visi"
                                        class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        required></textarea>
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
    <div id="modal-misi" class="modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Misi</h4>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <!-- body modal -->

                <div class="model-body p-4">
                    <form action="{{ route('profil.misi-store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <p>Misi<sup class="text-danger">*</sup></p>

                                <div class="form-group">
                                    <textarea id="misi" name="misi" class="form-control"
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
    <div id="modal-visi-edit" class="modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Visi</h4>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <!-- body modal -->

                <div class="model-body p-4">
                    <form id="visi-edit-link" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <p>Visi<sup class="text-danger">*</sup></p>

                                <div class="form-group">
                                    <textarea id="visi-edit" name="visi_edit" class="form-control"
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
    <div id="modal-misi-edit" class="modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Misi</h4>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <!-- body modal -->

                <div class="model-body p-4">
                    <form id="misi-edit-link" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <p>Misi<sup class="text-danger">*</sup></p>

                                <div class="form-group">
                                    <textarea id="misi-edit" name="misi_edit" class="form-control"
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
    <script>
        let tableVisi = $('#tableVisi').DataTable({
            order: [
                [2, "desc"]
            ],
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('profil.get-visi') }}",
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_Row_Index',
                orderable: false,
                searchable: false
            }, {
                data: 'visi',
            }, {
                className: 'dt-body-nowrap',
                data: 'updated_at',
            }, {
                className: 'dt-body-nowrap',
                data: 'action',
                searchable: false
            }],
        });

        let tableMisi = $('#tableMisi').DataTable({
            order: [
                [2, "desc"]
            ],
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('profil.get-misi') }}",
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_Row_Index',
                orderable: false,
                searchable: false
            }, {
                data: 'misi',
            }, {
                className: 'dt-body-nowrap',
                data: 'updated_at',
            }, {
                className: 'dt-body-nowrap',
                data: 'action',
                searchable: false
            }],
        });

        $(document).on('click', '.btn-edit-visi', function(event) {

            var link = $(this).data('link');
            var visi = $(this).data('visi');

            // console.log(nama, harga, deskripsi)
            $('#visi-edit-link').attr('action', link);
            $('#visi-edit').val(visi);
        });

        $(document).on('click', '.btn-edit-misi', function(event) {

            var link = $(this).data('link');
            var misi = $(this).data('misi');

            // console.log(nama, harga, deskripsi)
            $('#misi-edit-link').attr('action', link);
            $('#misi-edit').val(misi);
        });

        $(document).ready(function() {
            $('.dataTables_filter input[type="search"]').css({
                'max-width': '150px',
                'display': 'inline-block'
            });
        });
    </script>
</x-app-layout>
