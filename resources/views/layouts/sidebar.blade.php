<div id="body-pd">
    <header class="header" id="header">
        {{-- <div style="display: none">
            {{ $notification = auth()->user()->unreadNotifications }}
            {{ $allnotification = auth()->user()->notifications }}
        </div> --}}
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="name-notif d-flex align-items-center justify-content-center">
            <div class="header_name"> <span class="text-success fw-bolder">Halo, </span> {{ Auth::user()->name }}</div>
        </div>
</div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <div href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                    class="nav_logo-name">WebsiteArsitek</span> </div>
            <div class="nav_list">
                {{-- @if (session('role') == 'Admin')
                        <a href="" class="nav_link"> <i
                                class="fas fa-file"></i>
                            <span class="nav_name">Home</span> </a>
                    @endif --}}

                @if (session('role') == 'User')
                    <a href="{{ route('user.index') }}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">Home</span> </a>

                    <a href="{{ route('user.company-profile') }}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">Profile</span> </a>

                    <a href="{{ route('user.design') }}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">Design</span> </a>

                    <a href="{{ route('user.media') }}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">Media</span> </a>

                    <a href="{{ route('user.informasi') }}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">Informasi</span> </a>
                @endif
                @if (session('role') == 'Admin')
                    <a href="{{ route('pesanan.index') }}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">Pesanan</span> </a>

                    <a href="{{ route('desain.index') }}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">Desain</span> </a>

                    <a href="{{route('profil.index')}}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">Profil</span>
                    
                    </a><a href="{{route('media.index')}}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">Media</span> </a>

                    </a><a href="{{route('informasi.index')}}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                    <span class="nav_name">Informasi</span> </a>

                    <a href="{{route('user-admin.index')}}" class="nav_link"> <i class="fas fa-dot-circle"></i>
                        <span class="nav_name">pengguna</span> </a>
                @endif

            </div>
        </div> <a href="{{ route('auth.logout') }}" class="nav_link"> <i class="fas fa-dot-circle"></i>
            <span class="nav_name">Keluar</span> </a>

    </nav>
</div>
</div>
<!--Container Main start-->
{{-- <div class="height-100 bg-light">
        <h4>Main Components</h4>
    </div> --}}


{{-- <script>

        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, headerId, contentId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    headerpd = document.getElementById(headerId),
                    contentspan = document.getElementById(content)

                // Validate that all variables exist
                if (toggle && nav && headerpd) {
                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('expand')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        // add padding to header
                        headerpd.classList.toggle('body-pd')

                        contentspan.classList.toggle('span')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'header')

        });
    </script> --}}
<script>

</script>
