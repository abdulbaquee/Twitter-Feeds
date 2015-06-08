<?php
require_once('twitteroauth/twitteroauth.php');
define('CONSUMER_KEY', 'FI45eaLp9AtGa4REQ9FXzWXnQ');
define('CONSUMER_SECRET', 'fuu6PbUxEtOz7IZbUokZA9jj3Moc9cI7Kioe2NesHm1GZryy9P');
define('OAUTH_TOKEN', '605479332-PloqR8ztKzwJQQMu6j0TJDgCaTZSntaaFKkBNSGM');
define('OAUTH_TOKEN_SECRET', 'KJ9XPoHpA6XBxysLaMtBLHestLpzS9FtyPDD8Qj46KaDP');
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET);
$options = array(
    'screen_name' => 'iciciprumf',
    'count'=>100
);
$usertimeline = $connection->get('statuses/user_timeline', $options);
function linkify_tweet($tweet) {
    //Convert urls to <a> links
    $tweet = preg_replace("/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<a target=\"_blank\" href=\"$1\">$1</a>", $tweet);
    //Convert hashtags to twitter searches in <a> links
    $tweet = preg_replace("/#([A-Za-z0-9\/\.]*)/", "<a target=\"_new\" href=\"http://twitter.com/search?q=$1\">#$1</a>", $tweet);
    //Convert attags to twitter profiles in <a> links
    $tweet = preg_replace("/@([A-Za-z0-9\/\.]*)/", "<a href=\"http://www.twitter.com/$1\">@$1</a>", $tweet);
    return $tweet;
}
?>