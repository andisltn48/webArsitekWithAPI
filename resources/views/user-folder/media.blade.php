<x-app-layout title="Media">
    <div class="card shadow p-3 mb-5 bg-white" style="border-radius: 0.7rem"">
        <div class="  row">
        <div class="col text-center">
            <h5 class="fw-bold">Media Sosial</h5>
            <hr class="mt-2" size="5" style="width:15%;margin:auto;color:#60aa7c">
        </div>

        <div class="d-flex row-sosmed mt-4">
            <div class="text-center col" >
                <a target="_blank"  href="#" class="instagram-link"><i style="color: rgb(255, 125, 125)" class="fa-3x fab fa-instagram"></i></a>
                <p class="fw-bolder instagram-title">Instagram</p>
            </div>
            <div class=" text-center col">
                <a class="" target="_blank"  href="#"><i style="color: rgb(123, 188, 250)" class="fab fa-3x fa-twitter"></i></a>
                <p class="fw-bolder " style="color: rgb(0, 0, 0)">Twitter</p>
            </div>
            <div class=" text-center col">
                <a class="" target="_blank"  href="#"><i style="color: rgb(252, 24, 24)" class="fab fa-3x fa-youtube"></i></a>
                <p class="fw-bolder">Youtube</p>
            </div>
            <div class=" text-center col">
                <a class="" target="_blank"  href="#"><i style="color: rgb(0, 35, 236)" class="fab fa-3x fa-facebook-square"></i></a>
                <p class="fw-bolder" style="color: rgb(0, 0, 0)">Facebook</p>
            </div>
        </div>
        <div class=" mt-5 ">
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
