<?php
require_once './load.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">

  <title>LRG | About</title>

</head>
<body>
  <main id="app">
    <header class="main-header">
      <?php include_once './includes/nav.php' ?>

      <div class="landing">

      <div class="landing-img about"></div>

        <div class="landing-info">
          <h2>
            <span class="dark-text">the</span><br>
            <span class="big-text">referee</span>
          </h2>
          <p>A referee is responsible for the general supervision of the game and can be identified by the red or orange armbands. Under most officiating systems, the referee is the only official with the authority to assess penalties for violations of the rules.</p>
        </div>

      </div>
    </header>

    <section class="brief-con">
      <div class="brief-info">
        <h2>History Of LRG</h2>
        <p>London referee Group was found in 1887 before hockey was even invented to make sure that when it was invented it would be fair and safe for the players. We continue that tradition to this day. Ontario is full of hoodlems and roughieans and we need then to stay in line so our refs need to be tough. we make sure they are stong enough to beat up any player that gets out of line.</p>
        <div class="includes">
          <span>Integrity</span>
          <span>Sportsmanship</span>
          <span>Fairness</span>
          <span>Respect</span>
        </div>
      </div>
    </section>

    <section class="angle-con">
      <div class="angle-info right">
        <h2>what referees do</h2>
        <p>A referee is responsible for the general supervision of the game and can be identified by the red or orange armbands. Under most officiating systems, the referee is the only official with the authority to assess penalties for violations of the rules.</p>
      </div>
      <div class="angle-img left sleeve">
        <img src="images/ref_call.png" alt="">
      </div>
    </section>

    <section class="quote-con">
      <div class="quote">
        <p>"The goal of the Referee is to not be mentioned. <br>
          If you can achieve this, it's been a great game"</p>
      </div>
    </section>

    <section class="angle-con">
      <div class="angle-info left">
        <h2>safe play & fairness</h2>
        <p>Referees do not want to stand out on the ice, they want to blend in, they are the third team on the ice. They are there to ensure the game is fair and safe. Above all people come to see the two teams play a game and not watch the referees.</p>
      </div>

      <div class="angle-img right">
        <img src="images/faceoff.png" alt="">
      </div>
    </section>

    <!--! Footer -->
    <?php include_once './includes/footer.php' ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js"></script>
  <script src="js/main.js" type="module"></script>
</body>
</html>