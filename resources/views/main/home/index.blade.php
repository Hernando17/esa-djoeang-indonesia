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
        <div class="card-group">
            <a href="{{ route('main.akademik-abdi-negara') }}" class="card text-decoration-none">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 col-sm-12 col-md-3">
                            <img src="{{ asset('img/policeman.png') }}" alt="" class="img-fluid" style="width: 100%">
                        </div>
                        <div class="col-9 col-sm-12 col-md-9">
                            <h5 class="card-title text-black">Akademik Abdi Negara</h5>
                            <p class="card-text text-secondary">Layanan belajar akademik untuk menjadi abdi negara.</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('main.rumah-belajar') }}" class="card text-decoration-none">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 col-sm-12 col-md-3">
                            <img src="{{ asset('img/book.png') }}" alt="" style="width: 100%">
                        </div>
                        <div class="col-9 col-sm-12 col-md-9">
                            <h5 class="card-title text-black">Rumah Belajar</h5>
                            <p class="card-text text-secondary">Layanan rumah untuk belajar bersama dan saling berdiskusi.
                            </p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="card text-decoration-none">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 col-sm-12 col-md-3">
                            <img src="{{ asset('img/article.png') }}" alt="" style="width: 100%">
                        </div>
                        <div class="col-9 col-sm-12 col-md-9">
                            <h5 class="card-title text-black">Blog & Artikel</h5>
                            <p class="card-text text-secondary">Daftar blog dan artikel yang dapat dibaca.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <section class="container">
        <h4 class="text-center">Anggota/Alumni yang Lolos</h4>
        <div class="swiper alumniSwiperMobile py-3 d-sm-none">
            <div class="swiper-wrapper">
                <?php for($i = 0; $i < 30; $i++) { ?>
                <div class="swiper-slide">
                    <div class="card">
                        <div class="card-body p-2 text-center">
                            <img src="{{ asset('img/policeman.png') }}" class="rounded-circle" alt="dummy" style="width: 150px; height: 150px;">
                            <h5 class="card-title m-0">Nama</h5>
                            <small class="card-text m-0">Jabatan</small>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper alumniSwiper py-3 d-none d-sm-block">
            <div class="swiper-wrapper">
                <?php for($i = 0; $i < 30; $i++) { ?>
                <div class="swiper-slide">
                    <div class="card">
                        <div class="card-body p-2 text-center">
                            <img src="{{ asset('img/policeman.png') }}" class="rounded-circle" alt="dummy" style="width: 150px; height: 150px;">
                            <h5 class="card-title m-0">Nama</h5>
                            <small class="card-text m-0">Jabatan</small>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
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
