@extends('main.layout.template')
@section('title', $title)
@section('content')
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('main.home') }}">Logo here.</a>
            <button class="btn btn-primary">Log in</button>
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
            <a href="#" class="card text-decoration-none">
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
            <a href="#" class="card text-decoration-none">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 col-sm-12 col-md-3">
                            <img src="{{ asset('img/book.png') }}" alt="" style="width: 100%">
                        </div>
                        <div class="col-9 col-sm-12 col-md-9">
                            <h5 class="card-title text-black">Rumah Belajar</h5>
                            <p class="card-text text-secondary">Layanan rumah untuk belajar bersama dan saling berdiskusi.</p>
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
        <div class="swiper alumniSwiper py-3">
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
        </script>
    @endpush
@endsection
