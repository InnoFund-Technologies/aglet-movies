-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: aglet_brief_laravel
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('favourites.40cd750bba9870f18aada2478b24840a.page1','a:4:{s:7:\"results\";a:0:{}s:4:\"page\";i:1;s:11:\"total_pages\";d:0;s:13:\"total_results\";i:0;}',1739498552),('pagination..page1','a:4:{s:7:\"results\";a:9:{i:0;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/zo8CIjJ2nfNOevqNajwMRO6Hwka.jpg\";s:9:\"genre_ids\";a:4:{i:0;i:16;i:1;i:12;i:2;i:10751;i:3;i:35;}s:2:\"id\";i:1241982;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:7:\"Moana 2\";s:8:\"overview\";s:225:\"After receiving an unexpected call from her wayfinding ancestors, Moana journeys alongside Maui and a new crew to the far seas of Oceania and into dangerous, long-lost waters for an adventure unlike anything she\'s ever faced.\";s:10:\"popularity\";d:4253.184;s:11:\"poster_path\";s:32:\"/aLVkiINlIeCkcZIzb7XHzPYgO6L.jpg\";s:12:\"release_date\";s:10:\"2024-11-21\";s:5:\"title\";s:7:\"Moana 2\";s:5:\"video\";b:0;s:12:\"vote_average\";d:7.2;s:10:\"vote_count\";i:1422;}i:1;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/zOpe0eHsq0A2NvNyBbtT6sj53qV.jpg\";s:9:\"genre_ids\";a:4:{i:0;i:28;i:1;i:878;i:2;i:35;i:3;i:10751;}s:2:\"id\";i:939243;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:20:\"Sonic the Hedgehog 3\";s:8:\"overview\";s:296:\"Sonic, Knuckles, and Tails reunite against a powerful new adversary, Shadow, a mysterious villain with powers unlike anything they have faced before. With their abilities outmatched in every way, Team Sonic must seek out an unlikely alliance in hopes of stopping Shadow and protecting the planet.\";s:10:\"popularity\";d:2906.722;s:11:\"poster_path\";s:32:\"/d8Ryb8AunYAuycVKDp5HpdWPKgC.jpg\";s:12:\"release_date\";s:10:\"2024-12-19\";s:5:\"title\";s:20:\"Sonic the Hedgehog 3\";s:5:\"video\";b:0;s:12:\"vote_average\";d:7.773;s:10:\"vote_count\";i:1697;}i:2;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/u7AZ5CdT2af8buRjmYCPXNyJssd.jpg\";s:9:\"genre_ids\";a:2:{i:0;i:28;i:1;i:35;}s:2:\"id\";i:1160956;s:17:\"original_language\";s:2:\"zh\";s:14:\"original_title\";s:12:\"熊猫计划\";s:8:\"overview\";s:224:\"International action star Jackie Chan is invited to the adoption ceremony of a rare baby panda, but after an international crime syndicate attempts to kidnap the bear, Jackie has to save the bear using his stunt work skills.\";s:10:\"popularity\";d:2185.268;s:11:\"poster_path\";s:32:\"/xVS9XiO9upp2SnWx6KpBYb79hLR.jpg\";s:12:\"release_date\";s:10:\"2024-10-01\";s:5:\"title\";s:10:\"Panda Plan\";s:5:\"video\";b:0;s:12:\"vote_average\";d:6.5;s:10:\"vote_count\";i:62;}i:3;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/v9Du2HC3hlknAvGlWhquRbeifwW.jpg\";s:9:\"genre_ids\";a:3:{i:0;i:28;i:1;i:12;i:2;i:53;}s:2:\"id\";i:539972;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:17:\"Kraven the Hunter\";s:8:\"overview\";s:246:\"Kraven Kravinoff\'s complex relationship with his ruthless gangster father, Nikolai, starts him down a path of vengeance with brutal consequences, motivating him to become not only the greatest hunter in the world, but also one of its most feared.\";s:10:\"popularity\";d:1821.124;s:11:\"poster_path\";s:32:\"/nrlfJoxP1EkBVE9pU62L287Jl4D.jpg\";s:12:\"release_date\";s:10:\"2024-12-11\";s:5:\"title\";s:17:\"Kraven the Hunter\";s:5:\"video\";b:0;s:12:\"vote_average\";d:6.612;s:10:\"vote_count\";i:1158;}i:4;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/eHu1ZxFPmqyhnait9VdsOQBEFOk.jpg\";s:9:\"genre_ids\";a:2:{i:0;i:27;i:1;i:53;}s:2:\"id\";i:710295;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:8:\"Wolf Man\";s:8:\"overview\";s:423:\"With his marriage fraying, Blake persuades his wife Charlotte to take a break from the city and visit his remote childhood home in rural Oregon. As they arrive at the farmhouse in the dead of night, they\'re attacked by an unseen animal and barricade themselves inside the home as the creature prowls the perimeter. But as the night stretches on, Blake begins to behave strangely, transforming into something unrecognizable.\";s:10:\"popularity\";d:1176.873;s:11:\"poster_path\";s:32:\"/jTPBMPTgk9zOUGSkWcoOGbX8cTi.jpg\";s:12:\"release_date\";s:10:\"2025-01-15\";s:5:\"title\";s:8:\"Wolf Man\";s:5:\"video\";b:0;s:12:\"vote_average\";d:6.4;s:10:\"vote_count\";i:301;}i:5;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/8eifdha9GQeZAkexgtD45546XKx.jpg\";s:9:\"genre_ids\";a:3:{i:0;i:53;i:1;i:28;i:2;i:878;}s:2:\"id\";i:822119;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:32:\"Captain America: Brave New World\";s:8:\"overview\";s:243:\"After meeting with newly elected U.S. President Thaddeus Ross, Sam finds himself in the middle of an international incident. He must discover the reason behind a nefarious global plot before the true mastermind has the entire world seeing red.\";s:10:\"popularity\";d:1069.531;s:11:\"poster_path\";s:32:\"/pzIddUEMWhWzfvLI3TwxUG2wGoi.jpg\";s:12:\"release_date\";s:10:\"2025-02-12\";s:5:\"title\";s:32:\"Captain America: Brave New World\";s:5:\"video\";b:0;s:12:\"vote_average\";d:6.258;s:10:\"vote_count\";i:91;}i:6;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/xljLe4TiQL1b4sT7956IGgj2vrf.jpg\";s:9:\"genre_ids\";a:4:{i:0;i:28;i:1;i:18;i:2;i:12;i:3;i:10752;}s:2:\"id\";i:927342;s:17:\"original_language\";s:2:\"ta\";s:14:\"original_title\";s:15:\"அமரன்\";s:8:\"overview\";s:282:\"A heroic true story of Major Mukund Varadarajan, an Indian Army officer who displayed extraordinary bravery during a counterterrorism mission in Kashmir’s Shopian district. The film captures his courage in protecting his nation and the devotion of his wife Indhu Rebecaa Varghese.\";s:10:\"popularity\";d:1058.057;s:11:\"poster_path\";s:32:\"/6m435uh40N7Gzfbd69ttp6W0sdR.jpg\";s:12:\"release_date\";s:10:\"2024-10-31\";s:5:\"title\";s:6:\"Amaran\";s:5:\"video\";b:0;s:12:\"vote_average\";d:7.1;s:10:\"vote_count\";i:42;}i:7;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/xZm5YUNY3PlYD1Q4k7X8zd2V4AK.jpg\";s:9:\"genre_ids\";a:2:{i:0;i:28;i:1;i:35;}s:2:\"id\";i:993710;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:14:\"Back in Action\";s:8:\"overview\";s:153:\"Fifteen years after vanishing from the CIA to start a family, elite spies Matt and Emily jump back into the world of espionage when their cover is blown.\";s:10:\"popularity\";d:1053.567;s:11:\"poster_path\";s:32:\"/3L3l6LsiLGHkTG4RFB2aBA6BttB.jpg\";s:12:\"release_date\";s:10:\"2025-01-15\";s:5:\"title\";s:14:\"Back in Action\";s:5:\"video\";b:0;s:12:\"vote_average\";d:6.592;s:10:\"vote_count\";i:889;}i:8;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/qSOMdbZ6AOdHR999HWwVAh6ALFI.jpg\";s:9:\"genre_ids\";a:3:{i:0;i:28;i:1;i:80;i:2;i:53;}s:2:\"id\";i:1249289;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:6:\"Alarum\";s:8:\"overview\";s:343:\"Two married spies caught in the crosshairs of an international intelligence network will stop at nothing to obtain a critical asset. Joe and Lara are agents living off the grid whose quiet retreat at a winter resort is blown to shreds when members of the old guard suspect the two may have joined an elite team of rogue spies, known as Alarum.\";s:10:\"popularity\";d:1038.18;s:11:\"poster_path\";s:32:\"/v313aUGmMNj6yNveaiQXysBmjVS.jpg\";s:12:\"release_date\";s:10:\"2025-01-16\";s:5:\"title\";s:6:\"Alarum\";s:5:\"video\";b:0;s:12:\"vote_average\";d:5.8;s:10:\"vote_count\";i:150;}}s:4:\"page\";i:1;s:11:\"total_pages\";d:5;s:13:\"total_results\";i:45;}',1739496101),('pagination..page3','a:4:{s:7:\"results\";a:2:{i:0;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:31:\"/JtN7Q03S3oq7A4KZ7Z3I7m3osP.jpg\";s:9:\"genre_ids\";a:5:{i:0;i:28;i:1;i:35;i:2;i:80;i:3;i:53;i:4;i:12;}s:2:\"id\";i:573435;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:21:\"Bad Boys: Ride or Die\";s:8:\"overview\";s:122:\"After their late former Captain is framed, Lowrey and Burnett try to clear his name, only to end up on the run themselves.\";s:10:\"popularity\";d:353.091;s:11:\"poster_path\";s:32:\"/oGythE98MYleE6mZlGs5oBGkux1.jpg\";s:12:\"release_date\";s:10:\"2024-06-05\";s:5:\"title\";s:21:\"Bad Boys: Ride or Die\";s:5:\"video\";b:0;s:12:\"vote_average\";d:7.4;s:10:\"vote_count\";i:2730;}i:1;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/8btfz81bOJ2lC7cujYBTw03wzg3.jpg\";s:9:\"genre_ids\";a:3:{i:0;i:16;i:1;i:14;i:2;i:12;}s:2:\"id\";i:980477;s:17:\"original_language\";s:2:\"zh\";s:14:\"original_title\";s:21:\"哪吒之魔童闹海\";s:8:\"overview\";s:340:\"After the Tribulation, although the souls of Ne Zha and Ao Bing were preserved, their physical bodies would soon be completely destroyed. Tai Yi Zhen Ren plans to use the Seven Colored Lotus to reshape their physical forms. But in the process of reshaping, they encounter numerous difficulties. Where will the fate of Ne Zha and Ao Bing go?\";s:10:\"popularity\";d:352.355;s:11:\"poster_path\";s:32:\"/293Mo4GWf7Tl0TfAr5NFghqeMy7.jpg\";s:12:\"release_date\";s:10:\"2025-01-29\";s:5:\"title\";s:8:\"Ne Zha 2\";s:5:\"video\";b:0;s:12:\"vote_average\";d:8.1;s:10:\"vote_count\";i:58;}}s:4:\"page\";i:3;s:11:\"total_pages\";d:5;s:13:\"total_results\";i:45;}',1739498900),('pagination..page4','a:4:{s:7:\"results\";a:9:{i:0;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/rOmUuQEZfPXglwFs5ELLLUDKodL.jpg\";s:9:\"genre_ids\";a:3:{i:0;i:28;i:1;i:14;i:2;i:35;}s:2:\"id\";i:845781;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:7:\"Red One\";s:8:\"overview\";s:199:\"After Santa Claus (codename: Red One) is kidnapped, the North Pole\'s Head of Security must team up with the world\'s most infamous tracker in a globe-trotting, action-packed mission to save Christmas.\";s:10:\"popularity\";d:489.227;s:11:\"poster_path\";s:32:\"/cdqLnri3NEGcmfnqwk2TSIYtddg.jpg\";s:12:\"release_date\";s:10:\"2024-10-31\";s:5:\"title\";s:7:\"Red One\";s:5:\"video\";b:0;s:12:\"vote_average\";d:7.1;s:10:\"vote_count\";i:2277;}i:1;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/ie8OSgIHEl6yQiGJ90dsyBWOpQA.jpg\";s:9:\"genre_ids\";a:5:{i:0;i:16;i:1;i:14;i:2;i:12;i:3;i:10751;i:4;i:28;}s:2:\"id\";i:839033;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:46:\"The Lord of the Rings: The War of the Rohirrim\";s:8:\"overview\";s:238:\"A sudden attack by Wulf, a clever and traitorous lord of Rohan seeking vengeance for the death of his father, forces Helm Hammerhand, the King of Rohan, and his people to make a daring last stand in the ancient stronghold of the Hornburg.\";s:10:\"popularity\";d:458.374;s:11:\"poster_path\";s:32:\"/hk4Rrc23u9OXwGRrK2uYbiJR6Le.jpg\";s:12:\"release_date\";s:10:\"2024-12-05\";s:5:\"title\";s:46:\"The Lord of the Rings: The War of the Rohirrim\";s:5:\"video\";b:0;s:12:\"vote_average\";d:6.6;s:10:\"vote_count\";i:418;}i:2;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/1pmXyN3sKeYoUhu5VBZiDU4BX21.jpg\";s:9:\"genre_ids\";a:3:{i:0;i:16;i:1;i:878;i:2;i:10751;}s:2:\"id\";i:1184918;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:14:\"The Wild Robot\";s:8:\"overview\";s:196:\"After a shipwreck, an intelligent robot called Roz is stranded on an uninhabited island. To survive the harsh environment, Roz bonds with the island\'s animals and cares for an orphaned baby goose.\";s:10:\"popularity\";d:448.615;s:11:\"poster_path\";s:32:\"/wTnV3PCVW5O92JMrFvvrRcV39RU.jpg\";s:12:\"release_date\";s:10:\"2024-09-12\";s:5:\"title\";s:14:\"The Wild Robot\";s:5:\"video\";b:0;s:12:\"vote_average\";d:8.3;s:10:\"vote_count\";i:4292;}i:3;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/bVUB4WI2vTq46OHu2o1n9HdoloQ.jpg\";s:9:\"genre_ids\";a:1:{i:0;i:18;}s:2:\"id\";i:1300607;s:17:\"original_language\";s:2:\"es\";s:14:\"original_title\";s:28:\"Los dos hemisferios de Lucca\";s:8:\"overview\";s:117:\"Determined to help her son, who has cerebral palsy, Bárbara takes her family to India for an experimental treatment.\";s:10:\"popularity\";d:422.864;s:11:\"poster_path\";s:32:\"/fX3Q5hxUAUs1k8JQkNTwFpBd6BC.jpg\";s:12:\"release_date\";s:10:\"2025-01-30\";s:5:\"title\";s:13:\"Lucca\'s World\";s:5:\"video\";b:0;s:12:\"vote_average\";d:7.6;s:10:\"vote_count\";i:82;}i:4;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/kEYWal656zP5Q2Tohm91aw6orlT.jpg\";s:9:\"genre_ids\";a:3:{i:0;i:18;i:1;i:35;i:2;i:10749;}s:2:\"id\";i:1064213;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:5:\"Anora\";s:8:\"overview\";s:244:\"A young sex worker from Brooklyn gets her chance at a Cinderella story when she meets and impulsively marries the son of an oligarch. Once the news reaches Russia, her fairytale is threatened as his parents set out to get the marriage annulled.\";s:10:\"popularity\";d:414.492;s:11:\"poster_path\";s:32:\"/7MrgIUeq0DD2iF7GR6wqJfYZNeC.jpg\";s:12:\"release_date\";s:10:\"2024-10-14\";s:5:\"title\";s:5:\"Anora\";s:5:\"video\";b:0;s:12:\"vote_average\";d:7.1;s:10:\"vote_count\";i:1002;}i:5;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/uKb22E0nlzr914bA9KyA5CVCOlV.jpg\";s:9:\"genre_ids\";a:3:{i:0;i:18;i:1;i:10749;i:2;i:14;}s:2:\"id\";i:402431;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:6:\"Wicked\";s:8:\"overview\";s:299:\"In the land of Oz, ostracized and misunderstood green-skinned Elphaba is forced to share a room with the popular aristocrat Glinda at Shiz University, and the two\'s unlikely friendship is tested as they begin to fulfill their respective destinies as Glinda the Good and the Wicked Witch of the West.\";s:10:\"popularity\";d:409.424;s:11:\"poster_path\";s:32:\"/xDGbZ0JJ3mYaGKy4Nzd9Kph6M9L.jpg\";s:12:\"release_date\";s:10:\"2024-11-20\";s:5:\"title\";s:6:\"Wicked\";s:5:\"video\";b:0;s:12:\"vote_average\";d:6.896;s:10:\"vote_count\";i:1709;}i:6;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/uOQgMhYyu7dkXdHoRkCqZIF32M6.jpg\";s:9:\"genre_ids\";a:2:{i:0;i:28;i:1;i:12;}s:2:\"id\";i:1241320;s:17:\"original_language\";s:2:\"ja\";s:14:\"original_title\";s:36:\"キングダム　大将軍の帰還\";s:8:\"overview\";s:171:\"Depicts a continuation of the \"Battle of Mayang\", an all-out war against the neighboring country Zhao that Shin and Wang Ki fought in in the previous work \"Flame of Fate\".\";s:10:\"popularity\";d:407.472;s:11:\"poster_path\";s:32:\"/qZKKwXyZ92K0mIRpf2FbCkQa7oO.jpg\";s:12:\"release_date\";s:10:\"2024-07-12\";s:5:\"title\";s:39:\"Kingdom IV: Return of the Great General\";s:5:\"video\";b:0;s:12:\"vote_average\";d:7.638;s:10:\"vote_count\";i:167;}i:7;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/by8z9Fe8y7p4jo2YlW2SZDnptyT.jpg\";s:9:\"genre_ids\";a:3:{i:0;i:28;i:1;i:35;i:2;i:878;}s:2:\"id\";i:533535;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:20:\"Deadpool & Wolverine\";s:8:\"overview\";s:248:\"A listless Wade Wilson toils away in civilian life with his days as the morally flexible mercenary, Deadpool, behind him. But when his homeworld faces an existential threat, Wade must reluctantly suit-up again with an even more reluctant Wolverine.\";s:10:\"popularity\";d:399.701;s:11:\"poster_path\";s:32:\"/8cdWjvZQUExUUTzyp4t6EDMubfO.jpg\";s:12:\"release_date\";s:10:\"2024-07-24\";s:5:\"title\";s:20:\"Deadpool & Wolverine\";s:5:\"video\";b:0;s:12:\"vote_average\";d:7.628;s:10:\"vote_count\";i:6670;}i:8;a:14:{s:5:\"adult\";b:0;s:13:\"backdrop_path\";s:32:\"/2uD97QmWivS5hgnraXwroMHfSEU.jpg\";s:9:\"genre_ids\";a:1:{i:0;i:27;}s:2:\"id\";i:1352774;s:17:\"original_language\";s:2:\"en\";s:14:\"original_title\";s:6:\"Piglet\";s:8:\"overview\";s:226:\"On Kate\'s 21st birthday camping trip, her friends encounter Piglet, a monstrous human-pig hybrid who brutally murders one of them. They uncover Piglet\'s origins and Kate must confront her past to survive the relentless killer.\";s:10:\"popularity\";d:385.003;s:11:\"poster_path\";s:32:\"/5wZNFUJAwyX6RCxdqrLO9lLWJ20.jpg\";s:12:\"release_date\";s:10:\"2025-01-25\";s:5:\"title\";s:6:\"Piglet\";s:5:\"video\";b:0;s:12:\"vote_average\";d:4.1;s:10:\"vote_count\";i:5;}}s:4:\"page\";i:4;s:11:\"total_pages\";d:5;s:13:\"total_results\";i:45;}',1739498903);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favourites`
--

DROP TABLE IF EXISTS `favourites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favourites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favourites_user_id_foreign` (`user_id`),
  CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favourites`
--

LOCK TABLES `favourites` WRITE;
/*!40000 ALTER TABLE `favourites` DISABLE KEYS */;
/*!40000 ALTER TABLE `favourites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_02_13_010231_create_contact_us_table',1),(5,'2025_02_13_044819_create_favourites_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('DRGq0KGZ36mzBBTZOdDyCmSUh9nrTd1B67GMY6eA',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoibUhFYUo2VXBNbWNsd294aHhWeE95aUFMSkYwS2JHMkpSUWE5RXlVVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC8/cGFnZT00Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1739495303);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jointheteam','jointheteam@aglet.co.za',NULL,'$2y$12$rq6ebS1t8OaNklqXjvpHc.Fbc4lbZ/WaFfGgwf0tTnAIt720UWQW6',NULL,'2025-02-13 22:21:35','2025-02-13 22:21:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-14  3:20:28
