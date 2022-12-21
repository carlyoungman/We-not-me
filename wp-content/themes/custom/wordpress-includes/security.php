<?php
/*	---------------------------------------------
SECURITY
--------------------------------------------- */
    define('DISALLOW_FILE_EDIT', true);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_generator');

    function wpb_remove_version() {
      return '';
    }
    add_filter('the_generator', 'wpb_remove_version');



    function no_wordpress_errors() {
            return 'We have disabled Login Hints, This helps us keep unwanted visitors out, like you.';
        }
        add_filter('login_errors', 'no_wordpress_errors');

            function blockBadQueries()   {
                global $user_ID;
                if ($user_ID) {
                    if (!current_user_can('level_10')) {
                        if (strlen($_SERVER['REQUEST_URI']) > 255 ||
                            strpos($_SERVER['REQUEST_URI'], "eval(") ||
                            strpos($_SERVER['REQUEST_URI'], "CONCAT") ||
                            strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
                            strpos($_SERVER['REQUEST_URI'], "base64")) {
                            @header("HTTP/1.1 414 Request-URI Too Long");
                            @header("Status: 414 Request-URI Too Long");
                            @header("Connection: Close");
                            @exit;
                        }
                    }
                }
            }
        blockBadQueries();

        function remove_menus()  {
              remove_menu_page('edit-comments.php'); 
              if(!current_user_can('administrator') ) {
                    remove_menu_page( 'themes.php' );
                    remove_menu_page( 'plugins.php' );
                    remove_menu_page( 'tools.php' );
                    remove_menu_page( 'options-general.php' );
                  }
                }
        add_action('admin_menu', 'remove_menus');
  ?>
