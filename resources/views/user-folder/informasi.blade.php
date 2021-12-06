<x-app-layout title="Informasi">
    <div class="card shadow p-3 mb-5 bg-white" style="border-radius: 0.7rem"">
        <div class="   row">
        <div class="col text-center">
            <h5 class="fw-bold">Informasi</h5>
            <hr class="mt-2" size="5" style="width:15%;margin:auto;color:#60aa7c">
        </div>

        <div class="deskripsi-profil mt-5 p-4">
            <div class="visi p-3">
                <div class="text">
                    <ul>
                        @foreach ($informasi as $item)
                        <li class="m-1" style="text-align: justify !important">{{$item->informasi}}</li>    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
    </script>
</x-app-layout>
