/*
Navicat MySQL Data Transfer

Source Server         : phpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : m_app

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-08-12 12:09:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `des` text,
  `types` varchar(255) DEFAULT NULL,
  `coordinate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('0000000004', 'upload/1597197126.jpg', 'HONEY', '\"Milk Vetch Honey\" takes the ingredient of natural milk vetch honey. Its taste is sweet, greasiless, and refreshing. Its color appears to be light amber and forms white particles after crystallization. Milk Vetch Honey has the effect of cooling, disintoxicating, eye recovering, refilling, moisting, detumescence, unobstructing urinary and others. Milk Vetch Honey is especially effective for inner pressure caused by lacking sleep, which is the common phenomenom for most white-collar personnels.', 'Honey', '41.892713,-87.616152');
INSERT INTO `product` VALUES ('0000000005', 'upload/1597197482.jpg', 'ROSE', 'A rose is a perennial flower shrub or vine of the genus Rosa, within the family Rosaceae, that contains over 100 species and comes in a variety of colors. The species form a group of erect shrubs, and climbing or trailing plants, with stems that are often armed with sharp prickles. It is a common error to refer to roses having thorns. But thorns are modified leaves, whereas these sharp protrusions on a rose are modified epidermal tissues (prickles). Most are native to Asia, with smaller numbers of species native to Europe, North America, and northwest Africa. Natives, cultivars and hybrids are all widely grown for their beauty and fragrance.', 'Flower', '41.15249,-85.826618');
INSERT INTO `product` VALUES ('0000000006', 'upload/1597197550.jpg', 'BlUEBRRY', 'Blueberries are flowering plants of the genus Vaccinium (a genus which also includes cranberries and bilberries) with dark-blue berries and is a perennial. Species in the section Cyanococcus are the most common fruits sold as \"blueberries\" and are mainly native to North America. They are usually erect but sometimes prostrate shrubs varying in size from 10 centimetres (3.9 in) to 4 metres (160 in) tall. The fruit is a false berry 5–16 millimetres (0.20–0.63 in) diameter with a flared crown at the end; they are pale greenish at first, then reddish-purple, and finally blueish-purple when ripe. They have a sweet taste when mature, with variable acidity. It not only has good nutrition health care function, but also has to prevent brain aging cardiac cancer softening blood vessels such as strengthen the body immune function.', 'Vegetable', '40.858937,-87.354168');
INSERT INTO `product` VALUES ('0000000007', 'upload/1597197636.jpg', 'MUSHUROOM', 'Mushrooms belong to the Fungi group. They are fleshy plants that grow from decaying materials. They need the nutrients that they get from the decay because they cannot produce their own food. They usually grow in the more temperate regions of the world and during the seasons when the weather is warm and moist. Mushrooms can most likely be found in pastures, meadows and woodlands. The edible varieties of mushrooms can either be cooked with other ingredients or eaten by themselves. They are often paired with meat, combined with other vegetables, or made into soups or sauces. Mushrooms are easy to prepare because they dont need peeling and both the stem and the cap can be used.', 'Vegetable', '42.881842,-85.660467');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `head` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
