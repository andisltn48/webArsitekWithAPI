<div class="d-flex justify-content-center wrap ">
    <div class="m-1">
        <a data-link="{{route('media.update', $model->id)}}" data-judul="{{ $model->judul }}" data-deskripsi="{{ $model->deskripsi }}" data-toggle="modal" data-target="#modal-media-edit"
            style="border-radius: 2rem" type="submit" class="btn btn-block btn-warning btn-edit-media"><i
            class="fas fa-trash-alt me-2"></i>Edit</a>
    </div>
    <div class="m-1">
        <form action="{{ route('media.destroy', $model->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button style="border-radius: 2rem" type="submit" class="btn btn-block btn-danger"
                onclick="return confirm('Apakah anda yakin untuk menghapus media ini ?');"><i
                    class="fas fa-trash-alt me-2"></i>Hapus</button>
        </form>
    </div>
</div>
