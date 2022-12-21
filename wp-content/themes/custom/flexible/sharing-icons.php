<?php if (! defined('ABSPATH')) : exit; endif; ?>
<?php $tags = get_tags(); ?>
<section class="sharing-icons">
  <div class="container-fluid max-width-container">
      <div class="row">
          <div class="col-lg">
            <article>
              <h4>Share</h4>
              <ul class="social-sharing">
          	   <li>
          		   <p class="h5" data-sharer="twitter" data-title="<?php the_title() ?>" data-hashtags="<?php foreach ( $tags as $tag ): echo '#'.$tag->name . ' '; endforeach; ?>" data-url="<?php the_permalink(); ?>">
          			   Twitter
          		   </p>
          	   </li>
          	   <li>
          		   <p class="h5" data-sharer="linkedin" data-url="<?php the_permalink(); ?>">
          			   LinkedIn
          		   </p>
          	   </li>
          	</ul>
            </article>
          </div>
      </div>
  </div>
</section>
