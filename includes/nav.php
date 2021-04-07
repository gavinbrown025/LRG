
<nav id="main-nav">
  <div class="logo">
    <a href="<?php echo ROOT_PATH .'/index.php'?>">
      <img src="<?php echo ROOT_PATH .'/images/lrgLogo.png'?>" alt="">
    </a>
  </div>
  <ul :class="{'showNav' : showTheNav}">
    <li>
      <a href="<?php echo ROOT_PATH .'/index.php'?>">Home</a>
    </li>
    <li>
      <a href="<?php echo ROOT_PATH .'/about.php'?>">About</a>
    </li>

    <li class="dropdown">
      <div @click.prevent="dropdownToggle" class="drop-toggle" :class="{'line' : showDropdown}">
          <a href="">Programs</a>
          <div class="arrow" :class="{'flip' : showDropdown}"></div>
      </div>
      <div class="sub-menu" :class="{'showFlex' : showDropdown}">
        <a href="<?php echo ROOT_PATH .'/junior.php'?>">Junior</a>
        <a href="<?php echo ROOT_PATH .'/membership.php'?>">Membership</a>
      </div>
    </li>

    <li>
      <a href="<?php echo ROOT_PATH .'/events.php'?>">News</a>
    </li>
    <li>
      <a href="<?php echo ROOT_PATH .'/contact.php'?>">Contact</a>
    </li>
    <li class="btn-con">
      <a class="cta-button" href="<?php echo ROOT_PATH .'/contact.php'?>">Apply Now</a>
    </li>
  </ul>

  <div @click="showNav" class="nav-btn" :class="{'showNav' : showTheNav}">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>

</nav>
