CREATE TABLE IF NOT EXISTS wp_Feedosetting (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  pr_Description tinytext NOT NULL,
  pr_Availibility text NOT NULL,
  Gpc_value text NOT NULL,
  pr_ondition varchar(55) DEFAULT '' NOT NULL,
  PRIMARY KEY  (id)
);
CREATE TABLE IF NOT EXISTS wp_shopfeed (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  name tinytext NOT NULL,
  feedlink tinytext NOT NULL,
  optimized_feed_link tinytext NOT NULL,,
  Feed_id varchar(55) DEFAULT '' NOT NULL,
  PRIMARY KEY  (id)
);