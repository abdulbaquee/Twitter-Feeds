# Custom twitter feed from a twitter handle for website or Facebook tab
===============
If you are using Facebook for marketing and engaging your prospective and current clients it makes sense to introduce your FB fans to what may be happening on our Twitter profile. It allows our FB fans to see what other different types of conversations your business/brand is having on Twitter without them having to visit Twitter itself. They can retweet, follow you, and even favourite your tweets, right from the comfort of Facebook page itself.

Plugin: Jquery progress indicator on page scroll
Version: 1.1.0
Author: [Abdul Baquee](http://www.socialscript.in/)  
Twitter: [@abdulbaquee85](http://www.twitter.com/abdulbaquee85)

Demo Link
===============
Demo: [Custom twitter feed Demo](http://www.socialscript.in/twitter-feed/)

Tutorial Link
===============
Tutorial: [All Social Script Custom twitter feed tutorial](http://www.socialscript.in/jquery-progress-indicator-on-page-scroll/)

Usage
===============
This application requires rest api 1.1.

```<?php
require_once('twitteroauth/twitteroauth.php');
define('CONSUMER_KEY', 'Your consumer key');
define('CONSUMER_SECRET', 'Your consumer secret');
define('OAUTH_TOKEN', 'Your oauth token');
define('OAUTH_TOKEN_SECRET', 'Your oauth token secret');
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET);
$options = array(
    'screen_name' => 'iciciprumf',
    'count'=>100
);
$usertimeline = $connection->get('statuses/user_timeline', $options);
```

Additional codes
===============
Convert urls to ```html <a>``` links

```<?php
function linkify_tweet($tweet) {
    //Convert urls to <a> links
    $tweet = preg_replace("/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<a target=\"_blank\" href=\"$1\">$1</a>", $tweet);
    //Convert hashtags to twitter searches in <a> links
    $tweet = preg_replace("/#([A-Za-z0-9\/\.]*)/", "<a target=\"_new\" href=\"http://twitter.com/search?q=$1\">#$1</a>", $tweet);
    //Convert attags to twitter profiles in <a> links
    $tweet = preg_replace("/@([A-Za-z0-9\/\.]*)/", "<a href=\"http://www.twitter.com/$1\">@$1</a>", $tweet);
    return $tweet;
}
```

Updates
===============
