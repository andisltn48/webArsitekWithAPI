<x-app-layout title="Daftar Gambar">
    <div class="card shadow p-3 mb-5 bg-white" style="border-radius: 0.7rem"">
        <div class="  row">
        <div class="col text-center">
            <h5 class="fw-bold">Daftar Gambar</h5>
            <hr class="mt-2" size="5" style="width:15%;margin:auto;color:#60aa7c">
        </div>
{{-- @php
    dd($daftargambar);
@endphp --}}
        <div class="flex-container wrap mt-1">
            @foreach ($daftargambar as $item)
                <a href="{{ asset('storage/gambar-desain/'.$item->gambar) }}" class="mt-4 mybox">
                    <img  class="rounded shadow  img-design" src="{{ asset('storage/gambar-desain/'.$item->gambar) }}" width="300"
                        alt="">
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
