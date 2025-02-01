-- -------------------------------------------------------------
-- TablePlus 5.3.8(500)
--
-- https://tableplus.com/
--
-- Database: event-management
-- Generation Time: 2025-02-01 08:52:08.0620
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `attendees`;
CREATE TABLE `attendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `start_at` datetime NOT NULL,
  `address` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `max_capacity` int(8) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `attendees` (`id`, `name`, `email`, `event_id`, `phone`) VALUES
(1, 'Ingrid Peterson', 'madoh@mailinator.com', 2, '+1 (749) 187-4699'),
(2, 'Madonna Rosales', 'qaqesimo@mailinator.com', 1, '+1 (718) 846-9605'),
(3, 'Shaine Bush', 'bowab@mailinator.com', 1, '+1 (117) 191-6001'),
(4, 'Zelenia Hoover', 'davyxu@mailinator.com', 1, '+1 (926) 975-9389');

INSERT INTO `events` (`id`, `title`, `description`, `start_at`, `address`, `max_capacity`, `user_id`) VALUES
(1, 'Velit repellendus Repudiandae iusto ea ut aut dignissimos officiis molestiae illo nisi', 'Sed voluptatem Dolorem pariatur Dolor', '2025-02-09 11:52:00', 'Aut error qui laboris ab', 72, 10),
(2, 'Consectetur vel sunt sed autem nobis et distinctio Eligendi ut est est animi et qui', 'Cum ut et recusandae Est quos accusantium architecto distinctio Eu', '2025-02-22 08:58:00', 'Fuga Est nisi rerum fugit consequatur dolore', 42, 10);

INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
(10, 'Forrest Mcintosh', '$2y$10$zJLrMpFjjVC40aol.vo2EudW5U4QD5sjUIDbr8wTUIT28fSQ6GsCi', 'ximypyri@mailinator.com');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;