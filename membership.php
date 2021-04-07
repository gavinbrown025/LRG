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

  <title>LRG | Membership</title>

</head>
<body>

  <h1 class="hidden">Programs</h1>
  <main id="app">
    <header class="main-header">
      <h2 class="hidden">Header</h2>

      <?php include_once './includes/nav.php' ?>

      <div class="landing">

        <div class="landing-img adult"></div>

        <div class="landing-info">
          <h2>
            <span class="dark-text">Membership</span><br>
            <span class="big-text">Program</span>
          </h2>
          <p>If you are interested in becoming a hockey official, this is for you! It will provide all the information needed to get your officiating career started</p>
          <a class="cta-button" href="contact.php">Apply Now</a>
        </div>

      </div>
    </header>

    <section class="brief-con">
      <div class="brief-info">
        <h2>keeping our passion for the game</h2>
        <p>Officials perform a vital role in the game at all levels are the third team on the ice, without whom the game would not happen.<br>
        Referees do not want to stand out on the ice, they want to blend in, they are the third team on the ice. They are there to ensure the game is fair and safe. Above all people come to see the two teams play a game and not watch the referees.</p>
      </div>
    </section>

    <section class="angle-con">
      <div class="angle-info right">
        <h2>referees matter</h2>
        <p>Referees or officials in the two-person system are an essential element in organized hockey at all levels. Officials keep the game organized and fun, while providing players, parents and coaches clarification of the rules. <br>
        Referees or officials in the two-person system are an essential element in organized hockey at all levels. Officials keep the game organized and fun, while providing players, parents and coaches clarification of the rules.</p>
      </div>
      <div class="angle-img left sleeve">
        <img src="images/ref_sleeve.png" alt="">
      </div>
    </section>

    <section class="quote-con">
      <div class="quote">
      </div>
    </section>

    <section class="angle-con">
      <div class="angle-info left">
        <h2>our members are key</h2>
        <p>We strive to develop and deliver hockey resources that assist team, league and tournament organiz-ers across Canada and around the world.</p>
      </div>

      <div class="angle-img right">
        <img src="images/mikeLeggo.png" alt="">
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