<div class="d-flex ">
    <div class="m-1">
        <a data-link="{{route('profil.misi-update', $model->id)}}" data-misi="{{ $model->misi }}" data-toggle="modal" data-target="#modal-misi-edit"
            style="border-radius: 2rem" type="submit" class="btn btn-block btn-warning btn-edit-misi"><i
            class="fas fa-trash-alt me-2"></i>Edit</a>
    </div>
    <div class="m-1">
        <form action="{{ route('profil.misi-destroy', $model->id) }}" method="POST">
            @csrf
            <button style="border-radius: 2rem" type="submit" class="btn btn-block btn-danger"
                onclick="return confirm('Apakah anda yakin untuk menghapus misi ini ?');"><i
                    class="fas fa-trash-alt me-2"></i>Hapus</button>
        </form>
    </div>
</div>
