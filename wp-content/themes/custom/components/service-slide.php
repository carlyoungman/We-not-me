<?php if (! defined('ABSPATH')) : exit; endif;?>
<?php if (get_row_layout() == 'content') :  $options = get_sub_field('options'); $link = get_sub_field('link'); $content = get_sub_field('content');?>
    <div class="col-lg-6 content" data-anchor="<?= $id; ?>">
        <div class="inner content" style="background-color:<?= $options['background'];?>; color:<?= $options['text']; ?>;">
            <article>
                <?= $content  ?>
                <?php if($link ):?>
                     <a class="button" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                <?php endif; ?>
            </article>
        </div>
    </div>
<?php elseif (get_row_layout() == 'image') : $options = get_sub_field('options'); $image = get_sub_field('image'); ?>
    <div class="col-lg-6 image" data-anchor="<?= $id; ?>">
        <div class="inner image" style="background-color:<?= $options['background'];?>">
            <img alt="<?= $image['alt'] ?>" src="<?= $image['sizes']['large'] ?>"></img>
        </div>
    </div>
<?php elseif (get_row_layout() == 'background_image') : $background = get_sub_field('background_image') ?>
    <div class="col-lg-6 background" data-anchor="<?= $id; ?>">
        <div class="inner background" style="background-image:url(<?= $background['sizes']['large']  ?>)"></div>
    </div>
<?php endif; ?>
