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

  <title>LRG | Programs</title>

</head>
<body>

  <h1 class="hidden">Programs</h1>
  <main id="app">
    <header class="main-header">
      <h2 class="hidden">Header</h2>

      <?php include_once './includes/nav.php' ?>

      <div class="landing">

        <div class="landing-img junior"></div>

        <div class="landing-info">
          <h2>
            <span class="dark-text">Junior</span> Mentorship<br>
            <span class="big-text">Program</span>
          </h2>
          <p>If you are interested in becoming a hockey official, this is for you! It will provide all the information needed to get your officiating career started</p>
          <a class="cta-button" href="contact.php">Apply Now</a>
        </div>

      </div>
    </header>

    <section class="brief-con">
      <div class="brief-info">
        <h2>Add Your Passion to the Stripes</h2>
        <p>Officials perform a vital role in the game at all levels are the third team on the ice, without whom the game would not happen. The level system, Level I through Level VI, is the foundation for the training and development of officials across Canada, broken down into four basic streams, each with different priorities. They include:</p>
        <div class="includes">
          <span>Initiation</span>
          <span>Recreational</span>
          <span>Competitive</span>
          <span>Program of Excelence</span>
        </div>
      </div>
    </section>

    <section class="angle-con">
      <div class="angle-info right">
        <h2>safe play starts here</h2>
        <h3>LEVEL I</h3>
        <p>To prepare a young or new official to officiate minor hockey.</p>
        <h3>LEVEL II</h3>
        <p>To further enhance the training and skills of minor hockey officials.</p>
        <h3>LEVEL III</h3>
        <p>To prepare officials capable of refereeing minor hockey playoffs (league and regional) and women’s national championships, or being a linesperson in Junior B, Junior C, Junior D, Senior and U15 or U18 regional championships.</p>
      </div>
      <div class="angle-img left">
        <img src="images/timbits_girl.png" alt="">
      </div>
    </section>

    <section class="quote-con">
      <div class="quote">
      </div>
    </section>

    <section class="angle-con">
      <div class="angle-info left">
        <h2>gaining leadership</h2>
        <h3>LEVEL IV</h3>
        <p>To prepare officials capable of refereeing Senior, Junior A, Junior B, Junior C, Junior D, minor hockey regional and national championships, women’s national championships and designated IIHF competitions.</p>
        <h3>LEVEL V</h3>
        <p>To prepare officials to referee Major Junior, Junior A, Senior, U SPORTS and regional playoffs.</p>
        <h3>LEVEL VI</h3>
        <p>To prepare officials capable of refereeing at national championships and designated IIHF competitions (i.e. Memorial Cup, Centennial Cup, Allan Cup, David Johnston University Cup, IIHF world championships, Olympic Winter Games, FISU Games).</p>
      </div>

      <div class="angle-img right">
        <img src="images/timbits_boy.png" alt="">
      </div>
    </section>


    <section class="quote-con">
      <p></p>
    </section>


    <section class="angle-con">
      <div class="angle-info right">
        <h2>Steps to Certification</h2>

        <p>Certification at all levels, except Level I, is a two-part process involving clinical and practical assessment. The official must attend all clinic sessions and obtain the minimum mark on the examination.</p>
        <p>The practical assessment portion is the most difficult to apply consistently across the entire program. It is strongly recommended that all supervisors be provided with a copy of the Hockey Canada Officiating Procedures Manual to ensure a consistent approach to this task.</p>
        <p>Certification is not complete until both phases – clinical and practical – have been completed.</p>

        <a class="cta-button" href="">Learn More</a>
      </div>
      <div class="angle-img left">
        <img src="images/femaleRef.png" alt="">
      </div>
    </section>

    <section class="quote-con">
      <p></p>
    </section>

    <section class="angle-con">
      <div class="angle-info left">
        <h2>General Certification Rules</h2>
        <p>Certification at any level with the Hockey Canada Officiating Program does not make an official automatically eligible for entry to the next level (except Level I). Demonstration of ability or potential ability is necessary to move to the next level.</p>
        <p>Being certified at any one level does not necessarily mean an official will be able to officiate all categories of hockey defined at that level. Conversely, an official does not have to officiate all categories of hockey at a certain level in order to gain certification at that level.</p>
        <p>Where it has been determined (through supervision) that an official is no longer able to officiate at a certain level, they will be certified at a new, lower level in line with their present ability.</p>
        <p>An individual must be at least 16 years old to be certified at Level II or higher.</p>
        <a class="cta-button" href="">Learn More</a>
      </div>
      <div class="angle-img right">
        <img src="images/jrRef.png" alt="">
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