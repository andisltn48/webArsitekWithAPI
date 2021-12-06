<div class="d-flex ">
    <div class="m-1">
        <a data-link="{{route('desain.update', $model->id)}}" data-id="{{ $model->id }}" data-harga="{{ $model->harga }}"
            data-nama="{{ $model->nama_desain }}" data-deskripsi="{{$model->deskripsi}}" data-toggle="modal" data-target="#modal-edit"
            style="border-radius: 2rem" type="submit" class="btn btn-block btn-warning btn-edit-desain"><i
            class="fas fa-trash-alt me-2"></i>Edit</a>
    </div>
    <div class="m-1">
        <form action="{{ route('desain.destroy', $model->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button style="border-radius: 2rem" type="submit" class="btn btn-block btn-danger"
                onclick="return confirm('Apakah anda yakin untuk menghapus desain ini ?');"><i
                    class="fas fa-trash-alt me-2"></i>Hapus</button>
        </form>
    </div>
</div>
