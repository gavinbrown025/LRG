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

  <title>LRG | Contact</title>

</head>
<body>
  <main id="app">
    <header class="main-header">
      <h2 class="hidden">Header</h2>

      <?php include_once './includes/nav.php' ?>

      <div class="landing">

        <div class="landing-img contact"></div>

        <div class="landing-info">
          <h2>
            <span class="dark-text">contact</span><br>
            <span class="big-text">us</span>
          </h2>
          <p>If you are interested in becoming a hockey official, enter the required information and send to get your officiating career started</p>
        </div>

      </div>
    </header>

    <section class="contact-con">

        <form class="contact" method="post" action="admin/contact/contact.php">

        <!-- +++++ STATUS MESSAGE IF EXISTS +++++ -->
        <?php echo array_key_exists("msg", $_GET) ? "<h2 class='error'>{$_GET['msg']}</h2><br><br>" : ''?>
        <!-- +++++ END OF STATUS MESSAGE +++++ -->

            <div class="input-con">
              <label for="subject">Subject</label>
              <select ref="subject" @change="formType" v-model="currentForm.type" @click="showSubjects(showTheSubjects)" name="subject" id="subject">
                <option value="generalform" selected>General Inquiry</option>
                <option value="juniorform">Junior Mentorship</option>
                <option value="memberform">Membership Application</option>
              </select>
              <div class="arrow" :class="{'flip' : showTheSubjects}"></div>
            </div>

            <component class="main-form" :is="currentFormComponent" @inputchanged="inputFill"></component>

            <p :class="{ error : formStatus.error }">{{formStatus.message}}</p>

        </form>
    </section>

    <!--! Footer -->
    <?php include_once './includes/footer.php' ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="js/main.js" type="module"></script>
</body>
</html>