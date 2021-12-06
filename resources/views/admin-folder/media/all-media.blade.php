<x-app-layout title="Media">
    <div class="card shadow p-3 mb-5 bg-white" style="border-radius: 0.7rem"">
        <div class="  row">
        <div class="col text-center">
            <h5 class="fw-bold">Galeri</h5>
            <hr class="mt-2" size="5" style="width:15%;margin:auto;color:#60aa7c">
        </div>

        <div class="flex-container wrap mt-1">
            @foreach ($allmedia as $item)
                <a href="{{ asset('storage/gambar-media/'.$item->gambar) }}" class="mt-4 mybox" title="{{$item->judul}}"
                    data-lcl-txt="{{$item->deskripsi}}">
                    <img class="img-fluid rounded shadow" src="{{ asset('storage/gambar-media/'.$item->gambar) }}" width="300"
                        alt="">
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
