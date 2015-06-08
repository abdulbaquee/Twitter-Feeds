<?php require_once('twitteroauth/twitteroauth.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Twitter Feeds</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/default.css" />
    </head>
    <body>
        <div class='contentWindow clearfix'>
            <div class="contentTop cleafix">
                <div class="box full">
                    <div class="user clearfix">
                        <a href='http://twitter.com/<?php echo $usertimeline[0]->user->screen_name; ?>' target='_blank'><img src="https://twitter.com/<?php echo $usertimeline[0]->user->screen_name; ?>/profile_image?size=original" alt="<?php echo $usertimeline[0]->user->name; ?>" class="avatar size128" /></a>
                        <div class="userinfo">
                            <h1><?php echo $usertimeline[0]->user->name; ?></h1>
                            <h2 class="username">@<?php echo $usertimeline[0]->user->screen_name; ?></h2>
                            <p class="bio "><?php echo $usertimeline[0]->user->description; ?></p>
                            <p class="details">
                                <span><?php echo $usertimeline[0]->user->location; ?></span>
                                <span class="divider">&middot</span>
                                <span><a target="_blank" href="<?php echo $usertimeline[0]->user->url; ?>"><?php echo $usertimeline[0]->user->url; ?></a></span>
                            </p>
                        </div>
                        <div class="useractions">
                            <div class='followbutton'>
                                <a href="https://twitter.com/<?php echo $usertimeline[0]->user->screen_name; ?>" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @ICICIPruMF</a>
                            </div>
                            <ul class="userstats">
                                <li><a target='_blank' href="http://twitter.com/<?php echo $usertimeline[0]->user->screen_name; ?>"><strong><?php echo $usertimeline[0]->user->statuses_count; ?></strong> Tweets</a></li>
                                <li><a target='_blank' href="http://twitter.com/<?php echo $usertimeline[0]->user->screen_name; ?>/following"><strong><?php echo $usertimeline[0]->user->friends_count; ?></strong> Following</a></li>
                                <li><a target='_blank' href="http://twitter.com/<?php echo $usertimeline[0]->user->screen_name; ?>/followers"><strong><?php echo $usertimeline[0]->user->followers_count; ?></strong> Followers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contentTweets">
                <div class="box fullnopad">
                    <div class='header'>
                        <h2>Tweets</h2>
                    </div>
                    <div class="tweets clearfix">
                        <?php foreach ($usertimeline as $user): ?>
                            <div class="tweet clearfix ">
                                <img class="avatar" src="https://twitter.com/<?php echo $user->user->screen_name; ?>/profile_image?size=original" />
                                <div class='tweetbody'>
                                    <div class='top'>
                                        <span class='fullname'><?php echo $user->user->name; ?> </span> <span class='username'>@<?php echo $user->user->screen_name; ?></span>
                                        <span class='tweetoption'><a href='https://twitter.com/intent/retweet?tweet_id=<?php echo $user->id_str; ?>' target='_blank'><i class='rt_img'></i>Retweet</a></span>
                                        <span class='tweetoption'><a href='https://twitter.com/intent/tweet?in_reply_to=<?php echo $user->id_str; ?>' target='_blank'><i class='rep_img'></i>Reply</a></span>
                                        <span class='tweetoption'><a href='https://twitter.com/intent/favorite?tweet_id=<?php echo $user->id_str; ?>' target='_blank'><i class='fav_img'></i>Favorite</a></span>
                                        <span class='date'><?php echo date('j M', strtotime($user->created_at)); ?></span>
                                    </div>
                                    <div class='status'>
                                        <?php echo linkify_tweet($user->text); ?>
                                    </div>
                                </div>	 
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="fb_reset" id="fb-root"></div>
        <script>
		//Twitter initialized code
            !function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");
        </script>
        <script type="text/javascript">
            //Facebook initialized code
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '', //Add your Facebook App id
                    status: true,
                    cookie: true,
                    oauth: true,
                    xfbml: true,
                    version: 'v2.1' //use version 2.1
                });
                //FB.Canvas.setSize({width: 810, height: $('#wrapper').height() + 30});
                FB.Canvas.setSize();
                FB.Canvas.setAutoGrow();
                FB.Canvas.setAutoGrow();
                FB.Canvas.scrollTo(0, 0);
                if (typeof window.onFacebookLoad == 'function')
                    onFacebookLoad();
            };
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </body>
</html>