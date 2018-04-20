<?php
require_once __DIR__.'/vendor/autoload.php';
require_once 'config.inc.php';
use App\Database\DB as DB;

ini_set('display_errors','on');

$sql = 'select COLUMN_NAME, DATA_TYPE, IS_NULLABLE from INFORMATION_SCHEMA.COLUMNS where table_name="animal"';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

$sql = 'INSERT INTO user_profile (account_name, account_created_date) VALUES ("spongebob911", "2012-11-21"),
    ("abcteacher", "2015-01-12"),("angryorchard3", "2016-04-21")';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

$sql = 'INSERT INTO subscriptions (subscription_name) VALUES ("Jeremy Jahns"),
("Coding_Academy"),("cat_vids"),("Marvel"),
("Dc Comics"),("IGN"),("Dorkly"),
("Cinema_sins"),("ESPN"),("thenewboston")';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);


$sql = 'INSERT INTO account_followers (id, account_name) VALUES
("1","spongebob11"),("2","spongebob11"),("6","spongebob11"),
("5","spongebob11"),("4","angryorchard3"), ("5","abcteacher")';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);


$sql = 'INSERT INTO video_data (video_title, video_likes,video_dislikes) VALUES
("Fire Kitty","5000","45"),
("Bubble sort","3456","2134"),
("Game Zone","210000","345"),
("movie Review","34000","234")';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

$sql = 'INSERT INTO watched_videos (description, video_title,number_of_views)
VALUES ("kitty that is able to lick fire", "Fire Kitty","45"), ("sorting algorithm","Bubble sort","61234"),
("videogame reviews","Game Zone","250000"), ("A movie Review","movie Review","37000")';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

$sql = 'INSERT INTO videos_created (video_title) VALUES
("Talking Hmaster"),
("Calculus Review"),
("Funny cat part 5")';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

$sql = 'Insert INTO videos_data(video_title,video_likes,video_dislikes) values
("Fire Kitty","450","213"),
("Bubble Sort","780","13"),
("Game Zone","1000","413"),
("movie review","1450","13"),
("Talking Hmaster","17600","41"),
("Calculus Review","890","413"),
("Funny cat part 5","890","113")';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

$sql = 'INSERT INTO account_history(video_title) values
("Fire Kitty"),
("Talking Hmaster"),
("Funny cat part 5")';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

$sql = 'INSERT INTO account_notifications(subscriber_notification, new_video_notification)
values
("on","on"),
("off","on"),
("off","on")';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);


$sql = 'UPDATE video_data SET video_likes = ($likes)';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

$sql ='UPDATE video_data SET video_dislikes = ($unlikes)';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

$sql = 'SELECT * FROM subscriptions';
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);

// sql to delete a record
$sql = "DELETE FROM subscriptions WHERE subscription_name='DC_Comics'";
$stmt = DB::prepare($sql);
$stmt->execute();
$stmt = DB::run($sql);
$row = $stmt->fetchAll();
var_dump($row);
