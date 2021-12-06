<x-app-layout title="Informasi">
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
                    <h5 class="fw-bold">Informasi</h5>
                    <div class="button text-end">
                        <a data-toggle="modal" data-target="#modal-informasi" class="btn btn-block btn-success"
                            style="border-radius: 2rem">Tambah Informasi</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <table id="tableInformasi" class="table table-bordered col" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Informasi</th>
                            <th>Update at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div id="modal-informasi" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Informasi</h4>
                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <!-- body modal -->

                    <div class="model-body p-4">
                        <form action="{{ route('informasi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <p>Informasi<sup class="text-danger">*</sup></p>

                                    <div class="form-group">
                                        <textarea style="word-break: break-all !important" id="informasi" name="informasi"
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
        <div id="modal-informasi-edit" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Informasi</h4>
                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <!-- body modal -->

                    <div class="model-body p-4">
                        <form id="form-informasi-edit" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <p>Informasi<sup class="text-danger">*</sup></p>

                                    <div class="form-group">
                                        <textarea style="word-break: break-all !important" id="informasi-edit" name="informasi_edit"
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
        <script>
            let tableInformasi = $('#tableInformasi').DataTable({
                order: [
                    [2, "desc"]
                ],
                scrollX: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('informasi.get-info') }}",
                },
                columns: [{
                    className:'dt-body-nowrap',
                    width:'5vw',
                    data: 'DT_RowIndex',
                    name: 'DT_Row_Index',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'informasi',
                }, {
                    width:'15vw',
                    className:'dt-body-nowrap',
                    data: 'updated_at',
                }, {
                    className:'dt-body-nowrap',
                    width:'20vw',
                    data: 'action',
                    searchable: false
                }],
            });

            
            $(document).on('click', '.btn-edit-informasi', function(event) {

                var link = $(this).data('link');
                var informasi = $(this).data('informasi');

                // console.log(nama, harga, deskripsi)
                $('#form-informasi-edit').attr('action', link);
                $('#informasi-edit').val(informasi);
            });

            $(document).ready(function() {
            $('.dataTables_filter input[type="search"]').css({
                'max-width': '150px',
                'display': 'inline-block'
            });
        });
        </script>
</x-app-layout>
