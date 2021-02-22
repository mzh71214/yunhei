-- Black-list
-- version 1.2
-- http://www.huangjian-ln.cn/

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- 表的结构 `black_admin`
--

CREATE TABLE IF NOT EXISTS `black_admin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `last` datetime NOT NULL,
  `dlip` varchar(15) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `black_admin`
--

INSERT INTO `black_admin` (`uid`, `user`, `pass`, `last`, `dlip`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-02-05 00:00:00', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `black_config`
--

CREATE TABLE IF NOT EXISTS `black_config` (
  `k` varchar(255) NOT NULL DEFAULT '',
  `v` text,
  PRIMARY KEY (`k`(10))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `black_config`
--

INSERT INTO `black_config` (`k`, `v`) VALUES
('sitename', '云黑系统'),
('keywords', '云黑系统'),
('description', '云黑系统');

-- --------------------------------------------------------

--
-- 表的结构 `black_list`
--

CREATE TABLE IF NOT EXISTS `black_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` text,
  `level` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `note` text COMMENT '拉黑原因',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
