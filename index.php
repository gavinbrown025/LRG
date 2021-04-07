<?php
require_once './load.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>London Referee Group</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <main id="app">
    <header class="main-header home">
      <h2 class="hidden">Header</h2>

      <?php include_once './includes/nav.php' ?>

      <div class="landing">

        <div class="scene">
          <div class="character">
            <img class="charBG" src="images/hero/imgBG.jpg" alt="background">
          </div>

          <div class="character" data-depth="0.1">
            <img class="char1" src="images/hero/whiteJersey18.png" alt="player">
          </div>

          <div class="character" data-depth="0.08">
            <img class="char2" src="images/hero/whiteJersey16.png" alt="player">
          </div>

          <div class="character" data-depth="0.02">
            <img class="char4" src="images/hero/ref.png" alt="ref">
          </div>

          <div class="character" data-depth="0.18">
            <img class="char3" src="images/hero/blueJersey26.png" alt="player">
          </div>
        </div>

        <div class="landing-info">
          <h2>
            <span class="dark-text">join</span> the<br>
            <span class="big-text">stripes</span>
          </h2>
          <p>We provide Referee services for leagues all over Ontario! Young and Old, we provide training camps for aspiring Refs. Easily sign up to become part of the London Referees Group</p>
        </div>

      </div>
    </header>

    <section class="brief-con">
      <div class="brief-info">

        <h2>London Referee Group</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi nisi voluptatibus, ipsa obcaecati ipsum atque incidunt repellendus eum cum quas esse! Vitae, enim reprehenderit? Et, nulla molestias quos porro soluta provident facere corporis velit assumenda sapiente! Illum provident similique recusandae cumque voluptas culpa ipsa consectetur? Deleniti earum veniam a consectetur.</p>
        <a class="cta-button" href="about.php">Learn More</a>
    </div>
    </section>

    <section class="angle-con">
      <div class="angle-info right">
        <h2>First Time Referee?</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque deserunt exercitationem in minus aut, iusto accusamus voluptatem et cupiditate eveniet!</p>
        <a class="cta-button" href="junior.php">Learn More</a>
      </div>
      <div class="angle-img left">
        <img src="images/young_ref.png" alt="">
      </div>
    </section>

    <section class="quote-con">
      <div class="quote">
        <p>"The goal of the Referee is to not be mentioned.<br>
        If you can achieve this, it's been a great game"</p>
      </div>
    </section>

    <section class="angle-con">
      <div class="angle-info left">
        <h2>experienced Referee?</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque deserunt exercitationem in minus aut, iusto accusamus voluptatem et cupiditate eveniet!</p>
        <a class="cta-button" href="membership.php">Learn More</a>
      </div>
      <div class="angle-img right">
        <img src="images/refskating.png" alt="">
      </div>
    </section>

    <section class="partner-con">
      <div class="partner-info">
        <h2>partners</h2>
      </div>

  <!-- Make Vue or PHP Render List -->
      <div class="partner-img-con">
        <a href="https://www.hockeycanada.ca/en-ca/home">
          <img src="images/Hockey_Canada.png" alt="">
        </a>
        <a href="https://www.ohf.on.ca ">
          <img src="images/ohf.png" alt="">
        </a>
        <a href="https://alliancehockey.com/">
          <img src="images/HAlliance.png" alt="">
        </a>
        <a href="https://www.owha.on.ca">
          <img src="images/OWHA.png" alt="">
        </a>
        <a href="https://www.omha.net">
          <img src="images/logo_smallOHMA.png" alt="">
        </a>
        <a href="http://www.ohahockey.ca/">
          <img src="images/OHA.png" alt="">
        </a>
        <a href="https://sportabilitybc.ca">
          <img src="images/SportAbility.png" alt="">
        </a>
      </div>
    </section>


    <!--! Footer -->
    <?php include_once './includes/footer.php' ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js"></script>
  <script src="js/main.js" type="module"></script>
</body>
</html>