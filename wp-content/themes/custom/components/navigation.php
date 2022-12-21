<?php if (! defined('ABSPATH')) : exit; endif; ?>
<ul class="navigation-overlay">
    <li class="menu-item" id="mobile-nav" data-link="show-main-menu">
        <button class="hamburger hamburger--slider" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
      </button>
    </li>
    <li class="menu-item icon icon-m" id="social" data-link="show-social-menu">
        <svg class="icon icon-black icon-m" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 163.24 162.8"><defs><style>.cls-1,.cls-2{fill:none;stroke:#000;stroke-width:8px;}.cls-1{stroke-linecap:round;}</style></defs><title>icon switch (1)</title><rect class="cls-1" x="11.43" y="10.55" width="141.63" height="141.63" rx="6.99"/><rect class="cls-1" x="68.03" y="52.97" width="28.35" height="35.38"/><rect class="cls-2" x="68.03" y="88.35" width="28.35" height="14.22"/><path class="cls-2" d="M25.51,81.32A4.79,4.79,0,1,1,30.3,86.1,4.78,4.78,0,0,1,25.51,81.32Z"/><path class="cls-2" d="M129.32,81.32a4.79,4.79,0,1,1,4.78,4.78A4.78,4.78,0,0,1,129.32,81.32Z"/></svg>
    </li>
    <!-- <li class="menu-item" id="vertical-nav">
        <div>
          <svg id="scroll-prev" class="icon icon-s"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow"></use></svg>
        </div>
        <div>
        <svg id="scroll-next" class="icon icon-s"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow"></use></svg>
      </div>
    </li> -->
        <!-- <li class="media-slider-arrows prev">
            <svg class="icon icon-white icon-s"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow"></use></svg>
        </li>
        <li class="media-slider-arrows next">
            <svg class="icon icon-white icon-s"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow"></use></svg>
        </li> -->
    <li class="menu-item" id="contact-nav" data-link="show-contact-menu">
        <svg class="icon icon-m"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-contact"></use></svg>
    </li>
    <li class="menu-item" id="video-nav" data-link="show-video-player">
        <svg  class="icon icon-logo icon-black"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-logo"></use></svg>
      <?php if ( is_front_page() ): ?>
              <svg  class="icon icon-pause icon-black icon-m"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-pause"></use></svg>
        <?php endif; ?>
    </li>
  </ul>
<nav class="main-menu full-screen-menus" id="header_nav">
    <?=wp_nav_menu( array('theme_location' => 'main_menu', 'container' => null) ) ?>
</nav>
