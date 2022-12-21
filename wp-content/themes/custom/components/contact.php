<?php if (! defined('ABSPATH')) : exit; endif; ?>
<?php $content = get_field('content', 'options'); $locations = get_field('locations', 'options') ?>
<section class="contact full-screen-menus">
    <div class="container-fluid max-width-container">
        <div class="row">
            <div class="col-lg-6">
                <article>
                    <?= $content ?>
                </article>
                <div class="row" id="locations">
                    <div class="col-lg-6">
                        <h5>Manchester</h5>
                        <address>
                            <?= $locations['address_manchester']?>
                        </address>
                        <a class="email p" href="mailto:<?= $locations['email_manchester']?>"><?= $locations['email_manchester']?></a>
                        <a class="phone p" href="tel:<?= $locations['phone_number_manchester']?>"><?= $locations['phone_number_manchester']?></a>
                    </div>
                    <div class="col-lg-6">
                        <h5>Amsterdam</h5>
                        <address>
                            <?= $locations['address_amsterdam'];?>
                        </address>
                        <a class="email p" href="mailto:<?= $locations['email_amsterdam'];?>"><?= $locations['email_amsterdam'];?></a>
                        <a class="phone p" href="tel:<?= $locations['phone_number_amsterdam']?>"><?= $locations['phone_number_amsterdam'];?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="maps-tabs">
                    <li class="active" id="manchester">Manchester</li>
                    <li id="amsterdam">Amasterdam</li>
                </ul>
                    <ul class="maps">
                        <li class="active" id="manchester">
                            <?php $manchester_map = $locations['map_manchester'];
                            echo '<div class="map">';
                                echo '<span data-lat="' . $manchester_map['lat'] . '" data-lng="' . $manchester_map['lng'] . '" class="icon marker"></span>';
                            echo '</div>';
                        ?>
                        </li>
                        <li id="amsterdam">
                            <?php $amsterdam_map = $locations['map_amsterdam'];
                            echo '<div class="map">';
                                echo '<span data-lat="' . $amsterdam_map['lat'] . '" data-lng="' . $amsterdam_map['lng'] . '" class="icon marker"></span>';
                            echo '</div>';
                            ?>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</section>
