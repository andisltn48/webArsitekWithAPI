<x-guest-layout title="Daftar">
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('auth.register') }}" method="POST">
                        @csrf
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        <div class="form-outline mb-4">
                            <label class="form-label fs-6" for="form3Example3">Nama</label>
                            <input style="border-radius: 2rem !important" type="" id="name"
                                class="form-control form-control-lg" placeholder="Masukkan Email Anda" name="name" />
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label fs-6" for="form3Example3">Email</label>
                            <input style="border-radius: 2rem !important" type="email" id="email"
                                class="form-control form-control-lg" placeholder="Masukkan Email Anda" name="email" />
                            <div class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label fs-6" for="form3Example4">Password</label>
                            <input style="border-radius: 2rem !important" type="password" id="password"
                                class="form-control form-control-lg" placeholder="Enter password" name="password" />
                            <div class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <!-- Checkbox -->
                            <input style="margin-top: 0.9rem" type="checkbox" onclick="myFunction()"> Show Password
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-outline-danger"
                                style="padding-left: 2.5rem; padding-right: 2.5rem; border-radius:2rem !important">Daftar</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Sudah punya akun? <a href="/"
                                    class="link-success">Masuk</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</x-guest-layout>
