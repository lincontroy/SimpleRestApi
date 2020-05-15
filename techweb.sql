

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `techweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
`created_at`  date NOT NULl
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`, `created_at` ) VALUES
(1, 1, 'gaming', 'hello there', 'dennis' ,'2018-05-10'),
(2,  2,'technology', 'desktop-pc', 'mwash' ,'2018-05-10');



CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` date NOT NULl
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


INSERT INTO `categories` (`id`, `name`, `create_at` ) VALUES
(1, 'gaming',  '2018-05-10'),
(2, 'technology',  '2018-05-10');
