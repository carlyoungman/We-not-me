<?php
$theme_url = get_template_directory();
require_once($theme_url . '/wordpress-includes/flexible.php');
//require_once($theme_url . '/wordpress-includes/post-types.php');
//require_once($theme_url . '/wordpress-includes/taxonomy.php');
require_once($theme_url . '/wordpress-includes/script.php');
require_once($theme_url . '/wordpress-includes/security.php');
require_once($theme_url . '/wordpress-includes/theme-options.php');
require_once($theme_url . '/wordpress-includes/twitter-api.php');
require_once($theme_url . '/flexible/hero.php');
require_once($theme_url . '/wordpress-includes/google-maps.php');

function the_latest_tweets() {


function get_twitter_id_from_url($URL){
  if (preg_match("/^https?:\/\/(www\.)?twitter\.com\/(#!\/)?(?<name>[^\/]+)(\/\w+)*$/", $URL, $regs)) {
    	 return $regs['name'];
     }
   return false;
  }


 $settings = array(
     'oauth_access_token'          => '326220471-9gAiaOzFCRw7Rnx7YAWWHFTEcejMi85epg6Igugp',
     'oauth_access_token_secret'   => '7cXWdMQol8h7CwERSdLHd0on0bpzz5UmmCKLDd9ljyU',
     'consumer_key'                => 'DkjNhapXf7XctL9lVy9VnQ',
     'consumer_secret'             => 'Yz54D4rxNs4T2aWT9VKU8vIjeZj0ihJBZQ7Ci2K0'
  );


 $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
 $twitterURL = 'https://twitter.com/ManCity';



  if($twitterURL):
    $screen_name = get_twitter_id_from_url($twitterURL);

    $getfield = "?screen_name=$screen_name&count=10";
    $requestMethod = 'GET';

    $twitter = new TwitterAPIExchange($settings);

    $tweet = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

    $latest_tweets = json_decode($tweet);

    foreach($latest_tweets as $tweet){

    $find_url = strpos($tweet->text, 'http');
      $url = substr($tweet->text, $find_url);
      $data = array(
          'user_name'     => $tweet->user->name,
          'screen_name'   => $tweet->user->screen_name,
          'profile_image' => $tweet->user->profile_image_url,
          'text'          => str_replace($url, '', $tweet->text),
          'tweet_url'     => 'https://twitter.com/'.$screen_name.'/status/'.$tweet->id,
          'url'           => $url,
          'date'          => date( "jS F Y", strtotime($tweet->created_at))
        );
      $tweets[] = $data;
    }

    return $tweets;
  endif;
}
