
</main>
<?php if(get_field('footer')): ?>
<span class="back-to-top">
  <svg class="icon icon-white icon-s"><use xlink:href="#icon-up-arrow"></use></svg>
</span>
<footer>
    <?php $locations = get_field('locations', 'options')  ?>
    <div class="container-fluid max-width-container">
        <!-- <div class="row">
            <div class="col-lg-8">
                <article>
                    <?= get_field('footer_content', 'options'); ?>
                </article>
            </div>
        </div> -->
        <div class="row">
            <!-- <div class="col-lg-3 col-sm-6">
                <h6>Manchester</h6>
                <address>
                    <?= $locations['address_manchester']?>
                    <a class="email p" href="mailto:<?= $locations['email_manchester']?>"><?= $locations['email_manchester']?></a>
                    <a class="phone p" href="tel:<?= $locations['phone_number_manchester']?>"><?= $locations['phone_number_manchester']?></a>
                </address>

            </div>
            <div class="col-lg-3 col-sm-6">
                <h6>Amsterdam</h6>
                <address>
                    <?= $locations['address_amsterdam'];?><br>
                    <a class="email p" href="mailto:<?= $locations['email_amsterdam'];?>"><?= $locations['email_amsterdam'];?></a>
                    <a class="phone p" href="tel:<?= $locations['phone_number_amsterdam']?>"><?= $locations['phone_number_amsterdam'];?></a>
                </address>
            </div> -->
            <div class="col-lg-3 col-sm-6">
                <p class="copy"> &copy; <?php echo date("Y"); ?> We Not Me</p>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="landing-page-switch">
                    <p>Landing Page</p>
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>

            </div>

            <div class="col-lg-3">
        <?php
           $twitter = get_field('twitter', 'option');
           $facebook = get_field('facebook', 'option');
           $linkedin = get_field('linkedin', 'option');
           $instagram = get_field('instagram', 'option');
           $dot = get_field('dot', 'option');
           $medium = get_field('medium', 'option');
        ?>
       <ul class="social-icons inline-list">
       <?php if($twitter): ?>
         <li id="twitter">
           <a target="_blank" href="<?=$twitter ?>">
             <svg class="icon icon-gray icon-s"><use xlink:href="#icon-twitter"></use></svg>
           </a>
         </li>
       <?php endif; ?>
       <?php if($facebook): ?>
         <li id="twitter">
           <a target="_blank" href="<?=$facebook ?>">
             <svg class="icon icon-gray icon-s"><use xlink:href="#icon-facebook"></use></svg>
           </a>
         </li>
       <?php endif; ?>
       <?php if($linkedin): ?>
         <li id="twitter">
           <a target="_blank" href="<?=$linkedin ?>">
             <svg class="icon icon-gray icon-s"><use xlink:href="#icon-linkedin"></use></svg>
           </a>
         </li>
       <?php endif; ?>
       <?php if($instagram): ?>
         <li id="twitter">
           <a target="_blank" href="<?=$instagram ?>">
             <svg class="icon icon-gray icon-s"><use xlink:href="#icon-instagram"></use></svg>
           </a>
         </li>
       <?php endif; ?>
       <?php if($dot): ?>
         <li id="dot">
           <a target="_blank" href="<?=$dot ?>">
             <svg class="icon icon-gray icon-s"><use xlink:href="#icon-dot"></use></svg>
           </a>
         </li>
       <?php endif; ?>
       <?php if( $medium): ?>
         <li id="medium">
           <a target="_blank" href="<?=$instagram ?>">
             <svg class="icon icon-gray icon-s"><use xlink:href="#icon-medium"></use></svg>
           </a>
         </li>
       <?php endif; ?>
       </ul>
    </div>
    <div class="col-lg-3">
        <div class="legal">
            <nav  id="footer_nav">
                <?=wp_nav_menu( array('theme_location' => 'footer', 'container' => null) ) ?>
            </nav>
        </div>

    </div>
        </div>

    </div>
</footer>
<?php endif; ?>
  <?php wp_footer(); ?>
</body>
</html>
