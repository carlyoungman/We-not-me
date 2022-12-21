<?php if (! defined('ABSPATH')) : exit; endif; ?>
<?php  $logos =  get_field('client_logos', 'options'); ?>
<section class="partner-logos">
  <div class="container-fluid max-width-container">
      <div class="row">
          <div class="col-lg">
              <h1 class="h2">Our Diverse Experience</h1>
          </div>
      </div>
      <div class="row">
             <?php foreach ($logos as $logo): ?>
                 <div class="col-lg-3 col-md-6">
                     <img src="<?=$logo['sizes']['medium'];?>" alt="<?=$logo['title'] ?>"></img>
                </div>
            <?php endforeach; ?>
      </div>
  </div>
</section>
