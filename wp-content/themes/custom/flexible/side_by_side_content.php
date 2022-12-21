<?php if (! defined('ABSPATH')) : exit; endif; ?>
<?php $options = get_sub_field('options'); ?>
<section class="side-by-side-content">
  <div class="container-fluid max-width-container">
     <div class="row <?php if($options['alignment']): echo 'justify-content-end'; endif; ?>">
         <div class="col-lg-7">
             <div class="row">
               <div class="col-lg-6">
                   <?php if(get_sub_field('left')):
                           echo '<article>';
                             echo get_sub_field('left');
                           echo '</article>';
                         endif;
                     ?>
               </div>
               <div class="col-lg-6">
                 <?php if(get_sub_field('right')):
                         echo '<article>';
                           echo get_sub_field('right');
                         echo '</article>';
                       endif;
                   ?>
               </div>
             </div>
         </div>
     </div>
  </div>
</section>
