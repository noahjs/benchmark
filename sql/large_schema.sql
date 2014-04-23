
DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(80) NOT NULL,
  `middle_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `address2` varchar(30) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `countrycode` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2014-04-21 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '2014-04-21 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;




--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `author_id` int(9) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2014-04-23 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '2014-04-23 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112563 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;