<?php if (! defined('ABSPATH')) : exit; endif; ?>

<section class="fullpage">
        <?php  if (have_rows('services_slider')) : ?>
            <?php while (have_rows('services_slider')) : the_row(); $id = strtolower(str_replace(" ", "-", get_sub_field('data_anchor') )) ?>
                <div class="section" data-anchor="<?= $id; ?>">
                    <div class="row justify-content-end">
                        <?php if (have_rows('left')) : ?>
                            <?php while (have_rows('left')) : the_row(); ?>
                                <?php  include(locate_template('components/service-slide.php')); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php if (have_rows('right')) : ?>
                        <?php while (have_rows('right')) : the_row(); ?>
                            <?php  include(locate_template('components/service-slide.php')); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
</section>
<?php  if (have_rows('services_slider')) : ?>
    <ul id="services-menu-icons">
        <?php while (have_rows('services_slider')) : the_row(); $icon = get_sub_field('data_anchor_icon'); if($icon): ?>
            <li>
                <img src="<?=$icon['url'];?>" alt="<?=$icon['title'] ?>"></img>
            </li>
        <?php endif; endwhile; ?>
    </ul>
<?php endif; ?>
<nav id="services-menu">
    <h6>Services</h6>
    <a class="menu-links clone" data-menuanchor="" href="#"></a>
</nav>
