<x-app-layout title="User">
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
                    <h5 class="fw-bold">User</h5>
                </div>
            </div>
            <hr>
            <div class=" mt-4">
                <table id="tableUser" class="table table-bordered" style="width: 100%; overflow-x: scroll;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
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
        
        let table = $('#tableUser').DataTable({
            order: [
                [3, "desc"]
            ],
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('user-admin.get-user') }}",
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_Row_Index',
                orderable: false,
                searchable: false
            }, {
                data: 'name',
                searchable: false
            }, {
                data: 'email',
                searchable: false
            }, {
                data: 'created_at',
                className: 'dt-body-nowrap',
                searchable: false
            }, {
                className: 'dt-body-nowrap',
                width:'15vw',
                data: 'action',
                searchable: false
            }],
        });
    </script>
</x-app-layout>
