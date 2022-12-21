<?php if (! defined('ABSPATH')) : exit; endif; ?>
<section class="social-media">
    <div class="pannel">
        <ul class="tabs">
          <li class="twitter active">
            <span>Twiiter</span>
          </li>
          <li class="instagram">
            <span>Instagram</span>
          </li>
        </ul>
        <ul class="feeds">
          <li class="active" id="twitterfeed">
            <?= do_shortcode('[custom-twitter-feeds]'); ?>
          </li>
          <li id="instafeed">
            <?= do_shortcode('[instagram-feed]'); ?>
          </li>
        </ul>
    </div>
    <span class="icon-button icon-m background-white">
      <svg class="icon icon-black icon-l"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-close"></use></svg>
    </span>
</section>
