
test
<?php
    require "twitteroauth/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;
    
$connection = new TwitterOAuth("LddoRGfQ5sk0WXvljtLvImIqw", "k9NgAmFqzfDnGx5n6NnlQrCk6YZi5mKGu9L1pa7DnwtuUOXorQ", "960404447120764930-43FQ9wMsSu2MTExKRKnPwZt2RTw50DW", "CtEmXe3rw9P2vALJhQdwhxjFUKO4SRZUO8Wu2aCRPKk61");
$content = $connection->get("account/verify_credentials");
$tweets = $connection->get("search/tweets", ["q" => "robo", "count" => 101]);


//print_r($content->name);
var_dump($tweets);
//var_dump($tweets->statuses[0]->user);
//var_dump($tweets->statuses[0]->coordinates);




//print_r($tweets);
echo gettype ($tweets->statuses[0]);

?>  
