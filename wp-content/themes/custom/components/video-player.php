<?php if (! defined('ABSPATH')) : exit; endif; ?>

<?php $videos =  get_field('home_page_videos', 'option');
if($videos): ?>
    <section class="video-player full-screen-menus">
        <ul class="media-slider">
            <?php foreach ($videos as $video): ?>
                <li class="item video">
                <?php echo '<video class="slide-video slide-media" preload="none" defaultmuted muted loop width="100%" height="auto" type="" poster="'. $video['sizes']['large'] .'" src="' . $video['url'] . '"></video>' ?>
                 </li>
            <?php endforeach; ?>
          </ul>
    </section>
<?php endif; ?>
