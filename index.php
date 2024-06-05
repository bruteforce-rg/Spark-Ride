<?php
require('nav.html');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="Assets/bootstrap.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <style>
    .bg1 {
      background-image: url(pexels-adonyi-foto-1414650.jpg);
    }

    .bg2 {
      background-image: url(pexels-pixabay-265216.jpg);
    }

    .bg3 {
      background-image: url(pexels-sergei-a-1322276-2589457.jpg);
    }

    .carousel-image {
      height: 70vh;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .banner {
      height: 80vh;
      /* background-image: url(Assets/banner.png); */
      background-size: cover;
      background-position: bottom;
    }

    .main_content {
      max-width: 100vw !important;
      text-align: center;
      padding-top: 80px;
      padding-bottom: 90px;
    }

    .heading h2 {
      color: #004274;
      font-size: 38px;
      display: block;
      font-weight: 500;
      line-height: 1.2;
      margin-bottom: 12px;
      position: relative;
    }

    .heading p {
      color: #656565;
      font-size: 18px;
      font-weight: 300;
      line-height: 1.5;
      padding: 0 50px;
    }

    .pngdiv {
      height: 80vh;
      max-width: 100vw;
      display: flex;
      padding-left: 8vw;
      padding-right: 8vw;
    }

    .about__pic {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    @media screen and (max-width: 660px) {
      .pngdiv {
        flex-wrap: wrap;
        justify-content: center;
      }
    }

    .about__text {
      background-color: #004274;
      width: 60%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-top: auto;
      margin-bottom: auto;
      gap: 10px;
      padding: 30px;
      border-radius: 13px;
    }
    .btn1 {
      background: #00AEFF;
      padding: 10px 30px;
      border: 0;
      color: #fff;
      cursor: pointer;
      font-size: 18px;
      text-transform: capitalize;
      font-weight: 400;
      border-radius: 30px;
      font-weight: bold;
    }           
  </style>
</head>

<body>
    
  <div class="banner">

  </div>

  <section class="main_content">


    <div class="heading">
      <h2>Fasal-Bazar</h2>
      <p style="font-family: 'Poppins', SANS-SERIF;">A digital marketplace where fair good trade is made easy and
        transparent</p>
    </div>

    <div class="pngdiv">
      <div class="about__pic">
        <img src="Assets/man.png" alt="img" style="width: 40vw;">
      </div>
      <div class="about__text">
        <div class="section-title">
          <h2 style="color: #989898;">Better life for everyone</h2>
        </div>
        <p style="font-style: italic;
          font-weight: 600;
          font-family: cursive;
          color: #ffffff">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum dolorem est accusamus
          dolorum tempore quos expedita autem consequuntur? Odio aliquam optio repudiandae eligendi eum harum iusto at
          assumenda adipisci cum beatae quas officia laborum facilis, voluptates, soluta atque obcaecati ea vitae facere
          voluptas quis! Unde non et facilis ipsa amet?</p>
        <a href="#" class="btn1">Learn more</a>
      </div>
    </div>

  </section>


  <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="height: 70vh;">
    <div class="carousel-inner h-100">
      <div class="carousel-item active carousel-image bg1">
      </div>
      <div class="carousel-item carousel-image bg2">
      </div>
      <div class="carousel-item carousel-image bg3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> -->

  <script src="Assets/bootstrap_js.js"></script>
</body>

</html>