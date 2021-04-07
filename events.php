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

  <title>LRG | News</title>

</head>
<body>
  <h1 class="hidden">Announcements</h1>
  <main id="app">
    <header class="main-header">
      <h2 class="hidden">Header</h2>

      <?php include_once './includes/nav.php' ?>

      <div class="landing">

        <div class="landing-img junior"></div>

        <div class="landing-info">
          <h2>
            <span class="dark-text">up</span> &<br>
            <span class="big-text">coming</span>
          </h2>
          <p>Find out what's happening in the London Referee community. Everything to keep you up to date: Upcoming events, posts from the team, and new policies and procedures.</p>
        </div>

      </div>
    </header>

    <section class="brief-con">
      <div class="brief-info">
        <h2>covid information</h2>
        <p>This company policy includes the measures we are actively taking to mitigate the spread of coronavirus. You are kindly requested to follow all these rules diligently, to sustain a healthy and safe workplace in this unique environment. It’s important that we all respond responsibly and transparently to these health precautions. We assure you that we will always treat your private health and personal data with high confidentiality and sensitivity. <br>
        This coronavirus (COVID-19) company policy is susceptible to changes with the introduction of additional governmental guidelines. If so, we will update you as soon as possible by email.</p>
        <div class="includes">
          <span>Safety</span>
          <span>sanitization</span>
          <span>social distancing</span>
          <span>co-operation</span>
        </div>
      </div>
    </section>

    <section class="announcements-con">
      <h2>news</h2>
      <div v-for="item in announcements" class="announcement">
        <h3>{{item.title}}</h3>
        <p>{{item.body}}</p>
        <!-- Simple slice method to remove the time.  And leave only the date -->
        <span>{{ item.date.slice(0, 10) }}</span>
      </div>

    </section>

    <section class="gallery-con">
      <h2>Gallery</h2>
      <div class="main-gallery">
        <div v-for="(image,index) in images" @click="expandImg(image,index)" class="gallery-img">
        <!-- Images located in content folder when uploaded from admin dashboard -->
          <img :src="'./content/' + image.path" :alt="image.name">
          <div class="overlay">
            <p>{{image.caption}}</p>
          </div>
        </div>
      </div>
    </section>

    <section :currentImg="currentImg" class="lightbox" :class="{'show-lb' : showLightbox}">
      <div class="lb-content">
        <p class="prev" @click="prevImg"> < </p>
         <!-- Images located in content folder when uploaded from admin dashboard -->
        <img :src="'./content/' + currentImg.path" alt="">
        <p class="next" @click="nextImg"> > </p>
        <span class="close" @click="expandImg">+</span>
      </div>
    </section>

    <!--! Footer -->
    <?php include_once './includes/footer.php' ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="js/main.js" type="module"></script>
</body>
</html>