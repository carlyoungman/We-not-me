<?php
function video(){
  $video = get_sub_field('video')['video'][0]; $content = get_sub_field('video')['content'];  $options = get_sub_field('options'); ?>
  <section class="hero hero-video <?php if($options['height']): echo 'half-height'; endif ?> <?php if($options['align']): echo 'align-center'; endif ?> <?php if($options['text']): echo 'text-white'; endif ?>">
    <div class="container-fluid max-width-container">
      <div class="row">
        <div class="col-lg-6">
            <article>
                <?= $content  ?>
            </article>
        </div>
      </div>
    </div>
     <div class="cover"></div>
      <video class="background-video media" defaultmuted="" muted="" loop="" autoplay="" playsinline="" webkit-playsinline="" width="100%" height="auto" type="<?= $video['mime_type'] ?>" poster="<?= $video['icon'] ?>" src="<?= $video['url'] ?>"></video>
  </section>
<?php }
function image(){
  $image = get_sub_field('image')['image']; $content = get_sub_field('image')['content']; $options = get_sub_field('options');  ?>
  <section class="hero hero-image <?php if($options['height']): echo 'half-height'; endif ?> <?php if($options['align']): echo 'align-center'; endif ?> <?php if($options['text']): echo 'text-white'; endif ?>">
    <div class="container-fluid max-width-container">
      <div class="row">
        <div class="col-lg-6">
            <article>
                <?= $content  ?>
            </article>
        </div>
      </div>
    </div>
     <div class="cover"></div>
        <img class="background-image media" src="<?= $image['sizes']['large'] ?>"></img>
  </section>
<?php }
