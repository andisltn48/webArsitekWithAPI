<x-app-layout title="Desain">
    <div class="card shadow p-3 mb-5 bg-white" style="border-radius: 0.7rem"">

        <div class="col text-center">
            <h5 class="fw-bold">Desain</h5>
            <hr class="mt-2" size="5" style="width:15%;margin:auto;color:#60aa7c">
        </div>

        <div class="mt-5 p-4">
            <div class=" design">
                <div class="tab">
                    <button class="tablinks active" onclick="openDesign(event, 'Lantai2')">Rumah Lantai 2</button>
                    <button class="tablinks" onclick="openDesign(event, 'Lantai3')">Rumah Lantai 3</button>
                </div>

                <div id="Lantai2" class="mt-4 tabcontent active">
                    <h4 class="fw-bolder">Desain Rumah Lantai 2</h4>
                    <div class="flex-container wrap mt-3 ">
                        @if (count($daftargambar2) == 0)
                            <div class="ml-auto mt-5">
                                <h1 class="fw-bolder">Belum ada Desain :(</h1>
                            </div>
                        @else
                            @foreach ($daftargambar2 as $item)
                                <div class="mt-3">
                                    <div class="card item-design" style="width: 18rem;">
                                        <img class="card-img-top img-design"
                                            src="{{ asset('storage/gambar-desain/' . $item->gambar) }}"
                                            alt="Card image cap">
                                        <div class="card-body text-center mt-2">
                                            <h5 class="card-title">{{ $item->nama_desain }}</h5>
                                            <p class="card-text">Rp. {{ $item->harga }}</p>
                                            <a href="{{ route('user.detail-design', $item->id) }}" class="btn btn-success"
                                                style="border-radius: 2rem;">Pesan Desain</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div id="Lantai3" class="mt-4 tabcontent">
                    <h4 class="fw-bolder">Desain Rumah Lantai 3</h4>
                    <div class="flex-container wrap mt-3">
                        @if (count($daftargambar3) == 0)
                            <div class="ml-auto mt-5">
                                <h1 class="fw-bolder">Belum ada Desain :(</h1>
                            </div>
                        @else
                            @foreach ($daftargambar3 as $item)
                                <div class="mt-3">
                                    <div class="card item-design me-5" style="width: 18rem;">
                                        <img class="card-img-top img-design"
                                            src="{{ asset('storage/gambar-desain/' . $item->gambar) }}"
                                            alt="Card image cap">
                                        <div class="card-body text-center mt-2">
                                            <h5 class="card-title">{{ $item->nama_desain }}</h5>
                                            <p class="card-text">{{ $item->harga }}</p>
                                            <a href="{{ route('user.detail-design', $item->id) }}" class="btn btn-success"
                                                style="border-radius: 2rem;">Pesan Desain</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDesign(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).classList.add("active");
            evt.currentTarget.className += " active";
        }
    </script>
</x-app-layout>
