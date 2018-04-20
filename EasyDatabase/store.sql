create database if not exists youtube;
use youtube;

drop table if exists account_notifications;

drop table if exists account_history;

drop table if exists watched_videos;

drop table if exists videos_created;

drop table if exists video_data;

drop table if exists account_followers;

drop table if exists account_subscriptions;

drop table if exists subscriptions;

drop table if exists user_profile;

CREATE TABLE user_profile (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
account_name VARCHAR(20) NOT NULL,
account_created_date DATE NOT NULL
);


CREATE TABLE subscriptions(

subscriber_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 subscription_name VARCHAR(25)
);



CREATE TABLE account_subscriptions (
subscription_id INT(6) UNSIGNED,

FOREIGN KEY (subscription_id)

   REFERENCES subscriptions(subscriber_id)

   ON DELETE CASCADE,

subscription_name VARCHAR(25),
account_name VARCHAR(25)
);


CREATE TABLE account_followers (
id INT(6) UNSIGNED,

FOREIGN KEY (id)

   REFERENCES user_profile(id)

   ON DELETE CASCADE,
account_name VARCHAR(25)
);


CREATE TABLE video_data (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
video_title VARCHAR(20) NOT NULL,
video_likes INT(7) NOT NULL,
video_dislikes INT(7) NOT NULL
);


CREATE TABLE watched_videos (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
video_id INT(6) UNSIGNED,
FOREIGN KEY (id)
  REFERENCES user_profile(id)
  ON DELETE CASCADE,
FOREIGN KEY (video_id)
  REFERENCES video_data(id)
  ON DELETE CASCADE,
description TEXT(35),
video_title VARCHAR(25),
number_of_views INT(7)
);


CREATE TABLE videos_created (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
FOREIGN KEY (id)
  REFERENCES user_profile(id)
  ON DELETE CASCADE,
FOREIGN KEY (id)
  REFERENCES video_data(id)
  ON DELETE CASCADE,
video_title VARCHAR(25)
);


CREATE TABLE account_history (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
FOREIGN KEY (id)
  REFERENCES user_profile(id)
  ON DELETE CASCADE,
FOREIGN KEY (id)
  REFERENCES video_data(id)
  ON DELETE CASCADE,
video_title VARCHAR(25)
);


CREATE TABLE account_notifications (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
FOREIGN KEY (id)
  REFERENCES user_profile(id)
  ON DELETE CASCADE,
subscriber_notification VARCHAR(5),
new_video_notification VARCHAR(5)
);