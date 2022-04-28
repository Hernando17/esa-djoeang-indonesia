@extends('main.layout.template')
@section('title', $title)
@section('content')
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('main.home') }}">
                <img src="{{ asset('img/esajuangindonesia.png') }}" alt="Esa Juang Indonesia" width="100">
            </a>
            <a role="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</a>
        </div>
    </nav>
    <section>
        <div class="swiper bannerSwiper">
            <div class="swiper-wrapper">
                <?php for($i = 0; $i < 5; $i++) { ?>
                <div class="swiper-slide">
                    <img src="{{ asset('img/banner.png') }}" alt="Dummy" style="width: 100%;">
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="container py-3">
        <h4 class="text-center">Jadwal Pelatihan AAN</h4>
        <div class="row">
            <?php for ($i = 0; $i < 7; $i++) { ?>
            <div class="col-3">
                <div class="card my-2">
                    <div class="card-body">
                        <h5 class="text-center">Senin</h5>
                        <ol>
                            <li>Contoh</li>
                            <li>Contoh 2</li>
                        </ol>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <section class="py-5 bg-light text-center">
        <h4 class="">Daftar Lokasi Pelatihan AAN</h4>
        <a href="#" class="btn btn-primary">Cek Lokasi</a>
    </section>
    <div class="container">
        <footer class="row row-cols-5 py-5 my-5 border-top">
            <div class="col">
                <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                    <img src="{{ asset('img/esajuangindonesia.png') }}" alt="Esa Juang Indonesia" width="100">
                </a>
                <p class="text-muted">&copy; Esa Juang Foundation 2022</p>
            </div>

            <div class="col">

            </div>

            <div class="col">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>
        </footer>
    </div>


    <!-- login modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Log in</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="login-form">
                        @csrf
                        <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email">
                        <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password">
                        <button type="submit" class="btn btn-success w-100">Log in</button>
                        <small>Belum punya akun? <a role="button" id="register-href" class="text-primary text-decoration-none">Daftar</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- register modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Nama" required>
                        <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email" required>
                        <div class="row mb-3">
                            <div class="col-md">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="col-md">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Register</button>
                        <small>Sudah punya akun? <a role="button" id="login-href" class="text-primary text-decoration-none">Masuk</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script type="text/javascript">
            let bannerSwiper = new Swiper(".bannerSwiper", {
                slidesPerView: 1.2,
                spaceBetween: 20,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                }
            });

            let alumniSwiper = new Swiper(".alumniSwiper", {
                slidesPerView: 5,
                spaceBetween: 30,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                freeMode: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true,
                },
            });

            let alumniSwiperMobile = new Swiper(".alumniSwiperMobile", {
                slidesPerView: 2,
                spaceBetween: 10,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                freeMode: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true,
                },
            });

            $('#register-href').click(function(e) {
                e.preventDefault();
                $('#loginModal').modal('hide');
                $('#registerModal').modal('show');
            })
            $('#login-href').click(function(e) {
                e.preventDefault();
                $('#loginModal').modal('show');
                $('#registerModal').modal('hide');
            })

            $('#login-form').submit((e) => {
                e.preventDefault();
                let formData = new FormData(e.target);
                $.ajax({
                    url: "{{ route('auth') }}",
                    type: "POST",
                    data: formData,
                    beforeSend: (e) => {},
                    complete: (e) => {},
                    success: (res) => {
                        if (res.status === 'success') {
                            alert('Login berhasil!');
                            window.location.replace("{{ route('admin.dashboard') }}");
                        } else {
                            alert('Akun invalid!');
                        }
                    },
                    error: (err) => {
                        $.each(err.responseJSON.errors, (id, error) => {
                            alert(error);
                        })
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                })
            })
        </script>
    @endpush
@endsection
