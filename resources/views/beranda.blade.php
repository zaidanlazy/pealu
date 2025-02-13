@extends('welcome')

@section('content')
    <style>
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
    </style>

    <div class="container">

        <!-- Slide -->
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.bisnis.com/posts/2023/10/31/1709730/kilang_lng_badak_1696166689_1698744414.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.bisnis.com/posts/2023/10/31/1709730/kilang_lng_badak_1696166689_1698744414.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.bisnis.com/posts/2023/10/31/1709730/kilang_lng_badak_1696166689_1698744414.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container pt-5">
        <div class="text-center">
            <h1 class="fs-5 fw-medium">RILIS BERITA</h1>
            <hr class="my-4">
        </div>

        <div class="d-flex justify-content-center gap-5">
            <!-- Card 1 -->
            <div class="card" style="width: 18rem;">
                <img src="https://images.bisnis.com/posts/2023/10/31/1709730/kilang_lng_badak_1696166689_1698744414.jpg" class="card-img-top" alt="Fissure in Sandstone">
                <div class="card-body text-center">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="pt-4">
                        <a href="#!" class="btn btn-primary w-100">Button</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card" style="width: 18rem;">
                <img src="https://images.bisnis.com/posts/2023/10/31/1709730/kilang_lng_badak_1696166689_1698744414.jpg" class="card-img-top" alt="Fissure in Sandstone">
                <div class="card-body text-center">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="pt-4">
                        <a href="#!" class="btn btn-primary w-100">Button</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="card" style="width: 18rem;">
                <img src="https://images.bisnis.com/posts/2023/10/31/1709730/kilang_lng_badak_1696166689_1698744414.jpg" class="card-img-top" alt="Fissure in Sandstone">
                <div class="card-body text-center">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="pt-4">
                        <a href="#!" class="btn btn-primary w-100">Button</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5 text-end text-primary">
            <a href="{{ url('/berita') }}" class="text-decoration-none">Lihat Lainnya  <i class="fa-solid fa-arrow-right ml-10"></i></a>
        </div>
    </div>
@endsection
