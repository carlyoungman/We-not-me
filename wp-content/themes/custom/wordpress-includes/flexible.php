<?php
function get_flexible_content() {
  if (have_rows('page_components')) :
        while (have_rows('page_components')) : the_row();
        if (get_row_layout() == 'headline_with_image') :
            include(locate_template('flexible/headline-with-image.php'));
        elseif (get_row_layout() == 'content_component') :
            include(locate_template('flexible/content.php'));
        elseif (get_row_layout() == 'side_by_side_content') :
            include(locate_template('flexible/side_by_side_content.php'));
        elseif (get_row_layout() == 'hero_component') :
              include(locate_template('flexible/hero_select.php'));
        elseif (get_row_layout() == 'partner_logos') :
            include(locate_template('flexible/partner_logos.php'));
        elseif (get_row_layout() == 'journal_entries') :
            include(locate_template('flexible/journal_entries.php'));
        elseif (get_row_layout() == 'content_image_and_coloured_background') :
            include(locate_template('flexible/content_image_and_coloured_background.php'));
        elseif (get_row_layout() == 'people') :
            include(locate_template('flexible/people.php'));
        elseif (get_row_layout() == 'services_slider') :
            include(locate_template('flexible/services_slider.php'));
        elseif (get_row_layout() == 'services') :
            include(locate_template('flexible/services.php'));
        elseif (get_row_layout() == 'sharing_icons') :
            include(locate_template('flexible/sharing-icons.php'));    
      endif;
  endwhile;
endif;
}
