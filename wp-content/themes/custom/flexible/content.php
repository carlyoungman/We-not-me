<?php if (! defined('ABSPATH')) : exit; endif;
 $content = get_sub_field('content');
  ?>
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg">
            <article>
                <?= $content ?>
            </article>
        </div>
      </div>
    </div>
  </section>
