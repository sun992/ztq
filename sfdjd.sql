-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： sfdjd.gotoftp2.com
-- 生成日期： 2019-11-01 18:30:18
-- 服务器版本： 5.7.20
-- PHP 版本： 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `sfdjd`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL COMMENT '动自编号',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `password` varchar(32) DEFAULT NULL COMMENT '密码 md5加密',
  `nickname` varchar(50) DEFAULT NULL COMMENT '管理员昵称',
  `loginnum` int(11) DEFAULT NULL COMMENT '管理员登陆次数',
  `logintime` datetime DEFAULT NULL COMMENT '管理员本次登录时间',
  `uplogintime` datetime DEFAULT NULL COMMENT '管理员上传登录时间',
  `isdelete` int(11) DEFAULT NULL COMMENT '辑逻删除'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `nickname`, `loginnum`, `logintime`, `uplogintime`, `isdelete`) VALUES
(1, 'admin', '7fef6171469e80d32c0559f88b377245', '管理员', 7, '2019-10-31 18:21:27', '2019-10-31 18:06:28', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tb_filelog`
--

CREATE TABLE `tb_filelog` (
  `id` int(11) NOT NULL,
  `oldname` longtext,
  `savename` longtext,
  `savepath` longtext,
  `thetype` varchar(255) DEFAULT NULL,
  `theId` int(11) DEFAULT NULL,
  `isdelete` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tb_guestbook`
--

CREATE TABLE `tb_guestbook` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` longtext,
  `repaly` longtext,
  `issh` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `sdate` datetime DEFAULT NULL,
  `isdelete` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tb_link`
--

CREATE TABLE `tb_link` (
  `id` int(11) NOT NULL COMMENT '自动编码',
  `sort` int(11) DEFAULT NULL COMMENT '类别',
  `serialnum` int(11) DEFAULT NULL COMMENT '序号',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `isdelete` int(11) DEFAULT NULL COMMENT '逻辑删除',
  `url` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_link`
--

INSERT INTO `tb_link` (`id`, `sort`, `serialnum`, `title`, `isdelete`, `url`, `picture`) VALUES
(1, 2, 1, '照片1', 0, '#', '/upload/image/20191030/1572405414247131.jpg'),
(2, 2, 2, '照片2', 0, '#', '/upload/image/20191030/1572405424132791.jpg'),
(3, 1, 3, '幻灯1', 0, NULL, '/upload/image/20191030/1572405238190630.jpg'),
(4, 1, 4, '幻灯2', 0, NULL, '/upload/image/20191030/1572405265133996.jpg'),
(5, 4, 5, '互联网药品信息服务资格证书', 0, NULL, '/upload/image/20191030/1572406048206853.png'),
(6, 4, 6, '资质荣誉', 0, NULL, '/upload/image/20191030/1572406073184821.jpg'),
(7, 4, 7, '资质荣誉', 0, NULL, '/upload/image/20191030/1572406090627704.jpg'),
(8, 4, 8, '资质荣誉', 0, NULL, '/upload/image/20191030/1572406099167651.jpg'),
(9, 3, 9, '关于我们', 0, NULL, '/upload/image/20191030/1572406378851986.jpg'),
(10, 3, 10, '产品介绍', 0, NULL, '/upload/image/20191030/1572406410510529.jpg'),
(11, 3, 11, '新闻发布', 0, NULL, '/upload/image/20191030/1572406454408586.jpg'),
(12, 3, 12, '专题板块', 0, NULL, '/upload/image/20191030/1572406485996185.jpg'),
(13, 3, 13, '服务网点', 0, NULL, '/upload/image/20191030/1572406504343479.jpg'),
(14, 3, 14, '联系我们', 0, NULL, '/upload/image/20191030/1572406531490949.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `tb_linksort`
--

CREATE TABLE `tb_linksort` (
  `id` int(11) NOT NULL COMMENT '自动编号',
  `pid` int(11) DEFAULT NULL COMMENT '父类ID',
  `sortname` varchar(255) DEFAULT NULL COMMENT '类别名称',
  `serialnum` int(11) DEFAULT NULL COMMENT '序号',
  `isdelete` int(11) DEFAULT NULL COMMENT '逻辑删除'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_linksort`
--

INSERT INTO `tb_linksort` (`id`, `pid`, `sortname`, `serialnum`, `isdelete`) VALUES
(1, 0, '首页幻灯', 1, 0),
(2, 0, '首页关于我们照片', 2, 0),
(3, 0, '栏目照片', 3, 0),
(4, 0, '资质荣誉', 4, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `loginnum` int(11) DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  `uplogintime` datetime DEFAULT NULL,
  `isdelete` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL COMMENT '自动编码',
  `sort` int(11) DEFAULT NULL COMMENT '类别',
  `serialnum` int(11) DEFAULT NULL COMMENT '序号',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` longtext COMMENT '内容',
  `isdelete` int(11) DEFAULT NULL COMMENT '逻辑删除',
  `author` varchar(255) DEFAULT NULL,
  `istime` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `times` varchar(255) DEFAULT NULL,
  `thedes` longtext,
  `picture` varchar(255) DEFAULT NULL,
  `isgood` varchar(255) DEFAULT NULL,
  `isseo` int(11) DEFAULT '0',
  `thekey` varchar(255) DEFAULT NULL,
  `describ` varchar(255) DEFAULT NULL,
  `issh` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `picture2` varchar(255) DEFAULT NULL,
  `teaminfo` varchar(255) DEFAULT NULL,
  `dizhi` varchar(255) DEFAULT NULL,
  `tels` varchar(255) DEFAULT NULL,
  `marker` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_news`
--

INSERT INTO `tb_news` (`id`, `sort`, `serialnum`, `title`, `content`, `isdelete`, `author`, `istime`, `source`, `times`, `thedes`, `picture`, `isgood`, `isseo`, `thekey`, `describ`, `issh`, `url`, `picture2`, `teaminfo`, `dizhi`, `tels`, `marker`) VALUES
(1, 12, 1, '助听器购买及验配流程？', '<p>助听器作为国家二类医疗器械，需要在专业人士的指导下进行验配和调试。请到专业的助听器验配中心进行购买。</p><p><img alt=\"blob.png\" src=\"http://localhost/upload/image/20191028/1572236460660839.png\" width=\"554\" height=\"312\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; border: 0px; vertical-align: middle; display: block; max-width: 100%; word-break: break-all !important; height: auto !important;\"/></p><p>1、询问病史及客户情况(了解客户助听器佩戴史、评估听力损失程度等)</p><p>2、客户信息建档(将客户的信息、听力损失时间、用药史等进行登记)</p><p>3、检查耳道(用耳窥镜检查耳垢情况、有无发炎、耳膜是否完整等情况)</p><p>4、纯音听力测试(使用专业的检测设备在专业测听室中进行听力测试)</p><p>5、 助听器介绍及选配(验配师根据客户的听力损失程度、年龄、预算等给客户介绍助听器及选择合适的助听器进行试听)</p><p>6、制取耳模(验配师根据患者选定的助听器品牌和类型为患者取耳印模)</p><p>7、取机(验配师将选定或定做好的助听器，交由客户试听。并告知客户使用方法及保养细节等。)</p><p>8、适应性训练及佩戴情况跟踪(初次佩戴者需要有逐步适应的过程。验配师将定期询问客户佩戴情况，跟踪使用情况等。)</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(2, 12, 2, '助听器哪里买?', '<p>验配购买助听器，一般选择连锁的知名品牌机构，因为连锁品牌更有实力，专家团队更专业，售后服务更有好更有保障。</p><p>艾声助听器是为听障人士提供专业的听力康复解决方案的连锁机构，拥有先进的听力检测设备和强大技术专家支持团队，与国际同步的助听器验配技术、高性价比的产品，专业化的服务为广大听障人士提供质量可靠、最佳性价比的产品。同时用专业、严格的态度审核厂家资质、认真筛选产品性能，遍布全国各大中小城市的连锁门店，提供着方便、周全的服务，并使得每个听障人士都能得到专业验配师的咨询和验配。</p><p><img src=\"/upload/image/20191030/1572406832842390.jpg\" title=\"1546840028589277.jpg\" alt=\"门面图.JPG\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p>艾声全国连锁，福建有8家直营机构，地址如下：</p><p>厦门地区</p><p>1、厦门艾声助听器旗舰店</p><p>地址：厦门市思明区嘉禾路329号太平洋广场北楼4层38-39号</p><p>电话：0592-5656776</p><p>2、厦门湖滨南店</p><p>地址：厦门市思明区湖滨南路138号（非矿公交站旁）</p><p>电话：0592 3733933</p><p>漳州地区</p><p>1、艾声助听器漳州平和店地址：漳州市平和县小溪镇东大路防疫站2号店面（政府大门旁边)</p><p>电话：0596 - 52397332</p><p>2、艾声助听器漳州市龙海店地址：福建省龙海市石码镇人民西路5栋6号</p><p>电话：0596---61157333</p><p>3、艾声助听器漳州诏安店地址：诏安县南诏镇中山西路248号</p><p>电话：0596-33252334</p><p>4、艾声助听器漳州云霄店地址：漳州市云霄县宝城路67号</p><p>电话：0596-85209335</p><p>5、艾声助听器漳州龙华店地址：漳州市芗城区胜利西路龙华大厦（安然桥旁）</p><p>电话：0596 - 20282996</p><p>6、艾声助听器漳州元光店地址：漳州市芗城区元光北路5-19号（青少年宫对面）</p><p>电话：0596-2930136</p><p>泉州地区</p><p>艾声助听器泉州德化店</p><p>地址：德化县浔中镇富东街102号（浔中政府附近）</p><p>电话：0595-23596099</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(3, 12, 3, '助听器怎么买?', '<p>首先，要对助听器有个基本了解：</p><p>1、功能越强大，价格就越高，首先衡量自己的家人平时主要在什么环境下使用助听器</p><p>2、外型越小，价格就越高</p><p>3、助听器的通道越多，补偿的就会越精细，患者所听到的声音失真度就会越小，清晰度也相应会更高。</p><p><br style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important;\"/></p><p>其次，牢记3个“不要”原则：</p><p>1.不要贪图一时便宜而牺牲掉售后服务</p><p>2.不要到不测听就配机的地方选配</p><p>3.不要只根据价格来选择助听器</p><p><br style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important;\"/></p><p>并且牢记3个“要”：</p><p>1、要询问是否包括专业的售后服务</p><p>2、要一次验配到位，不要以“便宜点”来随意选择助听器，否则过不了多久又要重新选配助听器。</p><p><br style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important;\"/></p><p><img src=\"http://localhost/upload/image/20191028/1572236608577013.png\" title=\"1546831498793118.png\" alt=\"blob(117).png\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; border: 0px; vertical-align: middle; display: block; max-width: 100%; word-break: break-all !important; height: auto !important;\"/></p><p>衡量一个助听器是否选配合理、调试正确，应从以下几个方面进行考察：<br style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important;\"/></p><p>1、助听器戴在耳朵里应该是舒服的，且不应容易掉出来;</p><p>2、是否有利于对听损人士开展有效的听觉语言康复训练</p><p>3、是否有效提高了听损人士的交往能力</p><p>4、在各种环境中对语言理解的正确率</p><p>5、是否能帮助聋儿辨别语音韵律</p><p>6、是否听得到非语言的警觉信号，如汽车喇叭声、敲门声等</p><p>选配得当的助听器，还应使其噪声大小和最大输出控制在听损人士的听觉不舒适范围以下，配戴时不会出现不舒服的感觉。</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(4, 12, 4, '助听器很吵怎么办 给大脑点时间', '<p>如果你初次配戴助听器，或者刚换上了新的助听器，你可能会发现：“为什么我听到的声音很吵?这助听器是不是有问题?”其实，不是助听器有问题。那为什么助听器听起来“吵”呢?任何一款好的助听器，它的首要目标都是提高可听度，通俗点理解就是帮助弱听人士听到不戴助听器时听不到的声音，这也是助听器被发明出来的意义所在。</p><p>　　毕竟，对于弱听人士来说，如果不戴助听器，也许你能在餐桌上听到你隔壁桌紧挨着的朋友说话，或者也可以听到调大声后的电视声音。</p><p>　　但是，你可能听不到冰箱工作的响声，碗碟碰撞的叮当作响声，空调运转时的嗡嗡声，以及外面的交通噪音。</p><p>　　(没戴助听器时，你听到的车水马龙声是怎样的?)</p><p>　　这些你原本听不到或听到一点点的环境声，在你没有戴上助听器以前，你可能已经习以为常，觉得环境声本就如此。</p><p>　　而当你开始使用助听器或戴上新助听器时，那些很久以来听不到或听得小的声音，被助听器放大后，你就会觉得听到的声音大了、多了、杂了，好像助听器里有额外的“噪音”。</p><p>　　虽说不是助听器问题，那怎么解决这个“吵”呢?</p><p>　　不要慌，不要怕，助听器里额外的“噪音”有方法解决。茸耳君汇总了3种改善方法，一点一点看下来。</p><p>　　1、给大脑点时间</p><p>　　对于初次配戴助听器的弱听人士来说，你可能是在听不到声音的很多年后才开始使用助听器，这意味着你一直以来并没有听到周围的背景声音。</p><p>　　所以，当你开始戴助听器的时，那些你之前从来没有听到的噪音被助听器放大后会变得比较大。</p><p>　　正是戴助听器后听到这些声音和不戴助听器时听不到这些声音的对比，让你觉得助听后的声音听起来十分突兀，甚至会让你产生排斥情绪。</p><p>　　打个比方：</p><p>　　这就好比你的眼睛在黑暗的房间里呆了一整天后需要适应阳光一样。</p><p>　　想象一下，如果你在一间黑暗的房间里呆了很久很久，然后走到外面的太阳下，你的眼睛可能需要几天甚至更久才能完全适应光线。</p><p>　　(眼睛适应光需要点时间，耳朵适应声音亦如此)</p><p>　　初次佩戴助听器听声音也同样如此，且对声音的适应因人而异。</p><p>　　对有些弱听人士来说，他们的耳朵和大脑可能需要几周的时间去适应声音，但对有些弱听人士来说，可能需要几个月的时间。</p><p>　　大脑具有可塑性。在这段时间里，你的大脑经历了一个“重组”的过程，经历这个过程之后，它就会知道哪些声音是重要的，哪些声音是不重要的。</p><p>　　(给大脑点时间进行“重组”)</p><p>　　一旦大脑开始学习哪些声音是不重要的，它就会开始过滤掉这些声音，你就不会再为这些不重要的声音投入过多的注意力，也就不会因此而感到助听器听到的声音很吵了。</p><p>　　大脑调整和适应所需要的时间长短取决于几个因素：年龄、听力损失的程度、患听力损失但未佩戴助听器的时间长短。</p><p>　　一般来说，年轻人会适应得更快一些，而听力损失十余年才配戴助听器的老年人则相对慢些，所以，请给老年弱听人士多点时间适应，别急!</p><p>　　2、给助听器的降噪调试</p><p>　　数字助听器不只是一个简单的音量变化，而是可以通过大量的参数微调来改变声音的频率、增益等特性，改善患者的助听体验使其获得更佳的聆听效果。</p><p>　　(声音有频率、增益等特性，你知道吗?)</p><p>　　专业的听力师会根据弱听人士的听力情况和主诉要求，有针对性地进行助听器调试，以帮助改善弱听人士抱怨的额外“噪音”。</p><p>　　通常的调试方法是改变助听器的降噪设置和调整麦克风的放大量。</p><p>　　(多通道降噪为不同听损情况的弱听人士量身定制)</p><p>　　但是，不论是听力师，还是弱听人士，最重要的是要记住，不建议把所有的背景噪音都“消灭”，要把握度。</p><p>　　因为，如果通过助听器的调整减少了过多的背景噪声，弱听人士也将会错过一些相对柔和的言语声，如/s/、/sh/、/f/，这意味着可能无法理解一些言语。</p><p>　　当然，听力师也可以对助听器进行设置，如添加“噪音程序”，让弱听人士可以自行决定什么时候需要使用“降噪”功能，什么时候需要听到更多的环境声。</p><p>　　3、换上更好的助听器</p><p>　　对于大部分的弱听人士来说，前两种方法能很好地解决戴上助听器后的听声音“吵”。</p><p>　　但是，对于小小部分人来说，可能会例外。</p><p>　　如果使用前两种方法后，弱听人士仍然在与听到的环境噪音“作斗争”，甚至觉得噪音“吵”得干扰听别人说话，那么，寻找新的、更好降噪功能的助听器十分重要的。</p><p>　　(科学技术一直在进步，助听器技术同样如此)</p><p>　　如果弱听人士的助听器已经使用了3年以上，有上面说到的问题，那么，是时候考虑更换新的助听器了。</p><p>　　噪音环境下的聆听困难是弱听人士最大的困扰之一，助听器制造商一直在寻找更有效地处理这些复杂噪音的方法。</p><p>　　几乎每年，各大助听器制造商都会上市较已有产品更好音质，或更好降噪功能，或更智能化的助听器，一定有一款适合每位弱听人士的助听器。</p><p>　　弱听人士需要做的就是找专业听力师，让专业人士帮你选配适合的、更好的助听器。</p><p><img src=\"/upload/image/20191030/1572406878130851.jpg\" title=\"1572240155479216.jpg\" alt=\"135.jpg\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p>', 0, '管理员', '2019-10-30', NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(5, 12, 5, '这些助听器知识你知道吗', '<p>助听器是一类声学放大装置，主要用于帮助解决听力受损患者的听声障碍问题，以达到改善听损患者生活质量的目的。目前市面上的助听器品牌琳琅满目，助听器的类型也多种多样，但助听器的基本组成没有较大差异。如图，助听器主要由以下三部分组成：麦克风、放大器和授话器。</p><p>　　麦克风的主要作用是采集环境中的声音，并将声音转化为电信号，便于助听器处理。放大器的作用是将电信号根据实际需要进行处理，使信号可以满足实际要求。而授话器的作用则是将处理过后的电信号再重新转化为声信号，输出到外界。</p><p>　　除以上主要的三部分外，助听器还会有其他的组成部件，这些组成部件受到助听器的类型、品牌以及价格的影响而有不同的差异，同时不同的品牌也会在各自的助听器上装配自家公司的技术，提高自身品牌的竞争力。</p><p>　　对于患者来说，最关心的问题就是什么样的助听器是好的助听器?这个问题其实很难回答，在助听器行业中面对这个问题我们一般给出的答案是适合的才是最好的，当然这句话可以用到很多行业中。验配助听器是一个十分严谨和专业的过程，在这一过程中涉及到很多因素，所以对于好的助听器这一问题来说不能一概而论。但对于助听器这一装置来说，有几点还是值得注意和考量的。</p><p>　　助听器的目的是放大声音，所以对于助听器有一个很重要的考量标准就是助听器的音质，好的助听器应该是高保真的助听器。啥叫高保真?意思就是可以很好还原声音。高保真助听器有以下要求：</p><p>　　1、频率响应范围</p><p>　　啥是频率响应范围，简单来说就是助听器所能输出的声音的最大频率范围。不懂?看图!</p><p>　　我们可以将第一列的五个小人比作不同频率的外界声音，由于麦克风频率响应范围有限，这五个小人两侧的两个小人无法被麦克风拾取，所以在通过麦克风后，五个小人变为了三个，回到声音中，就是原来声音由于麦克风频率响应范围限制，所以在拾取后一部分频率被遗失，这就造成了声音信息被破坏，从而影响聆听。这时就算授话器输出的频率响应范围足够大，由于在拾取时就已经遗失了部分声音频率信息，那么输出的声音与原声相比还是有失真的。</p><p>　　同样的，如果授话器的频率响应范围小，那么就算麦克风可以完全拾取声音，那么在输出时由于授话器的频率响应范围有限，就会造成部分声音频率在输出时遗失，同样会造成聆听困难。我们一般认为授话器的频率响应范围决定助听器的频率响应范围，但实际上麦克风的频率响应范围也会影响输出声音的完整性。</p><p>　　2、非线性失真</p><p>　　失真，简单理解就是一个声音经过处理后得到的声音与原来的声音相比变化很大，从而造成了一些语音信息的丧失，影响聆听。打个比方就是一个胖子努力减肥变成了瘦子，和原来相比就有很多不同，那么对于辨认就会有困难。助听器的失真主要有谐波失真和互调失真，这两种失真产生的原因主要和电子元器件以及电子系统设计有关，在这里不作赘述。</p><p>　　还有一类失真称为信号处理的失真，也就是助听器处理声音时对声音产生了影响，从而影响聆听。采样率和比特率是解释这类失真时常用的两个概念。</p><p>　　回到声音，看上图。一个波形为正弦波的声波，当我们只采集五个点时，那么系统处理之后就只能输出一条类似于折线的波形，这就与原波形相差很大。所以当助听器的采样率很低时，就无法更好的还原声音，造成语音信息丧失。但是如果采样率很高，而比特率很低，那么助听器就无法存储和处理大量的采样点，从而造成混乱，影响音质。值得注意的时，采样率和比特率并不是越高越好，因为会影响处理时间，所以两者需要有一个合理的范围。</p><p>　　3、延时</p><p>　　众所周知，电子器件处理信号都需要一定的时间，助听器也不例外。助听器的处理声音的时间会影响音质，如果处理时间太慢，就会造成声音听起来空洞无力。但值得注意的是处理时间越长，那么处理的就越精细，所以延时也需要在一个合理范围内，一般为5ms。</p><p>　　4、本底噪声</p><p>　　助听器作为电子器件，在运行过程中不可避免的会产生噪声，这种噪声称之为本底噪声，如果本底噪声过大，那么助听器就会放大这类噪声，从而影响音质，因此本底噪声在助听器出厂时就会有严格的检测，以最小化这种影响。</p><p>　　上图表明，当助听器本底噪声过大时，会对信号声产生影响，从而使音质发生变化。</p><p>　　以上四点均是从助听器本身性质去分析什么是高保真的助听器，但随着科技发展，一些附加技术应用到助听器中，这些技术都可以帮助患者更好的聆听。所以看待助听器不能单一看某一个指标，需要整体看待。每个人使用助听器的效果也不同，适合的助听器也不同，这都需要专业的听力师做出判断，验配真正适合患者本人的助听器。同时，不是戴上助听器就一劳永逸了，要充分发挥助听器的作用还需要有专业的指导和训练，这样才能真正通过助听器提高生活质量。</p><p><img src=\"/upload/image/20191030/1572406905119172.jpg\" title=\"1572239961109369.jpg\" alt=\"134.jpg\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p>', 0, '管理员', '2019-10-30', NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(6, 9, 6, '戴上小天线 孩子听见了', '<p>“我听见了!”山西省聋儿康复教育研究中心彩虹班的墙上，挂着4个大字。</p><p>彩虹班的孩子都是听障儿童，他们的年龄集中在3岁到6岁。在老师的带领下，他们参加语言和听力能力训练，这些孩子鼓着腮帮子、很努力地跟着老师练习发音。</p><center><img alt=\"助听器\" src=\"/upload/image/20191030/1572406960222689.png\" width=\"600\" height=\"600\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></center><p>针对残疾儿免费给治疗</p><p>李昀蔓今年5岁，来到彩虹班已有一年多。她的头发上别着一根两厘米左右的“小天线”，这是她听清这个世界的触角。</p><p>3年前，当同龄的孩子都开始学说话的时候，李昀蔓却没什么动静，她的母亲陈云云产生了疑虑。别人安慰她：“孩子有的说话早，有的说话晚。”又过了几个月，情况仍无好转，陈云云着急了：“是不是孩子的听力有什么问题?”</p><p>从医院一出来，陈云云就哭了——李昀蔓右耳听力损失70%，左耳也有相当损失，几乎听不到任何声音。</p><p>陈云云和爱人四处打听治疗方案。有人告诉他们，山西省有针对残疾儿童的抢救性康复项目，如果达到条件，可以免费治疗。</p><p>经过网上申请、初筛后，陈云云夫妇带着孩子去定点医院做了复筛。过了两星期，他们得到了做手术的通知。“医院建议右耳植入电子人工耳蜗，左朵佩戴助听器。”陈云云说。</p><p>电子人工耳蜗的市场价，为10多万元。当时，山西省为0岁到17岁的150名听障儿免费植入电子人工耳蜗，并提供康复训练费补贴，资金来源则是国家彩票公益金和省财政。李昀蔓成为受益者之一。</p><p>李昀蔓头上的“小触角”，就是电子人工耳蜗的接收器。现在，她可以听清别人说的话，并背诵儿歌，基本达到同龄孩子的语言水平。“除了洗头发的时候，要把接收器拆下来，其他基本没啥影响。”陈云云表示。</p><p>陈云云时常到山西省聋儿康复教育研究中心，参加培训学习。“我们教家长如何帮助孩子发音、保护听力等。”语言训练部主任王菁萍说，“这周教的是‘听声放物’。家长在孩子身后敲桌子，孩子听到就把手上的积木放下来。通过这样的训练，来提升孩子的听力。”</p><p>此外，孩子们每周还会接受个性化的单独训练。单训室的玻璃是单向的，只能从外面看里面。“这是为了方便家长观察，又不影响到孩子。”王菁萍说。</p><p>按照年龄，彩虹班也是分大中小班的。除了专门的听力培训和语言课程，这里和其他幼儿园一样，也设有语言区、建构区、科学区等教学场景。用不了多久，这里的孩子就可以和正常孩子一样，进入普通的幼儿园和小学。</p><p>预防和康复4万人受助</p><p>今年，山西省实施覆盖4万人的“残疾预防重点干预和残疾儿童抢救性康复项目”，将其作为本年山西省“民生实事六项内容”之一。</p><p>山西省残联康复部主任樊喜华介绍，这项工程包括为2000名儿童提供残疾复筛和诊断服务，为33000名疑似残疾人提供残疾评定服务，为5000名残疾儿童提供抢救性康复服务。</p><p>除了山西省聋儿康复教育研究中心，山西省残联的直属机构还有山西省康复研究中心。该中心与山西省残疾人康复医院，是一套人马、两块牌子。不只是开展残疾儿童抢救性康复项目，这里还承担了其他年龄层次的残疾人康复工作。</p><p>正在上大学二年级的常鹏慧，是康复医院的住院者。“白天在这里康复，晚上就在住院部住宿。”她一边蹬着康复训练车一边说，“右腿偏瘫后，刚开始吃不下饭，现在好些了。康复内容挺全面，运动疗法、作业疗法做久了，我也多少学会了些。”</p><p>常鹏慧接受的是为期1个月的免费康复项目。去年，山西省启动了残疾人精准康复服务行动，山西省残联党组书记、理事长李亚明介绍：“我们出台了《山西省残疾人精准康复服务行动实施方案》，确定定点康复服务机构，将符合条件者转介到定点机构接受基本康复服务。”</p><p>山西省康复中心主任张欣荣不久前提交了申请。“以前残疾人康复、住院，除去省财政的部分补贴，剩下的钱得自己交，回地方后再按比例报销。我们正在向人社厅申请，看能否在住院登记的时候，直接把可以报销的部分抵扣。这样，残疾人就可以少垫一部分钱，多些方便。”</p><p>依托卫生院轻患帮重患</p><p>刘军(化名)伸出4个指头说，“我属兔，44岁，2014年3月20号来的这。”在托养中心接受了稳定的药物治疗后，这个曾几度自杀的精神残疾人如今看上去跟常人无异，记忆力也很好。</p><p>作为需要照顾的群体，残疾人可能会给周边增加不少负担。有的残疾人属于贫困家庭，家人无力供养;有的则是孤身一人，由村集体、社区关照。集中托养的意义，正在于化零为整，让照顾残疾人投入更少、效果更好。</p><p>各省财力不一、项目不一，集中托养工作也不尽相同。山西各地也进行过一些探索。“残疾人的集中托养主要依托三种方式：机构、日间照料中心和居家托养。目前，山西主要开展机构托养。”山西省残联副理事长刘晔说。</p><p>刘军所在的残疾人托养中心，位于山西省阳泉市郊区西南舁乡，离城区有十几公里车程，住有30多名患有分裂症、抑郁症等疾病的精神残疾人。</p><p>“精神残疾人的托养，专业性要求很高。没有选择在城区修建，而选择在乡里，是因为我们的托养中心采取了与乡卫生院合作的方式。”郊区残联理事长郭俊红说，“郊区的残疾人托养中心，是在西南舁乡卫生院的原址上重新修建的。我们出钱修建，卫生院负责提供医护人员。”</p><p>推进医养结合，当年花了不少力气。“很多地方的精神残疾人托养中心难以为继，就是因为日常开销、医护人员工资等成本太高。而且往往没有收入来源，完全依靠财政补贴。”郭俊红说，“我们这里的好处就是，专业的医护人员都是借助医院的力量，能解决人员编制问题，节省一部分开支。不过，这个需要和卫生部门协调，不是简单一句话就能办成的。”</p><p>楼梯上，几位刚在楼上活动室玩完麻将的残疾人走了下来，有人手里还拿着刚赢的扑克牌。他们相互搀扶着，往楼下的房间走去。西南舁乡卫生院院长付永毅介绍说：“这里采用了‘轻度患者帮助重度患者’的模式。中心每个月还会给轻度患者100元的劳动收入，用来鼓励他们照顾重度患者的饮食起居。钱虽然不多，但对他们而言也是一种肯定。”</p><p>刘军是荫营镇人，父母去世，家人无力照顾，就被送来了托养中心。如今，虽然胳膊上还留着当年自残落下的伤疤，但已经过几年治疗的他，精神状态已经焕然一新：“过几年，我还想娶个媳妇呢。”</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '', '0', 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(7, 9, 12, '面对听损老年病人，她靠一双手赢得他们的心', '<p></p><center style=\"text-align: left;\">85岁的离休干部王爷爷(化名)打来电话：我想提供一个线索，4月初，我们医院新来了一个李医生，她不用药，就靠一双温暖的手，给很多老人家解除了病痛。</center><center style=\"text-align: left;\">“她来了一个月不到，连着收了三面锦旗。有病人自发送的，也有家属送的。”他在电话里，言辞恳切地说，“我住过不少医院，像她对老年人这么好、如此耐心的医生，真是头一次见，希望你们来医院里看看。”</center><center style=\"text-align: left;\">到底是怎样一位医生，让王爷爷赞不绝口?不用药，又是如何用双手帮助老年人远离病痛呢?昨日下午，记者赶往杭州沈家路，来到了王爷爷所住的医院。</center><p></p><center><img alt=\"\" src=\"/upload/image/20191030/1572406978495166.png\" width=\"550\" height=\"348\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></center><p><br/></p><p><br/></p><p>烈日当头，天气炎热，王爷爷却早早等在医院门口。见到记者来了，热情地打招呼，在前头引路。这是一位白发苍苍的老人，戴着银边儿眼镜，精神头不错。</p><p>我们边走边聊。王爷爷双脚不算灵活，走路速度较慢，迈着小步子。话题，就从走路开始说起。</p><p>“前年夏天，我因为脑梗，住了一段时间医院。之后，两条腿走路就很重，平衡感也不太好。”王爷爷年轻时，从事文字相关行业，退休后依旧热衷于写作。脑梗那天，骑车到体育场路上买东西，过马路时突然晕倒了，后来被送到杭州市一医院。</p><p>人是救回来了，也做了支架手术，但双腿的后遗症很麻烦，之后住过好几家医院。“走个几分钟就不行了，得休息一下，谁也说不上来，能不能缓解，怎么缓解。后来，一直靠仪器(做康复)，但根本解决不了问题。”</p><p>对于治疗，王爷爷也有些灰心了。去年7月，他住进了城北这家医院，症状反反复复，兴致也一直提不起来。到了今年4月初，医院新来了个女医生，也就是他念叨着的“李医生”，跟着主任来查房。</p><p>王爷爷清楚记得当时的情景，他躺在床上，李医生跟着主任，认真地听着自己的讲述。查房快结束，她留了一句话：“查完房以后再来看你，再了解下情况。”</p><p>果不其然，过了一会儿，李医生又绕回到王爷爷的病房，仔仔细细地检查、沟通，给出了看法：你这毛病和血管不通畅有关。她没开药方，而是用两只手，帮王爷爷从头到脚进行按摩、推拿，尤其是在腰部特别费心。</p><p>“李医生很用心，(帮我)从头到脚趾头，每个地方都按过去，很用力，持续了一个多小时。她自己累得满头是汗，衣服都湿了，人嘛小小的，也不知道力气从哪里来的。”王爷爷边说边竖起大拇指，当天自己走路立马就轻松了，之后李医生为他做了一个星期的推拿、按摩，“状况起码好了50%，之前走平路都吃力，现在还能下楼了。”</p><p>在王爷爷真诚的夸赞声中，记者来了到他住在7楼的房间。这是一家医养结合的康复医院，共有15层楼，以中老年患者为主，住着的老年人很多都超过了80岁，绝大部分都有基础疾病，儿女因为各种原因并不陪伴在身边。</p><p>李医生的全名叫李秀凤，50岁，江西上饶人，刚退休，最早在妇产科，后来转到内科，一直在一所职业技术学院的医务室工作。</p><p>今年1月退休之后，她来到杭州的医院，现在管着12楼、13楼两层楼。“咱们就简单聊聊。”记者劝了几番，她才坐在对面聊起来。</p><p>“大学工作很轻松，退休之后，我就觉得自己浑身是劲，还有力气没用完，想着再工作一段时间。”和老年人打交道久了，她说话时不自觉会提高音量。</p><p>退休再应聘，李医生的同学大多选择去广州、深圳，而且往往避开医养结合的医院。对此，她想了一会儿，“我从小是奶奶带大的，可能和这个有关，所以比较喜欢老年人。”</p><p>李医生的丈夫也是医生，目前仍在江西工作，对于妻子的选择，他给予支持。现在，她一个人在杭州，住的地方离医院就2站路，万一病人有个什么事，能赶紧跑过来。</p><p>在她看来，照顾老年人，其实不复杂，保持耐心，懂得倾听，尽量少用药，也要重视心理工作，老人其实就和小孩子一样。李医生很好学，也充满了热情，推拿、按摩的手法，是她自己从书本上学的，再向同行请教。</p><p>“李医生，12楼有人喊你。”一个护士来电。</p><p>“马上来，马上来。”李医生扭头和记者说，“我得先忙了，哎呀，真是没啥好写的，我本身也没啥技术，能帮老人家解决个小问题，就很高兴了。”</p><p>如何和老人有效沟通，李医生总结7点，值得晚辈看看</p><p>1.笑容很重要，见面笑着打招呼，叫声“叔叔阿姨”，就等于给老年人吃了口糖。</p><p>2.一些老年人听力不好，或者戴着助听器，那就对着他们耳朵说话，尽量提高音量。“大声说”看似不礼貌，但对老年人来说，这可比“不说话”有亲近感、融入感。</p><p>3.碎碎念是很多老人的共同点，别嫌烦，这是他们刷存在感、渴求关注的一种方式。此时，保持耐心、对话时有眼神交流、集中注意力是三大法宝。想改变老人某些固执的观点，在这三大法宝的基础上，找对时间点和话题劝一劝，绝对事半功倍。</p><p>4.尽量多见面，一回生、二回熟，天天见面自然是朋友。李医生要求自己，每天都要在12楼、13楼的老年人前“刷脸”，混个脸熟。</p><p>5.任何感情的加深，都要“催化剂”。在家里，或是医院里，老人遇到一些小毛小病，反应速度一定要快。举个例子，医院一个90岁的大爷出了名地固执，一次不小心烫伤脚，李医生第一时间为他包扎，天天主动来换药，大爷此后再也不好意思给她脸色看。</p><p>6.注意识别老人的情绪变化。在医院里，老人睡在床上不起来、不肯吃饭、不愿意出房间门，很可能是他们感到孤独了，需要及时的安慰。</p><p>7.老人就像小孩，哄一哄，情绪就好了。李医生总结，哄人最有效的三句话：1.你把我当成你的女儿，有啥事和我说;2.想吃什么，食堂没有的，我给你去买;3.头痛吗，我给你按按太阳穴。</p><p>在李医生看来，说到底，相比良好的物质条件，老年人更渴望陪伴，去丰富相对寂寞、孤单的晚年生活。晚辈时常回家，足够让他们高兴上好一阵。</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572407068460181.jpg', '1', 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(8, 9, 7, '看到拼多多上的助听器，我都惊呆了！', '<p>2年前，拼多多还是“一亿人都在用的APP”，到了2018年，已经演变成3亿人都在“拼多多”了</p><p><img alt=\"助听器知识\" src=\"/upload/image/20191030/1572407000214728.jpg\" width=\"700\" height=\"212\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p>因为一直都用某东和某猫</p><p>我其实不太清楚拼多多的商品究竟怎样</p><p>带着好奇心下载了APP</p><p>搜索 “助听器” ，结果让我彻底惊呆了……</p><p><img alt=\"助听器知识\" src=\"/upload/image/20191030/1572407000949281.jpg\" width=\"700\" height=\"591\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p><img alt=\"助听器知识\" src=\"/upload/image/20191030/1572407000338186.jpg\" width=\"712\" height=\"1056\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p>这个世上居然会有</p><p>只需32元的助听器!!!</p><p>而且5年质保，能无线充电</p><p>全场包邮，7天退换</p><p>……</p><p><img alt=\"助听器知识\" src=\"/upload/image/20191030/1572407001845574.gif\" width=\"284\" height=\"268\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p>价格低、作用弱的助听器不是没见过</p><p>但这类基本上也要几百元</p><p>在拼多多居然能用</p><p>一两排电池的价格，来买一台助听器???</p><p>我再认真看了下</p><p>“没错，写的是助听器，不是配件”</p><p><img alt=\"助听器知识\" src=\"/upload/image/20191030/1572407001412976.jpg\" width=\"612\" height=\"727\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p>所谓存在即是合理</p><p>我认真看了一下这些几十元的助听器</p><p>发现了不少好玩的地方</p><p><img alt=\"助听器知识\" src=\"/upload/image/20191030/1572407002908271.jpg\" width=\"620\" height=\"900\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p>隐形助听器，即使不是 IIC</p><p>最起码也要达到 CIC 的标准吧</p><p>这种耳背机居然定义为“隐形助听器”</p><p>有点太玄幻了哦</p><p><img alt=\"助听器知识\" src=\"/upload/image/20191030/1572407002139922.jpg\" width=\"460\" height=\"584\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p>这些助听器都在避免一些词汇</p><p>通道、频段、定位、反馈</p><p>智能、防水防尘……</p><p>这些重要的参数，竟然一个都没有看到</p><p>这些几十块钱的助听器</p><p>基本就只有 声音放大 的功能</p><p>噪音多、不舒适，没什么实际用处</p><p>甚至可能会让听损变得更严重</p><p>这绝不是危言耸听</p><p>不信的话，您可以找个听力专家/医生问问!</p><p><img alt=\"助听器知识\" src=\"/upload/image/20191030/1572407002552485.jpg\" width=\"700\" height=\"438\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p>而一台用得好的助听器</p><p>需要专业验配过</p><p>否则很难真正适合用户的听损情况</p><p>可以想象得出</p><p>95%以上戴过拼多多这类助听器的用户</p><p>都会很快把助听器锁进抽屉</p><p>再也不用了!</p><p>还会误导人们对正规助听器的认知!</p><p>助听器更专业详细知识可以点击查看这里：<a href=\"http://www.etimbre.cc/Mo_index_gci_4.html\" target=\"_blank\">助听器知识</a></p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '', '0', 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(9, 9, 8, '用户佩戴助听器后的感受：生活品质得到改善', '<p>美国一份面向1500位助听器使用者展开的研究结果表明：</p><p>93%的受访者的生活品质都因使用助听器而得到了改善。具体体现在下列方面：</p><p>1.有效的沟通</p><p>2.社会生活</p><p>3.参加团体活动的能力</p><p>4.亲属关系</p><p>92%的受访者表示，他们很满意听力保健专业人士为他们推荐和调试的助听器设备。</p><p><img src=\"/upload/image/20191030/1572407021309613.jpg\" title=\"佩戴助听器后的感受\" alt=\"佩戴助听器后的感受\" width=\"621\" height=\"932\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: 932px; width: 621px;\"/></p><center><br style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important;\"/></center><p>助听器为专业医疗器械，须由专业验配师或听力保健人士为用户进行选配。现今先进的助听器大多还须使用专业的验配软件进行调试。因此，丹麦瑞声达友情提醒，请前往正规的、拥有助听器厂家授权的专业听力机构选配助听器。</p><p>研究结果还表明，助听器使人们在工作中的情绪、自信心和人际关系同样得到了改善。</p><p><br style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important;\"/></p><p>受访者对他们助听器的合适和舒适程度、音质的清晰程度，以及在进行少人谈话中的听力能力都表示相当满意。</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '', '0', 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(10, 9, 9, '她们虽然听不见花开的声音，但是生活一样过得很美', '<p>“从不幸的谷底到艺术的巅峰，也许你的生命本身就是一次绝美的舞蹈，于无声处，展现生命的蓬勃，在手臂间勾勒人性的高洁，一个朴素女子为我们呈现华丽的奇迹，心灵的震撼不需要语言，你在我们眼中是最美。”<br/></p><center><img alt=\"\" src=\"/upload/image/20191030/1572407044198333.jpg\" width=\"200\" height=\"240\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></center><p><br/></p><p>邰丽华</p><p>——2005年《感动中国》给予邰丽华的颁奖词</p><p>邰丽华，1976年11月9日出生于湖北省宜昌市，聋哑人舞蹈家，无党派人士，中国残疾人艺术团团长、舞蹈演员、艺术总监，中国特殊艺术协会副主席，全国青联副主席。</p><p>邰丽华两岁失聪，但她以独特方式创造艺术，15岁成为中国残疾人艺术团的领舞演员;1999年，进入湖北省残疾人联合会艺术团;2002年8月调入北京中国残疾人艺术团，担任演员队队长，同时兼任中国特殊艺术协会副主席;</p><p>28岁成为艺术总监，塑造了特殊艺术经典《我的梦》。她领舞的《千手观音》在2004年雅典残奥会上震撼世界;</p><p>在2005年央视春节联欢晚会上演绎舞蹈“千手观音”，被评为《感动中国》2005年度人物;她创编并主演的精缩舞剧《化蝶》轰动联合国教科文组织总部。</p><p><br style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important;\"/></p><center><img alt=\"\" src=\"/upload/image/20191030/1572407045110595.jpg\" width=\"200\" height=\"150\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></center><p>郭玉良</p><p>郭玉良是一位聋哑女，但却从未放弃对着阳光微笑，积极参加华姐选美，用优雅的手语自我介绍。</p><p>郭玉良失聪并不是先天的，而是由于一岁时候的一场高烧。2009年国际中华小姐竞选内地网络赛区，7名佳丽成功晋级。</p><p>该年1月17日在广东佛山，与来自世界各地的华裔晋级者一起争夺2009年度国际中华小姐冠军宝座。郭玉良是20年来首位闯入决赛的聋哑选手。</p><p><br style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important;\"/></p><center><img alt=\"\" src=\"/upload/image/20191030/1572407045102032.jpg\" width=\"200\" height=\"150\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></center><p>胡晓姝</p><p>“我们聋人跟健听人一样，也有追求，有渴望、有梦想。我们希望有一种自由发挥智慧和能力的环境，希望得到聋人应有的社会地位，跟健听人一样，平等地参与社会生活。我相信，只要给我们一双翅膀，我们一样会飞翔……”</p><p>——胡晓姝</p><p>胡晓姝，女，1983年2月出生，上海人。</p><p>1998年毕业于上海市虹口区聋哑学校;上海市聋哑青年技术学校美术科毕业;</p><p>后考入上海市应用技术学院美术系大专;</p><p>2003年9月就读于奥地利维也纳国立艺术大学;2005年9月起任虹口区聋人协会宣传部虹聋网站驻国外记者。</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '', '0', 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(11, 9, 10, '新交往的男朋友竟戴着助听器，这感情还要继续吗？', '<p>情侣交往的第一条件就是坦诚、信任</p><p>可再交往初期，男友就没有对自己坦诚相待</p><p>这样的感情还要不要继续呢?</p><p>发现男朋友带着助听器后，现在的心情很复杂。这是我们第二次见面，他特意跑过来陪我过周末的，但之前聊过很久，大概的情况都基本了解，之前见过一次，有过短暂的相处。</p><p>第一次见他就觉得他很瘦，我总感觉他小时候或许生过一场大病，而且他的话也不多，有时我说话他也像没听懂一样，就很斯文温和的那种笑笑，我当时以为是他性格太内向，没多想。</p><p>那次接触时，他虽然问过我有没有什么想要问他的，我并没好意思问，想着如果一些比较像收入这样比较隐私的问题，他想说的时候自己就会说。可万万没想到第二次见面吃饭的时候，我看到他耳朵上戴着一个助听器，顿时感到很心塞，也终于明白了他之前听不懂我说话以及平时几乎不打电话，只和我打字聊天的真相，现在不知道这段感情还该怎么继续下去了。</p><center><img alt=\"\" src=\"https://ss2.baidu.com/6ONYsjip0QIZ8tyhnq/it/u=2609728961,3897587122&fm=173&app=25&f=JPEG?w=296&h=283&s=0BA67A2208F1D9B77E9C20890100A0E2\" width=\"296\" height=\"283\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></center><p>网友热评：</p><p>@640345：现在还没有多少感情，放弃比较容易，就看自己能否接受了，我觉得第一次就应该给你讲清楚，他听力的问题</p><p>@一枝梅011：了解下情况呗，我觉得这个事情自己要考虑清楚，觉得不能接受就早点结束，如果程度不深能接受的话，好好斟酌</p><p>@墨烟如画：这种就怕会遗传，记得以前开店的时候，隔壁的儿子就是这样的， 好像小的时候有隐晦，没有发出来，大了严重了，然后去上海看病，好像也是耳力问题，好像也有女朋友，都不敢跟女朋友提，楼主自己考虑好。</p><p>@_老佛爷吉祥_：坦诚的了解一下，只要不是遗传，人品才是最重要的，你找个身体没有缺陷的，心里各种渣，那才是难受</p><p>@阿梅May：建议分手，如果是我，我不能接受吧</p><p>@珍儿106：助听器就跟眼镜是一样的，都是辅助人的一个工具。你会嫌弃戴眼镜的人吗?</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '', '0', 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(12, 9, 11, '扬州护士巧用听诊器给老奶奶当“助听器”，获百万关注', '<p>“一天吃几个呀?”“一天三次，一次两颗!”“哦，一天三次，哦哦……”短短的三句话，15秒。　　今天，一条护士用听诊器当“临时助听器”向一位耳背老奶奶讲解用药方法的抖音视频，在网上热传。截至记者发稿时，已有近93.7万次的点击量，4.1万个赞。　　记者采访了解到，视频发布者“青春不买爱情的帐”是扬州友好医院的工作人员，他本想与医院同事和朋友分享那温馨感人的一刻，没想到会有近百万人次关注、数万人点赞。　　据介绍，这条视频是19日拍摄的，视频中的老奶奶是一位住院老人，今年79岁，用听诊器说话的是护士黄艳，拍摄者是护士蒋梦婷。</p><p><br style=\"text-align: left;\"/></p><center><p><img alt=\"\" src=\"/upload/image/20191030/1572407179840410.png\" width=\"396\" height=\"707\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; border: 0px; vertical-align: middle; display: block; max-width: 100%; word-break: break-all !important; height: 707px; width: 396px;\"/></p></center><p>护士长徐晓云告诉记者，当时老奶奶不知怎么吃药，小黄喊了半天，奶奶也没听清。小黄灵机一动，就把听诊器用上了。一旁的小蒋拍摄后，顺手把视频分享到微信朋友圈里。　　今天，这段视频被友好医院其他工作人员看到，于是做成了一条抖音视频，以网名“青春不买爱情的帐”发送。“青春不买爱情的帐”说，他本来想与同事、朋友分享一下医院护士既机智又暖心的行为，没想到，仅一天的工夫，竟获百万点击量，4.1万个赞。</p><center><p><img alt=\"\" src=\"/upload/image/20191030/1572407180129181.jpg\" width=\"400\" height=\"479\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p></center><p>“看到节节飙升的点击量，我非常激动。”“青春不买爱情的帐”说，“我们对老人一个小小的关爱行为，竟引起网友的强烈反响，可以看出人们对医护人员这个行业的关注。”</p><center><p><img alt=\"\" src=\"/upload/image/20191030/1572407180762437.jpg\" width=\"400\" height=\"487\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p></center><p>除了热情点赞，还有不少网友发表了评论。“给这个职业的工作者点赞，她们真的很伟大，也很不容易。”“最美护士!”“太赞了，真是暖心一幕。”“这个职业工作者不容易，为这个护士姐姐点赞”　。　还有的网友打趣，表示学到了一招：“太有才了，听诊器开发出新用途。”“对，这个可以。心脏不好的听心脏;肺不好了听肺;嗓子不好了，可以当喇叭使;耳朵不好了可以当助听器。”</p><p><br style=\"text-align: left;\"/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '', '1', 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(13, 9, 13, '配助听器不仅可以改善生活品质，还有国家补贴！', '<p>节日千万条，放假第一条！春节假期过完，就盘算着下一个假期，摸着良心说话，你是不是这样子呢?可瞅着下一个小长假还要一个多月之久。</p><p>其实，一年之中节日千千万，每天都可以自己找乐啊！</p><p>而我们的耳朵也有一个节日——每年的3月3日是全国“爱耳日”，今年爱耳日的宣传主题为——“关爱听力健康,落实国家救助制度”。</p><p><img src=\"/upload/image/20191030/1572407202404929.jpg\" title=\"1551321345112829.jpg\" alt=\"640-2.jpg\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: auto !important;\"/></p><p>或许你还不知道，国家为听力损失的患者也出台了很多补助政策，佩戴助听器的用户，可以申请一笔补助。</p><p>补助的主要内容包括</p><p>配助听器，最高可享受2000元国家补贴。</p><p>*以上政策参考《福建省残疾人精准康复服务行动实施方案(2016-2020年)》，详细政策说明请咨询当地残联或艾声各门店工作人员。</p><p>那么，该怎么申请呢?有什么条件呢?</p><p>1、在医院进行听力检查，由医院开具听损证明；</p><p>2、到所在地区残联办理残疾证；</p><p>3、补助申请材料办理、提交；</p><p>4、选配助听器，开具发票，享受残联补助。</p><p>别着急，艾声一站式服务帮助您！</p><p>艾声为您提供一站式贴心服务！凡在艾声听力连锁验配助听器的用户，从听力检查到助残补贴的申领，艾声将全程免费协助办理。</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '', '1', 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(14, 9, 14, '暖心！女孩用奖学金买助听器送爷爷作年礼', '<p>湖南省岳阳市汨罗市弼时镇的一个小村子里，一名十九岁的女孩骑着自行车，冒着冷风赶往镇上。“给爷爷买的助听器终于到了，我要马上拿回来给爷爷试试!”</p><center><img alt=\"使用助听器\" src=\"/upload/image/20191030/1572407227642464.jpg\" width=\"600\" height=\"800\" title=\"使用助听器\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 20px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; display: block; max-width: 100%; height: 800px; width: 600px;\"/></center><p>徐玉洁教爷爷使用助听器。本人提供</p><p>这名女孩是现就读于扬州大学生物科学与技术学院的大二学生徐玉洁。从学校回来没多久，她就从网上买了一个质量比较好的助听器，想送给爷爷，让爷爷能重新听到大家的声音，“我爷爷80多岁了，平时除了和街坊邻居聊聊天，就没什么事可以干了。可是爷爷耳朵听不太清楚，和人聊天需要别人说得很大声，渐渐地，大家都不愿和他聊天，爷爷也变得越来越沉默了。”徐玉洁说，爷爷本来很健康，听力也好。但几年前的一场意外车祸，导致耳廓几乎完全断裂，也就基本上听不见了。</p><p>记者采访了解到，进入大学后，徐玉洁就一直想给爷爷买一个助听器。“也是为了让我自己放心一点，我外出上大学，好多次给他打电话，他都接不到，总是很担心他。”徐玉洁说：“我是学生，没有什么经济来源，平时生活费也仅仅够自己吃饭，所以我便打定主意努力学习，想用奖学金实现愿望，想通过自己的努力，把我对他的爱说给他听!”</p><p>大一这一年，徐玉洁非常努力。室友韩雨萱说：“她在宿舍也经常看书，我们有不懂的，一般都是她帮我们解决的。”学业上的努力让她得偿所愿，大二刚开始便拿到了国家励志奖学金。“奖学金到账的时候，我便压抑不住内心的激动，想给爷爷在网上买一个助听器，但想到家里没有大人，爷爷腿脚也不方便去镇上拿快递，还是等到放寒假我回家了，才在网上下的单。”</p><p>由于徐玉洁家所在的高燕村极其偏僻，物流非常缓慢，更不可能送货上门，所以虽然她一回家就在网上下单了，快递却硬生生拖到年关才到，“我怕年前助听器到不了，那过年期间爷爷也不能同亲戚朋友好好聊天了，还好，还是在过年前到了。”</p><p>但让她委屈的是，当她拿着助听器送给爷爷时，得到的反而是爷爷的责怪，“小孩子浪费什么钱，也不怕被人骗了，你快去把东西退了!”虽然委屈，徐玉洁还是耐心地给爷爷戴上了助听器，大声地教爷爷使用方法，“爷爷，你把这个开关打开，就可以听到我的声音了，听得见吗?”</p><p>随着一段“嘶嘶”的电流声过后，徐玉洁明显感觉爷爷那双无神的眼睛亮了，“咦，洁伢子，我听得到你的声音了，这个东西真神奇呀!”看到爷爷沧桑的脸上流露出的笑容，徐玉洁也开心地笑了。</p><p>徐玉洁的伯父说，洁伢子从小父母离异，父亲外出打工，是爷爷奶奶把她养大的，所以她平时对爷爷奶奶最好。这孩子成绩好，又有孝心，真是个好孩子。</p><p>采访中，扬州大学生科院团委副书记蒋越星老师说：“徐玉洁同学不忘爷爷养育恩情，将自己的奖学金用来回报爷爷，这份年礼好温暖，好厚重，我要为她的孝心点个大大的赞!”</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '', '0', 0, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(15, 5, 15, '峰力锂航系列', '<p><span style=\"color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun;\">12可调通道</span></p><p>智能控制</p><p>特级变焦方向性（超值版）</p><p>智能音量</p><p>高精度降噪（12通道）</p><p>真耳重塑</p><p>双耳电话</p><p>双轨高频重塑</p><p>反馈阻断</p><p>耳鸣管理器</p><p>渐进聚焦</p><p>一键式双耳同步<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/></p><p><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>套装价格（配<span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒</span>）：17800元<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>&nbsp;</p><p><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">多种充电模式：</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒（微版耳背机专用）零售价：2900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">储电能量块零售价：1100元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">迷你充电器（微版耳背机专用）零售价：1900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">*锂航系列为充电型助听器，需搭配充电器，3合1充电盒和迷你充电器必选其中一个。储电能量块需配合3合1充电盒使用。</span></p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408214142693.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHONAK AUDEO B-R'),
(18, 5, 18, '峰力美人鱼大功率助听器', '<p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">8可调通道</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">双轨高频重塑</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">特级变焦方向性（基本版）</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">反馈阻断</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">高精度降噪（8通道）</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">耳鸣管理器</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">渐进聚焦</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">一键式双耳同步</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\"><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/></p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">全时声感追踪系统：</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">安静环境</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">噪声言语混合环境</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408474181292.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHONAK NAIDA V'),
(16, 5, 16, '全新峰力奥笛系列', '<p><span style=\"color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun;\">12可调通道</span></p><p>智能控制</p><p>特级变焦方向性（超值版）</p><p>智能音量</p><p>高精度降噪（12通道）</p><p>真耳重塑</p><p>双耳电话</p><p>双轨高频重塑</p><p>反馈阻断</p><p>耳鸣管理器</p><p>渐进聚焦</p><p>一键式双耳同步<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/></p><p><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>套装价格（配<span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒</span>）：17800元<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>&nbsp;</p><p><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">多种充电模式：</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒（微版耳背机专用）零售价：2900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">储电能量块零售价：1100元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">迷你充电器（微版耳背机专用）零售价：1900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">*锂航系列为充电型助听器，需搭配充电器，3合1充电盒和迷你充电器必选其中一个。储电能量块需配合3合1充电盒使用。</span></p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408339131694.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHONAK AUDEO B'),
(17, 5, 17, '峰力奥笛·威助助听器', '<p><span style=\"color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun;\">12可调通道</span></p><p>智能控制</p><p>特级变焦方向性（超值版）</p><p>智能音量</p><p>高精度降噪（12通道）</p><p>真耳重塑</p><p>双耳电话</p><p>双轨高频重塑</p><p>反馈阻断</p><p>耳鸣管理器</p><p>渐进聚焦</p><p>一键式双耳同步<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/></p><p><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>套装价格（配<span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒</span>）：17800元<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>&nbsp;</p><p><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">多种充电模式：</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒（微版耳背机专用）零售价：2900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">储电能量块零售价：1100元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">迷你充电器（微版耳背机专用）零售价：1900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">*锂航系列为充电型助听器，需搭配充电器，3合1充电盒和迷你充电器必选其中一个。储电能量块需配合3合1充电盒使用。</span></p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408387111805.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHONAK AUDEO V'),
(19, 5, 19, '峰力美人鱼大功率助听器', '<p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">8可调通道</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">双轨高频重塑</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">特级变焦方向性（基本版）</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">反馈阻断</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">高精度降噪（8通道）</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">耳鸣管理器</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">渐进聚焦</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">一键式双耳同步</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\"><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/></p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">全时声感追踪系统：</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">安静环境</p><p style=\"overflow-wrap: break-word; box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun; white-space: normal;\">噪声言语混合环境</p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408474181292.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHONAK NAIDA V'),
(20, 5, 20, '峰力奥笛·威助助听器', '<p><span style=\"color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun;\">12可调通道</span></p><p>智能控制</p><p>特级变焦方向性（超值版）</p><p>智能音量</p><p>高精度降噪（12通道）</p><p>真耳重塑</p><p>双耳电话</p><p>双轨高频重塑</p><p>反馈阻断</p><p>耳鸣管理器</p><p>渐进聚焦</p><p>一键式双耳同步<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/></p><p><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>套装价格（配<span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒</span>）：17800元<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>&nbsp;</p><p><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">多种充电模式：</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒（微版耳背机专用）零售价：2900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">储电能量块零售价：1100元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">迷你充电器（微版耳背机专用）零售价：1900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">*锂航系列为充电型助听器，需搭配充电器，3合1充电盒和迷你充电器必选其中一个。储电能量块需配合3合1充电盒使用。</span></p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408387111805.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHONAK AUDEO V'),
(21, 5, 21, '全新峰力奥笛系列', '<p><span style=\"color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun;\">12可调通道</span></p><p>智能控制</p><p>特级变焦方向性（超值版）</p><p>智能音量</p><p>高精度降噪（12通道）</p><p>真耳重塑</p><p>双耳电话</p><p>双轨高频重塑</p><p>反馈阻断</p><p>耳鸣管理器</p><p>渐进聚焦</p><p>一键式双耳同步<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/></p><p><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>套装价格（配<span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒</span>）：17800元<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>&nbsp;</p><p><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">多种充电模式：</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒（微版耳背机专用）零售价：2900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">储电能量块零售价：1100元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">迷你充电器（微版耳背机专用）零售价：1900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">*锂航系列为充电型助听器，需搭配充电器，3合1充电盒和迷你充电器必选其中一个。储电能量块需配合3合1充电盒使用。</span></p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408339131694.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHONAK AUDEO B'),
(22, 5, 22, '峰力锂航系列', '<p><span style=\"color: rgb(51, 51, 51); font-family: 宋体, &quot;Microsoft YaHei&quot;, Tahoma, Verdana, Simsun;\">12可调通道</span></p><p>智能控制</p><p>特级变焦方向性（超值版）</p><p>智能音量</p><p>高精度降噪（12通道）</p><p>真耳重塑</p><p>双耳电话</p><p>双轨高频重塑</p><p>反馈阻断</p><p>耳鸣管理器</p><p>渐进聚焦</p><p>一键式双耳同步<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/></p><p><br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>套装价格（配<span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒</span>）：17800元<br style=\"overflow-wrap: break-word; box-sizing: border-box;\"/>&nbsp;</p><p><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">多种充电模式：</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">3合一充电盒（微版耳背机专用）零售价：2900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">储电能量块零售价：1100元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">迷你充电器（微版耳背机专用）零售价：1900元</span><br style=\"overflow-wrap: break-word; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: 宋体;\"/><span style=\"overflow-wrap: break-word; box-sizing: border-box; color: rgb(0, 0, 0); font-family: 宋体;\">*锂航系列为充电型助听器，需搭配充电器，3合1充电盒和迷你充电器必选其中一个。储电能量块需配合3合1充电盒使用。</span></p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408214142693.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PHONAK AUDEO B-R');
INSERT INTO `tb_news` (`id`, `sort`, `serialnum`, `title`, `content`, `isdelete`, `author`, `istime`, `source`, `times`, `thedes`, `picture`, `isgood`, `isseo`, `thekey`, `describ`, `issh`, `url`, `picture2`, `teaminfo`, `dizhi`, `tels`, `marker`) VALUES
(23, 6, 23, 'ME-700数字辅听器', '<p>选择ME-700数字辅听器的理由</p><p>■ 机身小巧轻便、美观易操作。</p><p>■ 可轻松听音乐、看电视、听讲座。</p><p>■ 无线传输，有效传输距离可达10米。</p><p>■ 锂电池充电，节省购买电池的费用。</p><p><img src=\"/upload/image/20191030/1572408720477652.jpg\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 10px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important;\"/></p><p>ME-700是一款具有无线传输功能的全数字辅听器。既可聆听远距离的语 音对话，又可接收远距离的电视音频信息。让使用者既可轻松聆听近距离的 对话，又可轻松聆听远距离的会议、上课、看电视等。</p><p>ME-700主机为独立数字声音放大器。另配置黑色无线麦克风，可接收声音 信号及音频信息，并利用内置无线技术，将声音信息传输到主机。</p><p><img src=\"/upload/image/20191030/1572408721138734.jpg\" alt=\"\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 10px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; line-height: 25px; width: 1079.22px;\"/></p><p>ME-700使用人群有哪些？</p><p>ME-700 针对不同的环境噪声及听力需求而设计。社交活动频繁或者生活环境多元化的人群，一旦发现自己听力下降，在与他人交流的过程中，经常需要对方重复语句时，为了避免造成他人的麻烦，他们会逐渐减少出门次数， 从而影响原来的社交活动。</p><p>ME-700可降低环境噪音，并对您想要听到的声音信号集中放大。您可带着它到教室、会议室甚至其他环境噪音较大的地方使用，有了它的帮助，您可以轻松地在吵杂的环境中与他人交流。</p><p>无线麦克风独特的背夹设计，让说话者可便利地夹在衣服上。当您戴上白色主机后，就可以接收来自无线麦克风的声音，您也可以将无线麦克风接上电视或手机上，再利用白色主机接收及扩大声音。</p><p>有了，您将会发现享受声音是如此简单的事。</p><p>如果您尚未使用过我们的产品，建议您体验看看，相信会给您带来极大的帮助。</p><p>看护人员也可使用ME-700与听力不好的人沟通</p><p>我们也推荐居家看护人员、社会机构等福利单位使用。说话者可将无线麦克风放置在靠近嘴巴的位置，让听损人士戴ME-700主机，借ME-700主机的收音与扩音功能，说话者不再需要大声讲话，就能与对方轻松地沟通。</p><p>◎ 无线连接 不断线</p><p>无线麦克风可直接连接电视或MP3音乐播放器，利用主机放大，收听声音时音质不受周围干扰。</p><p>◎ 不受干扰又安全</p><p>2台装置有固定的无线配对码，不受周围无线装置干扰，您的对话亦不会被周围有心人士拦截。</p><p>◎ 快速连接</p><p>当您打开ME-700后，两台装置会自动配对连接。不需要繁锁的手动设定或搜索配对。</p><p>◎ 远距离传输</p><p>即使在吵杂的环境ME-700仍可将清晰的声音无线传输到10米远实际传输距离，依使用环境而定)。</p><p><img src=\"/upload/image/20191030/1572408722312066.jpg\" alt=\"\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 10px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; line-height: 25px; width: 1079.22px;\"/><img src=\"/upload/image/20191030/1572408722136664.jpg\" alt=\"\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 10px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; line-height: 25px; width: 1079.22px;\"/></p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408704659332.png', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ME-700'),
(24, 6, 24, 'ME200P数字辅听器', '<p>选用ME200P的理由</p><p>如同视力不好需要配戴老花眼镜一样，当您听不清楚对方说话时，随时可轻松地戴上ME-200P，辅助您更轻松自由变得更自在、温馨、幸福。</p><p>ME-200P的操作非常简单，仅需根据需要轻触4个不同的按键，即可轻松调节音量、电源开关以及模式的选择，非常适合中老年人	使用。其中模式选择设计了两种聆听环境，让您在吵杂的环境中也能自由聆听。</p><p>根据调查，有的人比较喜欢低沉、饱满的音质，有的人却喜欢清脆、响亮的音质。在ME-200P的模式内建立了种不同的音质，充分满足了不同人群对音质的喜好与需求。</p><p><img src=\"/upload/image/20191030/1572408773108315.jpg\" alt=\"\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; font-size: 14px; line-height: 25px; width: 1079.22px;\"/><img src=\"/upload/image/20191030/1572408774123023.jpg\" alt=\"\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; font-size: 14px; line-height: 25px; width: 1079.22px;\"/></p><p><img src=\"/upload/image/20191030/1572408775133785.jpg\" alt=\"\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 0px; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; font-size: 14px; line-height: 25px; width: 1079.22px;\"/></p><p><br/></p>', 0, '管理员', '2019-10-30', NULL, NULL, '', '/upload/image/20191030/1572408784192954.png', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ME200P'),
(25, 1, 25, '关于我们', '<p style=\"white-space: normal;\">百聪声商贸有限公司(简称百聪声)是目前青海省听力连锁规模大、经验丰富、网络全面、设备先进、服务项目齐全的专业听力服务机构，</p><p style=\"white-space: normal;\">提供个性化的全面听力解决方案，是青海省听力连锁行业的引领者。(西宁 市助听器验配服务中心为旗下连锁机构)</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">1999年5月，百聪声创始人在西宁市创立了助听器验配服务专营中心，开创了青海省听力连锁行业的主流模式。</p><p style=\"white-space: normal;\">百聪声声多年来一直致力于将欧美 先进的高科技助听设备和专业技术引入青海，不断提升听力行业的专业及服务水准，</p><p style=\"white-space: normal;\">是听力连锁行业持续创新的领航者，20年来， 为240000余弱听人土提供免费听力检测及验配服务。</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">百聪声目前在西宁建立3家助听器验配服务中心(经营世界著 名品牌助听器)，其中1 家高端助听器旗舰中心，</p><p style=\"white-space: normal;\">专业验配师团队为广大听障人士提供专业的听力学检测，国际标准的验配服务，可信赖的售后服务。</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">百聪声通过专业品牌的战略合作，引进了先进水平的听力检测设备和言语评估系统，提供听力诊断、助听器验配、耳聋耳鸣咨询、</p><p style=\"white-space: normal;\">效果评估及言听康复服务，为全省弱听人士提供一站式全 面听力解决方案。</p><p><br/></p>', 0, NULL, NULL, NULL, NULL, '', '/upload/image/20191030/1572408836545384.jpg', NULL, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 15, 26, '互助巷医院店（20年老店）', '<p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; text-align: justify; white-space: normal; box-sizing: border-box; transition: all 0.6s ease 0s; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; background-color: rgb(255, 255, 255); word-break: break-all !important;\">为了给更多听力有损人员提供更优质、便捷的服务，艾声助听器进驻北京诚和敬驿站，服务地址位于北京东城区天坛公园南门。听力康复中心设有智慧体验区，设备先进齐全，可为听力有损人员进行专业的听力检测、咨询及康复指导，制定满意的听力康复解决方案。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; text-align: justify; white-space: normal; box-sizing: border-box; transition: all 0.6s ease 0s; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; background-color: rgb(255, 255, 255); word-break: break-all !important;\">艾声北京助听器北京诚和敬天坛驿站听力康复中心将继续开拓创新，锐意进取，致力于让每一位用户都能在轻松舒适的体验中，得到更加准确化、精细化的服务！</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; white-space: normal; box-sizing: border-box; transition: all 0.6s ease 0s; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; background-color: rgb(255, 255, 255); text-align: center; word-break: break-all !important;\"><img src=\"http://localhost/upload/image/20191028/1572250931900999.jpg\" title=\"艾声助听器北京诚和敬天坛驿站听力康复中心\" width=\"1000\" height=\"562\" alt=\"艾声助听器北京诚和敬天坛驿站听力康复中心\" data-bd-imgshare-binded=\"1\" style=\"border: 0px; width: 700px; height: auto; box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 10px auto; outline: none; vertical-align: middle; max-width: 100%; word-break: break-all !important;\"/></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; white-space: normal; box-sizing: border-box; transition: all 0.6s ease 0s; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; background-color: rgb(255, 255, 255); text-align: center; word-break: break-all !important;\"><img src=\"http://localhost/upload/image/20191028/1572250932422399.jpg\" title=\"艾声助听器北京诚和敬天坛驿站听力康复中心\" width=\"1000\" height=\"562\" alt=\"艾声助听器北京诚和敬天坛驿站听力康复中心\" data-bd-imgshare-binded=\"1\" style=\"border: 0px; width: 700px; height: auto; box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 10px auto; outline: none; vertical-align: middle; max-width: 100%; word-break: break-all !important;\"/></p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; text-align: justify; white-space: normal; box-sizing: border-box; transition: all 0.6s ease 0s; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; background-color: rgb(255, 255, 255); word-break: break-all !important;\">艾声北京助听器北京诚和敬天坛驿站听力康复中心隶属艾声助听器旗下，位于北京东城区永内东街东里12号楼2层。艾声是一家专业从事助听器研发、生产、验配与服务的高新技术企业，多年来为众多听障用户提供了优质的产品与服务，公司的产品与服务经国际医疗器械质量管理体系严格认证。并在福建、江西、广东、安徽、浙江、湖北、四川、湖南、河南、山东、河北、江苏、海南、陕西、北京等省、直辖市开设了专业的连锁听力服务中心，多年的优质服务，让我们赢得了广大听障者的信任与赞扬，取得了较高的社会效益。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; text-align: justify; white-space: normal; box-sizing: border-box; transition: all 0.6s ease 0s; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; background-color: rgb(255, 255, 255); word-break: break-all !important;\">自2015年以来，艾声相继在福建、江西、广东、安徽、浙江、湖北、四川、湖南、河南、山东、河北、江苏等地成立了艾声国际听力中心，中心配备了纯音测听（AC/BC/FF）、行为测听、声导抗、耳声发射、言语识别测试、真耳分析、Chirp-ABR-AC/BC/FF（客观分频听觉脑干诱发电位气导/骨导/声场—评估系统）等专业听力检测设备。惠耳国际听力中心任职的听力师多为听力学专业毕业或持有国家级验配师资格证的优秀人才，在听力检测、助听器验配、人工耳蜗及耳聋基因咨询等方面有着丰富的实践经验。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; text-align: justify; white-space: normal; box-sizing: border-box; transition: all 0.6s ease 0s; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; background-color: rgb(255, 255, 255); word-break: break-all !important;\">北京助听器验配首选艾声，艾声将一如既往地为广大用户提供专业优质的服务，为听力行业的发展做更大的贡献。</p><p><br/></p>', 0, '管理员', NULL, NULL, NULL, '', '/upload/image/20191030/1572409068627919.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, '青海省西宁市城中区解放路26-1号（互助巷+解放路交叉十字）', '0971-8216385', NULL),
(27, 15, 27, '北京诚和敬天坛驿站听力康复中心', '<p style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin-top: 0px; margin-bottom: 25px; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255); text-align: justify; word-break: break-all !important;\">为了给更多听力有损人员提供更优质、便捷的服务，艾声助听器进驻北京诚和敬驿站，服务地址位于北京东城区天坛公园南门。听力康复中心设有智慧体验区，设备先进齐全，可为听力有损人员进行专业的听力检测、咨询及康复指导，制定满意的听力康复解决方案。</p><p style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin-top: 0px; margin-bottom: 25px; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255); text-align: justify; word-break: break-all !important;\">艾声北京助听器北京诚和敬天坛驿站听力康复中心将继续开拓创新，锐意进取，致力于让每一位用户都能在轻松舒适的体验中，得到更加准确化、精细化的服务！</p><p style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin-top: 0px; margin-bottom: 25px; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255); text-align: center; word-break: break-all !important;\"><img src=\"/upload/image/20191030/1572409138695996.jpg\" title=\"艾声助听器北京诚和敬天坛驿站听力康复中心\" width=\"1000\" height=\"562\" alt=\"艾声助听器北京诚和敬天坛驿站听力康复中心\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 10px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; max-width: 100%; height: 562px; width: 1000px;\"/></p><p style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin-top: 0px; margin-bottom: 25px; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255); text-align: center; word-break: break-all !important;\"><img src=\"/upload/image/20191030/1572409138822294.jpg\" title=\"艾声助听器北京诚和敬天坛驿站听力康复中心\" width=\"1000\" height=\"562\" alt=\"艾声助听器北京诚和敬天坛驿站听力康复中心\" data-bd-imgshare-binded=\"1\" style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin: 10px auto; outline: none; word-break: break-all !important; border: 0px; vertical-align: middle; max-width: 100%; height: 562px; width: 1000px;\"/></p><p style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin-top: 0px; margin-bottom: 25px; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255); word-break: break-all !important;\">艾声北京助听器北京诚和敬天坛驿站听力康复中心隶属艾声助听器旗下，位于北京东城区永内东街东里12号楼2层。艾声是一家专业从事助听器研发、生产、验配与服务的高新技术企业，多年来为众多听障用户提供了优质的产品与服务，公司的产品与服务经国际医疗器械质量管理体系严格认证。并在福建、江西、广东、安徽、浙江、湖北、四川、湖南、河南、山东、河北、江苏、海南、陕西、北京等省、直辖市开设了专业的连锁听力服务中心，多年的优质服务，让我们赢得了广大听障者的信任与赞扬，取得了较高的社会效益。</p><p style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin-top: 0px; margin-bottom: 25px; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255); word-break: break-all !important;\">自2015年以来，艾声相继在福建、江西、广东、安徽、浙江、湖北、四川、湖南、河南、山东、河北、江苏等地成立了艾声国际听力中心，中心配备了纯音测听（AC/BC/FF）、行为测听、声导抗、耳声发射、言语识别测试、真耳分析、Chirp-ABR-AC/BC/FF（客观分频听觉脑干诱发电位气导/骨导/声场—评估系统）等专业听力检测设备。惠耳国际听力中心任职的听力师多为听力学专业毕业或持有国家级验配师资格证的优秀人才，在听力检测、助听器验配、人工耳蜗及耳聋基因咨询等方面有着丰富的实践经验。</p><p style=\"box-sizing: border-box; transition: all 0.6s ease 0s; padding: 0px; margin-top: 0px; margin-bottom: 25px; outline: none; color: rgb(102, 102, 102); line-height: 25px; font-size: 15px; font-family: Arial, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255); word-break: break-all !important;\">北京助听器验配首选艾声，艾声将一如既往地为广大用户提供专业优质的服务，为听力行业的发展做更大的贡献。</p><p><br/></p>', 0, '管理员', NULL, NULL, NULL, '', '/upload/image/20191030/1572409158118053.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, '北京东城区永内东街东里12号楼2层听力服务室', '010-88332993或010-67012660', NULL),
(28, 15, 28, '西宁市助听器验配服务中心', '<p><span style=\"color: rgb(0, 176, 80); font-size: 18px;\"><strong>西宁市助听器验配服务中心</strong></span></p><p><br/></p><p>百聪声商贸有限公司(简称百聪声)是目前青海省听力连锁规模大、经验丰富、网络全面、设备先进、服务项目齐全的专业听力服务机构，</p><p>提供个性化的全面听力解决方案，是青海省听力连锁行业的引领者。(西宁 市助听器验配服务中心为旗下连锁机构)</p><p><br/></p><p>1999年5月，百聪声创始人在西宁市创立了助听器验配服务专营中心，开创了青海省听力连锁行业的主流模式。</p><p>百聪声声多年来一直致力于将欧美 先进的高科技助听设备和专业技术引入青海，不断提升听力行业的专业及服务水准，</p><p>是听力连锁行业持续创新的领航者，20年来， 为240000余弱听人土提供免费听力检测及验配服务。</p><p><br/></p><p>百聪声目前在西宁建立3家助听器验配服务中心(经营世界著 名品牌助听器)，其中1 家高端助听器旗舰中心，</p><p>专业验配师团队为广大听障人士提供专业的听力学检测，国际标准的验配服务，可信赖的售后服务。</p><p><br/></p><p>百聪声通过专业品牌的战略合作，引进了先进水平的听力检测设备和言语评估系统，提供听力诊断、助听器验配、耳聋耳鸣咨询、</p><p>效果评估及言听康复服务，为全省弱听人士提供一站式全 面听力解决方案。</p><p><img src=\"/upload/image/20191030/1572409227138687.jpg\" title=\"1572409227138687.jpg\" alt=\"sz.jpg\"/></p>', 0, '管理员', NULL, NULL, NULL, '', '/upload/image/20191030/1572409236100539.jpg', '1', 0, '', NULL, NULL, NULL, NULL, NULL, '厦门市思明区嘉禾路329号太平洋广场北楼4层38-39号', '0971-88888888', NULL),
(29, 14, 29, '国家四级验配师', '<p>毕业于浙江中医药大学，听力与言语康复学专业。国家四级验配师，艾声听力连锁特约专家。致力于听力学及言语康复学研究，专业从事助听器验配、验配培训工作及技术支持工作，拥有扎实的理论基础及实践经验。熟悉各种听力检测手段的操作及结果评估，擅长各类听力障碍患者的助听器选配及调试，根据用户听力情况和助听器性能，制定针对性的听力补偿方案。多次应邀参加欧仕达、艾声专家组赴全国各地评估检查听障患者康复、指导新品培训工作。</p>', 0, '彭惠环', NULL, NULL, NULL, '', '/upload/image/20191030/1572409593784942.jpg', '1', 0, '', NULL, NULL, NULL, '/upload/image/20191030/1572409600770268.jpg', '国家四级验配师，艾声听力连锁特约专家', NULL, NULL, NULL),
(30, 14, 30, '国家四级助听器验配师', '<p>2011年至今，一直从事助听器一线验配工作，深悉各大品牌助听器的性能特点，多次参加厂家及行业机构组织的各种专业交流 ，积累了丰富的实践经验。2015年参加欧仕达验配师技能竞赛，获得团队冠军，个人亚军的佳绩。因贴心细致的服务和精湛的验配技术多次收到用户锦旗感谢。</p>', 0, '李朝东', NULL, NULL, NULL, '', '/upload/image/20191030/1572409726115127.jpg', '1', 0, '', NULL, NULL, NULL, '/upload/image/20191030/1572409719654083.jpg', '国家四级助听器验配师，具有十年以上的助听器验配经验', NULL, NULL, NULL),
(31, 14, 31, '国家三级（高级）验配师', '<p>国家三级（高级）验配师；</p><p>国家一级企业培训师；</p><p>河北职业鉴定中心国家四级验配师授课特邀讲师；</p><p>艾声听力连锁中心特约专家；</p><p>1998年6月毕业于郑州大学。吴松林老师是听力康复及言语康复训练方面的专家，拥有深厚的理论基础及实践经验，多次参加丹麦、瑞士等知名品牌助听器公司的培训。2004年参加武汉大学“全国听力检测技术学习班”；2007年成为全国助听器与人工耳蜗委员会会员并发表报告。</p><p>多年来，致力于各类听障患者听力疑难问题的研究与治疗。擅长全年龄段助听器精准验配、听力康复指导及言语康复训练。建立了针对听损患者的听力学评估、听力损失诊断、听力补偿等一系列评估体系。多次受到用户来信表扬，是国内用户口碑相传的卓越验配师。现任欧仕达听力科技（厦门）有限公司市场部副经理，负责技术支持培训工作及产品开发的市场调查与项目指导。</p><p><br/></p>', 0, '吴松林', NULL, NULL, NULL, '', '/upload/image/20191030/1572409775242225.jpg', '1', 0, '', NULL, NULL, NULL, '/upload/image/20191030/1572409782332549.jpg', '国家三级（高级）验配师，从事助听器验配近二十年', NULL, NULL, NULL),
(32, 14, 32, '国家四级助听器验配师', '<p>艾声漳州区域主管。从事助听器验配工作十余年，经验丰富、验配技术精湛。尤其擅长儿童听力评估和诊断，儿童助听设备精准调试，听力康复及听能管理等。深悉各大品牌助听器的性能特点，多次参加厂家及行业机构组织的各种专业交流 ，其“专业、专注”的职业操守得到听障患者及家属的肯定。</p>', 0, '陈秋婷', NULL, NULL, NULL, '', '/upload/image/20191030/1572411690305998.jpg', '0', 0, '', NULL, NULL, NULL, '/upload/image/20191030/1572411700419559.jpg', '国家四级助听器验配师，助听器验配工作十几年', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tb_newssort`
--

CREATE TABLE `tb_newssort` (
  `id` int(11) NOT NULL COMMENT '自动编号',
  `pid` int(11) DEFAULT NULL COMMENT '父类ID',
  `sortname` varchar(255) DEFAULT NULL COMMENT '类别名称',
  `serialnum` int(11) DEFAULT NULL COMMENT '序号',
  `isdelete` int(11) DEFAULT NULL COMMENT '逻辑删除'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_newssort`
--

INSERT INTO `tb_newssort` (`id`, `pid`, `sortname`, `serialnum`, `isdelete`) VALUES
(1, 0, '关于我们', 1, 0),
(2, 1, '公司简介', 2, 0),
(3, 1, '资质荣誉', 3, 0),
(4, 0, '产品介绍', 4, 0),
(5, 4, '助听器', 5, 0),
(6, 4, '辅听器', 6, 0),
(7, 0, '新闻发布', 7, 0),
(8, 7, '公司动态', 8, 0),
(9, 7, '行业动态', 9, 0),
(10, 7, '促销活动', 10, 0),
(11, 0, '专题板块', 11, 0),
(12, 11, '知识分享', 12, 0),
(13, 0, '服务网点', 13, 0),
(14, 13, '专家团队', 14, 0),
(15, 13, '连锁门店', 15, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tb_onepage`
--

CREATE TABLE `tb_onepage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` longtext COMMENT '内容',
  `isdelete` int(11) DEFAULT NULL COMMENT '辑逻删除',
  `picture` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_onepage`
--

INSERT INTO `tb_onepage` (`id`, `title`, `content`, `isdelete`, `picture`) VALUES
(1, '关于我们', '<p>百聪声商贸有限公司(简称百聪声）是目前青海省听力连锁规模大、经验丰富、网络全面、设备先进、服务项目齐全的专业听力服务机构，提供个性化的全面听力解决方案，是青海省听力连锁行业的引领者。（西宁市助听器验配服务中心为旗下连锁机构）</p><p style=\"white-space: normal;\">1999年5月，百聪声创始人在西宁市创立了助听器验配服务专营中心，开创了青海省听力连锁行业的主流模式。百聪声声多年来一直致力于将欧美先进的高科技助听设备和专业技术引入青海，不断提升听力行业的专业及服务水准,是听力连锁行业持续创新的领航者,20年来,为240000余弱听人士提供免费听力检测及验配服务。</p><p><br/></p>', 0, ''),
(2, '西宁市助听器验配服务中心', '<p style=\"white-space: normal;\">百聪声商贸有限公司(简称百聪声）是目前青海省听力连锁规模大、经验丰富、网络全面、设备先进、服务项目齐全的专业听力服务机构，提供个性化的全面听力解决方案，是青海省听力连锁行业的引领者。（西宁市助听器验配服务中心为旗下连锁机构）</p><p style=\"white-space: normal;\">1999年5月，百聪声创始人在西宁市创立了助听器验配服务专营中心，开创了青海省听力连锁行业的主流模式。百聪声声多年来一直致力于将欧美先进的高科技助听设备和专业技术引入青海，不断提升听力行业的专业及服务水准,是听力连锁行业持续创新的领航者,20年来,为240000余弱听人士提供免费听力检测及验配服务。</p><p><br/></p>', 0, '/upload/image/20191030/1572405279524299.jpg'),
(3, '联系我们', '<p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; font-size: 18px; line-height: 42px; font-family: &quot;Microsoft YaHei&quot;; background-color: rgba(255, 255, 255, 0.8); color: rgb(12, 170, 109); font-weight: 600;\">西宁市助听器配置服务中心</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; font-size: 14px; line-height: 42px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;; background-color: rgba(255, 255, 255, 0.8);\">西宁市助听器配置服务中心</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; font-size: 14px; line-height: 42px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;; background-color: rgba(255, 255, 255, 0.8);\">咨询热线： 0971-8888888</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; font-size: 14px; line-height: 42px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;; background-color: rgba(255, 255, 255, 0.8);\">地址：西安市未央区汉城街道凤城九路海博广场</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; font-size: 14px; line-height: 42px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;; background-color: rgba(255, 255, 255, 0.8);\"><img src=\"http://localhost/zhutingqi/tpl/images/code1.jpg\" alt=\"\" style=\"border: 0px; margin-top: 3.79688px; margin-bottom: -11.3906px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; font-size: 14px; line-height: 42px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;; background-color: rgba(255, 255, 255, 0.8);\">扫一扫微信二维码</p><p><br/></p>', 0, '/upload/image/20191030/1572406315115191.jpg'),
(4, '底部信息', '<p style=\"white-space: normal;\">Copyright<span style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 13px;\">©</span>2013-2015西宁助听器验配服务中心&nbsp; 闽ICP备12006824号-3</p><p style=\"white-space: normal;\">电话：0592-5656776&nbsp; 传真：0592-5791290&nbsp; 公司地址：厦门市思明区嘉禾路329号太平洋广场北楼4层38-39号</p><p style=\"white-space: normal;\">医疗器械经营许可证：闽厦食药监械经营备20140106&nbsp; 互联网药品信息服务资格证：（闽）非经营性20180013</p>', 0, ''),
(5, '顶部电话', '<p>0971-88888888</p>', 0, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_filelog`
--
ALTER TABLE `tb_filelog`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_guestbook`
--
ALTER TABLE `tb_guestbook`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_link`
--
ALTER TABLE `tb_link`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_linksort`
--
ALTER TABLE `tb_linksort`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_newssort`
--
ALTER TABLE `tb_newssort`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_onepage`
--
ALTER TABLE `tb_onepage`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '动自编号', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `tb_filelog`
--
ALTER TABLE `tb_filelog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `tb_guestbook`
--
ALTER TABLE `tb_guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `tb_link`
--
ALTER TABLE `tb_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自动编码', AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `tb_linksort`
--
ALTER TABLE `tb_linksort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自动编号', AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自动编码', AUTO_INCREMENT=33;

--
-- 使用表AUTO_INCREMENT `tb_newssort`
--
ALTER TABLE `tb_newssort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自动编号', AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `tb_onepage`
--
ALTER TABLE `tb_onepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
