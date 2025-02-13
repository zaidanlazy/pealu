@extends('welcome')

@section('content')
        
        <style>
        .about-us-section {
            background-color: #ffc107;
            padding: 50px 20px;
            color: #000;
            text-align: center;
        }
        .about-us-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .about-us-section p {
            font-size: 1.25rem;
            margin-top: 10px;
        }
        .image-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .estimate-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #000;
            color: #ffc107;
            border-radius: 20px;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
        }
        .carousel-item img {
            height: 500px; /* Atur tinggi yang diinginkan */
            object-fit: cover; /* Pastikan gambar sesuai tanpa meregang */
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .carousel-caption h5 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .carousel-caption p {
            font-size: 1rem;
        }
        </style>


      <div class="container text-center">  
        <!-- About Us Section -->
        <section class="about-us-section position-relative text-center">
          <h1>About Us</h1>
          <p>
            anskdnasdnasldnasldnalsndlandlandlasndiow na mas;kd mas. walks dwas ,dwa
          </p>
          <div class="image-container mt-5 d-flex justify-content-center">
            <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D" alt="Team Photo" class="img-fluid rounded">
          </div>
        </section>

        <div class="bg-white p-6 rounded-lg shadow-md text-center">
          <div class="d-flex flex-column align-items-center">
            <h1 class="text-2xl font-bold mb-4">Furina de Fontaine</h1>
            <div class="d-flex justify-content-center align-items-center">
              <div>
                <p class="text-gray-700 mb-4">
                  Furina de Fontaine
                  <strong>
                    (Hanzi: 芷宁娜; Pinyin: Fúníngnà)
                  </strong>
                  adalah karakter dari Genshin Impact, sebuah game gacha aksi role-playing tahun 2020 yang dikembangkan oleh miHoYo. Pertama kali diperkenalkan di
                  <strong>Genshin Impact</strong> pada pembaruan Agustus 2023, dia berperan sebagai Hydro dalam game tersebut.
                </p>
              </div>
              <div class="ms-4">
                <img alt="Furina de Fontaine" class="rounded-full" height="200" src="https://64.media.tumblr.com/2ae350cdaae5971c2692faa684e063d5/369601d2bc83ae2b-06/s1280x1920/f4e72c67a9acc83f55f5c037fcc4b22b4c54336e.jpg" width="200" />
              </div>
            </div>
          </div>
        </div>

        <br>

        <!-- Our Culture Section -->
        <div class="container text-center">
          <div class="row justify-content-center align-items-center">
            <!-- Gambar -->
            <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center">
              <img src="https://i.scdn.co/image/ab67616d00001e02a035913a410e9d0e8ef32856" alt="Our Culture" class="img-fluid">
            </div>
            <!-- Teks -->
            <div class="col-lg-6 culture-text">
              <h2>Our Culture</h2>
              <p>
                At Designveloper, we believe that a successful product must help clients resolve their business problem, and furthermore, improve their business growth. Impactful products, satisfied customers, developmental businesses are our service roadmap.
              </p>
            </div>
          </div>
        </div>

        <!-- Bootstrap Carousel -->
        <div id="cultureCarousel" class="carousel slide text-center" data-bs-ride="carousel">
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <img src="https://wallpapercave.com/wp/wp11350303.jpg" class="d-block w-100" alt="Culture Slide 1">
              <div class="carousel-caption d-none d-md-block">
                <h5>Our Team</h5>
                <p>Teamwork and collaboration define us.</p>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
              <img src="https://i.kinja-img.com/image/upload/c_fit,q_60,w_645/2d6d39c728cb941588c4344b9379100a.jpg" class="d-block w-100" alt="Culture Slide 2">
              <div class="carousel-caption d-none d-md-block">
                <h5>Our Mission</h5>
                <p>Helping businesses grow with impactful solutions.</p>
              </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
              <img src="https://www.digitaltrends.com/wp-content/uploads/2022/06/xenoblade-chronicles-3-900x.900x.jpg?resize=1000%2C600&p=1" class="d-block w-100" alt="Culture Slide 3">
              <div class="carousel-caption d-none d-md-block">
                <h5>Our Values</h5>
                <p>Commitment to quality and customer satisfaction.</p>
              </div>
            </div>
          </div>
          <!-- Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#cultureCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#cultureCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <br>

        <h1 class="text-center">Our vision is to become the world’s leading software development company in realizing ideas.</h1>

        <br>
      </div>

          
          </div>
    
@endsection
