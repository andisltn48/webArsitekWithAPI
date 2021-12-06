<div class="m-1 text-center">
    <form action="{{ route('user-admin.destroy', $model->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button style="border-radius: 2rem" type="submit" class="btn btn-block btn-danger"
            onclick="return confirm('Apakah anda yakin untuk menghapus pengguna ini ?');"><i
                class="fas fa-trash-alt me-2"></i>Hapus</button>
    </form>
</div>