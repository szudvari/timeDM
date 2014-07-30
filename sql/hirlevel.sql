CREATE TABLE `hirlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cim` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `datum` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hirlevel_tipus` tinyint(3) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=103 ;

--
-- Dumping data for table `hirlevel`
--

INSERT INTO `hirlevel` VALUES(100, 'hirlev 2014. március 4.', '2014. március 4.', 1, '2014-03-08 09:13:02');
INSERT INTO `hirlevel` VALUES(101, 'hirlev 2014. március 11.', '2014. március 11.', 1, '2014-03-11 05:33:40');
INSERT INTO `hirlevel` VALUES(102, 'dm_origo 2014. március 14.', '2014. március 14.', 3, '2014-03-12 08:50:34');