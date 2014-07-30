CREATE TABLE `life_op_hirlev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hirlev_id` int(11) NOT NULL,
  `sendingdate` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `folder` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `analytics_source` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `analytics_medium` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu1` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu1_link` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu1_analytics` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu2` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu2_link` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu2_analytics` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu3` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu3_link` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu3_analytics` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu4` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu4_link` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `menu4_analytics` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `bp_link` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `bp_analytics` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `bp_pic` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `bp_title` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  `bp_text` text COLLATE latin2_hungarian_ci NOT NULL,
  `bp_price` tinytext COLLATE latin2_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci AUTO_INCREMENT=101 ;

--
-- Dumping data for table `life_op_hirlev`
--

INSERT INTO `life_op_hirlev` VALUES(100, 102, '2014. március 14.', 'http://stuff.szallas.travelo.hu/hirlevel/dm/140314_life_dm ', 'dm_origo', '140314', 'Wellness', 'http://utazas.life.hu/kereses?keyword=wellness&belfold=1&nodate=1', 'menu_wellness', 'Bababarát', 'http://utazas.life.hu/kereses?szo=bababarat&belfold=1&nodate=1', 'menu_bababarat', 'Tengerpart', 'http://utazas.life.hu/kereses?szo=tengerpart&nodate=1', 'menu_tengerpart', 'Akciók', 'http://utazas.life.hu/akciok', 'menu_akciok', 'http://utazas.life.hu/kereses?keyword=husvet&belfold=1&rendezes=csomagar|asc', 'husvet', 'husvet.jpg', ' Húsvéti örömök', 'Tervezze meg már most húsvéti pihenését!<br> <br>\r\nLegyen szó vendégházról, vagy luxusszállodáról, biztosan megtalálja a kedvére valót!', '5 750 Ft / fő / éjtől ');
