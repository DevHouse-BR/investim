-- phpMyAdmin SQL Dump
-- version 3.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Fev 23, 2017 as 08:32 PM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `investim`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_config`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_config` (
  `namekey` varchar(200) NOT NULL,
  `value` varchar(250) NOT NULL,
  PRIMARY KEY  (`namekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_acymailing_config`
--

INSERT INTO `jos_acymailing_config` (`namekey`, `value`) VALUES
('level', 'Starter'),
('version', '1.2.2'),
('from_name', 'Investim - Compra e Venda de Empresas'),
('from_email', 'investim@investim.com.br'),
('reply_name', 'Investim - Compra e Venda de Empresas'),
('reply_email', 'investim@investim.com.br'),
('bounce_email', ''),
('add_names', '1'),
('mailer_method', 'smtp'),
('encoding_format', '8bit'),
('charset', 'UTF-8'),
('word_wrapping', '150'),
('hostname', ''),
('embed_images', '0'),
('embed_files', '1'),
('multiple_part', '1'),
('sendmail_path', '/usr/sbin/sendmail'),
('smtp_host', 'smtp.devhouse.com.br'),
('smtp_port', ''),
('smtp_secured', ''),
('smtp_auth', '1'),
('smtp_username', 'oficina@devhouse.com.br'),
('smtp_password', 'newlife2008'),
('smtp_keepalive', '1'),
('queue_nbmail', '60'),
('queue_type', 'auto'),
('queue_delay', '3600'),
('queue_try', '3'),
('queue_pause', '5'),
('allow_visitor', '1'),
('require_confirmation', '0'),
('priority_newsletter', '3'),
('allowedfiles', 'zip,doc,docx,pdf,xls,txt,gzip,rar,jpg,gif,xlsx,pps,csv,bmp,epg,ico,odg,odp,ods,odt,png,ppt,swf,xcf'),
('uploadfolder', 'components/com_acymailing/upload'),
('editor', '0'),
('confirm_redirect', ''),
('subscription_message', '1'),
('notification_unsuball', ''),
('cron_next', '1251990901'),
('confirmation_message', '1'),
('welcome_message', '1'),
('unsub_message', '1'),
('cron_last', '0'),
('cron_fromip', ''),
('cron_report', ''),
('cron_frequency', '300'),
('cron_sendreport', '2'),
('cron_sendto', 'mauriciobbn@brturbo.com.br'),
('cron_fullreport', '1'),
('cron_savereport', '2'),
('cron_savefolder', 'administrator/components/com_acymailing/upload/report.log'),
('cron_savepath', 'administrator/components/com_acymailing/logs/report.log'),
('notification_created', ''),
('notification_accept', ''),
('notification_refuse', ''),
('forward', '0'),
('description_starter', 'Joomla!<sup style="font-size:4px;">TM</sup> Mailing Extension'),
('description_essential', 'Joomla!<sup style="font-size:4px;">TM</sup> E-mail Marketing'),
('description_business', 'Joomla!<sup style="font-size:4px;">TM</sup> Newsletter Extension'),
('description_enterprise', 'Joomla!<sup style="font-size:4px;">TM</sup> Marketing Campaign'),
('priority_followup', '2'),
('unsub_redirect', ''),
('show_footer', '1'),
('use_sef', '0'),
('itemid', '0'),
('css_module', 'default'),
('css_frontend', 'default'),
('css_backend', 'default'),
('installcomplete', '1'),
('bounce_email_bounce', 'delete'),
('bounce_regex_bounce', 'deliver|daemon|fail|system|return|impos'),
('bounce_action_bounce', 'unsub'),
('bounce_rules_bounce', 'Mailbox not accessible'),
('bounce_email_end', 'forward'),
('bounce_forward_end', 'mauriciobbn@brturbo.com.br'),
('bounce_rules_end', 'Final Action'),
('Starter', '0'),
('Essential', '1'),
('Business', '2'),
('Enterprise', '3'),
('allow_modif', 'data'),
('frontend_pdf', '0'),
('frontend_print', '0'),
('show_description', '1'),
('show_headings', '1'),
('show_senddate', '1'),
('show_filter', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_fields`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_fields` (
  `fieldid` smallint(5) unsigned NOT NULL auto_increment,
  `fieldname` varchar(250) NOT NULL,
  `namekey` varchar(50) NOT NULL,
  `type` varchar(50) default NULL,
  `value` text NOT NULL,
  `published` tinyint(3) unsigned NOT NULL default '1',
  `ordering` smallint(5) unsigned default '99',
  `options` text,
  `core` tinyint(3) unsigned NOT NULL default '0',
  `required` tinyint(3) unsigned NOT NULL default '0',
  `backend` tinyint(3) unsigned NOT NULL default '1',
  `frontcomp` tinyint(3) unsigned NOT NULL default '0',
  `default` varchar(250) default NULL,
  PRIMARY KEY  (`fieldid`),
  UNIQUE KEY `namekey` (`namekey`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `jos_acymailing_fields`
--

INSERT INTO `jos_acymailing_fields` (`fieldid`, `fieldname`, `namekey`, `type`, `value`, `published`, `ordering`, `options`, `core`, `required`, `backend`, `frontcomp`, `default`) VALUES
(1, 'NAMECAPTION', 'name', 'text', '', 1, 1, '', 1, 1, 1, 1, ''),
(2, 'EMAILCAPTION', 'email', 'text', '', 1, 2, '', 1, 1, 1, 1, ''),
(3, 'RECEIVE', 'html', 'radio', '0::JOOMEXT_TEXT\n1::HTML', 1, 3, '', 1, 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_list`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_list` (
  `name` varchar(250) NOT NULL,
  `description` text,
  `ordering` smallint(10) unsigned default NULL,
  `listid` smallint(10) unsigned NOT NULL auto_increment,
  `published` tinyint(11) default NULL,
  `userid` int(10) unsigned default NULL,
  `alias` varchar(250) default NULL,
  `color` varchar(30) default NULL,
  `visible` tinyint(4) NOT NULL default '1',
  `welmailid` mediumint(11) default NULL,
  `unsubmailid` mediumint(11) default NULL,
  `type` enum('list','campaign') NOT NULL default 'list',
  `access_sub` varchar(250) default 'all',
  `access_manage` varchar(250) NOT NULL default 'none',
  `languages` varchar(250) NOT NULL default 'all',
  PRIMARY KEY  (`listid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_acymailing_list`
--

INSERT INTO `jos_acymailing_list` (`name`, `description`, `ordering`, `listid`, `published`, `userid`, `alias`, `color`, `visible`, `welmailid`, `unsubmailid`, `type`, `access_sub`, `access_manage`, `languages`) VALUES
('Newsletter Investim', 'Receba nossas notícias<br />', 1, 1, 1, 62, 'newsinvestim', '#CCCCCC', 1, NULL, 0, 'list', 'all', 'none', 'all');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_listcampaign`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_listcampaign` (
  `campaignid` smallint(10) unsigned NOT NULL,
  `listid` smallint(10) unsigned NOT NULL,
  PRIMARY KEY  (`campaignid`,`listid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_acymailing_listcampaign`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_listmail`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_listmail` (
  `listid` int(10) unsigned NOT NULL,
  `mailid` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`listid`,`mailid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_acymailing_listmail`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_listsub`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_listsub` (
  `listid` smallint(11) unsigned NOT NULL,
  `subid` int(11) unsigned NOT NULL,
  `subdate` int(11) unsigned default NULL,
  `unsubdate` int(11) unsigned default NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`listid`,`subid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_acymailing_listsub`
--

INSERT INTO `jos_acymailing_listsub` (`listid`, `subid`, `subdate`, `unsubdate`, `status`) VALUES
(1, 1, 1271003911, NULL, 1),
(1, 2, 1271003911, NULL, 1),
(1, 32, 1271730839, NULL, 1),
(1, 16, 1271339506, NULL, 1),
(1, 27, 1271624332, NULL, 1),
(1, 34, 1271764269, NULL, 1),
(1, 39, 1271887415, NULL, 1),
(1, 41, 1271941251, NULL, 1),
(1, 38, 1271991938, NULL, 1),
(1, 44, 1272042812, 1272050935, -1),
(1, 45, 1272065045, NULL, 1),
(1, 46, 1272071948, NULL, 1),
(1, 47, 1272135956, NULL, 1),
(1, 48, 1272138336, NULL, 1),
(1, 50, 1272146527, NULL, 1),
(1, 53, 1272149320, NULL, 1),
(1, 55, 1272157940, NULL, 1),
(1, 65, 1272285133, NULL, 1),
(1, 67, 1272289026, NULL, 1),
(1, 70, 1272417756, NULL, 1),
(1, 71, 1272457451, NULL, 1),
(1, 73, 1272467381, NULL, 1),
(1, 74, 1272467864, NULL, 1),
(1, 75, 1272467906, NULL, 1),
(1, 76, 1272467931, NULL, 1),
(1, 77, 1272467948, NULL, 1),
(1, 78, 1272467964, NULL, 1),
(1, 79, 1272469258, NULL, 1),
(1, 84, 1272923207, NULL, 1),
(1, 85, 1272923522, NULL, 1),
(1, 86, 1272925878, NULL, 1),
(1, 87, 1272931359, NULL, 1),
(1, 95, 1273582647, NULL, 1),
(1, 96, 1273599848, NULL, 1),
(1, 99, 1274123999, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_mail`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_mail` (
  `mailid` mediumint(10) unsigned NOT NULL auto_increment,
  `subject` varchar(250) NOT NULL,
  `body` longtext NOT NULL,
  `altbody` longtext NOT NULL,
  `published` tinyint(4) default '1',
  `senddate` int(10) unsigned default NULL,
  `created` int(10) unsigned default NULL,
  `fromname` varchar(250) NOT NULL,
  `fromemail` varchar(250) NOT NULL,
  `replyname` varchar(250) NOT NULL,
  `replyemail` varchar(250) NOT NULL,
  `type` enum('news','autonews','followup','unsub','welcome','notification') NOT NULL default 'news',
  `visible` tinyint(4) NOT NULL default '1',
  `userid` int(10) unsigned default NULL,
  `alias` varchar(250) default NULL,
  `attach` text,
  `html` tinyint(4) NOT NULL default '1',
  `tempid` smallint(11) NOT NULL default '0',
  `key` varchar(200) default NULL,
  `frequency` varchar(50) default NULL,
  `params` text,
  `sentby` int(11) unsigned default NULL,
  PRIMARY KEY  (`mailid`),
  KEY `senddate` (`senddate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `jos_acymailing_mail`
--

INSERT INTO `jos_acymailing_mail` (`mailid`, `subject`, `body`, `altbody`, `published`, `senddate`, `created`, `fromname`, `fromemail`, `replyname`, `replyemail`, `type`, `visible`, `userid`, `alias`, `attach`, `html`, `tempid`, `key`, `frequency`, `params`, `sentby`) VALUES
(1, 'New Subscriber on your website', '<p>Hello {subtag:name},</p><p>A new user has been created in AcyMailing : </p><blockquote><p>Name : {user:name}</p><p>Email : {user:email}</p><p>IP : {user:ip} </p></blockquote>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'notification_created', NULL, 1, 0, NULL, NULL, NULL, NULL),
(2, 'A User unsubscribed from all your lists', '<p>Hello {subtag:name},</p><p>The user {user:name} unsubscribed from all your lists</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'notification_unsuball', NULL, 1, 0, NULL, NULL, NULL, NULL),
(3, 'A User refuses to receive e-mails from your website', '<p>The User {user:name} : {user:email} refuses to receive any e-mail anymore from your website.</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'notification_refuse', NULL, 1, 0, NULL, NULL, NULL, NULL),
(4, '{subtag:name}, please confirm your Subscription', '<p> Hello {subtag:name}, </p><p><strong>{confirm}Click here to confirm your Subscription{/confirm}</strong></p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'confirmation', NULL, 1, 0, NULL, NULL, NULL, NULL),
(5, 'AcyMailing Cron Report', '<p>{report}</p><p>{detailreport}</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'report', NULL, 1, 0, NULL, NULL, NULL, NULL),
(6, 'A Newsletter has been generated : "{subject}"', '<p>The Newsletter issue {issuenb} has been generated : </p><p>Subject : {subject}</p><p>{body}</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'notification_autonews', NULL, 1, 0, NULL, NULL, NULL, NULL),
(7, 'Modify your subscription', '<p>Hello {subtag:name}, </p><p>You requested some changes on your subscription,</p><p>Please {modify}click here{/modify} to be identified as the owner of this account and then modify your subscription.</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'modif', NULL, 1, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_queue`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_queue` (
  `senddate` int(10) unsigned NOT NULL,
  `subid` int(10) unsigned NOT NULL,
  `mailid` mediumint(10) unsigned NOT NULL,
  `priority` tinyint(3) unsigned default '3',
  `try` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`subid`,`mailid`),
  KEY `senddate` (`senddate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_acymailing_queue`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_stats`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_stats` (
  `mailid` mediumint(10) unsigned NOT NULL,
  `senthtml` int(10) unsigned NOT NULL default '0',
  `senttext` int(10) unsigned NOT NULL default '0',
  `senddate` int(10) unsigned NOT NULL,
  `openunique` mediumint(10) unsigned NOT NULL default '0',
  `opentotal` int(10) unsigned NOT NULL default '0',
  `bounceunique` mediumint(10) unsigned NOT NULL default '0',
  `fail` mediumint(10) unsigned NOT NULL default '0',
  `clicktotal` int(10) unsigned NOT NULL default '0',
  `clickunique` mediumint(10) unsigned NOT NULL default '0',
  `unsub` mediumint(10) unsigned NOT NULL default '0',
  `forward` mediumint(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`mailid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_acymailing_stats`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_subscriber`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_subscriber` (
  `subid` int(10) unsigned NOT NULL auto_increment,
  `email` varchar(200) NOT NULL,
  `userid` int(10) unsigned default NULL,
  `name` varchar(250) NOT NULL,
  `created` int(10) unsigned default NULL,
  `confirmed` tinyint(4) NOT NULL default '0',
  `enabled` tinyint(4) NOT NULL default '1',
  `accept` tinyint(4) NOT NULL default '1',
  `ip` varchar(100) default NULL,
  `html` tinyint(4) NOT NULL default '1',
  `key` varchar(250) default NULL,
  PRIMARY KEY  (`subid`),
  UNIQUE KEY `email` (`email`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Extraindo dados da tabela `jos_acymailing_subscriber`
--

INSERT INTO `jos_acymailing_subscriber` (`subid`, `email`, `userid`, `name`, `created`, `confirmed`, `enabled`, `accept`, `ip`, `html`, `key`) VALUES
(1, 'investim@investim.com.br', 62, 'Administrator', 1271003911, 1, 1, 1, NULL, 1, NULL),
(2, 'afjdakl@jgld.com', 64, 'ADMINISTRADOR', 1271003911, 1, 1, 1, NULL, 1, NULL),
(32, 'd-navarro@uol.com.br', NULL, 'douglas navarro', 1271730839, 0, 1, 1, '201.92.216.178', 1, '0189c1369666f14e75986ea558a04a4f'),
(10, 'reimor30@hotmail.com', 71, 'Anderson R. Moreira', 1271243045, 1, 1, 1, '192.168.66.138', 1, 'fbde3116ce0ef053ba28c0d290bce17c'),
(33, 'marcoaureliofilho@gmail.com', 93, 'Marco Aurélio', 1271762078, 1, 1, 1, '189.30.87.162', 1, '76a52ccfa2ba4234cf0051bafa9d3a0f'),
(27, 'elaine.z@netcon.com.br', NULL, 'Elaine Z', 1271624332, 0, 1, 1, '189.30.94.245', 1, '7415eb9c715e857638316ab5e96de606'),
(16, 'stoppa@treinavil.com.br', 77, 'ronaldo stoppa', 1271339109, 1, 1, 1, '189.58.114.50', 1, '55d807aa174b2f5fbe8d00789c882e4e'),
(12, 'marilu.moreira@fg.com.br', 73, 'Marilu Moreira', 1271244659, 1, 1, 1, '201.34.74.100', 1, 'b8cd27bcc4794ce62a4c7a15f3cbdfc1'),
(20, 'josidigital@gmail.com', 82, 'Josiane', 1271425463, 1, 1, 1, '187.39.40.246', 1, 'e12515af6a5191aea8c13b31290df5d5'),
(22, 'tech14115@gmail.com', 84, 'Paulo', 1271443913, 1, 1, 1, '189.89.46.101', 1, '5a0825f411c0e959ccd965517729731d'),
(28, 'tatianataen@hotmail.com', 89, 'tatiana nakasone', 1271690453, 1, 1, 1, '189.26.157.143', 1, 'a8c0794c1d1df61d12d9f670da28852c'),
(30, 'walther_petris@hotmail.com', 91, 'Walther Petris', 1271702692, 1, 1, 1, '200.193.46.194', 1, '3419b5aecf38ed4b9a9d2d4ae4b5a0b8'),
(34, 'tubasa44@hotmail.com', NULL, 'Carlos Alberto Alves da Silva', 1271764269, 0, 1, 1, '187.64.35.103', 1, '0b1843387b0b3ae6c9a598282684fff8'),
(35, 'elaine.zanda@hotmail.com', 94, 'elaine', 1271765714, 1, 1, 1, '201.16.22.40', 1, 'a6d6515cb8b73b6f97918db99adcda4d'),
(36, 'bruno@connectmidia.com', 95, 'Bruno', 1271766646, 1, 1, 1, '189.58.113.41', 1, '36ca70e70f1f65cfbf0a697c34bdb2fc'),
(37, 'alsp2003@hotmail.com', 96, 'André Peres', 1271773554, 1, 1, 1, '189.35.95.203', 1, 'd33377c57a0c509648720a3106c215e0'),
(38, 'pablo@inversiones-brasil.es', 97, 'Pablo lopez', 1271860853, 1, 1, 1, '81.34.121.194', 1, '768d0c9e2dfccedd11059b5235f06207'),
(39, 'edivaldo@schumacherbombas.com.br', NULL, 'edivaldo schumacher', 1271887415, 0, 1, 1, '189.35.95.25', 1, 'f7cd77014f2344f757fe93756881955b'),
(43, 'josecaciolato@hotmail.com', 101, 'jose caciolato', 1271975273, 1, 1, 1, '187.59.58.52', 1, '8f99ec3132b74796fb983ebbe49c678d'),
(41, 'joaogvgodinho@gmail.com', 99, 'João Godinho', 1271941251, 1, 1, 1, '201.11.70.172', 1, '89d5e13f49363b4674d867e10cb3bca9'),
(42, 'rodrigo_bruder@yahoo.com.br', 100, 'Rodrigo Bruder', 1271941527, 1, 1, 1, '189.72.106.77', 1, 'a478dedc4d1b18eb3c708ff9b70dd981'),
(44, 'claudio@grupoabra.com', NULL, 'Cláudio', 1272042812, 0, 0, 0, '201.25.217.222', 0, '80f9271cae2ccb559f65d6a95197df79'),
(45, 'jmainardi@uol.com.br', 102, 'JORGE MAINARDI FERNANDES', 1272065045, 1, 1, 1, '201.24.165.194', 1, '3ac7bde7c3c935e5c3ba2fa0e5956a8d'),
(46, 'neucidral@yahoo.com.br', 103, 'Nelson Cidral', 1272071948, 1, 1, 1, '189.99.225.40', 1, '7aa2bae284fb3ca21f3993ddc4e04ff2'),
(47, 'rogeriofacin@bol.com.br', 117, 'ROGERIO FACIN', 1272135956, 1, 1, 1, '187.111.233.164', 1, '8f282be3f7ee0b5b0fdcc2ce0116a208'),
(48, 'uniaoprs@yahoo.com.br', NULL, 'PEDRO ROSA', 1272138336, 0, 1, 1, '189.25.123.125', 1, 'b2a4a1b521fc83dd487ee33856e10fab'),
(49, 'aryventura@yahoo.com.br', 104, 'ary ventura', 1272143251, 1, 1, 1, '189.116.56.23', 1, '8b500c16522385b06dc27fcb46409663'),
(50, 'carlosquandt@hotmail.com', 105, 'Carlos Quandt', 1272146527, 1, 1, 1, '200.102.16.202', 1, '365d0a44d2c3f2304a79f1a4b40df71d'),
(51, 'eduardo.campos@ei-log.com', 106, 'eduardo campos', 1272146867, 1, 1, 1, '201.36.252.250', 1, 'dc08289e502bf3beb5e4db7c02641455'),
(52, 'silviocesar@pop.com.br', 107, 'silvio cesar', 1272147469, 1, 1, 1, '187.39.47.143', 1, '0f4017faa90012997b374f7a012166ff'),
(53, 'romulocleite@hotmail.com', NULL, 'romulo caixeta', 1272149320, 0, 1, 1, '192.168.31.7', 1, '09bfc8439d6444880d3db31f2f945d20'),
(55, 'basiliobuyo@gmail.com', 109, 'Basilio Buyo', 1272157940, 1, 1, 1, '77.209.66.235', 1, '3df36c907bde6f3b0c682aeb42126f2a'),
(56, 'osvaldopalermo@terra.com.br', 110, 'OSVALDO', 1272162975, 1, 1, 1, '189.26.151.180', 1, 'dafc5d511dcbcf69e8d8cef7c3f6ebc8'),
(57, 'hirmavanessa@hotmail.com', 111, 'Claudio', 1272165167, 1, 1, 1, '189.11.146.241', 1, '6e0ead13ec46be0b86aa6772d9b45c44'),
(58, 'juridico@excelconsultoria.com.br', 112, 'Jaison Corrêa', 1272172406, 1, 1, 1, '201.41.245.31', 1, 'e081f9675ac608432cd34cd253fc01b3'),
(59, 'cemdabr@hotmail.com', 113, 'Hugo Lopez', 1272197078, 1, 1, 1, '190.135.161.4', 1, 'b5ca8188e182a6716b6200ba616dfb0d'),
(60, 'gilsonrodrigues19@hotmail.com', 114, 'GILSON', 1272232019, 1, 1, 1, '200.180.200.202', 1, '7a8bdf39ed69011f3b5ff90b5f189027'),
(61, 'lmbonne@gmail.com', 115, 'Luis M. G. Bonnecarrère', 1272245247, 1, 1, 1, '201.25.210.28', 1, 'b7532d3272a703fc86bbe897a5d5aefe'),
(62, 'douglas@wadvocacia.adv.br', 116, 'Douglas', 1272251679, 1, 1, 1, '187.7.51.54', 1, 'e588d11771877805001b341732624b2a'),
(63, 'igormenin@gmail.com', 118, 'Igor C. Menin', 1272283034, 1, 1, 1, '192.168.1.72, 127.0.0.1', 1, '34e4f324c030dbb0684c024c98feb368'),
(64, 'christopholus@hotmail.com', 119, 'Cristiam de Oliveira', 1272283295, 1, 1, 1, '187.52.23.88', 1, '5451523951faa37c3d06485d2c3f40a6'),
(65, 'cbparticipacoes@gmail.com', NULL, 'cbparticipacoes@gmail.com', 1272285133, 0, 1, 1, '187.37.9.164', 1, '733bb76f75ba5fa0326c4e49d4e4e18c'),
(66, 'renatoroncador@yahoo.com.br', 120, 'Renato', 1272287153, 1, 1, 1, '189.68.46.148', 1, '0324feb27cd4ceb03fa24876de622d81'),
(67, 'dcvieira-rogerio@hotmail.com', NULL, 'Rogério Vieira', 1272289026, 0, 0, 1, '189.26.154.126', 0, '64f10621ad4eb043cc3add2de8009cee'),
(68, 'nosderm@terra.com.br', 121, 'EDSON ROSA MARTINS', 1272311721, 1, 1, 1, '187.52.174.135', 1, '397108d6b6d6fe588342841d189019dc'),
(69, 'viera91@ig.com.br', 122, 'marcos', 1272406890, 1, 1, 1, '187.0.227.86', 1, 'aaaf80ffc7af51f8c89e49417f558eea'),
(70, 'geraldinoducarmo@hotmail.com', NULL, 'Geraldino', 1272417756, 0, 1, 1, '189.73.96.214', 1, '87ce3a9952c5c5888d8212bfe618ce2c'),
(71, 'maurilio10@hotmail.com', NULL, 'maurilio', 1272457451, 0, 1, 1, '201.22.60.215', 1, 'a19d8410c866444e5d3d45e496304bce'),
(72, 'vendas-juan@hotmail.com', 123, 'juan', 1272461355, 1, 1, 1, '201.2.247.102', 1, '6d2036d91b8c4af61186b22e3bf341b2'),
(73, 'cboff62@gmail.com', 125, 'Claudio', 1272467381, 1, 1, 1, '201.34.153.169', 1, 'c8bdec2aa739598284006a117c48e6a4'),
(74, 'otv1@uol.com.br', NULL, 'otaviano souza', 1272467864, 0, 1, 1, '201.83.217.74', 1, '6fb79fa70617330bb55fcb676b9b1792'),
(75, 'otv1.1@hotmail.com', NULL, 'otaviano souza', 1272467906, 0, 1, 1, '201.83.217.74', 1, 'f2fad3f3e9d0947921b5019d37535917'),
(76, 'otaviano_souza@yahoo.com.br', NULL, 'otaviano souza', 1272467931, 0, 1, 1, '201.83.217.74', 1, '08929235affc608ac851fdaca59e4280'),
(77, 'oepcontabil@uol.com.br', NULL, 'oep', 1272467948, 0, 1, 1, '201.83.217.74', 1, 'a47a11c156ade3ca396bd4c0d1a02775'),
(78, 'fatima11@uol.com.br', NULL, 'fatima souza', 1272467964, 0, 1, 1, '201.83.217.74', 1, 'e51a75b95bc06a1906b9c6a2ee0a070d'),
(79, 'dimas_unifio@hotmail.com', NULL, 'Dimas  Burchardt ', 1272469258, 0, 1, 1, '189.73.68.104', 1, 'fc806ae7458ccb4b16e9d0b760665614'),
(82, 'jaimejferreira@terra.com.br', 127, 'Jaime', 1272627512, 1, 1, 1, '187.5.136.147', 1, '53797457c0a9a312f29109637de7fe8d'),
(85, 'esbauer@gvmail.br', NULL, 'Eduardo Bauer', 1272923522, 0, 1, 1, '200.215.103.157', 1, '0ab59f53fd8429dcb8d6110040e3b9be'),
(83, 'ivan@columbiamalls.com.br', 128, 'Ivan Silvério Junior', 1272897975, 0, 0, 1, '189.31.97.140', 1, '12742947123ed2bde7beba8cf3d1132b'),
(84, 'esbauer@gvmail.com.br', NULL, 'Eduardo Bauer', 1272923207, 0, 1, 1, '200.215.103.157', 1, 'f8872241764149fafb999f54af8227b9'),
(86, 'soch4@ibest.com.br', 129, 'Paulo Henrique de Oliveira', 1272924607, 1, 1, 1, '187.2.252.152', 1, 'b661110219e85555e335d6dbc4d47303'),
(87, 'elio.lopes@bol.com.br', 135, 'ELIO LOPES', 1272931359, 1, 1, 1, '189.73.87.167', 1, 'c0c7ed0f763d81b532a7aac0ef0a1ddb'),
(88, 'prccjr@terra.com.br', 130, 'Paulo', 1272938411, 1, 0, 1, '201.35.220.249', 1, 'b337fdd856c65aad4d0a47582819c583'),
(89, 'maudigital@ig.com.br', 131, 'Marco', 1272979794, 1, 1, 1, '200.215.103.157', 1, 'cbd0b39153c7b67acabcf45cfe6bd079'),
(90, 'cadaol@yahoo.com', 132, 'Claudio', 1272986242, 1, 1, 1, '189.35.88.238', 1, 'baa8ec5b83e5650e5706d12faebc724d'),
(91, 'ri007br@hotmail.com', 133, 'RICARDO', 1272991032, 1, 1, 1, '187.65.204.175', 1, 'b4c14483bc42ab23a93ae07eaa62912a'),
(92, 'prothege@prothege.com.br', 134, 'Lisandro Prestes', 1273019665, 1, 1, 1, '187.52.164.183', 1, 'c4dc1b6a754fe9227c0b1bace1f21ae9'),
(93, 'ady_jlle@hotmail.com', 136, 'Ademir José Fagundes', 1273349244, 1, 1, 1, '189.31.95.161', 1, '4f75990dcb3edcc8ada88069264fea5f'),
(94, 'jairo.ce@brturbo.com.br', 137, 'Jairo Cândido Espindola', 1273538152, 1, 1, 1, '189.75.16.208', 1, '356795ef056c92f7f45ded25d174612d'),
(95, 'larsupermercados@hotmail.com', 138, 'vagner', 1273582647, 1, 1, 1, '187.39.37.55', 1, '27ad25892cbc226b428da95b01fc2b1e'),
(96, 'raul@grupoabra.com', 139, 'raul', 1273599848, 1, 0, 0, '189.26.148.198', 0, '64b68992861bb2d8554fb2d0addc8c08'),
(97, 'catia.almeida@hotmail.com', 140, 'catia almeida', 1274096480, 1, 1, 1, '187.39.34.99', 1, 'c272d79592fc81c18c60eb9cd06aa1e8'),
(98, 'contato@multiplancontabil.com.br', 141, 'mauricio teixeira de souza', 1274104165, 1, 1, 1, '201.86.103.178', 1, '40d8f64b14a5a9b87f49f37ca47c801d'),
(99, 'camiladelambert@gmail.com', NULL, 'Camila Delambert', 1274123999, 0, 1, 1, '189.115.90.25', 1, '98f0f468764b2298a31034ee7eabaa65'),
(100, 'cbs011@terra.com.br', 142, 'Éder', 1274148324, 1, 1, 1, '187.71.52.94', 1, '4b5fbf7927d0a9d48e18439502bf781a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_template`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_template` (
  `tempid` smallint(11) unsigned NOT NULL auto_increment,
  `name` varchar(250) default NULL,
  `description` text,
  `body` longtext,
  `altbody` longtext,
  `created` int(10) unsigned default NULL,
  `published` tinyint(4) NOT NULL default '1',
  `premium` tinyint(4) NOT NULL default '0',
  `ordering` smallint(10) unsigned NOT NULL default '99',
  `namekey` varchar(50) NOT NULL,
  `styles` text,
  `subject` varchar(250) default NULL,
  PRIMARY KEY  (`tempid`),
  UNIQUE KEY `namekey` (`namekey`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `jos_acymailing_template`
--

INSERT INTO `jos_acymailing_template` (`tempid`, `name`, `description`, `body`, `altbody`, `created`, `published`, `premium`, `ordering`, `namekey`, `styles`, `subject`) VALUES
(1, 'White Shadow Red', '1 header, 1 column, 3 vertical areas for articles.<br/><img src="components/com_acymailing/templates/newsletter-1/newsletter-1.png"/>', '<div style="background-color:#e2e8df;font-size:100%;font-family:Tahoma, Geneva, Kalimati, sans-serif;color:#8a8a8a;text-align:center" width="100%">\r\n\r\n<table width="560" cellpadding="0" cellspacing="0" style="text-align:left;margin:auto;">\r\n    <tr>\r\n    	<td colspan="3" style="font-size:10px;color:#000000;margin:auto;text-align:center;">This email contains graphics, so if you don''t see them, {readonline}view it in your browser{/readonline}.</td>\r\n    </tr>\r\n\r\n    <tr>\r\n    	<td colspan="3" height="10"></td>\r\n    </tr>\r\n\r\n    <tr>\r\n        <td width="37">\r\n        </td>\r\n\r\n        <td bgcolor="#fbfbf7" width="496" valign="top">\r\n        	<table width="100%" cellpadding="0" cellspacing="0">\r\n                <tr>\r\n                	<td height="20" colspan="2">\r\n\r\n                    </td>\r\n\r\n                </tr>\r\n                <tr>\r\n                	<td width="20">\r\n                    </td>\r\n                    <td height="110" width="456" style="background-color:#F9F7D3">\r\n                    	<table width="456" height="110" cellpadding="0" cellspacing="0">\r\n                            <tr>\r\n                                <td height="11" colspan="3">\r\n                                </td>\r\n                            </tr>\r\n                            <tr>\r\n                            	<td width="7" >\r\n                                </td>\r\n                                <td>\r\n                                	<img src="http://www.acyba.com/images/templates/newsletter-1/logo-icon.png" alt=""/>\r\n                                </td>\r\n                                <td valign="top">\r\n                                	<table width="100%" height="100%" cellpadding="0" cellspacing="0">\r\n                                    	<tr>\r\n                                        	<td align="right"  valign="top" height="71">\r\n                                            	<h1 style="margin-bottom:0;margin-top:0;font-family:Tahoma, Geneva, Kalimati, sans-serif;font-size:26px;color:#d47e7e;vertical-align:top;">AcyMailing is Out!</h1>\r\n                                            </td>\r\n                                            <td width="15">\r\n                                            </td>\r\n\r\n                                        </tr>\r\n                                        <tr>\r\n                                        	<td align="right" height="15" valign="baseline" >\r\n                                            	<img alt="" src="http://www.acyba.com/images/templates/newsletter-1/company-name.png" height="15"/>\r\n                                            </td>\r\n                                        </tr>\r\n                                     </table>\r\n\r\n\r\n                                </td>\r\n\r\n\r\n                            </tr>\r\n\r\n                            <tr>\r\n                                <td height="3"  colspan="3">\r\n\r\n                                </td>\r\n\r\n\r\n                            </tr>\r\n\r\n\r\n                        </table>\r\n                    </td>\r\n                    <td width="20">\r\n                    </td>\r\n\r\n                </tr>\r\n                <tr>\r\n                	<td colspan="5">\r\n                    	<table width="100%">\r\n                        	<tr>\r\n                            	<td width="60">\r\n                                </td>\r\n                                <td>\r\n                                	<table width="100%">\r\n                                    	<tr>\r\n                                        	<td>\r\n                                                    <h3 style="color:#8a8a8a;font-weight:normal;font-size:100%;margin:0;">E-Mail</h3>\r\n                                                    <h6 style="background-color:#d39f9f;margin:0;">&nbsp;</h6>\r\n                                                    <table>\r\n                                                    	<tr>\r\n                                                        	<td width="280" style="font-size:10px" valign="top" align="justify">\r\n                                                           	 	Electronic mail, often abbreviated as email or e-mail, is a method of exchanging digital messages, designed primarily for human use. E-mail systems are based on a store-and-forward model in which e-mail computer server systems accept, forward, deliver and store messages on behalf of users, who only need to connect to the e-mail infrastructure, typically an e-mail server, with a network-enabled device (e.g., a personal computer) for the duration of message submission or retrieval.<br/><a href="http://en.wikipedia.org/wiki/E-mail">Wikipedia</a>\r\n                                                            </td>\r\n                                                            <td>\r\n                                                            	<img alt="" src="http://www.acyba.com/images/templates/newsletter-1/acymailing.png" />\r\n                                                            </td>\r\n                                                        </tr>\r\n													</table>\r\n                                            </td>\r\n                                        </tr>\r\n                                    </table>\r\n\r\n                                </td>\r\n                                <td width="60">\r\n                                </td>\r\n                            </tr>\r\n\r\n                            <tr>\r\n                            	<td width="60">\r\n                                </td>\r\n                                <td>\r\n                                	<table width="100%">\r\n                                    	<tr>\r\n                                        	<td>\r\n                                                    <h3 style="color:#8a8a8a;font-weight:normal;font-size:100%;margin:0;">Marketing Campaign</h3>\r\n                                                    <h6 style="background-color:#d39f9f;margin:0;">&nbsp;</h6>\r\n                                                    <table>\r\n                                                    	<tr>\r\n                                                        	<td width="140" style="font-size:10px" valign="top" align="justify">\r\n                                                           	 	Marketing is an integrated communications-based process through which individuals and communities are informed or persuaded that existing and newly-identified needs and wants may be satisfied by the products and services of others.\r\n                                                            </td>\r\n                                                            <td>\r\n                                                            	<img alt="" src="components/com_acymailing/templates/newsletter-1/vert-separator.png" />\r\n                                                            </td>\r\n                                                            <td>\r\n                                                            	<img alt="" src="http://www.acyba.com/images/templates/newsletter-1/essential.png" />\r\n                                                            </td>\r\n                                                            <td>\r\n                                                            	<img alt="" src="components/com_acymailing/templates/newsletter-1/vert-separator.png" />\r\n                                                            </td>\r\n                                                            <td width="140" style="font-size:10px" valign="top" align="justify">\r\n                                                           	 	Marketing is used to create the customer, to keep the customer and to satisfy the customer.  <a href="http://en.wikipedia.org/wiki/Marketing_campaign">Wikipedia</a>\r\n                                                            </td>\r\n                                                        </tr>\r\n													</table>\r\n                                            </td>\r\n                                        </tr>\r\n                                    </table>\r\n\r\n                                </td>\r\n                                <td width="60">\r\n                                </td>\r\n                            </tr>\r\n\r\n                            <tr>\r\n                            	<td width="60">\r\n                                </td>\r\n                                <td>\r\n                                	<table width="100%">\r\n                                    	<tr>\r\n                                        	<td>\r\n                                                    <h3 style="color:#8a8a8a;font-weight:normal;font-size:100%;margin:0;">Joomla!</h3>\r\n                                                    <h6 style="background-color:#d39f9f;margin:0;">&nbsp;</h6>\r\n                                                    <table>\r\n                                                    	<tr>\r\n                                                        	<td width="200" style="font-size:10px" valign="top" align="justify">\r\n                                                           	 	Joomla! is a content management system platform for publishing content on the World Wide Web and intranets as well as a Model–view–controller (MVC) Web Application Development framework.\r\n                                                            </td>\r\n                                                            <td>\r\n                                                            	<img alt="" src="components/com_acymailing/templates/newsletter-1/vert-separator.png" />\r\n                                                            </td>\r\n                                                            <td width="200" style="font-size:10px" valign="top" align="justify">\r\n                                                           	 	The system includes features such as page caching to improve performance, RSS feeds, printable versions of pages, news flashes, blogs, polls, website searching, and language internationalization.<br/><a href="http://en.wikipedia.org/wiki/Joomla">Wikipedia</a>\r\n                                                            </td>\r\n                                                        </tr>\r\n													</table>\r\n                                            </td>\r\n                                        </tr>\r\n                                    </table>\r\n\r\n                                </td>\r\n                                <td width="60">\r\n                                </td>\r\n                            </tr>\r\n\r\n\r\n                        </table>\r\n                    </td>\r\n                </tr>\r\n\r\n            </table>\r\n        </td>\r\n        <td width="27">\r\n        </td>\r\n\r\n    </tr>\r\n    <tr>\r\n    	<td colspan="3"><img src="components/com_acymailing/templates/newsletter-1/page-footer.png" alt=""/></td>\r\n    </tr>\r\n\r\n    <tr>\r\n    	<td colspan="3" style="font-size:10px;color:#000000;margin:auto;text-align:center;">Not interested any more? {unsubscribe}Unsubscribe{/unsubscribe}</td>\r\n    </tr>\r\n</table>\r\n\r\n\r\n</div>', '', NULL, 1, 1, 1, 'newsletter-1', 'a:6:{s:16:"acymailing_title";s:89:"color:#8a8a8a;font-weight:normal;font-size:14px;margin:0;border-bottom:5px solid #d39f9f;";s:16:"acymailing_unsub";s:31:"font-weight:bold;color:#000000;";s:19:"acymailing_readmore";s:14:"color:#d39f9f;";s:17:"acymailing_online";s:31:"font-weight:bold;color:#000000;";s:6:"tag_h1";s:89:"color:#8a8a8a;font-weight:normal;font-size:14px;margin:0;border-bottom:5px solid #d39f9f;";s:8:"color_bg";s:7:"#e2e8df";}', NULL),
(2, 'Clean White Pink', 'White based template with 1 header, 2 columns<br/><img src="components/com_acymailing/templates/newsletter-2/newsletter-2.png"/>', '<div style="background-color:#ffffff;font-size:100%;font-family:Tahoma, Geneva, Kalimati, sans-serif;color:#8a8a8a;text-align:center" width="100%">\n\n<table width="600" cellpadding="0" cellspacing="0" style="text-align:left;margin:auto;">\n    <tr>\n    	<td colspan="3" style="font-size:10px;color:#000000;margin:auto;text-align:center;">This email contains graphics, so if you don''t see them, {readonline}view it in your browser{/readonline}.</td>\n    </tr>\n\n    <tr>\n    	<td colspan="3" height="30"></td>\n    </tr>\n\n    <tr>\n\n        <td width="370" valign="top">\n        	<table cellpadding="0" cellspacing="0">\n            	<tr>\n                	<td height="40" valign="top">\n                    	<h1 style="margin-bottom:0;margin-top:0;font-family:Tahoma, Geneva, Kalimati, sans-serif;font-size:26px;color:#d47e7e;vertical-align:top;text-align:center">AcyMailing is Out!</h1>\n                    </td>\n\n                </tr>\n\n                <tr>\n                	<td>\n\n                        <h3 style="color:#8a8a8a;text-align:right;ont-weight:normal;font-size:100%;margin:0;">E-Mail</h3>\n                        <h6 style="background-color:#d39fc9;margin:0;">&nbsp;</h6>\n                        <table>\n                            <tr>\n                                <td align="justify">\n                                <p style="font-size:10px;margin-top:0px;">Electronic mail, often abbreviated as email or e-mail, is a method of exchanging digital messages, designed primarily for human use.<br/><a href="http://en.wikipedia.org/wiki/E-mail">Wikipedia</a></p>\n                                </td>\n                                <td width="30%" style="text-align:center">\n                                    <img src="http://www.acyba.com/images/templates/newsletter-1/acymailing.png" />\n                                </td>\n                            </tr>\n                            <tr>\n                                <td colspan="2" align="right">\n                                    <a href="#" style="font-size:10px;color:#999999;">Read More</a>\n                                </td>\n                            </tr>\n                         </table>\n                    </td>\n\n                </tr>\n                <tr>\n                	<td height="20">\n                    </td>\n                </tr>\n                <tr>\n                	<td>\n                        <h3 style="color:#8a8a8a;font-weight:normal;font-size:100%;margin:0;text-align:right">Marketing Campaign</h3>\n                        <h6 style="background-color:#d39fc9;margin:0;">&nbsp;</h6>\n                        <table>\n                            <tr>\n                                <td valign="top" align="justify" width="35%">\n                                <p style="font-size:10px;margin-top:0px;">Marketing is an integrated communications-based process through which individuals and communities are informed or persuaded that existing and newly-identified needs and wants may be satisfied by the products and services of others.</p>\n                                </td>\n                                <td>\n                                    <img src="components/com_acymailing/templates/newsletter-1/vert-separator.png" />\n                                </td>\n                                <td style="text-align:center">\n                                    <img src="http://www.acyba.com/images/templates/newsletter-1/essential.png" />\n                                </td>\n                                <td>\n                                    <img src="components/com_acymailing/templates/newsletter-1/vert-separator.png" />\n                                </td>\n                                <td  valign="top" align="justify" width="30%">\n                                    <p style="font-size:10px;margin-top:0px;">Marketing is used to create the customer, to keep the customer and to satisfy the customer.  <a href="http://en.wikipedia.org/wiki/Marketing_campaign">Wikipedia</a></p>\n                                </td>\n                            </tr>\n                            <tr>\n                                <td colspan="5" align="right">\n                                    <a href="#" style="font-size:10px;color:#999999;">Read More</a>\n                                </td>\n                            </tr>\n\n\n                         </table>\n                    </td>\n\n                </tr>\n            </table>\n        </td>\n\n        <td width="20">\n        </td>\n\n        <td width="210" valign="top">\n        	<table cellpadding="0" cellspacing="0">\n            	<tr>\n                	<td>\n                    	<img src="http://www.acyba.com/images/templates/newsletter-2/logo-icon.jpg" width="207" height="137" alt="">\n                    </td>\n\n                </tr>\n                <tr>\n                	<td>\n                        <h3 style="color:#8a8a8a;font-weight:normal;font-size:100%;margin:0;">Joomla!</h3>\n                        <h6 style="background-color:#d39fc9;margin:0;">&nbsp;</h6>\n                        <table>\n                            <tr>\n                                <td align="justify">\n                                <p style="font-size:10px;margin-top:0px;">Joomla! is a content management system platform for publishing content on the World Wide Web and intranets as well as a Model–view–controller (MVC) Web Application Development framework.</p>\n                                </td>\n                           </tr>\n\n                           <tr>\n                                <td>\n                                <img src="components/com_acymailing/templates/newsletter-2/hori-separator.png" />\n                                </td>\n                           </tr>\n\n                           <tr>\n                                <td align="justify">\n                                    <p style="font-size:10px;margin-top:0px;">The system includes features such as page caching to improve performance, RSS feeds, printable versions of pages, news flashes, blogs, polls, website searching, and language internationalization.<br/><a href="http://en.wikipedia.org/wiki/Joomla">Wikipedia</a></p>\n                                </td>\n                            </tr>\n                            <tr>\n                                <td align="right">\n                                    <a href="#" style="font-size:10px;color:#999999;">Read More</a>\n                                </td>\n                            </tr>\n                         </table>\n                    </td>\n\n                </tr>\n\n            </table>\n        </td>\n\n    </tr>\n    <tr>\n    	<td colspan="3" height="30"></td>\n    </tr>\n\n    <tr>\n    	<td colspan="3" style="font-size:10px;color:#000000;margin:auto;text-align:center;">Not interested any more? {unsubscribe}Unsubscribe{/unsubscribe}</td>\n    </tr>\n</table>\n\n\n</div>', '', NULL, 1, 0, 2, 'newsletter-2', 'a:3:{s:16:"acymailing_title";s:63:"color:#8a8a8a;text-align:right;border-bottom:6px solid #d39fc9;";s:6:"tag_h1";s:63:"color:#8a8a8a;text-align:right;border-bottom:6px solid #d39fc9;";s:8:"color_bg";s:7:"#ffffff";}', NULL),
(3, 'Rounders and corners', 'Template with 2 columns and 3 rounded areas for articles<br/><img src="components/com_acymailing/templates/newsletter-3/newsletter-3.png"/>', '<div style="background-color:#dfe6e8;font-size:100%;font-family:Tahoma, Geneva, Kalimati, sans-serif;color:#8a8a8a;text-align:center" width="100%">\n\n<table width="600" cellpadding="0" cellspacing="0" style="text-align:left;margin:auto;">\n    <tr>\n    	<td colspan="3" style="font-size:10px;color:#000000;margin:auto;text-align:center;">This email contains graphics, so if you don''t see them, {readonline}view it in your browser{/readonline}.</td>\n    </tr>\n\n    <tr>\n    	<td colspan="3" height="30"></td>\n    </tr>\n\n    <tr>\n\n        <td width="216" valign="top">\n        	<table cellpadding="0" cellspacing="0">\n            	<tr>\n                	<td style="text-align: center">\n                    	<img src="http://www.acyba.com/images/templates/newsletter-3/logo-icon.jpg" width="207" height="137" alt="">\n                    </td>\n\n                </tr>\n\n                <tr>\n                	<td height="20">\n\n                    </td>\n\n                </tr>\n\n                <tr>\n                	<td>\n\n                            <table cellspacing="0" cellpadding="0">\n                                <tr>\n                                    <td colspan="3" width="216" height="15">\r\n                                    <img src="components/com_acymailing/templates/newsletter-3/top23rds.png" alt="" />\n                                    </td>\n                                </tr>\n                                <tr>\n                                    <td  bgcolor="#FFFFFF" width="15"></td>\n                                    <td bgcolor="#FFFFFF" width="186" >\n                                        <h3 style="color:#8a8a8a;font-weight:normal;font-size:100%;margin:0;">Joomla!</h3>\n                                        <h6 style="background-color:#d3d09f;margin:0;">&nbsp;</h6>\n                                        <table>\n                                            <tr>\n\n                                                <td>\n                                                <p style="font-size:10px;margin-top:0px;">Joomla! is a content management system platform for publishing content on the World Wide Web and intranets as well as a Model–view–controller (MVC) Web Application Development framework.</p>\n                                                <img src="components/com_acymailing/templates/newsletter-2/hori-separator.png" />\n                                                <p style="font-size:10px;">The system includes features such as page caching to improve performance, RSS feeds, printable versions of pages, news flashes, blogs, polls, website searching, and language internationalization.<br/><a href="http://en.wikipedia.org/wiki/Joomla">Wikipedia</a></p>\n                                                </td>\n\n                                            </tr>\n                                            <tr>\n                                                <td align="right">\n                                                    <a href="#" style="font-size:10px;color:#999999;">Read More</a>\n                                                </td>\n                                            </tr>\n                                      </table>\n\n\n                                    </td>\n                                    <td  bgcolor="#FFFFFF" width="15"></td>\n                                </tr>\n                                <tr>\n                                    <td  colspan="3" width="216" height="15">\r\n                                    <img src="components/com_acymailing/templates/newsletter-3/bottom23rds.png" alt=""/>\n                                    </td>\n                                </tr>\n                            </table>\n                    </td>\n\n                </tr>\n\n            </table>\n        </td>\n\n\n\n\n        <td width="20">\n        </td>\n  <td width="364" valign="top">\n        	<table cellpadding="0" cellspacing="0">\n            	<tr>\n                	<td width="325" height="48" style="background-color:#ffffff;color:#d47e7e;text-align:center;">\n                        <h1 style="margin-bottom:0;margin-top:0;font-family:Tahoma, Geneva, Kalimati, sans-serif;font-size:26px;color:#d47e7e;vertical-align:top;">AcyMailing is Out!</h1>\n                  </td>\n\n                </tr>\n\n                <tr>\n                	<td height="20">\n\n                    </td>\n                </tr>\n\n                <tr>\n                	<td>\n                            <table cellspacing="0" cellpadding="0">\n                                <tr>\n                                    <td colspan="3" width="323" height="15">\r\n                                    <img src="components/com_acymailing/templates/newsletter-3/top23rd.png" />\n                                    </td>\n                                </tr>\n                                <tr>\n                                    <td  bgcolor="#FFFFFF" width="15"></td>\n                                    <td bgcolor="#FFFFFF" width="293" >\n                                        <h3 style="color:#8a8a8a;font-weight:normal;font-size:100%;margin:0;">E-Mail</h3>\n                                        <h6 style="background-color:#d3d09f;margin:0;">&nbsp;</h6>\n                                        <table>\n                                            <tr>\n                                                <td>\n                                                    <img src="http://www.acyba.com/images/templates/newsletter-1/acymailing.png" />\n                                                </td>\n                                                <td>\n                                                <p style="font-size:10px;margin-top:0px;">Electronic mail, often abbreviated as email or e-mail, is a method of exchanging digital messages, designed primarily for human use.<br/><a href="http://en.wikipedia.org/wiki/E-mail">Wikipedia</a></p>\n                                                </td>\n\n                                            </tr>\n                                            <tr>\n                                                <td colspan="2" align="right">\n                                                    <a href="#" style="font-size:10px;color:#999999;">Read More</a>\n                                                </td>\n                                            </tr>\n                                         </table>\n                                    </td>\n                                    <td  bgcolor="#FFFFFF" width="15"></td>\n                                </tr>\n                                <tr>\n                                    <td  colspan="3" width="323" height="15">\r\n                                    <img src="components/com_acymailing/templates/newsletter-3/bottom23rd.png" alt=""/>\n                                    </td>\n                                </tr>\n                            </table>\n\n                    </td>\n\n                </tr>\n\n                <tr>\n                	<td height="20">\n\n                    </td>\n                </tr>\n\n\n\n                <tr>\n                	<td>\n                        <table cellspacing="0" cellpadding="0">\n                            <tr>\n                                <td colspan="3" width="323" height="15">\r\n                                	<img src="components/com_acymailing/templates/newsletter-3/top23rd.png" />\n                                </td>\n                            </tr>\n                            <tr>\n                                <td  bgcolor="#FFFFFF" width="15"></td>\n                                <td bgcolor="#FFFFFF" width="293" >\n                                    <h3 style="color:#8a8a8a;font-weight:normal;font-size:100%;margin:0;">Marketing Campaign</h3>\n                                    <h6 style="background-color:#d3d09f;margin:0;">&nbsp;</h6>\n                                    <table>\n                                        <tr>\n\n                                            <td>\n                                            <p style="font-size:10px;margin-top:0px;">Marketing is an integrated communications-based process through which individuals and communities are informed or persuaded that existing and newly-identified needs and wants may be satisfied by the products and services of others.</p>\n                                            <img src="components/com_acymailing/templates/newsletter-2/hori-separator.png" />\n                                            <p style="font-size:10px;">Marketing is used to create the customer, to keep the customer and to satisfy the customer.  <a href="http://en.wikipedia.org/wiki/Marketing_campaign">Wikipedia</a></p>\n                                            </td>\n                                            <td>\n                                                <img src="http://www.acyba.com/images/templates/newsletter-1/essential.png" alt=""/>\n                                            </td>\n\n                                        </tr>\n                                        <tr>\n                                            <td colspan="2" align="right">\n                                                <a href="#" style="font-size:10px;color:#999999;">Read More</a>\n                                            </td>\n                                        </tr>\n                                     </table>\n\n\n                                </td>\n                                <td  bgcolor="#FFFFFF" width="15"></td>\n                            </tr>\n                            <tr>\n                                <td  colspan="3" width="323" height="15">\r\n                                <img src="components/com_acymailing/templates/newsletter-3/bottom23rd.png" alt=""/>\n                                </td>\n                            </tr>\n                        </table>\n                    </td>\n\n                </tr>\n            </table>\n        </td>\n\n\n\n    </tr>\n    <tr>\n    	<td colspan="3" height="30"></td>\n    </tr>\n\n    <tr>\n    	<td colspan="3" style="font-size:10px;color:#000000;margin:auto;text-align:center;">Not interested any more? {unsubscribe}Unsubscribe{/unsubscribe}</td>\n    </tr>\n</table>\n\n\n</div>', '', NULL, 1, 0, 3, 'newsletter-3', 'a:3:{s:16:"acymailing_title";s:46:"color:#8a8a8a;border-bottom:6px solid #d3d09f;";s:6:"tag_h1";s:46:"color:#8a8a8a;border-bottom:6px solid #d3d09f;";s:8:"color_bg";s:7:"#dfe6e8";}', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_url`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_url` (
  `urlid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  PRIMARY KEY  (`urlid`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_acymailing_url`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_urlclick`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_urlclick` (
  `urlid` int(10) unsigned NOT NULL,
  `mailid` mediumint(10) unsigned NOT NULL,
  `click` smallint(10) unsigned NOT NULL default '0',
  `subid` int(10) unsigned NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`urlid`,`mailid`,`subid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_acymailing_urlclick`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_acymailing_userstats`
--

CREATE TABLE IF NOT EXISTS `jos_acymailing_userstats` (
  `mailid` mediumint(10) unsigned NOT NULL,
  `subid` int(10) unsigned NOT NULL,
  `html` tinyint(3) unsigned NOT NULL default '1',
  `sent` tinyint(4) NOT NULL default '1',
  `senddate` int(11) NOT NULL,
  `open` tinyint(4) NOT NULL default '0',
  `opendate` int(11) NOT NULL,
  `bounce` tinyint(4) NOT NULL default '0',
  `fail` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`mailid`,`subid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_acymailing_userstats`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_ak_profiles`
--

CREATE TABLE IF NOT EXISTS `jos_ak_profiles` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `description` varchar(255) NOT NULL,
  `configuration` longtext,
  `filters` longtext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_ak_profiles`
--

INSERT INTO `jos_ak_profiles` (`id`, `description`, `configuration`, `filters`) VALUES
(1, 'Default Backup Profile', '[global]\n[akeeba]\nbasic.output_directory="/home/storage/f/9f/f6/investim/public_html/administrator/components/com_akeeba/backup"\nbasic.temporary_directory="/home/storage/f/9f/f6/investim/public_html/tmp"\nbasic.log_level="4"\nbasic.archive_name="site-[HOST]-[DATE]-[TIME]"\nbasic.backup_type="full"\nquota.enable_size_quota="0"\nquota.size_quota="15728640"\nquota.enable_count_quota="0"\nquota.count_quota="3"\nadvanced.dump_engine="native"\nadvanced.scan_engine="smart"\nadvanced.archiver_engine="zip"\nadvanced.proc_engine="none"\nadvanced.writer_engine="direct"\nadvanced.embedded_installer="abi"\nadvanced.virtual_folder="external_files"\ntuning.min_exec_time="2000"\ntuning.max_exec_time="14"\ntuning.run_time_bias="75"\n[engine]\narchiver.common.dereference_symlinks="1"\narchiver.common.part_size="0"\narchiver.common.chunk_size="1048576"\narchiver.common.big_file_threshold="1048576"\narchiver.zip.cd_glue_chunk_size="1048576"\narchiver.directftp.host=""\narchiver.directftp.port="21"\narchiver.directftp.user=""\narchiver.directftp.pass=""\narchiver.directftp.initial_directory=""\narchiver.directftp.ftps="0"\narchiver.directftp.passive_mode="1"\narchiver.directftp.ftp_test="0"\ndump.common.mysql_compatibility="0"\ndump.common.extended_inserts="0"\ndump.common.packet_size="131072"\ndump.native.advanced_entitites="0"\nscan.smart.large_dir_threshold="100"\n', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_ak_stats`
--

CREATE TABLE IF NOT EXISTS `jos_ak_stats` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `description` varchar(255) NOT NULL,
  `comment` longtext,
  `backupstart` timestamp NOT NULL default '0000-00-00 00:00:00',
  `backupend` timestamp NOT NULL default '0000-00-00 00:00:00',
  `status` enum('run','fail','complete') NOT NULL default 'run',
  `origin` enum('backend','frontend') NOT NULL default 'backend',
  `type` enum('full','dbonly','extradbonly') NOT NULL default 'full',
  `profile_id` bigint(20) NOT NULL default '1',
  `archivename` longtext,
  `absolute_path` longtext,
  `multipart` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `jos_ak_stats`
--

INSERT INTO `jos_ak_stats` (`id`, `description`, `comment`, `backupstart`, `backupend`, `status`, `origin`, `type`, `profile_id`, `archivename`, `absolute_path`, `multipart`) VALUES
(5, 'Backup taken on Quarta, 14 Abril 2010 22:49', '', '2010-04-14 22:49:37', '0000-00-00 00:00:00', 'complete', 'backend', 'full', 1, 'site-premiere.devhouse.com.br-20100414-224937.zip', '/var/www/vhosts/devhouse.com.br/subdomains/premiere/httpdocs/investim/administrator/components/com_akeeba/backup/site-premiere.devhouse.com.br-20100414-224937.zip', 0),
(6, 'Backup taken on Terça, 18 Maio 2010 11:39', 'Primeiro Backup na Locaweb', '2010-05-18 11:40:15', '0000-00-00 00:00:00', 'complete', 'backend', 'full', 1, 'site-www.investim.com.br-20100518-114015.zip', '/home/storage/f/9f/f6/investim/public_html/administrator/components/com_akeeba/backup/site-www.investim.com.br-20100518-114015.zip', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_art_adminer_setting`
--

CREATE TABLE IF NOT EXISTS `jos_art_adminer_setting` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `cssfile` varchar(255) NOT NULL,
  `autologin` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_art_adminer_setting`
--

INSERT INTO `jos_art_adminer_setting` (`id`, `cssfile`, `autologin`) VALUES
(1, 'adminer2.css', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_banner`
--

CREATE TABLE IF NOT EXISTS `jos_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `type` varchar(30) NOT NULL default 'banner',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `date` datetime default NULL,
  `showBanner` tinyint(1) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL default '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `jos_banner`
--

INSERT INTO `jos_banner` (`bid`, `cid`, `type`, `name`, `alias`, `imptotal`, `impmade`, `clicks`, `imageurl`, `clickurl`, `date`, `showBanner`, `checked_out`, `checked_out_time`, `editor`, `custombannercode`, `catid`, `description`, `sticky`, `ordering`, `publish_up`, `publish_down`, `tags`, `params`) VALUES
(2, 2, '', 'Noticia', 'no', 10, 10, 0, 'osmbanner2.png', 'http://www.templodaadoracao.com.br/', '2010-05-05 17:24:23', 1, 0, '0000-00-00 00:00:00', '', 'http://www.templodaadoracao.com.br/', 3, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Deus, religião', 'width=0\nheight=0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_bannerclient`
--

CREATE TABLE IF NOT EXISTS `jos_bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `contact` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` time default NULL,
  `editor` varchar(50) default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `jos_bannerclient`
--

INSERT INTO `jos_bannerclient` (`cid`, `name`, `contact`, `email`, `extrainfo`, `checked_out`, `checked_out_time`, `editor`) VALUES
(2, 'Mauricio', 'Mauricio', 'maudigital@ig.com.br', 'rrrrrrrrr', 0, '00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_bannertrack`
--

CREATE TABLE IF NOT EXISTS `jos_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_bannertrack`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_categories`
--

CREATE TABLE IF NOT EXISTS `jos_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `jos_categories`
--

INSERT INTO `jos_categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES
(1, 0, 'Investim', '', 'investim', '', 'com_contact_details', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(3, 0, 'Propagandas', '', 'pro', 'pizza.jpg', 'com_banner', 'left', 'jjj', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(4, 0, 'Noticias', '', 'not', 'pastarchives.jpg', 'com_newsfeeds', 'right', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(5, 0, 'Links', '', 'links', 'web_links.jpg', 'com_weblinks', 'right', 'Oiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 0, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_components`
--

CREATE TABLE IF NOT EXISTS `jos_components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `menuid` int(11) unsigned NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `admin_menu_link` varchar(255) NOT NULL default '',
  `admin_menu_alt` varchar(255) NOT NULL default '',
  `option` varchar(50) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `admin_menu_img` varchar(255) NOT NULL default '',
  `iscore` tinyint(4) NOT NULL default '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Extraindo dados da tabela `jos_components`
--

INSERT INTO `jos_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES
(1, 'Banners', '', 0, 0, '', 'Banner Management', 'com_banners', 0, 'js/ThemeOffice/component.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(2, 'Banners', '', 0, 1, 'option=com_banners', 'Active Banners', 'com_banners', 1, 'js/ThemeOffice/edit.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(3, 'Clients', '', 0, 1, 'option=com_banners&c=client', 'Manage Clients', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(4, 'Web Links', 'option=com_weblinks', 0, 0, '', 'Manage Weblinks', 'com_weblinks', 0, 'js/ThemeOffice/component.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(5, 'Links', '', 0, 4, 'option=com_weblinks', 'View existing weblinks', 'com_weblinks', 1, 'js/ThemeOffice/edit.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(6, 'Categories', '', 0, 4, 'option=com_categories&section=com_weblinks', 'Manage weblink categories', '', 2, 'js/ThemeOffice/categories.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(7, 'Contacts', 'option=com_contact', 0, 0, '', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/component.png', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(8, 'Contacts', '', 0, 7, 'option=com_contact', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/edit.png', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(9, 'Categories', '', 0, 7, 'option=com_categories&section=com_contact_details', 'Manage contact categories', '', 2, 'js/ThemeOffice/categories.png', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(10, 'Polls', 'option=com_poll', 0, 0, 'option=com_poll', 'Manage Polls', 'com_poll', 0, 'js/ThemeOffice/component.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(11, 'News Feeds', 'option=com_newsfeeds', 0, 0, '', 'News Feeds Management', 'com_newsfeeds', 0, 'js/ThemeOffice/component.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(12, 'Feeds', '', 0, 11, 'option=com_newsfeeds', 'Manage News Feeds', 'com_newsfeeds', 1, 'js/ThemeOffice/edit.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(13, 'Categories', '', 0, 11, 'option=com_categories&section=com_newsfeeds', 'Manage Categories', '', 2, 'js/ThemeOffice/categories.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(14, 'User', 'option=com_user', 0, 0, '', '', 'com_user', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(15, 'Search', 'option=com_search', 0, 0, 'option=com_search', 'Search Statistics', 'com_search', 0, 'js/ThemeOffice/component.png', 1, 'enabled=1\nshow_date=1\n\n', 1),
(58, 'AcyMailing', 'option=com_acymailing', 0, 0, 'option=com_acymailing', 'AcyMailing', 'com_acymailing', 0, '../components/com_acymailing/images/icons/icon-16-acymailing.png', 0, '', 1),
(59, 'Users', '', 0, 58, 'option=com_acymailing&ctrl=subscriber', 'Users', 'com_acymailing', 0, '../includes/js/user.png', 0, '', 1),
(60, 'Lists', '', 0, 58, 'option=com_acymailing&ctrl=list', 'Lists', 'com_acymailing', 1, '../includes/js/ThemeOffice/static.png', 0, '', 1),
(61, 'Newsletters', '', 0, 58, 'option=com_acymailing&ctrl=newsletter', 'Newsletters', 'com_acymailing', 2, '../components/com_acymailing/images/icons/icon-16-newsletter.png', 0, '', 1),
(62, 'Templates', '', 0, 58, 'option=com_acymailing&ctrl=template', 'Templates', 'com_acymailing', 3, '../components/com_acymailing/images/icons/icon-16-acytemplate.png', 0, '', 1),
(63, 'Queue', '', 0, 58, 'option=com_acymailing&ctrl=queue', 'Queue', 'com_acymailing', 4, '../components/com_acymailing/images/icons/icon-16-process.png', 0, '', 1),
(64, 'Statistics', '', 0, 58, 'option=com_acymailing&ctrl=stats', 'Statistics', 'com_acymailing', 5, '../components/com_acymailing/images/icons/icon-16-stats.png', 0, '', 1),
(65, 'Configuration', '', 0, 58, 'option=com_acymailing&ctrl=config', 'Configuration', 'com_acymailing', 6, '../includes/js/ThemeOffice/config.png', 0, '', 1),
(66, 'Investidores', 'option=com_investidores', 0, 0, '', '', 'com_investidores', 0, '', 0, '', 1),
(16, 'Categories', '', 0, 1, 'option=com_categories&section=com_banner', 'Categories', '', 3, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(17, 'Wrapper', 'option=com_wrapper', 0, 0, '', 'Wrapper', 'com_wrapper', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(18, 'Mail To', '', 0, 0, '', '', 'com_mailto', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(19, 'Media Manager', '', 0, 0, 'option=com_media', 'Media Manager', 'com_media', 0, '', 1, 'upload_extensions=bmp,csv,doc,gif,ico,jpg,jpeg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,GIF,ICO,JPG,JPEG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\nallowed_media_usergroup=3\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n', 1),
(20, 'Articles', 'option=com_content', 0, 0, '', '', 'com_content', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(21, 'Configuration Manager', '', 0, 0, '', 'Configuration', 'com_config', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(22, 'Installation Manager', '', 0, 0, '', 'Installer', 'com_installer', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(23, 'Language Manager', '', 0, 0, '', 'Languages', 'com_languages', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\nsite=pt-BR\nadministrator=pt-BR\n\n', 1),
(24, 'Mass mail', '', 0, 0, '', 'Mass Mail', 'com_massmail', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(25, 'Menu Editor', '', 0, 0, '', 'Menu Editor', 'com_menus', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(27, 'Messaging', '', 0, 0, '', 'Messages', 'com_messages', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1);
INSERT INTO `jos_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES
(28, 'Modules Manager', '', 0, 0, '', 'Modules', 'com_modules', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(29, 'Plugin Manager', '', 0, 0, '', 'Plugins', 'com_plugins', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(30, 'Template Manager', '', 0, 0, '', 'Templates', 'com_templates', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(31, 'User Manager', '', 0, 0, '', 'Users', 'com_users', 0, '', 1, 'allowUserRegistration=1\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n', 1),
(32, 'Cache Manager', '', 0, 0, '', 'Cache', 'com_cache', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(33, 'Control Panel', '', 0, 0, '', 'Control Panel', 'com_cpanel', 0, '', 1, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(34, 'Investim', 'option=com_properties', 0, 0, 'option=com_properties', 'Investim', 'com_properties', 0, 'components/com_properties/includes/img/menu_properties.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(35, 'Painel de Controle', '', 0, 34, 'option=com_properties', 'Painel de Controle', 'com_properties', 0, 'components/com_properties/includes/img/t_properties.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(36, 'Configuração', '', 0, 34, 'option=com_properties&view=configuration', 'Configuração', 'com_properties', 1, 'components/com_properties/includes/img/t_configuration.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(37, 'Setores de Atividade', '', 0, 34, 'option=com_properties&view=categories', 'Setores de Atividade', 'com_properties', 2, 'components/com_properties/includes/img/t_categories.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(38, 'Atividades', '', 0, 34, 'option=com_properties&view=types', 'Atividades', 'com_properties', 3, 'components/com_properties/includes/img/t_types.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(39, 'Empresas', '', 0, 34, 'option=com_properties&view=products', 'Empresas', 'com_properties', 4, 'components/com_properties/includes/img/menu_properties.png', 0, 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n', 1),
(41, 'Venda de Empresas', 'option=com_vendas', 0, 0, '', '', 'com_vendas', 0, '', 0, '', 1),
(42, 'Vinaora Visitors Counter', 'option=com_vvisit_counter', 0, 0, 'option=com_vvisit_counter', 'Vinaora Visitors Counter', 'com_vvisit_counter', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(43, 'Compra de Empresas', 'option=com_compras', 0, 0, '', '', 'com_compras', 0, '', 0, '', 1),
(44, 'eXtplorer', 'option=com_extplorer', 0, 0, 'option=com_extplorer', 'eXtplorer', 'com_extplorer', 0, '../administrator/components/com_extplorer/images/joomla_x_icon.png', 0, '', 1),
(45, 'Art Adminer', 'option=com_artadminer', 0, 0, 'option=com_artadminer', 'Art Adminer', 'com_artadminer', 0, '../administrator/components/com_artadminer/images/artetics_logo.png', 0, '', 1),
(46, 'Adminer', '', 0, 45, 'option=com_artadminer&task=adminer', 'Adminer', 'com_artadminer', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(47, 'Settings', '', 0, 45, 'option=com_artadminer&task=settings', 'Settings', 'com_artadminer', 1, '../includes/js/ThemeOffice/controlpanel.png', 0, '', 1),
(48, 'Akeeba Backup', 'option=com_akeeba', 0, 0, 'option=com_akeeba', 'Akeeba Backup', 'com_akeeba', 0, 'components/com_akeeba/assets/images/akeeba-16.png', 0, '', 1),
(49, 'BACKUP_NOW', '', 0, 48, 'option=com_akeeba&view=backup', 'BACKUP_NOW', 'com_akeeba', 0, 'components/com_akeeba/assets/images/backup-16.png', 0, '', 1),
(50, 'CONFIGURATION', '', 0, 48, 'option=com_akeeba&view=config', 'CONFIGURATION', 'com_akeeba', 1, 'components/com_akeeba/assets/images/config-16.png', 0, '', 1),
(51, 'ADMINISTER_BACKUP_FILES', '', 0, 48, 'option=com_akeeba&view=buadmin', 'ADMINISTER_BACKUP_FILES', 'com_akeeba', 2, 'components/com_akeeba/assets/images/bufa-16.png', 0, '', 1),
(52, 'JCE', 'option=com_jce', 0, 0, 'option=com_jce', 'JCE', 'com_jce', 0, 'components/com_jce/img/logo.png', 0, '', 1),
(53, 'JCE MENU CPANEL', '', 0, 52, 'option=com_jce', 'JCE MENU CPANEL', 'com_jce', 0, 'templates/khepri/images/menu/icon-16-cpanel.png', 0, '', 1),
(54, 'JCE MENU CONFIG', '', 0, 52, 'option=com_jce&type=config', 'JCE MENU CONFIG', 'com_jce', 1, 'templates/khepri/images/menu/icon-16-config.png', 0, '', 1),
(55, 'JCE MENU GROUPS', '', 0, 52, 'option=com_jce&type=group', 'JCE MENU GROUPS', 'com_jce', 2, 'templates/khepri/images/menu/icon-16-user.png', 0, '', 1),
(56, 'JCE MENU PLUGINS', '', 0, 52, 'option=com_jce&type=plugin', 'JCE MENU PLUGINS', 'com_jce', 3, 'templates/khepri/images/menu/icon-16-plugin.png', 0, '', 1),
(57, 'JCE MENU INSTALL', '', 0, 52, 'option=com_jce&type=install', 'JCE MENU INSTALL', 'com_jce', 4, 'templates/khepri/images/menu/icon-16-install.png', 0, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_contact_details`
--

CREATE TABLE IF NOT EXISTS `jos_contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `con_position` varchar(255) default NULL,
  `address` text,
  `suburb` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `postcode` varchar(100) default NULL,
  `telephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `misc` mediumtext,
  `image` varchar(255) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(255) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `mobile` varchar(255) NOT NULL default '',
  `webpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_contact_details`
--

INSERT INTO `jos_contact_details` (`id`, `name`, `alias`, `con_position`, `address`, `suburb`, `state`, `country`, `postcode`, `telephone`, `fax`, `misc`, `image`, `imagepos`, `email_to`, `default_con`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `user_id`, `catid`, `access`, `mobile`, `webpage`) VALUES
(1, 'Investim', 'investim', '', 'Rua: Dr. João Colin, 1285,Bairro América ', 'Joinville', 'Santa Catarina', 'Brasil', '', '55 - (47) 3435-7058', 'investim10', '', '', NULL, 'investim@investim.com.br', 0, 1, 0, '0000-00-00 00:00:00', 1, 'show_name=1\nshow_position=1\nshow_email=1\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=', 0, 1, 0, '55 - (47) 88257874', 'investim10@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_content`
--

CREATE TABLE IF NOT EXISTS `jos_content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `title_alias` varchar(255) NOT NULL default '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL default '0',
  `sectionid` int(11) unsigned NOT NULL default '0',
  `mask` int(11) unsigned NOT NULL default '0',
  `catid` int(11) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL default '0',
  `created_by_alias` varchar(255) NOT NULL default '',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL default '1',
  `parentid` int(11) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `metadata` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `jos_content`
--

INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(1, 'Quem Somos', 'quem-somos', '', '<p><span style="font-size: 14pt;"><strong><span style="font-size: 18pt;">A Investim</span></strong></span></p>\r\n<hr />\r\n<p style="text-align: justify;"><span style="font-size: 10pt;">A &nbsp;<strong>Investim</strong> apoia as empresas e empresários na avaliação e transação de empresas e negócios, concentra as Ofertas de Empresas, Oportunidades e Parcerias em Negócios, assim como reunir Compradores, Investidores e Empresários.</span></p>\r\n<p style="text-align: justify;"><span style="font-size: 10pt;"></span><span style="font-size: 10pt;">Promover uma oportunidade de compra ou venda é um processo que requer confidencialidade de modo a minimizar eventuais riscos de turbulência interna e imagem externa negativa. A nossa pesquisa é feita com a salvaguarda da identidade da empresa em venda ou do promotor da aquisição, até existir uma intenção firme de iniciar negociações.</span></p>\r\n<p style="text-align: justify;"><span style="font-size: 10pt;">Com sede na maior cidade de Santa Catarina, Joinville é atualmente pólo industrial e comercial do estado, Nosso principal foco e oferecer resultados efetivos na intermediação de compra e venda de empresas, sendo inovativos, éticos e profissionais.</span></p>\r\n<p style="text-align: justify;"><span style="font-size: 10pt;">Nossa missão é buscar realização empresarial de nossos investidores bem como satisfação dos proprietário das empresa vendidas.</span></p>\r\n<span style="font-size: 10pt;">\r\n<hr />\r\n</span>', '', 1, 0, 0, 0, '2010-04-03 22:14:17', 62, '', '2010-05-17 18:27:47', 64, 0, '0000-00-00 00:00:00', '2010-04-03 22:14:17', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 14, 0, 3, '', '', 0, 117, 'robots=\nauthor='),
(2, 'Bem Vindo', 'bem-vindo', '', '<h1><span style="font-size: 18pt;">Bem Vindo ao Site da Investim</span></h1>\r\n<p style="text-align: justify;"> </p>\r\n<p style="text-align: justify;"><span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="color: #888888;">Com&nbsp;7 anos de experiência voltada exclusivamente à compra e venda empresas, através de um trabalho dedicado e confidencial, temos a certeza de estarmos preparado e intermediar negócios de pequeno médio e grande porte atendendo empresas e investidores nacionais internacionais.</span></span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="color: #888888;">A&nbsp;INVESTIM é uma empresa que se dedica às fusões e aquisições, aconselhando organizações e empresários na avaliação, aquisição e/ou venda de empresas.&nbsp;</span></span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="color: #888888;">Nosso site foi criado com intuito de concentrar oportunidade na compra e venda de empresas em território nacional e internacional.</span></span></span></p>\r\n<p style="text-align: justify;"><span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="color: #888888;">Faça seu Login e navegue neste novo&nbsp;portal de Negócios.</span></span></span></p>', '', 1, 0, 0, 0, '2010-04-03 22:14:17', 62, '', '2017-02-23 23:16:14', 62, 0, '0000-00-00 00:00:00', '2010-04-03 22:14:17', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 33, 0, 2, '', '', 0, 2, 'robots=\nauthor='),
(3, 'Serviços', 'servicos', '', '<p><strong><span style="font-size: 18pt;">Serviços</span></strong></p>\r\n<p><strong><span style="font-size: 18pt;">&nbsp;</span></strong></p>\r\n<span style="font-size: 18pt;"><strong>\r\n<hr />\r\n</strong>\r\n<ul>\r\n<li><span style="font-size: 12pt;">Intermediação</span></li>\r\n<li><span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="font-size: 12pt;">Busca de Oportunidades </span></span></span></li>\r\n<li><span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="font-size: 12pt;">Avaliação de Empresas</span></span></span></li>\r\n<li><span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="font-size: 12pt;">Captação de Empresas para Investidores Cadastrados</span></span></span></li>\r\n<li><span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="font-size: 12pt;">Captação de Investidores </span></span></span></li>\r\n<li><span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="font-size: 12pt;">Assessoria em Negociações e Investimentos </span></span></span></li>\r\n</ul>\r\n<span style="font-size: 12pt;"><span style="font-family: arial,helvetica,sans-serif;"><span style="font-size: 12pt;"><strong>\r\n<hr />\r\n</strong>\r\n<p><strong>&nbsp;</strong></p>\r\n</span></span></span></span>', '', 1, 0, 0, 0, '2010-04-11 21:52:28', 62, '', '2010-04-21 14:22:18', 64, 0, '0000-00-00 00:00:00', '2010-04-11 21:52:28', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 1, '', '', 0, 66, 'robots=\nauthor=');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_content_frontpage`
--

CREATE TABLE IF NOT EXISTS `jos_content_frontpage` (
  `content_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_content_frontpage`
--

INSERT INTO `jos_content_frontpage` (`content_id`, `ordering`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_content_rating`
--

CREATE TABLE IF NOT EXISTS `jos_content_rating` (
  `content_id` int(11) NOT NULL default '0',
  `rating_sum` int(11) unsigned NOT NULL default '0',
  `rating_count` int(11) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_content_rating`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_aro`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro` (
  `id` int(11) NOT NULL auto_increment,
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Extraindo dados da tabela `jos_core_acl_aro`
--

INSERT INTO `jos_core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', '62', 0, 'Administrator', 0),
(12, 'users', '64', 0, 'ADMINISTRADOR', 0),
(19, 'users', '71', 0, 'Anderson R. Moreira', 0),
(37, 'users', '89', 0, 'tatiana nakasone', 0),
(21, 'users', '73', 0, 'Marilu Moreira', 0),
(25, 'users', '77', 0, 'ronaldo stoppa', 0),
(30, 'users', '82', 0, 'Josiane', 0),
(41, 'users', '93', 0, 'Marco Aurélio', 0),
(32, 'users', '84', 0, 'Paulo', 0),
(39, 'users', '91', 0, 'Walther Petris', 0),
(42, 'users', '94', 0, 'elaine', 0),
(43, 'users', '95', 0, 'Bruno', 0),
(44, 'users', '96', 0, 'André Peres', 0),
(45, 'users', '97', 0, 'Pablo lopez', 0),
(49, 'users', '101', 0, 'jose caciolato', 0),
(47, 'users', '99', 0, 'João Godinho', 0),
(48, 'users', '100', 0, 'Rodrigo Bruder', 0),
(50, 'users', '102', 0, 'JORGE MAINARDI FERNANDES', 0),
(51, 'users', '103', 0, 'Nelson Cidral', 0),
(52, 'users', '104', 0, 'ary ventura', 0),
(53, 'users', '105', 0, 'Carlos Quandt', 0),
(54, 'users', '106', 0, 'eduardo campos', 0),
(55, 'users', '107', 0, 'silvio cesar', 0),
(57, 'users', '109', 0, 'Basilio Buyo', 0),
(58, 'users', '110', 0, 'OSVALDO', 0),
(59, 'users', '111', 0, 'Claudio', 0),
(60, 'users', '112', 0, 'Jaison Corrêa', 0),
(61, 'users', '113', 0, 'Hugo Lopez', 0),
(62, 'users', '114', 0, 'GILSON', 0),
(63, 'users', '115', 0, 'Luis M. G. Bonnecarrère', 0),
(64, 'users', '116', 0, 'Douglas', 0),
(65, 'users', '117', 0, 'ROGERIO FACIN', 0),
(66, 'users', '118', 0, 'Igor C. Menin', 0),
(67, 'users', '119', 0, 'Cristiam de Oliveira', 0),
(68, 'users', '120', 0, 'Renato', 0),
(69, 'users', '121', 0, 'EDSON ROSA MARTINS', 0),
(70, 'users', '122', 0, 'marcos', 0),
(71, 'users', '123', 0, 'juan', 0),
(75, 'users', '127', 0, 'Jaime', 0),
(73, 'users', '125', 0, 'Claudio', 0),
(74, 'users', '126', 0, 'Eduardo Bauer', 0),
(76, 'users', '128', 0, 'Ivan Silvério Junior', 0),
(77, 'users', '129', 0, 'Paulo Henrique de Oliveira', 0),
(78, 'users', '130', 0, 'Paulo', 0),
(79, 'users', '131', 0, 'Marco', 0),
(80, 'users', '132', 0, 'Claudio', 0),
(81, 'users', '133', 0, 'RICARDO', 0),
(82, 'users', '134', 0, 'Lisandro Prestes', 0),
(83, 'users', '135', 0, 'ELIO LOPES', 0),
(84, 'users', '136', 0, 'Ademir José Fagundes', 0),
(85, 'users', '137', 0, 'Jairo Cândido Espindola', 0),
(86, 'users', '138', 0, 'vagner', 0),
(87, 'users', '139', 0, 'raul', 0),
(88, 'users', '140', 0, 'catia almeida', 0),
(89, 'users', '141', 0, 'mauricio teixeira de souza', 0),
(90, 'users', '142', 0, 'Éder', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_aro_groups`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `jos_core_acl_aro_groups`
--

INSERT INTO `jos_core_acl_aro_groups` (`id`, `parent_id`, `name`, `lft`, `rgt`, `value`) VALUES
(17, 0, 'ROOT', 1, 22, 'ROOT'),
(28, 17, 'USERS', 2, 21, 'USERS'),
(29, 28, 'Public Frontend', 3, 12, 'Public Frontend'),
(18, 29, 'Registered', 4, 11, 'Registered'),
(19, 18, 'Author', 5, 10, 'Author'),
(20, 19, 'Editor', 6, 9, 'Editor'),
(21, 20, 'Publisher', 7, 8, 'Publisher'),
(30, 28, 'Public Backend', 13, 20, 'Public Backend'),
(23, 30, 'Manager', 14, 19, 'Manager'),
(24, 23, 'Administrator', 15, 18, 'Administrator'),
(25, 24, 'Super Administrator', 16, 17, 'Super Administrator');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_aro_map`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY  (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_core_acl_aro_map`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_aro_sections`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL auto_increment,
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `jos_core_acl_aro_sections`
--

INSERT INTO `jos_core_acl_aro_sections` (`id`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', 1, 'Users', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_groups_aro_map`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '',
  `aro_id` int(11) NOT NULL default '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_core_acl_groups_aro_map`
--

INSERT INTO `jos_core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`) VALUES
(18, '', 19),
(18, '', 21),
(18, '', 25),
(18, '', 30),
(18, '', 32),
(18, '', 37),
(18, '', 39),
(18, '', 41),
(18, '', 42),
(18, '', 43),
(18, '', 44),
(18, '', 45),
(18, '', 47),
(18, '', 48),
(18, '', 49),
(18, '', 50),
(18, '', 51),
(18, '', 52),
(18, '', 53),
(18, '', 54),
(18, '', 55),
(18, '', 57),
(18, '', 58),
(18, '', 59),
(18, '', 60),
(18, '', 61),
(18, '', 62),
(18, '', 63),
(18, '', 64),
(18, '', 65),
(18, '', 66),
(18, '', 67),
(18, '', 68),
(18, '', 69),
(18, '', 70),
(18, '', 71),
(18, '', 73),
(18, '', 74),
(18, '', 75),
(18, '', 76),
(18, '', 77),
(18, '', 78),
(18, '', 79),
(18, '', 80),
(18, '', 81),
(18, '', 82),
(18, '', 83),
(18, '', 84),
(18, '', 85),
(18, '', 86),
(18, '', 87),
(18, '', 88),
(18, '', 89),
(18, '', 90),
(25, '', 10),
(25, '', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_log_items`
--

CREATE TABLE IF NOT EXISTS `jos_core_log_items` (
  `time_stamp` date NOT NULL default '0000-00-00',
  `item_table` varchar(50) NOT NULL default '',
  `item_id` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_core_log_items`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_log_searches`
--

CREATE TABLE IF NOT EXISTS `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_core_log_searches`
--

INSERT INTO `jos_core_log_searches` (`search_term`, `hits`) VALUES
('teste', 1),
('ipsum', 9),
('compra', 2),
('em', 1),
('segurança', 2),
('loja', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_extwebdav_locks`
--

CREATE TABLE IF NOT EXISTS `jos_extwebdav_locks` (
  `token` varchar(255) NOT NULL default '',
  `path` varchar(200) NOT NULL default '',
  `expires` int(11) NOT NULL default '0',
  `owner` varchar(200) default NULL,
  `recursive` int(11) default '0',
  `writelock` int(11) default '0',
  `exclusivelock` int(11) NOT NULL default '0',
  PRIMARY KEY  (`token`),
  UNIQUE KEY `token` (`token`),
  KEY `path` (`path`),
  KEY `expires` (`expires`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_extwebdav_locks`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_extwebdav_properties`
--

CREATE TABLE IF NOT EXISTS `jos_extwebdav_properties` (
  `path` varchar(255) NOT NULL default '',
  `name` varchar(120) NOT NULL default '',
  `ns` varchar(120) NOT NULL default 'DAV:',
  `value` text,
  PRIMARY KEY  (`ns`(100),`path`(100),`name`(50)),
  KEY `path` (`path`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_extwebdav_properties`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_groups`
--

CREATE TABLE IF NOT EXISTS `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_groups`
--

INSERT INTO `jos_groups` (`id`, `name`) VALUES
(0, 'Public'),
(1, 'Registered'),
(2, 'Special');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jce_extensions`
--

CREATE TABLE IF NOT EXISTS `jos_jce_extensions` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `published` tinyint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_jce_extensions`
--

INSERT INTO `jos_jce_extensions` (`id`, `pid`, `name`, `extension`, `folder`, `published`) VALUES
(1, 54, 'Joomla Links for Advanced Link', 'joomlalinks', 'links', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jce_groups`
--

CREATE TABLE IF NOT EXISTS `jos_jce_groups` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `users` text NOT NULL,
  `types` varchar(255) NOT NULL,
  `components` text NOT NULL,
  `rows` text NOT NULL,
  `plugins` varchar(255) NOT NULL,
  `published` tinyint(3) NOT NULL,
  `ordering` int(11) NOT NULL,
  `checked_out` tinyint(3) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `jos_jce_groups`
--

INSERT INTO `jos_jce_groups` (`id`, `name`, `description`, `users`, `types`, `components`, `rows`, `plugins`, `published`, `ordering`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Default', 'Default group for all users with edit access', '', '19,20,21,23,24,25', '', '6,7,8,9,10,11,12,13,14,15,16,17,18,19;20,21,22,23,24,25,26,27,28,30,31,32,33,36;37,38,39,40,41,42,43,44,45,46,47,48;49,50,51,52,53,54,55,57,58', '1,2,3,4,5,6,20,21,37,38,39,40,41,42,49,50,51,52,53,54,55,57,58', 1, 1, 0, '0000-00-00 00:00:00', ''),
(2, 'Front End', 'Sample Group for Authors, Editors, Publishers', '', '19,20,21', '', '6,7,8,9,10,13,14,15,16,17,18,19,27,28;20,21,25,26,30,31,32,36,43,44,45,47,48,50,51;24,33,39,40,42,46,49,52,53,54,55,57,58', '6,20,21,50,51,1,3,5,39,40,42,49,52,53,54,55,57,58', 0, 2, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jce_plugins`
--

CREATE TABLE IF NOT EXISTS `jos_jce_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL,
  `row` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(3) NOT NULL,
  `editable` tinyint(3) NOT NULL,
  `iscore` tinyint(3) NOT NULL,
  `elements` varchar(255) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `plugin` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Extraindo dados da tabela `jos_jce_plugins`
--

INSERT INTO `jos_jce_plugins` (`id`, `title`, `name`, `type`, `icon`, `layout`, `row`, `ordering`, `published`, `editable`, `iscore`, `elements`, `checked_out`, `checked_out_time`) VALUES
(1, 'Context Menu', 'contextmenu', 'plugin', '', '', 0, 0, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(2, 'File Browser', 'browser', 'plugin', '', '', 0, 0, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(3, 'Inline Popups', 'inlinepopups', 'plugin', '', '', 0, 0, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(4, 'Media Support', 'media', 'plugin', '', '', 0, 0, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(5, 'Safari Browser Support', 'safari', 'plugin', '', '', 0, 0, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(6, 'Help', 'help', 'plugin', 'help', 'help', 1, 1, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(7, 'New Document', 'newdocument', 'command', 'newdocument', 'newdocument', 1, 2, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(8, 'Bold', 'bold', 'command', 'bold', 'bold', 1, 3, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(9, 'Italic', 'italic', 'command', 'italic', 'italic', 1, 4, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(10, 'Underline', 'underline', 'command', 'underline', 'underline', 1, 5, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(11, 'Font Select', 'fontselect', 'command', 'fontselect', 'fontselect', 1, 6, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(12, 'Font Size Select', 'fontsizeselect', 'command', 'fontsizeselect', 'fontsizeselect', 1, 7, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(13, 'Style Select', 'styleselect', 'command', 'styleselect', 'styleselect', 1, 8, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(14, 'StrikeThrough', 'strikethrough', 'command', 'strikethrough', 'strikethrough', 1, 9, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(15, 'Justify Full', 'full', 'command', 'justifyfull', 'justifyfull', 1, 10, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(16, 'Justify Center', 'center', 'command', 'justifycenter', 'justifycenter', 1, 11, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(17, 'Justify Left', 'left', 'command', 'justifyleft', 'justifyleft', 1, 12, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(18, 'Justify Right', 'right', 'command', 'justifyright', 'justifyright', 1, 13, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(19, 'Format Select', 'formatselect', 'command', 'formatselect', 'formatselect', 1, 14, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(20, 'Paste', 'paste', 'plugin', 'pasteword,pastetext', 'paste', 2, 1, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(21, 'Search Replace', 'searchreplace', 'plugin', 'search,replace', 'searchreplace', 2, 2, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(22, 'Font ForeColour', 'forecolor', 'command', 'forecolor', 'forecolor', 2, 3, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(23, 'Font BackColour', 'backcolor', 'command', 'backcolor', 'backcolor', 2, 4, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(24, 'Unlink', 'unlink', 'command', 'unlink', 'unlink', 2, 5, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(25, 'Indent', 'indent', 'command', 'indent', 'indent', 2, 6, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(26, 'Outdent', 'outdent', 'command', 'outdent', 'outdent', 2, 7, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(27, 'Undo', 'undo', 'command', 'undo', 'undo', 2, 8, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(28, 'Redo', 'redo', 'command', 'redo', 'redo', 2, 9, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(29, 'HTML', 'html', 'command', 'code', 'code', 2, 10, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(30, 'Numbered List', 'numlist', 'command', 'numlist', 'numlist', 2, 11, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(31, 'Bullet List', 'bullist', 'command', 'bullist', 'bullist', 2, 12, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(32, 'Clipboard Actions', 'clipboard', 'command', 'cut,copy,paste', 'clipboard', 2, 13, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(33, 'Anchor', 'anchor', 'command', 'anchor', 'anchor', 2, 14, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(34, 'Image', 'image', 'command', 'image', 'image', 2, 15, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(35, 'Link', 'link', 'command', 'link', 'link', 2, 16, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(36, 'Code Cleanup', 'cleanup', 'command', 'cleanup', 'cleanup', 2, 17, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(37, 'Directionality', 'directionality', 'plugin', 'ltr,rtl', 'directionality', 3, 1, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(38, 'Emotions', 'emotions', 'plugin', 'emotions', 'emotions', 3, 2, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(39, 'Fullscreen', 'fullscreen', 'plugin', 'fullscreen', 'fullscreen', 3, 3, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(40, 'Preview', 'preview', 'plugin', 'preview', 'preview', 3, 4, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(41, 'Tables', 'table', 'plugin', 'tablecontrols', 'buttons', 3, 5, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(42, 'Print', 'print', 'plugin', 'print', 'print', 3, 6, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(43, 'Horizontal Rule', 'hr', 'command', 'hr', 'hr', 3, 7, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(44, 'Subscript', 'sub', 'command', 'sub', 'sub', 3, 8, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(45, 'Superscript', 'sup', 'command', 'sup', 'sup', 3, 9, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(46, 'Visual Aid', 'visualaid', 'command', 'visualaid', 'visualaid', 3, 10, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(47, 'Character Map', 'charmap', 'command', 'charmap', 'charmap', 3, 11, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(48, 'Remove Format', 'removeformat', 'command', 'removeformat', 'removeformat', 3, 12, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(49, 'Styles', 'style', 'plugin', 'styleprops', 'style', 4, 1, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(50, 'Non-Breaking', 'nonbreaking', 'plugin', 'nonbreaking', 'nonbreaking', 4, 2, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(51, 'Visual Characters', 'visualchars', 'plugin', 'visualchars', 'visualchars', 4, 3, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(52, 'XHTML Xtras', 'xhtmlxtras', 'plugin', 'cite,abbr,acronym,del,ins,attribs', 'xhtmlxtras', 4, 4, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(53, 'Image Manager', 'imgmanager', 'plugin', 'imgmanager', 'imgmanager', 4, 5, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(54, 'Advanced Link', 'advlink', 'plugin', 'advlink', 'advlink', 4, 6, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(55, 'Spell Checker', 'spellchecker', 'plugin', 'spellchecker', 'spellchecker', 4, 7, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(56, 'Layers', 'layer', 'plugin', 'insertlayer,moveforward,movebackward,absolute', 'layer', 4, 8, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(57, 'Advanced Code Editor', 'advcode', 'plugin', 'advcode', 'advcode', 4, 9, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(58, 'Article Breaks', 'article', 'plugin', 'readmore,pagebreak', 'article', 4, 10, 1, 0, 1, '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_menu`
--

CREATE TABLE IF NOT EXISTS `jos_menu` (
  `id` int(11) NOT NULL auto_increment,
  `menutype` varchar(75) default NULL,
  `name` varchar(255) default NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text,
  `type` varchar(50) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `componentid` int(11) unsigned NOT NULL default '0',
  `sublevel` int(11) default '0',
  `ordering` int(11) default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL default '0',
  `browserNav` tinyint(4) default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `utaccess` tinyint(3) unsigned NOT NULL default '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL default '0',
  `rgt` int(11) unsigned NOT NULL default '0',
  `home` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `jos_menu`
--

INSERT INTO `jos_menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(2, 'mainmenu', 'A Investim', 'a-investim', 'index.php?option=com_content&view=article&id=1', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(4, 'mainmenu', 'Compre uma Empresa', 'compre-uma-empresa', 'index.php?option=com_compras', 'component', 1, 0, 43, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(5, 'mainmenu', 'Venda sua Empresa', 'venda-sua-empresa', 'index.php?option=com_vendas', 'component', 1, 0, 41, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(15, 'mainmenu', 'Contato', 'contato', 'index.php?option=com_contact&view=contact&id=1', 'component', 1, 0, 7, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_contact_list=0\nshow_category_crumb=0\ncontact_icons=\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=\nshow_position=\nshow_email=\nshow_telephone=\nshow_mobile=\nshow_fax=\nallow_vcard=\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=\ncustom_reply=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(14, 'mainmenu', 'Home', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'num_leading_articles=0\nnum_intro_articles=4\nnum_columns=1\nnum_links=4\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 1),
(16, 'mainmenu', 'Quem Somos', 'quem-somos', 'http://premiere.devhouse.com.br/investim', 'url', 1, 2, 0, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(17, 'mainmenu', 'Serviços', 'servicos-c', 'http://premiere.devhouse.com.br/investim', 'url', 1, 2, 0, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(18, 'mainmenu', 'IMOVEIL', 'im', 'index.php?Itemid=', 'menulink', -2, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=\n\n', 0, 0, 0),
(19, 'mainmenu', 'Empresas a Venda', 'empresas-a-venda', 'index.php?option=com_properties&view=properties&cid=0&tid=0', 'component', 1, 0, 34, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 1, 0, 'DetailsMarket=\nOnlyFeatured=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(21, 'top_menu', 'A Investim', 'a-investim', '', 'separator', 1, 0, 0, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(22, 'top_menu', 'Compre uma Empresa', 'compre-uma-empresa', '', 'separator', 1, 0, 0, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\n\n', 0, 0, 0),
(23, 'top_menu', 'Venda sua Empresa', 'venda-sua-empresa', 'index.php?option=com_vendas', 'component', 1, 0, 41, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(24, 'top_menu', 'Home', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'num_leading_articles=0\nnum_intro_articles=4\nnum_columns=1\nnum_links=4\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(25, 'top_menu', 'Contato', 'contato', 'index.php?option=com_contact&view=contact&id=1', 'component', 1, 0, 7, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_contact_list=0\nshow_category_crumb=0\ncontact_icons=\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=\nshow_position=\nshow_email=\nshow_telephone=\nshow_mobile=\nshow_fax=\nallow_vcard=\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=\ncustom_reply=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(26, 'top_menu', 'Quem Somos', 'quem-somos', 'index.php?option=com_content&view=article&id=1', 'component', 1, 21, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(27, 'top_menu', 'Serviços', 'servicos-c', 'index.php?option=com_content&view=article&id=3', 'component', 1, 21, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(28, 'top_menu', 'IMOVEIL', 'im', 'index.php?Itemid=', 'menulink', -2, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=\n\n', 0, 0, 0),
(29, 'top_menu', 'Empresas a Venda', 'empresas-a-venda', 'index.php?option=com_properties&view=properties&cid=0&tid=0', 'component', 1, 0, 34, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'DetailsMarket=\nOnlyFeatured=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(30, 'top_menu', 'Investidores', 'investidores', 'index.php?option=com_investidores', 'component', 1, 22, 66, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(31, 'top_menu', 'Cadastro de Investidor', 'cadastro-de-investidor', 'index.php?option=com_compras', 'component', 1, 22, 43, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_menu_types`
--

CREATE TABLE IF NOT EXISTS `jos_menu_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `menutype` varchar(75) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `jos_menu_types`
--

INSERT INTO `jos_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(5, 'top_menu', 'top_menu', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_messages`
--

CREATE TABLE IF NOT EXISTS `jos_messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id_from` int(10) unsigned NOT NULL default '0',
  `user_id_to` int(10) unsigned NOT NULL default '0',
  `folder_id` int(10) unsigned NOT NULL default '0',
  `date_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` int(11) NOT NULL default '0',
  `priority` int(1) unsigned NOT NULL default '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_messages`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_messages_cfg`
--

CREATE TABLE IF NOT EXISTS `jos_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `cfg_name` varchar(100) NOT NULL default '',
  `cfg_value` varchar(255) NOT NULL default '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_messages_cfg`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_migration_backlinks`
--

CREATE TABLE IF NOT EXISTS `jos_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY  (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_migration_backlinks`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_modules`
--

CREATE TABLE IF NOT EXISTS `jos_modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `position` varchar(50) default NULL,
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `module` varchar(50) default NULL,
  `numnews` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `showtitle` tinyint(3) unsigned NOT NULL default '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  `control` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `jos_modules`
--

INSERT INTO `jos_modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`) VALUES
(1, 'Main Menu', '', 1, 'menu', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'menutype=top_menu\nmenu_style=list\nstartLevel=0\nendLevel=3\nshowAllChildren=1\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=menu-dropdown\nmoduleclass_sfx=menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 1, 0, ''),
(2, 'Login', '', 1, 'login', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, '', 1, 1, ''),
(3, 'Popular', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_popular', 0, 2, 1, '', 0, 1, ''),
(4, 'Recent added Articles', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_latest', 0, 2, 1, 'ordering=c_dsc\nuser_id=0\ncache=0\n\n', 0, 1, ''),
(5, 'Menu Stats', '', 5, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 2, 1, '', 0, 1, ''),
(6, 'Unread Messages', '', 1, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_unread', 0, 2, 1, '', 1, 1, ''),
(7, 'Online Users', '', 2, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_online', 0, 2, 1, '', 1, 1, ''),
(8, 'Toolbar', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_toolbar', 0, 2, 1, '', 1, 1, ''),
(9, 'Quick Icons', '', 1, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_quickicon', 0, 2, 1, '', 1, 1, ''),
(10, 'Logged in Users', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_logged', 0, 2, 1, '', 0, 1, ''),
(11, 'Footer', '', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 1, '', 1, 1, ''),
(12, 'Admin Menu', '', 1, 'menu', 0, '0000-00-00 00:00:00', 1, 'mod_menu', 0, 2, 1, '', 0, 1, ''),
(13, 'Admin SubMenu', '', 1, 'submenu', 0, '0000-00-00 00:00:00', 1, 'mod_submenu', 0, 2, 1, '', 0, 1, ''),
(14, 'User Status', '', 1, 'status', 0, '0000-00-00 00:00:00', 1, 'mod_status', 0, 2, 1, '', 0, 1, ''),
(15, 'Title', '', 1, 'title', 0, '0000-00-00 00:00:00', 1, 'mod_title', 0, 2, 1, '', 0, 1, ''),
(16, 'Logo', '<p><img src="images/stories/logo.png" border="0" alt="Investim" title="Investim" /></p>', 1, 'logo', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 0, 'moduleclass_sfx=\n\n', 0, 0, ''),
(17, 'Busca', '', 1, 'search', 0, '0000-00-00 00:00:00', 0, 'mod_search', 0, 0, 0, 'moduleclass_sfx=-blank\nwidth=20\ntext=\nbutton=\nbutton_pos=right\nimagebutton=\nbutton_text=\nset_itemid=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(18, 'Rodapé', 'Copyright © Investim - 2010&nbsp;|&nbsp;Deus é super fiel |&nbsp;Todos Direitos Reservados | Desenvolvido por <a target="_blank" href="http://www.devhouse.com.br">DevHouse</a>', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 0, 'moduleclass_sfx=\n\n', 0, 0, ''),
(19, 'Slideshow', '<object height="150" width="950" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,32,18" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">\r\n<param name="src" value="monoslideshow.swf" />\r\n<param name="wmode" value="transparent" />\r\n<param name="flashvars" value="showLogo=false&amp;dataFile=http://www.investim.com.br/slideshow.xml.php" /><embed height="150" width="950" flashvars="showLogo=false&amp;dataFile=http://www.investim.com.br/slideshow.xml.php" wmode="transparent" src="monoslideshow.swf" type="application/x-shockwave-flash"></embed>\r\n</object>', 0, 'topblock', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 0, 'moduleclass_sfx=-blank\n\n', 0, 0, ''),
(20, 'Visitação', '', 5, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_vvisit_counter', 0, 0, 1, 'moduleclass_sfx=icon-users\nmode=standard\ninitialvalue=0\ndigit_type=default\nnumber_digits=6\nstats_type=default\nwidthtable=90\ntoday=Hoje\nyesterday=Ontem\nweek=Esta Semana\nlweek=Semana Passada\nmonth=Este Mês\nlmonth=Mês Passado\nall=Todos os Dias\nautohide=0\nhrline=0\nbeginday=No\nonline=Nós temos\nguestip=Seu IP\nguestinfo=Sim\nformattime=Hoje: %b %d, %Y\nissunday=1\ncache_time=15\npretext=\nposttext=\n\n', 0, 0, ''),
(26, 'Empresas em Destaque', '', 1, 'mainbottom', 0, '0000-00-00 00:00:00', 1, 'mod_investim', 0, 0, 1, 'moduleclass_sfx=style-rounded icon-investim\n\n', 0, 0, ''),
(29, 'Atendimento Online', '<center><a href="Javascript: return false;" tabindex="65535" onclick="window.open(''http://settings.messenger.live.com/Conversation/IMMe.aspx?invitee=17CF42928B36DF00@apps.messenger.live.com&amp;mkt=pt-BR'', ''_blank'', ''height=300px,width=300px'');"><img border="0" width="64" src="images/stories/atendimento.png" alt="atendimento" height="64" /> </a></center>', 0, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(32, 'Pesquisa de Empresas', '', 0, 'contenttop', 0, '0000-00-00 00:00:00', 1, 'mod_search_investim', 0, 0, 1, 'moduleclass_sfx=icon-busca style-rounded\n\n', 0, 0, ''),
(23, 'Navegação', '', 1, 'breadcrumbs', 0, '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 0, 0, 0, 'showHome=1\nhomeText=Home\nshowLast=1\nseparator=\nmoduleclass_sfx=\ncache=0\n\n', 0, 0, ''),
(24, 'Busca', '', 1, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_search', 0, 0, 1, 'moduleclass_sfx=icon-busca\nwidth=20\ntext=\nbutton=\nbutton_pos=right\nimagebutton=1\nbutton_text=\nset_itemid=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(25, 'Newsletter', '', 2, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_acymailing', 0, 0, 1, 'effect=normal\nlists=None\nhiddenlists=All\ndisplaymode=vertical\ncheckmode=0\nlistschecked=All\ndropdown=0\noverlay=0\nlink=1\ncustomfields=name,email\nnametext=\nemailtext=\nfieldsize=22\ndisplayfields=0\nintrotext=Receba notícias e informações\nfinaltext=\nshowunsubscribe=0\nshowsubscribe=1\nunsubscribetext=\nsubscribetext=\nredirectmode=0\nredirectlink=\nredirectlinkunsub=\nshowterms=0\nshowtermspopup=1\ntermscontent=0\nmootoolsintro=\nmootoolsbutton=\nboxwidth=200\nboxheight=150\nmoduleclass_sfx=color-templatecolor icon-mail\ntextalign=none\n\n', 0, 0, ''),
(36, 'Usuários ', '', 5, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_whosonline', 0, 0, 1, 'cache=0\nshowmode=0\nmoduleclass_sfx=\n\n', 0, 0, ''),
(37, 'Enquete', '', 0, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_poll', 0, 0, 1, 'id=2\nmoduleclass_sfx=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(42, 'Links', '', 0, 'bottomblock', 0, '0000-00-00 00:00:00', 0, 'mod_banners', 0, 0, 1, 'target=1\ncount=1\ncid=2\ncatid=3\ntag_search=0\nordering=0\nheader_text=\nfooter_text=\nmoduleclass_sfx=\ncache=1\ncache_time=900\n\n', 0, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_modules_menu`
--

CREATE TABLE IF NOT EXISTS `jos_modules_menu` (
  `moduleid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_modules_menu`
--

INSERT INTO `jos_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 14),
(26, 24),
(29, 0),
(32, 29),
(36, 0),
(37, 0),
(42, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_newsfeeds`
--

CREATE TABLE IF NOT EXISTS `jos_newsfeeds` (
  `catid` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text NOT NULL,
  `filename` varchar(200) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `numarticles` int(11) unsigned NOT NULL default '1',
  `cache_time` int(11) unsigned NOT NULL default '3600',
  `checked_out` tinyint(3) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `rtl` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `jos_newsfeeds`
--

INSERT INTO `jos_newsfeeds` (`catid`, `id`, `name`, `alias`, `link`, `filename`, `published`, `numarticles`, `cache_time`, `checked_out`, `checked_out_time`, `ordering`, `rtl`) VALUES
(4, 1, 'Igreja', 'igreja', 'www.templodaadóracao.com.br', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(4, 2, 'Noticias Utimas', 'noticias-utimas', 'http://g1.globo.com/dynamo/economia-e-negocios/rss2.xml', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_plugins`
--

CREATE TABLE IF NOT EXISTS `jos_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `element` varchar(100) NOT NULL default '',
  `folder` varchar(100) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `jos_plugins`
--

INSERT INTO `jos_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Authentication - Joomla', 'joomla', 'authentication', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(2, 'Authentication - LDAP', 'ldap', 'authentication', 0, 2, 0, 1, 0, 0, '0000-00-00 00:00:00', 'host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),
(3, 'Authentication - GMail', 'gmail', 'authentication', 0, 4, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(4, 'Authentication - OpenID', 'openid', 'authentication', 0, 3, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(5, 'User - Joomla!', 'joomla', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'autoregister=1\n\n'),
(6, 'Search - Content', 'content', 'search', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
(7, 'Search - Contacts', 'contacts', 'search', 0, 3, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(8, 'Search - Categories', 'categories', 'search', 0, 4, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(9, 'Search - Sections', 'sections', 'search', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(10, 'Search - Newsfeeds', 'newsfeeds', 'search', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(11, 'Search - Weblinks', 'weblinks', 'search', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(12, 'Content - Pagebreak', 'pagebreak', 'content', 0, 10000, 1, 1, 0, 0, '0000-00-00 00:00:00', 'enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
(13, 'Content - Rating', 'vote', 'content', 0, 4, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(14, 'Content - Email Cloaking', 'emailcloak', 'content', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'mode=1\n\n'),
(15, 'Content - Code Hightlighter (GeSHi)', 'geshi', 'content', 0, 5, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(16, 'Content - Load Module', 'loadmodule', 'content', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'enabled=1\nstyle=0\n\n'),
(17, 'Content - Page Navigation', 'pagenavigation', 'content', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'position=1\n\n'),
(18, 'Editor - No Editor', 'none', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(19, 'Editor - TinyMCE', 'tinymce', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 'mode=advanced\nskin=0\ncompressed=0\ncleanup_startup=0\ncleanup_save=2\nentity_encoding=raw\nlang_mode=0\nlang_code=en\ntext_direction=ltr\ncontent_css=1\ncontent_css_custom=\nrelative_urls=1\nnewlines=0\ninvalid_elements=applet\nextended_elements=\ntoolbar=top\ntoolbar_align=left\nhtml_height=550\nhtml_width=750\nelement_path=1\nfonts=1\npaste=1\nsearchreplace=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\ncolors=1\ntable=1\nsmilies=1\nmedia=1\nhr=1\ndirectionality=1\nfullscreen=1\nstyle=1\nlayer=1\nxhtmlxtras=1\nvisualchars=1\nnonbreaking=1\ntemplate=0\nadvimage=1\nadvlink=1\nautosave=1\ncontextmenu=1\ninlinepopups=1\nsafari=1\ncustom_plugin=\ncustom_button=\n\n'),
(20, 'Editor - XStandard Lite 2.0', 'xstandard', 'editors', 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(21, 'Editor Button - Image', 'image', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(22, 'Editor Button - Pagebreak', 'pagebreak', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(23, 'Editor Button - Readmore', 'readmore', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(24, 'XML-RPC - Joomla', 'joomla', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(25, 'XML-RPC - Blogger API', 'blogger', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', 'catid=1\nsectionid=0\n\n'),
(27, 'System - SEF', 'sef', 'system', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(28, 'System - Debug', 'debug', 'system', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', 'queries=1\nmemory=1\nlangauge=1\n\n'),
(29, 'System - Legacy', 'legacy', 'system', 0, 3, 0, 1, 0, 0, '0000-00-00 00:00:00', 'route=0\n\n'),
(30, 'System - Cache', 'cache', 'system', 0, 4, 0, 1, 0, 0, '0000-00-00 00:00:00', 'browsercache=0\ncachetime=15\n\n'),
(31, 'System - Log', 'log', 'system', 0, 5, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(32, 'System - Remember Me', 'remember', 'system', 0, 6, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(33, 'System - Backlink', 'backlink', 'system', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(34, 'System - Vinaora Visitors Counter', 'vvisit_counter', 'system', 0, -100, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(35, 'Editor - JCE 1.5.6', 'jce', 'editors', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(36, 'AcyMailing onPrepareContent trigger', 'contentplugin', 'acymailing', 0, 15, 0, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-contentplugin\n'),
(37, 'AcyMailing Tag : online links', 'online', 'acymailing', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-online\nviewtemplate=standard\nforwardtemplate=standard\n'),
(38, 'AcyMailing : Statistics Plugin', 'stats', 'acymailing', 0, 50, 1, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-stats\npicture=components/com_acymailing/images/statpicture.png\nwidth=50\nheight=1\n'),
(39, 'AcyMailing Tag : content insertion', 'tagcontent', 'acymailing', 0, 11, 1, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-tagcontent\ndisplayart=all\nremovepictures=never\nremovejs=yes\ncontentaccess=registered\n'),
(40, 'AcyMailing Tag : Subscriber information', 'tagsubscriber', 'acymailing', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-tagsubscriber\n'),
(41, 'AcyMailing Tag : Manage the Subscription', 'tagsubscription', 'acymailing', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-tagsubscription\n'),
(42, 'AcyMailing Tag : Date / Time', 'tagtime', 'acymailing', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-tagtime\n'),
(43, 'AcyMailing Tag : Joomla User Informations', 'taguser', 'acymailing', 0, 3, 1, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-taguser\n'),
(44, 'AcyMailing Template Class Replacer', 'template', 'acymailing', 0, 25, 1, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-template\n'),
(45, 'User - AcyMailing', 'acymailing', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'help=plugin-user\nlists=None\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_polls`
--

CREATE TABLE IF NOT EXISTS `jos_polls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `voters` int(9) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `lag` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `jos_polls`
--

INSERT INTO `jos_polls` (`id`, `title`, `alias`, `voters`, `checked_out`, `checked_out_time`, `published`, `access`, `lag`) VALUES
(1, 'COMO VC LOCALIZOU NOSSO SITE', 'como-vc-localizou-nosso-site', 1, 0, '0000-00-00 00:00:00', 0, 0, 86400),
(2, 'Qual o retorno do Investimento você procura?', 'qual-o-retorno-do-investimento-voce-procura', 3, 0, '0000-00-00 00:00:00', 1, 0, 86400);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_poll_data`
--

CREATE TABLE IF NOT EXISTS `jos_poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `jos_poll_data`
--

INSERT INTO `jos_poll_data` (`id`, `pollid`, `text`, `hits`) VALUES
(1, 1, 'INTERNET', 0),
(2, 1, 'RADIO', 1),
(3, 1, 'TV', 0),
(4, 1, 'JORNAL', 0),
(5, 1, 'INDICAÇÃO', 0),
(6, 1, '', 0),
(7, 1, '', 0),
(8, 1, '', 0),
(9, 1, '', 0),
(10, 1, '', 0),
(11, 1, '', 0),
(12, 1, '', 0),
(13, 2, '20 meses', 0),
(14, 2, '24 meses', 2),
(15, 2, '30 meses', 0),
(16, 2, '36 meses', 1),
(17, 2, '40 meses', 0),
(18, 2, 'Acima de 40 meses', 0),
(19, 2, '', 0),
(20, 2, '', 0),
(21, 2, '', 0),
(22, 2, '', 0),
(23, 2, '', 0),
(24, 2, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_poll_date`
--

CREATE TABLE IF NOT EXISTS `jos_poll_date` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL default '0',
  `poll_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `jos_poll_date`
--

INSERT INTO `jos_poll_date` (`id`, `date`, `vote_id`, `poll_id`) VALUES
(1, '2010-04-19 22:11:04', 2, 1),
(2, '2010-04-29 16:41:12', 14, 2),
(3, '2010-04-30 11:59:55', 16, 2),
(4, '2010-05-01 01:34:00', 14, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_poll_menu`
--

CREATE TABLE IF NOT EXISTS `jos_poll_menu` (
  `pollid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_poll_menu`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_available_product`
--

CREATE TABLE IF NOT EXISTS `jos_properties_available_product` (
  `id` int(11) NOT NULL auto_increment,
  `id_product` int(11) NOT NULL,
  `date` date NOT NULL,
  `available` tinyint(4) NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_properties_available_product`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_category`
--

CREATE TABLE IF NOT EXISTS `jos_properties_category` (
  `id` int(2) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `alias` varchar(100) default NULL,
  `parent` int(2) default NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `jos_properties_category`
--

INSERT INTO `jos_properties_category` (`id`, `name`, `alias`, `parent`, `published`, `ordering`) VALUES
(1, 'Comércio', 'comercio', 0, 1, 0),
(2, 'Indústria', 'industria', 0, 1, 0),
(3, 'Serviços', 'servicos', 0, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_comments`
--

CREATE TABLE IF NOT EXISTS `jos_properties_comments` (
  `id` int(10) NOT NULL auto_increment,
  `userid` int(10) NOT NULL default '0',
  `status` int(10) NOT NULL default '0',
  `productid` int(10) NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  `name` varchar(200) default NULL,
  `title` varchar(200) NOT NULL default '',
  `comment` text NOT NULL,
  `preview` text NOT NULL,
  `date` date NOT NULL default '0000-00-00',
  `published` tinyint(1) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `email` varchar(100) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `updateme` smallint(5) unsigned NOT NULL default '0',
  `custom1` varchar(200) NOT NULL default '',
  `custom2` varchar(200) NOT NULL default '',
  `custom3` varchar(200) NOT NULL default '',
  `custom4` varchar(200) NOT NULL default '',
  `custom5` varchar(200) NOT NULL default '',
  `star` decimal(3,2) NOT NULL default '5.00',
  `star1` tinyint(1) NOT NULL,
  `star2` tinyint(1) NOT NULL,
  `star3` tinyint(1) NOT NULL,
  `star4` tinyint(1) NOT NULL,
  `star5` tinyint(1) NOT NULL,
  `user_id` int(10) unsigned NOT NULL default '0',
  `option` varchar(50) NOT NULL default 'com_content',
  `voted` smallint(6) NOT NULL default '0',
  `referer` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_properties_comments`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_contacts`
--

CREATE TABLE IF NOT EXISTS `jos_properties_contacts` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `cp` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `userfile` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_properties_contacts`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_country`
--

CREATE TABLE IF NOT EXISTS `jos_properties_country` (
  `id` int(3) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `jos_properties_country`
--

INSERT INTO `jos_properties_country` (`id`, `name`, `alias`, `published`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 'Brasil', 'br', 1, 1, 0, '0000-00-00 00:00:00'),
(2, 'Argentina', 'ar', 1, 2, 0, '0000-00-00 00:00:00'),
(10, 'Alemanha', 'alemanha', 1, 0, 0, '0000-00-00 00:00:00'),
(4, 'Espanha', 'espanha', 1, 0, 0, '0000-00-00 00:00:00'),
(5, 'Chile', 'chile', 1, 0, 0, '0000-00-00 00:00:00'),
(6, 'Uruguai', 'uruguai', 1, 0, 0, '0000-00-00 00:00:00'),
(7, 'Bolívia', 'bolivia', 1, 0, 0, '0000-00-00 00:00:00'),
(8, 'América do Norte', 'america-do-norte', 1, 0, 0, '0000-00-00 00:00:00'),
(9, 'Paraguai', 'paraguai', 1, 0, 0, '0000-00-00 00:00:00'),
(11, 'Portugal', 'portugal', 1, 0, 0, '0000-00-00 00:00:00'),
(12, 'China', 'china', 1, 0, 0, '0000-00-00 00:00:00'),
(13, 'Outros', 'outros', 1, 0, 0, '0000-00-00 00:00:00'),
(14, 'Africa do sul', 'africa-do-sul', 1, 0, 0, '0000-00-00 00:00:00'),
(15, 'Angola', 'angola', 1, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_images`
--

CREATE TABLE IF NOT EXISTS `jos_properties_images` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `parent` int(4) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(4) NOT NULL,
  `type` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `rout` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `uid` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `jos_properties_images`
--

INSERT INTO `jos_properties_images` (`id`, `name`, `parent`, `published`, `ordering`, `type`, `path`, `rout`, `date`, `uid`, `product_id`, `sector`, `text`) VALUES
(6, '6_22.jpg', 22, 0, 1, 'jpg', '/var/www/vhosts/devhouse.com.br/subdomains/premiere/httpdocs/investim/images/properties/images//22/6_22.jpg', 'http://premiere.devhouse.com.br/investim/images/properties/images/22/6_22.jpg', '2010-04-07 01:19:25', 64, 22, '0', ''),
(7, '7_0.jpg', 0, 1, 1, 'jpg', '/home/storage/f/9f/f6/investim/public_html/images/properties/images//0/7_0.jpg', 'http://www.investim.com.br/images/properties/images/0/7_0.jpg', '2010-04-15 12:57:38', 64, 0, '0', ''),
(8, '8_25.jpg', 25, 1, 1, 'jpg', '/home/storage/f/9f/f6/investim/public_html/images/properties/images//25/8_25.jpg', 'http://www.investim.com.br/images/properties/images/25/8_25.jpg', '2010-04-15 13:02:27', 64, 25, '0', ''),
(9, '9_47.jpg', 47, 1, 1, 'jpg', '/home/storage/f/9f/f6/investim/public_html/images/properties/images//47/9_47.jpg', 'http://www.investim.com.br/images/properties/images/47/9_47.jpg', '2010-04-26 23:51:55', 64, 47, '', ''),
(10, '10_47.jpg', 47, 1, 2, 'jpg', '/home/storage/f/9f/f6/investim/public_html/images/properties/images//47/10_47.jpg', 'http://www.investim.com.br/images/properties/images/47/10_47.jpg', '2010-04-27 15:05:52', 64, 47, '', ''),
(11, '11_47.jpg', 47, 1, 3, 'jpg', '/home/storage/f/9f/f6/investim/public_html/images/properties/images//47/11_47.jpg', 'http://www.investim.com.br/images/properties/images/47/11_47.jpg', '2010-04-27 15:06:37', 64, 47, '', ''),
(12, '12_47.jpg', 47, 1, 4, 'jpg', '/home/storage/f/9f/f6/investim/public_html/images/properties/images//47/12_47.jpg', 'http://www.investim.com.br/images/properties/images/47/12_47.jpg', '2010-04-27 15:07:05', 64, 47, '', ''),
(13, '13_47.jpg', 47, 1, 5, 'jpg', '/home/storage/f/9f/f6/investim/public_html/images/properties/images//47/13_47.jpg', 'http://www.investim.com.br/images/properties/images/47/13_47.jpg', '2010-04-27 15:07:34', 64, 47, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_lightbox`
--

CREATE TABLE IF NOT EXISTS `jos_properties_lightbox` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL default '0',
  `propid` int(11) NOT NULL default '0',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_properties_lightbox`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_locality`
--

CREATE TABLE IF NOT EXISTS `jos_properties_locality` (
  `id` int(6) NOT NULL auto_increment,
  `parent` int(3) NOT NULL,
  `mid` int(6) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `jos_properties_locality`
--

INSERT INTO `jos_properties_locality` (`id`, `parent`, `mid`, `zipcode`, `name`, `alias`, `published`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 1, 0, 0, 'Joinville', 'joi', 1, 0, 0, '0000-00-00 00:00:00'),
(2, 1, 0, 0, 'Jaraguá do Sul', 'jar', 1, 0, 0, '0000-00-00 00:00:00'),
(3, 1, 0, 0, 'Florianópolis', 'flo', 1, 0, 0, '0000-00-00 00:00:00'),
(5, 1, 0, 0, 'Sul do Brasil', 'sul', 1, 0, 0, '0000-00-00 00:00:00'),
(6, 1, 0, 0, 'São Francisco do Sul', 'sao-francisco-do-sul', 1, 0, 0, '0000-00-00 00:00:00'),
(7, 1, 0, 0, 'Litoral', 'litoral', 1, 0, 0, '0000-00-00 00:00:00'),
(8, 1, 0, 0, 'Garuva', 'garuva', 1, 0, 0, '0000-00-00 00:00:00'),
(9, 1, 0, 0, 'Araguari', 'araguari', 1, 0, 0, '0000-00-00 00:00:00'),
(10, 3, 0, 0, 'Canela', 'canela', 1, 0, 0, '0000-00-00 00:00:00'),
(11, 6, 0, 0, 'Outras', 'outras', 1, 0, 0, '0000-00-00 00:00:00'),
(12, 29, 0, 0, 'Rio Braco', 'rio-braco', 1, 0, 0, '0000-00-00 00:00:00'),
(13, 28, 0, 0, 'Maceió', 'maceio', 1, 0, 0, '0000-00-00 00:00:00'),
(20, 1, 0, 0, 'Tubarão', 'tubarao', 1, 0, 0, '0000-00-00 00:00:00'),
(16, 27, 0, 0, 'Macapá', 'macapa', 1, 0, 0, '0000-00-00 00:00:00'),
(18, 26, 0, 0, 'Manaus', 'manaus', 1, 0, 0, '0000-00-00 00:00:00'),
(19, 25, 0, 0, 'Salvador', 'salvador', 1, 0, 0, '0000-00-00 00:00:00'),
(21, 1, 0, 0, 'Litoral Sul', 'litoral-sul', 1, 0, 0, '0000-00-00 00:00:00'),
(22, 1, 0, 0, 'Litoral Norte', 'litoral-norte', 1, 0, 0, '0000-00-00 00:00:00'),
(24, 4, 0, 0, 'Outras', 'outras', 1, 0, 0, '0000-00-00 00:00:00'),
(25, 4, 0, 0, 'Eldorado Paulista', 'eldorado-paulista', 1, 0, 0, '0000-00-00 00:00:00'),
(26, 30, 0, 0, 'Região sul', 'regiao-sul', 1, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_pdfs`
--

CREATE TABLE IF NOT EXISTS `jos_properties_pdfs` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `parent` int(3) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(5) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `archivo_path` varchar(255) NOT NULL,
  `archivo_rout` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_properties_pdfs`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_products`
--

CREATE TABLE IF NOT EXISTS `jos_properties_products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `parent` int(6) NOT NULL,
  `agent_id` int(6) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `type` int(6) NOT NULL,
  `cid` int(6) NOT NULL,
  `lid` int(6) NOT NULL,
  `sid` int(6) NOT NULL,
  `cyid` int(6) NOT NULL,
  `postcode` varchar(255) default NULL,
  `address` varchar(255) default NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `price` decimal(15,2) default NULL,
  `published` tinyint(1) NOT NULL,
  `use_booking` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `panoramic` varchar(255) default NULL,
  `video` text NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `years` int(4) NOT NULL,
  `bedrooms` tinyint(1) NOT NULL,
  `bathrooms` tinyint(1) NOT NULL,
  `garage` tinyint(1) NOT NULL,
  `area` int(5) NOT NULL,
  `covered_area` int(5) NOT NULL,
  `hits` int(6) NOT NULL,
  `listdate` date NOT NULL default '0000-00-00',
  `refresh_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `extra1` tinyint(1) NOT NULL default '0',
  `extra2` tinyint(1) NOT NULL default '0',
  `extra3` tinyint(1) NOT NULL default '0',
  `extra4` tinyint(1) NOT NULL default '0',
  `extra5` tinyint(1) NOT NULL default '0',
  `extra6` tinyint(1) NOT NULL default '0',
  `extra7` tinyint(1) NOT NULL default '0',
  `extra8` tinyint(1) NOT NULL default '0',
  `extra9` tinyint(1) NOT NULL default '0',
  `extra10` tinyint(1) NOT NULL default '0',
  `extra11` tinyint(1) NOT NULL default '0',
  `extra12` tinyint(1) NOT NULL default '0',
  `extra13` tinyint(1) NOT NULL default '0',
  `extra14` tinyint(1) NOT NULL default '0',
  `extra15` tinyint(1) NOT NULL default '0',
  `extra16` tinyint(1) NOT NULL default '0',
  `extra17` tinyint(1) NOT NULL default '0',
  `extra18` tinyint(1) NOT NULL default '0',
  `extra19` tinyint(1) NOT NULL default '0',
  `extra20` tinyint(1) NOT NULL default '0',
  `extra21` tinyint(1) NOT NULL default '0',
  `extra22` tinyint(1) NOT NULL default '0',
  `extra23` tinyint(1) NOT NULL default '0',
  `extra24` tinyint(1) NOT NULL default '0',
  `extra25` tinyint(1) NOT NULL default '0',
  `extra26` tinyint(1) NOT NULL default '0',
  `extra27` tinyint(1) NOT NULL default '0',
  `extra28` tinyint(1) NOT NULL default '0',
  `extra29` tinyint(1) NOT NULL default '0',
  `extra30` tinyint(1) NOT NULL default '0',
  `extra31` tinyint(1) NOT NULL default '0',
  `extra32` tinyint(1) NOT NULL default '0',
  `extra33` tinyint(1) NOT NULL default '0',
  `extra34` tinyint(1) NOT NULL default '0',
  `extra35` tinyint(1) NOT NULL default '0',
  `extra36` tinyint(1) NOT NULL default '0',
  `extra37` tinyint(1) NOT NULL default '0',
  `extra38` tinyint(1) NOT NULL default '0',
  `extra39` tinyint(1) NOT NULL default '0',
  `extra40` tinyint(1) NOT NULL default '0',
  `extra41` varchar(255) NOT NULL,
  `extra42` varchar(255) NOT NULL,
  `extra43` varchar(255) NOT NULL,
  `extra44` varchar(255) NOT NULL,
  `extra45` varchar(255) NOT NULL,
  `extra46` varchar(255) NOT NULL,
  `extra47` varchar(255) NOT NULL,
  `extra48` varchar(255) NOT NULL,
  `extra49` varchar(255) NOT NULL,
  `extra50` varchar(255) NOT NULL,
  `extra51` varchar(255) NOT NULL,
  `extra52` varchar(255) NOT NULL,
  `extra53` varchar(255) NOT NULL,
  `extra54` varchar(255) NOT NULL,
  `extra55` varchar(255) NOT NULL,
  `extra56` varchar(255) NOT NULL,
  `extra57` varchar(255) NOT NULL,
  `extra58` varchar(255) NOT NULL,
  `extra59` varchar(255) NOT NULL,
  `extra60` varchar(255) NOT NULL,
  `extra61` varchar(255) NOT NULL,
  `extra62` varchar(255) NOT NULL,
  `extra63` varchar(255) NOT NULL,
  `extra64` varchar(255) NOT NULL,
  `extra65` varchar(255) NOT NULL,
  `extra66` varchar(255) NOT NULL,
  `extra67` varchar(255) NOT NULL,
  `extra68` varchar(255) NOT NULL,
  `extra69` varchar(255) NOT NULL,
  `extra70` varchar(255) NOT NULL,
  `extra71` varchar(255) NOT NULL,
  `extra72` varchar(255) NOT NULL,
  `extra73` varchar(255) NOT NULL,
  `extra74` varchar(255) NOT NULL,
  `extra75` varchar(255) NOT NULL,
  `extra76` varchar(255) NOT NULL,
  `extra77` varchar(255) NOT NULL,
  `extra78` varchar(255) NOT NULL,
  `extra79` varchar(255) NOT NULL,
  `extra80` varchar(255) NOT NULL,
  `extra81` text NOT NULL,
  `extra82` text NOT NULL,
  `extra83` text NOT NULL,
  `extra84` text NOT NULL,
  `extra85` text NOT NULL,
  `extra86` text NOT NULL,
  `extra87` text NOT NULL,
  `extra88` text NOT NULL,
  `extra89` text NOT NULL,
  `extra90` text NOT NULL,
  `extra91` text NOT NULL,
  `extra92` text NOT NULL,
  `extra93` text NOT NULL,
  `extra94` text NOT NULL,
  `extra95` text NOT NULL,
  `extra96` text NOT NULL,
  `extra97` text NOT NULL,
  `extra98` text NOT NULL,
  `extra99` text NOT NULL,
  `faturamento` decimal(15,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Extraindo dados da tabela `jos_properties_products`
--

INSERT INTO `jos_properties_products` (`id`, `name`, `alias`, `parent`, `agent_id`, `agent`, `ref`, `type`, `cid`, `lid`, `sid`, `cyid`, `postcode`, `address`, `description`, `text`, `price`, `published`, `use_booking`, `ordering`, `panoramic`, `video`, `lat`, `lng`, `available`, `featured`, `years`, `bedrooms`, `bathrooms`, `garage`, `area`, `covered_area`, `hits`, `listdate`, `refresh_time`, `checked_out`, `checked_out_time`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`, `extra11`, `extra12`, `extra13`, `extra14`, `extra15`, `extra16`, `extra17`, `extra18`, `extra19`, `extra20`, `extra21`, `extra22`, `extra23`, `extra24`, `extra25`, `extra26`, `extra27`, `extra28`, `extra29`, `extra30`, `extra31`, `extra32`, `extra33`, `extra34`, `extra35`, `extra36`, `extra37`, `extra38`, `extra39`, `extra40`, `extra41`, `extra42`, `extra43`, `extra44`, `extra45`, `extra46`, `extra47`, `extra48`, `extra49`, `extra50`, `extra51`, `extra52`, `extra53`, `extra54`, `extra55`, `extra56`, `extra57`, `extra58`, `extra59`, `extra60`, `extra61`, `extra62`, `extra63`, `extra64`, `extra65`, `extra66`, `extra67`, `extra68`, `extra69`, `extra70`, `extra71`, `extra72`, `extra73`, `extra74`, `extra75`, `extra76`, `extra77`, `extra78`, `extra79`, `extra80`, `extra81`, `extra82`, `extra83`, `extra84`, `extra85`, `extra86`, `extra87`, `extra88`, `extra89`, `extra90`, `extra91`, `extra92`, `extra93`, `extra94`, `extra95`, `extra96`, `extra97`, `extra98`, `extra99`, `faturamento`) VALUES
(21, '2 POSTOS DE COMBUSTÍVEIS', 'titulo-', 0, 0, '', '0001', 1, 1, 1, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 3, 1, 0, 0, 0, 0, 0, 0, 76, '0000-00-00', '2010-04-28 18:49:50', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '0,00', '1995', '0,00', '0,00', '0,00', '480.000,00', '30.000,00', '2', '8.000,00', '500.000,00', '18', '', '', '', '', '', '', '', '', 'Conveniência completa, posto completo.', 'Gasolina, Álcool, diesel, óleo, loja de conveniência.', 'Lavação, loja de conveniência, troca de óleo.', 'Comercial', 'Possui somente os passivos normal de funcionários caso queria demiti-los, aproximadamente 40 mil.', 'Este valor é pelo os dois postos, aceita proposta', 'Localização em avenida com 3 ruas duas laterais e uma frontal, muito movimentadas, acessos aos bairros,  Possibilidade ampla de aumento do faturamento.Venda de 170.000 litros mês os dois postos com possibilidade de aumento de faturamento.\r\nLoja de conveniência faturamento em torno de 70 mil, porém muito mal trabalhadas e com aspectos feios, com boa reforma já venderiam mais.\r\nContrato com o dono do imóvel até 2017 com multa de rescisão caso ele venha cancelar o contrato, \r\nContrato com a bandeira tem mais 5 anos.\r\n', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(22, 'EMPRESA DE SEGURANÇA PRIVADA', 'empresa-de-seguranca', 0, 0, '', '0002', 16, 3, 5, 1, 1, NULL, 'Rua Max', '', '', NULL, 1, 0, 0, NULL, '', -26.379999, -48.821030, 0, 1, 0, 0, 0, 0, 0, 0, 51, '0000-00-00', '2010-04-28 18:50:09', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'eeeeeeeeeee', '11.691.117/0001-85', 'Ronaldo', '', 'jjjjjjjjjjjjjj', '47 34357058', 'mauriciobbn@brturbo.com.br', 'mauriciobbn', 'maudigital@ig.com.br', 'Sociedade Simples', 'Simples', 'mmmmmmmmmmm', '0,00', '1997', '0,00', '0,00', '0,00', '560.000,00', '100.000,00', '6', '35.000,00', '1.800.000,00', '250', '', '', '', '', '', '', '', '', 'São 4 veículos todos pagos, varias armas, estrutura completa duas sedes com escritórios montados, etc...', '', 'Segurança patrimonial , escolta armada ,segurança pessoal e eventos', 'Reduzir rítimo de trabalho, pois possui mais negócios', 'Não a nenhuma divida, credito com bancos, somente o passivo normal com os funcionários.', 'Estuda 50 % em imoveis', 'Empresa com tradição, clientela formada de pequenas médias e grandes empresas, empresa enxuta, com possibilidade de dobrar o faturamento mais não se faz e virtude de falta de tempo para dedicação dos sócios, muita licitação governamental que se pode entrar atualmente é somente empresa particular, os sócios retiram realmente o lucro são 15 mil para cada um e a sobra se reinveste no negocio.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(23, 'LOJA DE MATERIAL ELÉTRICO', 'loja-de-material-eletrico', 0, 0, '', '0003', 4, 1, 1, 1, 1, NULL, 'Rua São paulo', '', '<p>Otimo negocio, com mais de 15 anos de experieicial</p>\r\n<p> </p>', NULL, 1, 0, 0, NULL, '', -26.323462, -48.842247, 0, 1, 0, 0, 0, 0, 0, 0, 26, '0000-00-00', '2010-04-15 10:25:35', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Loja de material', '11.691.117/0001-85', 'nilton', 'Rua', 'Floresta', '47 34357058', 'mauriciobbn@brturbo.com.br', 'mauriciobbn', 'maudigital@ig.com.br', 'Sociedade Simples', 'Simples', 'www.niop.com.br', '300.000,00', '1993', '0,0', '0,0', '0,0', '150.000,00', '60.000,00', '45,00', '8.000,00', '380.000,00', '7', '', '', '', '', '', '', '', '', 'Área de venda 280m2\r\nÁrea de mezanino 128 m2\r\nEscritório 20m2\r\nDeposito 150 m2\r\n6 computadores, impressoras, sistema de controle.\r\nMoveis e utensílios;\r\nAlarme;\r\n5 telefones, com central para 8 telefones;\r\nAutomóvel saveiro ano 2010 completa.\r\nLinha completa de materiais elétricos \r\n', 'Material eletrico em geral', 'Entrega', 'Aposentadoria', 'Giro normal do negocio no valor aproximado de R$ 160.000,00 contas a pagar conforme vendas, e mais um financiamento do veiculo no valor de R$ 36.000,00.', 'Acieta proposta', 'localização,Conceito no mercado.\r\nParceria com eletricista.\r\nCom 15 anos de mercado.\r\nÓtima região\r\n ', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(24, 'REVISTARIA E TABACARIA', 'revistaria-e-tabacaria', 0, 0, '', '0004', 5, 1, 1, 1, 1, NULL, 'AV. GETULIO VARGAS 1446, LOJA 67', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 23, '0000-00-00', '2010-04-28 18:50:37', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'REVISTARIA E TABACARIA RM LTDA', '03.794.137/0001-53', 'OTTO/ ROSANA', 'SHOPPING AMERICANAS', 'ANITA GARIBALDI ', '47 34554206', 'OTTO.ANGEL@CAIXA.GOV.BR', 'NÃO TEM ', 'Ñ', 'Sociedade Simples', 'Simples', '', '7.000,00', '2000', '874.448,00', '950.225,00', '928.025,00', '77.335,00', '14.000,00', '18', '4.000,00', '130.000,00', '3', '', '', '', '', '', '', '', '', 'Móveis  em geral, equipamentos de informática, área de 42 m2.', 'Revista- Jornais- DVDs- Tabacaria- Bomboniere- Presentes- Adesivos -Cartão Telefônico- Passe De Ônibus- Livros E Outros.', '', 'Abertura de um novo negócio no ramo de fermentaria com outro sócio.', 'Nenhum, somente o deposito que deverá ser feita no valor de R$ 20.000,00 junto às editoras, este dinheiro ficará a juros como garantia.', 'Negociável.', 'Produtos consignados, tradição, fácil administração.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(25, 'LOTÉRICA', 'loterica', 0, 0, '', '0005', 6, 3, 1, 1, 1, NULL, '', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 18, '2010-04-15', '2010-05-03 18:09:57', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Loterica', '03.794.137/0001-55', '', '', '', '', '', '9999', '999999', 'Sociedade Simples', 'Simples', '', '0,00', '1990', '0,0', '0,0', '0,0', '28.000,00', '25.000,00', '60', '19.000,00', '1.000.000,00', '10', '', '', '', '', '', '', '', '', 'Computadores, impressoras, sistema de controle.\r\nMoveis e utensílios;\r\nAlarme;\r\nUnidade possui um espaço de 214 m2 - é uma mine agencia bancaria, pois temos cadeiras de espera, senha, Horário de funcionamento:  08 ÀS 19h\r\n', '', 'Pagamentos e Jogos', 'Comercial mora em outra cidade', 'Nenhum', 'Avista', 'Bairro com mais de 30 mil habitantes, em crescimento, próximo a grandes indústrias e comércios. ', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(26, 'HOTEL ', 'hotel', 0, 0, '', '0006', 7, 1, 1, 1, 1, NULL, 'rUA XV', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 14, '2010-04-15', '2010-04-28 18:51:17', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Hotel', '03.794.137/0001-55', '', '.......', '', '', '', '', '', 'Sociedade Simples', 'Simples', '', '0,00', '2003', '0,00', '0,00', '600.000,00', '50.000,00', '30.000,00', '50', '25.000,00', '3.300.000,00', '8', '', '', '', '', '', '', '', '', 'Construção toda em Aço carbono, com enchimento de concreto alta resistência.\r\nÁrea de terreno:  1.814,60 m² \r\nÁrea de Construção: 1.400,00 m²\r\nSistema de cameras com acompanhamento via internet, programa de gerencialmento, comptadores.\r\nParte interna uma Clara bóia onde ilumina os corredores economizando energia.\r\nEspaço para implantação de elevador\r\nParede sobre colunas fácil revolver\r\nÓtimas instalações elétricas\r\nCozinha montada  medindo 4,00 x 5,00 m²\r\nRecepção alto padrão\r\nPrédio com menos de 10 anos de construção\r\nEstacionamento para 30 carros fechados e 10 carros na calçada (estacionamento tanto para carros como para ônibus e caminhão)\r\nCentral de gás\r\nAcesso fácil a BR\r\nÁrea de Café com mais de 50 lugares\r\n\r\n', 'Refrigerente, bebidas, salgadinho etc..', 'Hospedagem, reuniões, Coffee - Shop integrado à recepção ', 'Comercial', 'nenhum', 'Aceita proposta', 'Principal acesso da cidade, localizado em cidade industrial com vários eventos municipais e pontos turísticos, diferenciam dos outros hotéis em qualidade de serviços e instalações, com diárias compatíveis com a realidade. Observando a necessidade de clientes, turistas, pessoas que se utilizam diariamente dos serviços de hospedagem, oferecemos esta opção com praticidade no atendimento.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(27, 'DISTRIBUIDORA DE METAIS', 'titulo-', 0, 0, '', '0007', 9, 1, 1, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 0, 1, 0, 0, 0, 0, 0, 0, 54, '0000-00-00', '2010-04-28 18:51:35', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '120.000,00', '2008', '0,00', '0,00', '0,00', '30.000,00', '13.000,00', '40', '8.000,00', '280.000,00', '4', '', '', '', '', '', '', '', '', '3 Computadores no valor aproximando de R$ 5.000,00\r\n1 Sistema ERP no valor de R$ 8.000,00\r\n1 Ar-condicionado valor de R$ 1.000,00\r\nMobília em geral valor de R$ 2.500,00\r\n1 Maquina de corte valor de R$ 10.000,00\r\n1 Maquina de corte valor de R$  8.000,00\r\nBalança digital R$ 1.500,00\r\nFerramentas R$ 2.000,00\r\nValor total R$ 38.000,00\r\n', 'Corte sob medida em materiais não ferrosos como Latão, cobre, bronze, alumínio.', 'Corte e entrega', 'Falta de Capital de Giro', 'Será quitado no momento da venda!', 'Aceita Proposta', 'Mercado em crescimento, cortes sob medida, margem de lucro.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(28, 'MERCADO NO BAIRRO', 'mercado-no-bairro', 0, 0, '', '0008', 8, 1, 1, 1, 1, NULL, 'Profeta Elias n 83', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 13, '0000-00-00', '2010-04-28 18:52:05', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Alexandre de oliveira mer', '06.262.725/0001-34', 'Alexandre', '', 'Bairro Popular', '47 34379398', 'berkenhockelaine@gmail.com', 'NÃO TEM ', 'ñ', 'Sociedade Simples', 'Lucro Real', 'ñ', '130.000,00', '2004', '1.000.000,00', '1.200.000,00', '1.400.000,00', '140.000,00', '20.000,00', '8', '8.000,00', '190.000,00', '7', '', '', '', '', '', '', '', '', '1 Câmera fria 600 kg\r\n1 expositor de carne\r\n1 ilha 3 mts\r\n1 Geladeira 4 porta \r\n5 Geladeira 1 porta vidro\r\nTodos equipamentos açougue\r\n2 caixas- computador\r\n25mt prateleira central Branca\r\n7 Frentes gôndolas Brancas\r\n1 Expositor de verduras c vidro\r\n1 forno para pão (Consignado)\r\n', 'Linha Completa de mercado.', 'Entrega', 'Mudança de ramo', 'Nenhum', 'Aceita Proposta', 'Somente dois mercados no bairro que possui 1500 habitantes, possibilidade de crescimento.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(49, 'CENTRO DE EDUCAÇÃO INFANTIL', 'titulo-', 0, 0, '', '0027', 18, 3, 1, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 3, 1, 0, 0, 0, 0, 0, 0, 76, '0000-00-00', '2010-04-28 18:58:39', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '', '2005', '0,00', '0,00', '0,00', '15.500,00', '13.000,00', '15', '2.500,00', '110.000,00', '10', '', '', '', '', '', '', '', '', '1 Computador novo, 1 mesa escritório c 3 cadeiras. Mesa grande refeitório, vaias mesas de madeira nas salas, c/ cadeiras, geladeira, fogão, frigobar, microondas, brinquedos, prateleiras, brinquedos do parque, material didático, quadros negro, 2 TVs, 2 aparelho de som, 2 DVDs, negocio todo montado e decorado divisão de salas feitas.', '', 'Educação infantil', 'Em virtude de ter vários negocio queremos vender este', 'Nenhum', 'Negociável', 'Escola montada em funcionamento, toda legalizada junto à secretaria da educação atualmente com 62 alunos porém já teve mais de 75 alunos falta um trabalho maior na busca de novos alunos', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(30, 'PROVEDOR DE INTERNET', 'titulo-', 0, 0, '', '0009', 10, 3, 22, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 6, 1, 0, 0, 0, 0, 0, 0, 74, '0000-00-00', '2010-04-28 18:52:30', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '170.000,00', '1998', '0,00', '0,00', '0,00', '35.000,00', '27.000,00', '30', '10.500,00', '200.000,00', '5', '', '', '', '', '', '', '', '', ' 01 armário em ferro dos servidores, roteadores, switches etc.. na sala principal Provedor, 01 x Estrutura metálica estaiada com 16 metros na central onde estão os servidores da empresa, 02 x RB600, sendo uma com 8 cartões de rádio e outra com 06 cartões de rádios, 07 x RB433, todas completas com 03 cartões de rádio cada, 01 x RB500, com 03 cartões, 16 x antenas em uso para freqüência 5.89 GHz, 02 x CPU rodando com MK com três cartões DWL-530, 01 x CPU rodando com MK licenciado com registro geral dos clientes, 04 x CPU rodando com FreeBsD e Linux com servidores, 01 servidor quad 2 core com sistema adiministrativo/financieor com gerenciamento e outro com Proxy última geração inteligente, anti-spam, domínios, 02 x Roteadores Cisco 2501, 04 x Switches D-link DES-1008D com 08 portas cada, 02 x No-breaks de 3.0 Kwa, um em uso e um back-up, 05 x No-breaks funcionando em torres, 01 x Torre metálica com 16M15Cent estaiada sobre abrigo da Caixa D''água da Samae em Ubatuba com 01 x RB433 c/03 cartões e um AP GI-link, 01 x Estrutura metálica na Laranjeira com 08 metros com estrutura de alvenaria de 1.5 tons, com 01 x RB433 com 03 cartões + 01 NS5 em 5.8GHz, Pontos/torres em uso com permuta, Torre Samae sito na Monte Castelo, com 02 RB433 c/ 06 cartões, Torre Bandeirante no Morro Grande, com 02 RB433 c/ 06 cartões e 01 RB600 com 08 cartões, Residência Rocio Pequeno, com uso de cano comum ¾’, Residência Acarai, com cano de 1 polegada, Hotel Villa Real sob contrato do permuta, com uso de espaço térreo, Estrutura metálica na Vila da Gloria com permuta em prédio comercial, sendo +/- 100 rádios NS5+loco em 5.8 GHz e demais em AP 2.4 GHz, sendo modelos de maioria G120, GI-LINK e alguns Edimax com 90% dos AP com firmware AP-Router  instalado, Link full de 12 megas com a Embratel ao custo de R$. 7.889,31 mensal, em fase de cancelamento para implantação até maio/2010 de link full da Oi/Brt de 16 megas ao custo de R$. 8.000,00 e desativação do Link full de 512k com a Oi/Brt para atender contrato autenticação ADSL aos acessos ADSL com cerca de 200 clientes no estado de Santa Catarina ao custo de R$. 650,00, Em fase de implantação 01 x servidor/ CPU com MK acesso a internet pública wireless em parceria com a Prefeitura Municipal no centro da cidade, junto a Fundação Cultural, sendo acesso restrito a navegação, bloqueados demais recursos a título de marketing para venda do uso da net via rádio.', '', 'Prover internet à rádio', 'Aposentadoria', 'Nenhum', 'Aceita Proposta', '600 clientes com cerca de 600 contratos em comodatos, ótimo local para morar, comando em qualquer parte de mundo, expansão.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(31, 'RESTAURANTES FRANGO', 'titulo-', 0, 0, '', '0010', 4, 1, 1, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 6, 1, 0, 0, 0, 0, 0, 0, 69, '0000-00-00', '2010-04-28 18:52:53', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '0,00', '2003', '0,00', '0,00', '0,00', '30.000,00', '15.000,00', '55', '5.000,00', '189.000,00', '6', '', '', '', '', '', '', '', '', 'Totalmente operacionais, cada uma com: Cozinhas: todos os utensílios de cozinha necessários, fogão industrial, bancadas, pias, prateleiras, armários, coifas, fritadeiras, chapas, grelhas, char-broiler, espremedores de laranja, refrigeradores e freezeres, liquidificadores, fornos microondas, buffets quentes, buffet frio, bandejas para atendimento, pratos, talheres e fritadeiras reserva. Escritórios e outros: 01 relógios-ponto automáticos, 02 aparelhos telefônicos, 01 aparelhos de senha para atendimento, painéis backlight frontais e internos, softwares de gestão instalados e operacionais, planilhas de controle de fluxo de caixa e controle de custos em ambas unidades. ', 'Pratos Executivos: Sete tipos de pratos balanceados, compostos por: Feijão, Arroz, Salada, (farofa, fritas, ovo ou purê) e a carne de frango (Filé Grelhado, Filé Acebolado, Filé à Parmegiana, Frango a Passarinho, Hamburger de Frango e Cordon Bleu). Sanduíches Seis tipos de sanduíches, sendo 3 destes em até 3 tamanhos. Todos podem ser acompanhados por fritas e refrigerante (formato combo) gerando até 14 combinações. Petiscos Onze tipos de petiscos, podendo atingir 15 opções no formato combo. Bebidas Refrigerantes, Sucos Naturais, Vitaminas, Chás, Cerveja e Chopp.', '', 'Separação dos Sócios por surgimento de outra oportunidade para ambos; envolvendo administração de grandes negócios da família para um e Consultoria empresarial a grandes corporações para outro, em outro Estado; demandando assim mais disponibilidade de tempo para ambos e possível mudança de residência.', 'Possui somente os passivos normal de funcionários caso queria demiti-los, aproximadamente 40 mil.', 'Exitem duas Loja uma em joinville e Outra e Jaraguá do Sul, na mesma condições vendesse as duas ou separadas.', 'Empresa totalmente PADRONIZADA, apta para se tornar uma Franqueadora nos moldes da ABF,Marca Registrada, Produtos que atingem todas as faixas etárias, pois possui um mix bem diversificado dentro da especialidade de frango, Especialista em Carne de Frango, sem concorrência similar, Lojas instaladas em shopping centers, proporcionando comodidade, conforto, estacionamento e segurança aos clientes.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(32, 'IND. METALMECÂNICA', 'titulo-', 0, 0, '', '0011', 11, 2, 5, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 6, 1, 0, 0, 0, 0, 0, 0, 68, '0000-00-00', '2010-04-28 18:53:26', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '160.000,00', '1995', '6.761.992,00 ', '9.195.448,00', '5.794.588,00', '482.882,00', '100.000,00', '10', '48.288,20', '8.800.000,00', '41', '', '', '', '', '', '', '', '', 'Relação dos equipamentos será enviada em momento oportuno.\r\n\r\nEquipamentos:\r\nPossui excelente qualidade com tecnologia avançada, ótima produtividade e estão avaliados em R$ 2.454.370,00.\r\n\r\nInfra. Informática:\r\nPossui um escritório bem montado completo com parte de informática conforme necessidade da empresa, softwares,  também podendo ser enviado em anexo à relação descritiva, valor da infra-estrutura de informática R$ 123.540,00\r\n\r\nImóvel:\r\nSão 6.993 m ² de área de terreno, em ótima localização, com um galpão pré - moldado de 2680 m ², construção com todo infra-estrutura necessária, pé direito com 6 metros, divididos em área industrial 2.400 m ² mais  280 m ² de escritório.\r\nValor do imóvel R$ 4.574.640,00\r\n\r\nSubtotal mais estoque: R$ 7.157.550,00\r\n', 'Possui um produto em desenvolvimento, outro ponto a ser investido para crescer. ', 'Produzir peças e componentes em chapas para terceiros. Capacidade de faturamento de R$1.000.000,00 mensais com a estrutura física existente, Valor este já faturado em 2008 em duas ocasiões uma no valor de R$ 1.051.000,00 e outra R$1.086.000,00.', 'Concentrar investimento e esforços em outro empreendimento que possui, com isso diminuindo também o rítimo de trabalho.', 'Será quitado no momento da venda.', 'A Combinar', 'Somos referência no mercado, equipe qualificada na área, qualidade nos serviços e produtos, equipamentos com tecnologia de ponta. Mercado muito amplo e pronto à ser explorado não atuamos na região de SP e outros grandes centros que poderíamos crescer.\r\nNegocio promissor, contudo passou por uma crise mundial onde a empresa se encontrava em um processo de abertura de filial, com isso acarretando muitos investimentos, além de perca do foco na matriz, isso tudo ao mesmo tempo, porém a perspectiva de faturamento começam a se normalizar em 2010 temos previsão de faturarmos acima de  R$ 6.000.000,00 novamente, toda esta diminuição de faturamento se comprova facilmente e se explica seus motivos em conversa pessoal.\r\n', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(33, 'CONSTRUTORA E FABRICA DE CASAS PRÉ-FABRICADAS', 'fabrica-de-casas-e-construtora-de-imoveis', 0, 0, '', '0012', 12, 3, 1, 1, 1, NULL, 'Ponto do Trabalhador', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 16, '0000-00-00', '2010-05-03 12:59:02', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Fabrica', '06.262.725/0001-34', 'Claudio', '', 'Boa Vista', '47', 'maudigital@ig.com.br', 'Não', 'Ñao', 'Sociedade Limitada', 'Simples', '', '0,00', '2004', '0,00', '0,00', '0,00', '80.000,00', '25.000,00', '15', '12.000,00', '180.000,00', '7', '', '', '', '', '', '', '', '', '5 betoneiras 120 litros\r\n1 betoneira 150 litros\r\n1 betoneira 400l\r\n2 plainas\r\n1 furadeira Bosch impacto\r\n1 serra mármore\r\n1 serra circular\r\n1 esquadrilhadeira\r\n16 Formas para fabricação de pilares \r\n31 Formas para fabricação de placas\r\n1 mesa vibratória, demais ferramentas.\r\nShow Room montado com móveis de escritório e eletrônicos.\r\nValor Total aproximado R$ 70.000,00\r\n', 'Casas pré-fabricadas em placas e pilares de concreto armado.', '', 'Aposentadoria', 'Somente o giro e será o que houver no momento da venda', 'Aceita sócio com 50% com futura compra dos outros 50%, aceita carro imóvel.', 'Mais de 100 casas construídas em varias cidade Itajaí, Joinville, Itapoá, São Francisco do sul. Possibilidade de vendas em muitas outras cidades até exportação. Pouco capital de giro pois s recebe 30% de entrada, 20% no inicio da obra, 30% na Cobertura e 20% no final da obra. Parceria Com o Presídio industrial para produção das placas e pilares proporcionando um baixo custo de mão de obra.Facil aumento de faturamento', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(34, 'IND. ESTAPARIA MECÂNICA', 'ind-estaparia-mecanica', 0, 0, '', '0013', 11, 2, 1, 1, 1, NULL, 'Distrito Industrial', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 6, '0000-00-00', '2010-04-28 18:54:05', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Estaparia', '03.794.137/0001-53', 'Sidnei', 'Industria', 'Distrito Industrial', '4444444444', 'maudigital@ig.com.br', '', '', 'Sociedade Limitada', 'Simples', '', '0,00', '2003', '0,00', '0,00', '0,00', '110.000,00', '60.000,00', '15', '16.000,00', '2.600.000,00', '7', '', '', '', '', '', '', '', '', 'Imóvel: são 7.272 m2 de área de terreno com um galpão de 860 m2 com toda infra-estrutura, elétrica hidráulica, piso industrial.\r\n\r\nNegocio: 1 prensa hidráulica de 500ton tipo “H”mesa de 1000x1000 marca Schüller ano 1998 no valor de R$ 180.000,00\r\n1 prensa hidráulica de 200ton tipo “H”, no valor de R$ 20.000,00.\r\n1 Presa excêntrica de 60 ton Chaveta no valor de R$ 30.000,00.\r\n1Torno revolver marca Iram no valor de R$ 5.000,00.\r\n1 Paleteira hidráulica  2 ton. no valor de R$ 3.000,00.\r\n1 Maquina solda Mig no valor de R$ 3.000,00.\r\n1 Guilhotina mecânica marca Sorg no valor de R$ 30.000,00.\r\n1 Compressor de Ar marca Shulz 60 pés no valor de R$ 5.000,00.\r\nCarteira de Clientes.\r\n', '', 'Estamparia corte e dobra', 'Mudança de Ramo', 'Nenhum', 'Este valor é com imóvel caso queria comprar somente o negócio o valor é de R$ 300.000,00, pode aceita parcelamento com uma entrada e parcelas de R$ 50.000,00. A combinar', 'Negocio foi muito bem antes da crise mundial, ótima margem de lucro grande perspectiva de aumento de faturamento margem de lucro que varia de 30 a 40% muito interessante.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(60, 'INDUSTRIA PLASTICOS  ', 'industria-na-regioa-de-limeira-', 0, 0, '', '0037', 13, 2, 26, 30, 1, NULL, '', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 2, '0000-00-00', '2010-05-14 11:12:51', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sociedade Limitada', 'Lucro Presumido', '', '300.000,00', '1999', '', '', '', '600.000,00', '', '20', '120.000,00', '12.000.000,00', '50', '', '', '', '', '', '', '', '', 'Valor dos equipamentos aproximado de R$ 6.000.000,00.\r\n\r\n', 'Peças tecnicas para terceiros.', '', 'Comercial, dissolução da sociedade.', 'Nenhum', 'Aceita sócio com 49% no valor de R$ 5.000.000,00.\r\nNegocio será tratado com muito sigilo e dispensamos especulação, pois teremos procedimento para quem vim a analisar a empresa.\r\n', 'Boa margem de lucro, boa liquides, projeção aumento de faturamento mensal, nome no mercado.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(36, 'DISTRIBUIDORA DE ÓCULOS MARCA PRÓPRIA', 'distribuidora-de-oculos-marca-propria', 0, 0, '', '0015', 9, 1, 5, 1, 1, NULL, 'Centro', '', '', NULL, 0, 0, 0, NULL, '', 0.000000, 0.000000, 0, 0, 0, 0, 0, 0, 0, 0, 7, '0000-00-00', '2010-04-28 18:55:17', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'RRRRRRRRRR', '11.691.117/0001-85', 'Elio', 'Centro', 'Centro', '5555555555', 'maudigital@ig.com.br', 'rrrrrrr', 'rrrrrrrr', 'Sociedade Limitada', 'Simples', '', '3.000.000,00', '1997', '0,00', '0,00', '0,00', '375.000,00', '200.000,00', '30', '112.000,00', '7.500.000,00', '12', '', '', '', '', '', '', '', '', 'Infra. Informática:\r\nPossui um escritório bem montado completo com parte de informática conforme necessidade da empresa, softwares.\r\n\r\n\r\nImóvel:\r\nEm ótima localização, construção com todo infra-estrutura necessária já preparada para empresa\r\n', 'Óculos solares e óculos de receituário.', '', 'Possui duas possibilidades de associar e investir parte do valor no negocio, e se for venda completa motivo é investimentos em outros negocio.', 'Nenhum somente o giro', 'Possibilidade de sociedade de 50% onde o valor seria de R$ 3.750.000,00 onde 1.500.000,00 serão investidos na empresa diretamente gerando um aumento significativo nas vendas.', 'Marca conceituada, vários ponto de venda, mercado em expansão, investimentos em mídia retorno certo, pois é isso que fazemos com o próprio capital e as venda vem crescendo ano a ano!', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(37, 'CAFETERIA, PANIFICADORA E CONFEITARIA', 'titulo-', 0, 0, '', '0016', 3, 1, 1, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 0, 1, 0, 0, 0, 0, 0, 0, 74, '0000-00-00', '2010-04-28 18:55:48', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '2.000,00', '2008', '0,00', '0,00', '0,00', '45.000,00', '29.000,00', '2', '6.000,00', '330.000,00', '11', '', '', '', '', '', '', '', '', 'Equipamentos completos para Panificadora e confeitaria.\r\n Freezer, Geladeiras, Expositores frios e quentes, Masseira, Modeladora, Divisor, Batedeira, Cilindro,  Fatiadora, Forno 4 Bandejas, Forno 10 Bandeja, Mesas Inox\r\nPrateleiras Inox, Geladeira Inox, Máquina de Café Expresso, Liquidificadores, Microondas, Forno elétrico, etc...\r\n', 'Gasolina, Álcool, diesel, óleo, loja de conveniência.', 'Paes, doces, salgados, itens de supermercados, lanches, refrigerantes, bebidas etc..', 'Comercial', 'Será quitado no momento da venda, Projer inicio julho de 2009 – R$ 35.387,00, Capital de giro B Brasil – R$ 7.500,00, Giro Flex B. Brasil – R$ 23.000,00. Pode se optar em assumir o passivo onde será abatido do valor do negocio.', 'Este valor é pelo os dois postos, aceita proposta', 'Localização privilegiada em avenida de circulação, com muitos prédios perto, visuais moderno, estacionamento, possibilidade de abertura de restaurante, assados e outro, espaço amplo.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(38, 'ESCRITÓRIO DE CONTABILIDADE', 'titulo-', 0, 0, '', '0017', 2, 3, 1, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 6, 1, 0, 0, 0, 0, 0, 0, 70, '0000-00-00', '2010-04-28 18:56:12', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '0,00', '2005', '0,00', '0,00', '0,00', '20.000,00', '15.000,00', '45', '9.500,00', '280.000,00', '6', '', '', '', '', '', '', '', '', 'Computadores, mesas, armários, ar condicionando, site, sistemas, etc...\r\nSubtotal: R$ 25.000,00\r\n', '', 'Contabilidade e consultoria em geral.', 'Comercial, investir em outras Atividades.', 'Nenhum', 'Aceita proposta', 'Parceria com advogados, despachantes, seguradoras, Serasa, associações, com outros escritórios para fortalecimento, redução de despesas, Barganha de preços, centro de treinamento.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(39, 'LOTÉRICA POPULAR', 'titulo-', 0, 0, '', '0018', 6, 3, 1, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 0, 1, 0, 0, 0, 0, 0, 0, 84, '0000-00-00', '2010-05-17 18:28:53', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '0,00', '', '0,00', '0,00', '0,00', '10.000,00', '8.000,00', '45', '4.500,00', '170.000,00', '2', '', '', '', '', '', '', '', '', 'Computadores, impressoras, sistema de controle.\r\nMoveis e utensílios;\r\nAlarme;\r\n', '', 'Pagamentos e Jogos', 'Proprietário esta sem tempo para tocar os negócios.', 'Nenhum', 'Somente avista', 'Concessão junto à caixa econômica, muito difícil de conseguir,  bairro com mais de 20 mil habitantes , em crescimento popular.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(40, 'HOTEL EM GARUVA', 'titulo-', 0, 0, '', '0019', 7, 1, 8, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 6, 1, 0, 0, 0, 0, 0, 0, 62, '0000-00-00', '2010-04-28 18:56:52', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '0,00', '2004', '0,00', '0,00', '0,00', '14.000,00', '10.000,00', '50', '7.000,00', '1.800.000,00', '4', '', '', '', '', '', '', '', '', 'São 23 apartamentos, área total de 7000 metros quadrados de terreno, e 1100 m2 de construção, possibilidade de aumento de mais quartos, Totalmente operacionais, cozinha completa.', '', 'hospedagem', 'Investimentos em imóveis.', 'Nenhum', 'Aceita imóvel, carro.\r\nProposta de arrendamento uma luva de R$ 150.000,00 mais o valor de R$ 4.500,00 mensal.\r\n', 'Área arborizada, com riacho passando no terreno águas cristalinas, espaço para abertura de restaurante, estacionamento e segurança aos clientes.\r\nNegocio mal trabalhado com grande possibilidade de crescimento proprietário cansado.\r\n', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(44, 'PIZZARIA QUALIDADE', 'titulo-', 0, 0, '', '0022', 17, 1, 1, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 0, 1, 0, 0, 0, 0, 0, 0, 73, '0000-00-00', '2010-04-26 17:04:44', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '5.000,00', '2004', '0,00', '0,00', '0,00', '62.000,00', '30.000,00', '20', '12.500,00', '160.000,00', '8', '', '', '', '', '', '', '', '', 'Forno a lenha fabricado em 2009, 1 Visa Cooler, 3 Freezers horizontais,  2 Freezers verticais, 1 geladeira, ar condicionado 30000btus, 3 televisores, alarme e câmeras, câmara fria 4 portas, multiprocessador, masseira, serra elétrica, hidro jato, 50 mesas com cadeiras, 2 micro computadores, ECF, sistema de pedidos, balança digital, 2 mesas inox, site na internet com sistema interativo de pedidos.', 'Pizza, massas, bebidas etc...', 'tele- entrega', 'Proposta inicial é sociedade para crescimento da empresa', 'Possui passivos de impostos decorridos no começo do negocio, mais fácil pagamento e o giro normal dos funcionários caso queria demiti-los.', 'Aceita sociedade com 50% no valor de R$ 80.000,00 onde metade deste valor será para pagamento de impostos e outros passivos e a outra metade será investido na própria empresa aumentando assim seu faturamento ', 'Lindíssima pizzaria com amplo estacionamento, optamos em fornecer pizzas de qualidade mais elevada em relação a nossos concorrentes.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(42, 'INDÚSTRIA DE PALETES', 'titulo-', 0, 0, '', '0020', 14, 2, 9, 1, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 6, 1, 0, 0, 0, 0, 0, 0, 63, '0000-00-00', '2010-04-28 18:57:18', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '0,00', '1997', '0,00', '0,00', '0,00', '110.000,00', '55.000,00', '18', '20.000,00', '1.600.000,00', '14', '', '', '', '', '', '', '', '', 'Imóvel com 1100m2 de área construída, com 3800 de área de terreno, avaliada em R$ 600.000,00.\r\nEquipamentos:\r\n\r\n1 Caminhão MB 1113 – 1980 no valor de R$ 45.000,00\r\n1 Empilhadeira Clark ano 1993 gás valor de R$ 35.000,00\r\nMaquinas e equipamentos no valor de R$ 150.000,00.\r\nMoveis e utensílios;\r\nAlarme;\r\n', 'Paletes, embalagens de madeira para indústria. ', '', 'Mudança de ramo, por estar muito tempo no mesmo setor.', 'Nenhum', 'Negociaveis', 'Clientes grandes empresas da região, mais de 50 em carteira  17 ativos.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(43, 'INDUSTRIA DE EQUIPAMENTOS ', 'titulo-', 0, 0, '', '0021', 15, 2, 10, 3, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 6, 1, 0, 0, 0, 0, 0, 0, 62, '0000-00-00', '2010-04-28 18:57:57', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Teksul', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '580.000,00', '1997', '372.416,00', '614.762,00', '763.452,00', '63.000,00', '30.000,00', '20', '12.000,00', '2.000.000,00', '10', '', '', '', '', '', '', '', '', 'Um Terreno com 3.398m2, com pavilhão de alvenaria com 408m2 na Rua dos Metais, 65 – Distrito Industrial – Canela (RS).\r\nUma Fresadora Ferramenteira – MANFORD – Mesa 1250 x 230 Curso Long/Vert 930mm.\r\nUma Fresadora Ferramenteira – SINITRON – Mesa 1250 x 230 Curso Long/Vert 950mm.\r\nUma Furadeira de bancada – SCHULZ – Motor 0,5HP – Capac furação 16mm x 90mm.\r\nUma Furadeira de coluna – KONE – Motor 3HP – Capac furação 30mm x 1200mm.\r\nUm aparelho de Solda MIG – ESAB - Corrente nominal 250A – 50/60Hz – FA 220/380V.\r\nUm aparelho de Solda TIG – CEBORA – Corrente nominal 150ª – 50/60Hz – FA 220/380V.\r\nUm torno paralelo universal – NARDINI – Capac. Torneável 1000xØ410mm.\r\nUm torno paralelo universal – NARDINI – Capac. Torneável 1500xØ500mm.\r\nUma balança de precisão – BEL – Capacidade Max. 600g Mín.0,2g.\r\nUm esquadro – MITUTOYO – 100x70mm.\r\nUm esquadro – MITUTOYO – 300X200mm.\r\n4 micrometros externos – MITUTOYO – Capacidade de 0-25mm / 25-50mm / 50-75mm / 75-100mm – Leitura 0,01mm.\r\n2 micrometros internos – MITUTOYI – Capacidade de 25-50mm / 5-30mm – Leitura 0,01mm.\r\nEntre outras várias ferramentas de precisão.\r\n', 'Lavadoras de frascos e ampolas.\r\nLavadoras de frascos (Certificada INMETRO para áreas classificadas).\r\nDosadoras de frascos e ampolas.\r\nTúneis de esterilização.\r\nBatoqueiras.\r\nRosqueadeiras de tampas, automáticas e semi-automáticas.\r\nEsteiras transportadoras.\r\nMesas acumuladoras lineares e  rotativas.\r\nEsteiras de elevação de carga.\r\nForno de selagem para selo retrátil.\r\n', 'Reforma e manutenção de máquinas para laboratórios farmacêuticos e cosméticos.\r\n\r\n', 'Necessidade de injeção de capital para investimento na área fabril e  de marketing, como na participação em feiras e exposições com a finalidade de maior divulgação de seus produtos. \r\nRetirada de um dos sócios da sociedade.\r\n', 'Possui somente os passivos normal de funcionários caso queria demiti-los, aproximadamente 40 mil.', 'Possibilidades:\r\n\r\n* O suposto interessado poderia adquirir a parte do sócio responsável pela área administrativa (50%) por R$ 300.000,00 de forma parcelada desde que o antigo sócio fique isento das responsabilidades dos empréstimos bancários.\r\n\r\n* O suposto interessado poderia adquirir 1/3 da sociedade por R$ 800.000,00, sendo que todo o dinheiro seria investido na empresa para quitação das dívidas bancárias e na área de marketing visando aumentar as vendas. \r\n\r\n* O sócio responsável pelos projetos e produção deseja permanecer como sócio da empresa, porém, caso um possível interessado deseje adquirir toda a empresa. O valor de venda seria de R$ 2.000.000,00, menos o valor das dívidas bancárias, ou seja, aproximadamente R$ 1.200.000,00. Valor este que seria dividido entre os antigos sócios.\r\n\r\n* Os antigos sócios aceitam permanecer na empresa como funcionários ou colaboradores caso seja necessário. \r\n\r\n', 'A carteira de clientes que possui empresas do porte de: \r\n•	Avon Industrial Ltda;\r\n•	Bayer S/A;\r\n•	Biolab Sanus Farmacêutica Ltda;\r\n•	Bunker Indústria Farmacêutica Ltda;\r\n•	Cifarma Científica Farmacêutica Ltda;\r\n•	Fort Dodge Saúde Animal Ltda;\r\n•	Halex Istar Indústria Farmacêutica Ltda;\r\n•	Hypofarma Instituto de Hypodermia e Farmácia Ltda;\r\n•	Indústria e Comércio de Cosméticos Natura S/A;\r\n•	Ipanema Indústria de Produtos Veterinários Ltda;\r\n•	Laboratório Hertape Ltda;\r\n•	Laboratório Teuto Brasileiro S/A;\r\n•	Laboratório Wyeth-Whitehall Ltda;\r\n•	Neolatina Comércio e Indústria Farmacêutica Ltda;\r\n•	Novartis Biociências S/A;\r\n•	Ouro Fino Saúde Animal Ltda;\r\n•	Petrobrás – Petróleo Brasileiro S/A;\r\n•	Pharmacia Brasil Ltda;\r\n•	Pharmascience Laboratórios Ltda;\r\n•	Prodotti Laboratório Farmacêutico Ltda;\r\n•	Produtos Roche Químicos e Farmacêuticos S/A;\r\n•	Rhodia Farma Ltda;\r\n•	Transpetro – Petrobrás Transporte S/A.\r\n•	União Química Farmacêutica Nacional S/A;\r\n\r\nE um arquivo de mais de 50 projetos em 3D de máquinas para a indústria farmacêutica e de cosméticos, bem como, projetos de máquinas de lavar frascos e garrafas, certificada pelo INMETRO para área classificada à prova de explosão.\r\n\r\nEntre vários projetos possuímos uma linha de máquinas que lava, esteriliza, enche e fecha 12000 unidades de ampolas por hora. Pronta para ser construída. Esta linha de máquinas é vendida no mercado pelos concorrentes (Bausch+Ströbel / Basim / Optima) por um valor em torno de R$ 3.000.000,00. Temos condições de fabricar e vender a mesma linha por um valor de aproximadamente R$ 1.800.000,00 com um lucro líquido de aproximadamente 30%.\r\n\r\n', '', '', '', '', '', '', '', '', '', '', '', '', NULL);
INSERT INTO `jos_properties_products` (`id`, `name`, `alias`, `parent`, `agent_id`, `agent`, `ref`, `type`, `cid`, `lid`, `sid`, `cyid`, `postcode`, `address`, `description`, `text`, `price`, `published`, `use_booking`, `ordering`, `panoramic`, `video`, `lat`, `lng`, `available`, `featured`, `years`, `bedrooms`, `bathrooms`, `garage`, `area`, `covered_area`, `hits`, `listdate`, `refresh_time`, `checked_out`, `checked_out_time`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`, `extra11`, `extra12`, `extra13`, `extra14`, `extra15`, `extra16`, `extra17`, `extra18`, `extra19`, `extra20`, `extra21`, `extra22`, `extra23`, `extra24`, `extra25`, `extra26`, `extra27`, `extra28`, `extra29`, `extra30`, `extra31`, `extra32`, `extra33`, `extra34`, `extra35`, `extra36`, `extra37`, `extra38`, `extra39`, `extra40`, `extra41`, `extra42`, `extra43`, `extra44`, `extra45`, `extra46`, `extra47`, `extra48`, `extra49`, `extra50`, `extra51`, `extra52`, `extra53`, `extra54`, `extra55`, `extra56`, `extra57`, `extra58`, `extra59`, `extra60`, `extra61`, `extra62`, `extra63`, `extra64`, `extra65`, `extra66`, `extra67`, `extra68`, `extra69`, `extra70`, `extra71`, `extra72`, `extra73`, `extra74`, `extra75`, `extra76`, `extra77`, `extra78`, `extra79`, `extra80`, `extra81`, `extra82`, `extra83`, `extra84`, `extra85`, `extra86`, `extra87`, `extra88`, `extra89`, `extra90`, `extra91`, `extra92`, `extra93`, `extra94`, `extra95`, `extra96`, `extra97`, `extra98`, `extra99`, `faturamento`) VALUES
(45, 'IND. DE LUBRIFICANTES (DESATIVADA)', 'industria-de-lubrificantes-desativada', 0, 0, '', '0023', 15, 2, 11, 6, 1, NULL, 'eeeeeeee', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 12, '0000-00-00', '2010-04-24 09:55:22', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Lubrificantes', '11.691.117/0001-85', 'lacordairesantana', '', 'eeeeeeeeee', '66666', 'maudigital@ig.com.br', 'eee', 'eeee', 'Sociedade Simples', 'Simples', '', '0,00', '2000', '12.000.000,00', '0,00', '0,00', '1.000.000,00', '0,00', '30', '300.000,00', '2.500.000,00', '0', '', '', '', '', '', '', '', '', '- TERRENO COM 1682 M²\r\n\r\nCom piso de asfalto na parte do estacionamento, cercado de muro nos fundos e tela e grade com portões de ferro na frente.\r\n\r\n\r\n- GALPÃO COM 520 M² \r\n\r\n	Feito em alvenaria com cobertura metálica, telhas galvanizadas, 6 metros de pé direito, portões de ferro com chapa reforçada, piso cimentado com pintura epox, banheiros, cozinha, escritório montado com computadores e programas específicos, sala de laboratório com blindex, dois mezaninos, grade interna repartição da produção (área de segurança) \r\n\r\n- PARTE EXTERNA FUNDOS\r\n\r\n	Barracão cobertura tanques de armazenamento de matéria prima, pátio cimentado com tanques e deposito.\r\n	Reservatório de água de 5000 litros\r\n\r\n\r\n- ILUMINAÇÃO\r\n\r\n	Iluminação interna com lâmpadas fosforescente e incandescentes\r\n	Iluminação externa com holofotes\r\n\r\n01 - MAQUINA DE ENVASE MARCA ERLI DE 500 ML A 20 LTS. INOX\r\nEnchimento do através de bomba de vácuo. A movimentação dos frascos é feita por uma esteira motorizada, acionada por pedal. \r\n01 - MAQUINA DE ENVASE DE 100 ML A 1 LITRO. INOX\r\nEnchimento do através de bomba de vácuo. O operador coloca os frascos na calha pisa no pedal abaixando os bicos o envase começa automaticamente.\r\n01 - ESTEIRA COM TAMPADOR PNEUMATICO INOX\r\nControle de velocidade através de polia expansiva. Estrutura em aço carbono pintado. Mesa em madeira compensada.  Revestimento em aço inox. Regulagem de velocidade e ajuste da lona. Manutenção simples e prática.\r\n01 - MESA GIRATÓRIA INOX\r\n\r\nPosiciona-se a mesa na entrada da maquina envasadeira e colocam-se sobre ela os frascos vazios para serem envasados. A mesa alimentará a envasadeira alinhando os frascos na esteira da maquina. \r\n\r\n01 - FILTRO CONTAINER CAPACIDADE 1000 LTS. INOX\r\nA bomba puxa o produto do recipiente passa pelo filtro e despeja já filtrado em outro recipiente \r\n01 - EMPILHADEIRA ELETRICA CAPACIDADE 2000 KG  TRACIONADA – PALETRANS\r\n	\r\nEsta empilhadeira é um equipamento eletrônico destinado a elevar e movimentar cargas em percursos\r\nPlanos, nivelados e isentos de buracos.\r\nOs comandos são bem visíveis e acionados comodamente e ergonomicamente.\r\nO equipamento se encontra de acordo com todas as normas da Comunidade Européia referentes à\r\nSegurança e conforto.\r\n\r\n01 - TANQUE DE 5000 LITROS ARMAZENAMENTO DE MATERIA PRIMA\r\n	\r\nTanque de ferro, armazenamento simples. Com registro, válvulas e encanamentos.\r\n\r\n01 - TANQUE DE 15000 LITROS ARMAZENAMENTO MATÉRIA PRIMA\r\n\r\n	Tanque de ferro, armazenamento simples. Com registro, válvulas e encanamentos.\r\n\r\n03 - TANQUES DE 30.000 LITROS BIPARTIDOS, ARMAZENAMENTO.\r\n\r\n	Tanque de ferro Jaquetado, com três divisões de 10.000 l. Cada. Com registro e válvulas e encanamentos.\r\n\r\n03 - TANQUES DE 6000 LTS ARMAZENAR PRODUTO ACABADO\r\n\r\n	Tanque poletileneo com dupla camada, armazenamento produto final.\r\n\r\n03 - BOMBAS INSTALADAS COM FILTROS COM TUBULAÇÃO EM AÇO INOX\r\n\r\n	Bombas que filtram e alimentam as envasadoras e abastecem os tanques. \r\n\r\n01 - REATOR DE 2000 Litros / 3 horas, COM TUBULAÇÃO e FILTRO EM AÇO INOX\r\n\r\n	Onde ocorre a preparação e distribuição para envase do produto pronto.\r\n\r\n01 - REATOR DE 5000 Litros / 3 horas, COM TUBULAÇÃO e FILTRO EM AÇO INOX\r\n	\r\n	Onde ocorre a preparação e distribuição para envase do produto pronto.\r\n\r\n01 - ESTERIRA FECHAMENTO DE CAIXAS DE PAPELÃO CICLOP\r\n	\r\nMesa esteira para fechamento da caixa de papelão para colocar os frascos de óleo.\r\n\r\n08 - PRATELEIRAS DE AÇO 15 MTS DE COMPRIMENTO / 2,50 DE ALTURA CADA\r\n\r\n02 - ESTEIRAS DE 6 MTS. ELETRICA\r\n\r\n	Esteira que leva produto acabado e envasado para embalar.\r\n\r\n02 - ETIQUETADORA PARA TAMBOR E CAIXAS\r\n\r\n04 - CONTAINERS DE 1000 LTS. CADA\r\n\r\n01 – COMPRESSOR\r\n\r\n50 – PALETS\r\n\r\n', '- OLEO - MOTOR 2 TEMPOS - SAE 30\r\n\r\n - OLEO - POWER FLEX SAE - 20W40\r\n\r\n - OLEO - ROYAL TOP TURBO - SAE 15W40\r\n\r\n - OLEO - ATF AUTOMATIC TIPO A - SAE 5W30\r\n\r\n - OLEO - AUTOMATIC - SAE 5W30\r\n\r\n - OLEO - POWER FLEX - SAE 20W50\r\n\r\n - GRAXA - GRAXA MP\r\n\r\n - GRAXA - GRAXA CHASSI\r\n\r\n - OLEO - PREMIUM - SH AD - ISO 68\r\n\r\n - OLEO - PODIUM - SAE 30\r\n\r\n - OLEO - PODIUM - SAE 40\r\n\r\n - OLEO - ROYAL - SAE 30\r\n\r\n - OLEO - ROYAL - SAE 40\r\n\r\n - OLEO - MOTOR 4 TEMPOS - SAE 20W40\r\n\r\n - OLEO - ROYAL TURBO - SAE 15W40\r\n\r\n - OLEO - HIPOIDES - SAE 90\r\n\r\n - OLEO - HIPOIDES - SAE 140\r\n\r\n - OLEO - PREMIUM HREP - ISO 68\r\n\r\n - OLEO - ULTRA TRACTOR - THF 11 - SAE 30\r\n \r\n', '', 'Socios possui outros negocios em cidade diferentes', 'Nenhum', 'A industria com todos os equipamentos, documentações, registros, formulas\r\ne outros é de R$ 1.800.000,00 (hum milhão e oitocentos mil reais)\r\n\r\nO valor do imovel é de R$ 700.000,00 ( setescentos mil reais)\r\n\r\nTotal com imovel R$ 2.500.000,00 ( dois milhões e quinhentos mil reais.)\r\n', '-- CAPACIDADE dos 2 Reatores / HORA – 2000 LITROS\r\n- CAPACIDADE MENSAL (20 dias de 7 hs.) – aproximadamente – 280.000 LITROS\r\n- Capacidade de faturarar somente com a industria R$ 1.400.000,00 mês.\r\n- São duas empresa uma ind. e uma distribuidora.\r\n', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(46, 'empresa de prestação de serviços', '', 0, 0, '', '', 12, 3, 1, 1, 1, NULL, 'Rua Dr. João Colin, 1285, sala 03', '', '', NULL, 0, 0, 0, NULL, '', 0.000000, 0.000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Planetcom Consultoria e Serviços Ltda', '03.149.043/0001-21', 'Rodrigo Frazão', 'jbc', 'américa', '047 3028-4490', 'planetcom@joinvillebc.com.br', '', '', 'Sociedade Limitada', 'Lucro Presumido', '', '200.000,00', '1999', '100.000,00', '300.000,00', '700.000,00', '100.000,00', '70.000,00', '35', '30.000,00', '300.000,00', 'sob demanda', '', '', '', '', '', '', '', '', 'kombi 2008, pólo sedan 2010, furadeiras e ferramentais diversos.', 'serviços técnicos', 'industrial, equipamentos, lay-out e engenharia', 'mudanç de cidade e de ramo de negócio.', '0', 'parcelado em 3 vezes (1 + 2 x)', 'trabalha com projetos e serviços, linha única no mercado, integração', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(47, 'LOTÉRICA SUL', 'loterica-', 0, 0, '', '0025', 6, 3, 21, 1, 1, NULL, 'R.LAURO MULLER 260', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 11, '0000-00-00', '2010-04-28 18:59:03', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'LOTERICA PONTO DA SORTE LTDA ME', '05.794.107/0001-72', 'EDSON ROSA MARTINS', 'SALA 03', 'CENTRO', '48-9986-2001', 'nosderm@terra.com.br', '', 'edinholoterica@hotmail.com', 'Sociedade Limitada', 'Simples', '', '', '1974', '', '800.000,00', '1.300.000,00', '35.052,00', '30.000,00', '68', '23.865,00', '900.000,00', '6 fucionarios', '', '', '', '', '', '', '', '', '5 terminais + 06 cadeiras de atendente\r\n01 cofre  médio\r\n01 casa forte + 01 cofre (cofre utilizado por agencia bancaria anteriormente) lotérica localizada na antiga agencia do besc\r\n01 computador\r\n01 sistema operacional lotérica (software) controle interno lotérica\r\nCozinha montada + bebedor elétrico + mesa com bancos\r\nMesa de centro + duas cadeiras ( sala de visita )\r\n02 mesas de retaguarda com 2 cadeiras\r\nSplitter ( condicionador de ar ) 30 mil\r\nLoja monitorada por empresa de vigilância\r\n13 câmeras internas + 01 computador com sistema geovision – com controle de imagem a distancia- acessado de qualquer  pc\r\nArmário + mesa  em  l + cadeira + sala  gerencia\r\n01 maquina de contar  cédulas \r\n03 calculadoras elétricas + 06 calculadoras  de mesa\r\n01 tv 20 polegadas\r\n01 mesa recepção malotes\r\n\r\n', '', 'Pagamentos e Jogos', 'Mudança ', 'Nenhum', 'Negociável ', 'Hoje também com serviços de correspondente bancário, ou seja, na lotérica faz-se financiamento imobiliário, consorcio imobiliário, consignação, e acrescentamos que ainda não utilizamos o potencial que temos para desenvolver  trabalho em estas 2 carteiras, financiamento e consignação, os financiamentos agora só poderão ser operados por correspondentes, lotérica bem situada, no centro da cidade com ótima clientela formada.cidade com aproximadamente 100 mil habitantes, carro forte, agencia receptora a 500 mts.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(48, 'BENEFICIAMENTO DE VIDROS', 'beneficiamento-de-vidros', 0, 0, '', '0026', 9, 1, 1, 1, 1, NULL, 'rrrrrr', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 7, '0000-00-00', '2010-04-28 18:59:30', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'BENEFICIAMENTOS DE VIDROS', '11.691.117/0001-85', 'Manfred', 'rrrrrrrr', 'rrrrrrr', '6666666666', 'MAUDIGITAL@IG.COM.BR', '666666666666', '6666666666', 'Sociedade Simples', 'Simples', '', '250.000,00', '1987', '700.000,00', '1.879.000,00', '1.887.000,00', '265.000,00', '107.600,00', '106', '66.000,00', '1.300.000,00', '33', '', '', '', '', '', '', '', '', 'Maquinas, veículos, consultar! ', 'Vidros. Espelhos, molduras, box de vidro, janelas, portas, luminárias, espelheiros.', 'Manufaturados de vidros. espelhos e madeira', 'Falta de sucessor', 'R$ 71.000,00 Cap.Giro -  R$ 83.000,00 – equip e Veículos', 'Venda total à vista. (negociável)', 'A empresa fornece produtos de alta qualidade, presta serviços com profissionais treinados, e busca a satisfação do cliente. \r\nEmpresa tradicional e com muito expertise na área! \r\nExcelente oportunidade de negócio! Mercado em crescimento exponencial!Vendo ou aceito sócio p/ investimento. Reais possibilidades de aumento substancial de faturamento!\r\nExcelente empresa em beneficiamentos de vidros, Alumínios com maquinas modernas de ultima geração, fabrica produtos para construção civil e decoração em geral.\r\nExcelente carteira de clientes, ativos, cadastrados, faturamento mensal atual R$ 250.000,00 e com potencial de crescimento imediato até R$ 400.000,00.\r\n', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(50, 'DISTRIBUIDORA DE EMBALAGENS', 'distribuidora-de-embalagens', 0, 0, '', '0028', 9, 1, 1, 1, 1, NULL, 'Rua Florianopois, 2051', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 5, '0000-00-00', '2010-05-03 17:55:55', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '11.691.117/0001-85 ', '11.691.117/0001-85', 'João Batista', '', 'Itaum', '47 34297130/ 91299519', 'oliveira.emblagens@gmail.com', '', '', 'Sociedade Limitada', 'Simples', '', '150.000,00', '2008', '395.800,00', '425.785,00', '419.868,00', '35.000,00', '20.000,00', '30', '10.000,00', '240.000,00', '4', '', '', '', '', '', '', '', '', 'Computadores, moveis, etc...', 'Embalagens descartaveis e material de limpeza.', '', 'Doença e aposentadoria com mais de 15 anos somente no ramo de embalagens', 'Nenhum', 'Aceita carro de pequeno valor, negociável.', 'Clientela formada.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(51, 'AUTO ESCOLA ', 'distribuidora-de-embalagens', 0, 0, '', '0029', 19, 3, 1, 1, 1, NULL, 'Rua Blumenau', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 9, '0000-00-00', '2010-05-13 08:36:34', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '11.691.117/0001-85 ', '11.691.117/0001-85', '', '', 'América', '', '', '', '', 'Sociedade Limitada', 'Simples', '', '', '1998', '0,00', '0,00', '1.100.000,00', '75.000,00', '65.000,00', '30', '25.000,00', '900.000,00', '27', '', '', '', '', '', '', '', '', 'Micro ônibus ano 2006,\r\n3 Palio 2007 e 2009 um completo,\r\n2 Clio 2007,\r\n2 Gol 2006,\r\n4 Motos 2009,\r\nEscritório e sistema completo\r\nPista de treinamento e prova\r\nTodos os carros equipados com gás natural.\r\n', '', 'Carteira de habilitação.', 'Proprietario pretente investir na construção civil', 'Nenhum', 'Negociável.', '1. Boa infra-estrutura\r\n2. Capacidade de adaptação a forma de trabalho do cliente.\r\n3. Conceito no mercado.\r\n4. Conceção junto ao DETRAN\r\n', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(52, 'IMPORTADORA E EXPORTADORA DE VINHOS  E ALIMENTOS', 'importadora-e-exportadora-de-vinhos-e-alimentos', 0, 0, '', '0030', 21, 3, 3, 1, 1, NULL, 'Rua Blumenau', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 8, '0000-00-00', '2010-05-04 14:47:24', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '11.691.117/0001-85 ', '11.691.117/0001-85', '', '', 'América', '', '', '', '', 'Sociedade Limitada', 'Lucro Presumido', '', '270.000,00', '2007', '0,00', '0,00', '0,00', '120.000,00', '65.000,00', '15', '15.000,00', '880.000,00', '3', '', '', '', '', '', '', '', '', 'Operamos em uma área de 350 m² onde temos uma parte de nosso estoque porque a outra se encontra no Entreposto Aduaneiro de Itajaí. São postos de armazenagem, onde retiramos a mercadoria conforme a nossa demanda. A mercadoria já esta paga e  paga-se os impostos de maneira que vamos desembaraçando a mercadoria.\r\nEscritório, Depósito, computadores, impressoras, sistema de controle. Moveis e utensílios;Automóvel Fiat Picape Strada -  2009/2009 - Placas MGD 5843.\r\n', 'Vinhos, espumantes, alimentos ( conservas )  e bebidas quentes.', 'Importação', 'Procuro interessado na compra de ( 100% ) de minha empresa, pois entrei de sócio numa empresa de outro segmento.', '	Financiamento no Bco. do Brasil  R$ 100.00,00', 'Negociável.', '	A Varietá Importadora possui um excelente mix de produtos de vários países sendo formalizado num período de 2 anos, onde normalmente uma Importadora levaria  5 a 6 anos p/ integralizar estas linhas, isto se deve aos 21 anos de mercado que possuo.\r\n	Outro ponto relevante é sobre o novo Regime Especial adquirido: DIAT, isto nos possibilita pagar em cada importação um 4 a 6% o ICMS de nossa empresa, onde hoje operamos com um 25% de ICMS em SC. Este regime nos custou R$ 8.500,00. (Aumentando ainda mais a margem de lucro e podendo ser mais competitivos em preço no mercado ).\r\n	Operávamos nas importações com o radar Simplificado ( com cota de USD 150 mil por semestre ) e a partir de abril de 2.009, adquirimos  o Radar Ordinário com mérito de nossa empresa e passamos a operar  com uma cota de USD 475.000,00 por semestre .\r\n	Contamos com uma profissional - Gerente de Importação, que atuava na empresa multinacional Freixenet.\r\n	Possuímos o cartão BNDES, possibilitando a qualquer momento a compra de um terreno e a construção de uma estrutura própria.\r\n', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(53, 'LIVRARIA E PAPELARIA', 'livraria-e-papelaria', 0, 0, '', '0031', 5, 1, 1, 1, 1, NULL, 'Rua Blumenau', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 8, '0000-00-00', '2010-05-04 17:40:54', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '11.691.117/0001-85 ', '11.691.117/0001-85', '', '', 'América', '', '', '', '', 'Sociedade Limitada', 'Simples', '', '23.000,00', '2003', '283.125,00', '301.274,00', '349.593,00', '30.000,00', '13.800,00', '46', '5.800,00', '280.000,00', '3', '', '', '', '', '', '', '', '', '- Empresa 100% informatizada, da loja até as rotinas administrativas\r\n- Loja com 60m², piso em laminado de madeira e teto em gesso\r\n- Todos os móveis da loja seguem o alto padrão de qualidade.\r\n- Valores já depreciados até maio/2010, em R$:\r\n   *  móveis e utensílios diversos comprados em 07/2008: 20.460\r\n   * luminoso loja e luminoso Rua Mário Lobo: 632\r\n   * móveis do escritório, cadeiras, banquetas e estantes: 3.897  \r\n   * maquineta de preços, expositores de livros e de preços: 452\r\n   * 2 condicionadores de ar tipo split Fujitsu Inverter: 4.034\r\n   * cartões presente e banners: 700\r\n   * 2 leitores de mão, 1 leitor loja e 1 impressora fiscal: 4.027\r\n   * 1 estabilizador loja, 1 monitor LCD, 1 multifuncional HP e 1 teclado \r\n      com mouse, 2 telefones sem fio: 789\r\n   * 1 servidor completo, 1 computador completo loja, 2 estabilizadores e 1 roteador wi-fi:3.608- empresa 100% informatizada, da loja até as rotinas administrativas.\r\n', '- livros\r\n- artigos de papelaria e escritório\r\n- presentes\r\n- embalagens\r\n- informática (mouses, teclados, web cams, mouse pads, CDs/DVDs, papéis para impressão, canetas marcadoras)\r\n', '', 'Necessidade de dedicação de tempo integral ao negócio.', 'Nenhum', '- Entrada a negociar mais parcelamento, se necessário.\r\n- Aceito automóvel semi-novo (até 4 anos de uso) como parte do pagamento, de acordo com avaliação do mercado de automóveis usados de Joinville. \r\n', '-  Loja próxima dos principais pontos turísticos da cidade e de 3 colégios particulares.\r\n- Grande potencial de aumento do faturamento através da possibilidade de ampliação da estrutura física e do mix de produtos (como brinquedos educativos, por exemplo).\r\n- Atendimento é personalizado, com funcionários treinados nas mais modernas práticas comerciais.\r\n- Grande variedade de títulos e grande sortimento de produtos de papelaria “a granel”.\r\n- Clientela fidelizada há anos.\r\n- Toda a loja é informatizada, o que facilita o atendimento ao cliente e a execução de todas as rotinas administrativas e de gestão.\r\n- Custo fixo baixo.\r\n- Produto (livro) em franco crescimento de vendas.\r\n- Existencia de somente 2 concorrentes.\r\n- Existencia de convênios firmados com empresas para venda de produtos aos seus funcionários.\r\n- Fornecedores confiáveis e parceiros de longa data.\r\n', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(54, 'MERCADO + SOBRADO 553M²', 'mercado-sobrado-553ms', 0, 0, '', '0032', 8, 1, 1, 1, 1, NULL, 'Sebastião S. de Borba nº 258', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 1, '0000-00-00', '2010-05-05 11:08:41', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Comercial Bruder Me', '00.675.714/0001-08', 'Antonio Bruder', 'Esquina', 'Espinheiros', '47 3434-0086', 'bruder1955@hotmail.com', '', 'bruder1955@hotmail.com', 'Sociedade Simples', 'Simples', '', '45.000,00', '1996', '390.000,00', '420.000,00', '480.000,00', '40.000,00', '5.000,00', '12', '', '850.000,00', '2', '', '', '', '', '', '', '', '', 'Gondolas, Automação computadores e balanças, expositores refrigerados, frezzers horizontais. ', 'Alimenticios', 'Varejo', 'Mudança de estado. ', 'não a divida nenhuma. ', 'imovel averbado podendo ser finaciado, aceito veiculo/caminhão como forma de pagamento', 'Não pagar aluguel, bairro crescendo e de uma otima classe social. proximo a escola, posto de saude ao lado, onibus na frente ruas asfaltadas ', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(55, 'IND. METALÚRGICA SP', 'titulo-', 0, 0, '', '0033', 11, 2, 24, 4, 1, NULL, 'Endereço ', '', '', NULL, 1, 0, 0, NULL, '', -27.596905, -48.549454, 6, 1, 0, 0, 0, 0, 0, 0, 69, '0000-00-00', '2010-05-06 11:09:35', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Razão Social ', 'CNPJ ', 'Responsável ', 'Complemento', 'Bairro ', 'Telefone ', 'Email ', 'Skype', 'MSN', 'Sociedade Limitada', 'Simples', 'Homepage', '', '1995', '2.536.000,00', '2.410.000,00', '1.062.000,00', '150.000,00', '130.000,00', '18', '25.000,00', '1.000.000,00', '10', '', '', '', '', '', '', '', '', '01 - Barracão com 5.50 m de altura e 800 m²\r\n02 – 09 maquinas MIG BAMBOSI com capacidade de arame 06 há 1.00 mm ano 2008.\r\n03 – Prensa 12 ton.\r\n04 – Prensa 15 ton.\r\n05 – Prensa 40 ton.\r\n06 – Prensa 15 ton.\r\n07 – Prensa 15 ton.\r\n08 – Corte e dobra 3 metros IMAG com cap. De 3.00 mm\r\n09 – Dobra 3 metros IMAG com todos tipos de ferramentas\r\n10 – Empilhadeira a Gás (HYSTER) elevação 4 metros 3 ton.\r\n11 – Caminhão 11/13 trucado \r\n', ' Racks Metálicos, Separadores de caixas, Contêineres, Paletes de aço, Paleracks.', '', 'Cansaço aproveitar a aposentadoria', 'Nenhum', 'Aceita vender somente o negocio pelo valor de R$ 600.000,00', 'O diferencial é que é um ramo aberto a todos os tipos de produtos deste alimentício ate um produto solido.\r\nFaturamento de 2009 foi ruim em virtude da crise, mais já esta sendo retomado o que era.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(56, 'CAMINHÃO COM SERVIÇOS FIXO', 'transportes', 0, 0, '', '0034', 22, 3, 1, 1, 1, NULL, 'RUA GUANAZES,283', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 4, '0000-00-00', '2010-05-07 10:33:27', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'TRANSPORTES SANTA LUCI LTDA', '05.064.874/0001-26', 'SR.RAUL', '', 'FLORESTA', '4734365850', 'miltonruivo@hotmail.com', '', '', 'Sociedade Limitada', 'Simples', '', '', '2002', '36.000,00', '36.000,00', '36.000,00', '3.000,00', '3.000,00', '50', '1.500,00', '78.000,00', '0', '', '', '', '', '', '', '', '', 'um veiculo caminhão vw850 ano 2000/2001', 'transportes', 'transportes de mercadorias', 'aposentadoria', 'não tem', 'a vista', 'Possibilidade de  aumento de faturamento, caminhão com tempo ocioso. ', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(57, 'INDUSTRIA SETOR PLÁSTICOS (LINHA MÓVEIS)', 'industria-na-regioa-de-limeira-', 0, 0, '', '0035', 13, 2, 24, 4, 1, NULL, 'RUA ALFREDO CORREIA DA ROCHA, 625- ENG COELHO', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 1, '0000-00-00', '2010-05-17 18:40:12', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'R ANTUNES IND E COM DE ART DE ALUMINIO LTDA ', '10.796.022/0001-63', 'OLIVIO', '', 'jd luis favero', '19-38579770 - 19-38579641-  19.97645940', 'OLIVIOALbaNEZ@HOTMAIL.COM', '', '', 'Sociedade Limitada', 'Lucro Presumido', '', '150.000,00', '2002', '2.160.000,00', '2.640.000,00', '1.011.400,00', '280.000,00', '152.000,00', '14', '40.000,00', '1.600.000,00', '50', '', '', '', '', '', '', '', '', 'INJETORAS PLASTICAS; TORNOS DE REPUCHO, TORNO MECASNICO, FREZA, MOLDES E OUTRAS', 'ACESSORIOS PARA MOVEIS, PE PARA ESTOFADOS, CAMA BOX, BRAÇO DE CADEIRAS', '', 'APOSENTADORIA NAO TEM QUEM TOCA O NEGOCIO', 'ZERO', '60% AVISTA O SALDO ESTUDO PARCELAMENTO', 'BOA MARGEN DE LUCRO, BOA LIQUIDES, PROJEÇAO DE FATURAMENTO MENSAL PARA O SEGUNDO SEMESTRE E DE R$450.000,OO', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(58, 'INDUSTRIA PLASTICOS (Obra civil) ', 'industria-na-regioa-de-limeira-', 0, 0, '', '0036', 13, 2, 26, 30, 1, NULL, '', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 2, '0000-00-00', '2010-05-14 11:05:33', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sociedade Limitada', 'Lucro Presumido', '', '300.000,00', '', '', '', '', '400.000,00', '', '35', '140.000,00', '16.500.000,00', '88', '', '', '', '', '', '', '', '', 'Valor dos equipamentos aproximado de R$ 1.600.000,00.\r\n\r\nImovel avaliado em R$ 6.500.000,00.', 'Produtos destinados a obras civis.', '', 'APOSENTADORIA', 'Nenhum', 'Negocio será tratado com muito sigilo e dispensamos especulação, pois teremos procedimento para quem vim a analizar a empresa.', 'Boa margem de lucro, boa liquides, projeção de faturamento mensal para ultrapassar R$ 1.000.000,00 mensal com modificação de postura de mercado, assim tendo uma margem ainda mais alta.', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(61, 'EMPRESA DE ARTEFATOS PLÁSTICOS', 'empresa-de-artefatos-plasticos', 0, 0, '', '0038', 13, 2, 1, 1, 1, NULL, 'Rua  Elisa Sofia K. Salfer,05', '', '', NULL, 1, 0, 0, NULL, '', 0.000000, 0.000000, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2010-05-17 18:30:25', 0, '0000-00-00 00:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', 'Water induatria de tubos e conexões ltda', '04.041.012/0001-15', 'Etore Fachini Filho', '', 'Itaum', '47  3429-3574', 'water@water.ind.br', '', '', 'Sociedade Limitada', 'Lucro Presumido', 'www.water.ind.br', '', '2005', '', '', '', '', '', '', '', '850.000,00', '04', '', '', '', '', '', '', '', '', ' 12 Moldes para injeção termo plásticos novos.\r\n02 injetoras (150 ton. e 230 ton.).', 'Material elétrico de baixa tensão residencial comercial( 38 itens)\r\nTomadas, interruptores, tomadas telefone, porta lâmpadas decorativo, placas de acabamento 4 x 2 para tomadas e interruptores.', '', 'Mudança e desenvolvimento de outra atividade na construção civil.', '', 'Empresa com faturamento baixo, porém com grande potencial, te que ser desenvolvido carteira de representantes para melhorar a venda, vendendo somente na cidade em no estado produto para venda em todo Brasil!\r\n50% entrada + 03 parcelas.\r\n', 'Empresa sem dívidas bancárias ou financiamentos, com produtos de giro, dos quais 03 são objeto de patente e vendas em expanção.', '', '', '', '', '', '', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_product_category`
--

CREATE TABLE IF NOT EXISTS `jos_properties_product_category` (
  `productid` int(11) NOT NULL default '0',
  `categoryid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`productid`,`categoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_properties_product_category`
--

INSERT INTO `jos_properties_product_category` (`productid`, `categoryid`) VALUES
(1, 1),
(2, 1),
(21, 1),
(22, 3),
(23, 1),
(24, 1),
(25, 3),
(26, 1),
(27, 1),
(28, 1),
(30, 3),
(31, 1),
(32, 2),
(33, 3),
(34, 2),
(35, 2),
(36, 1),
(37, 1),
(38, 3),
(39, 3),
(40, 1),
(42, 2),
(43, 2),
(44, 1),
(45, 2),
(47, 3),
(48, 1),
(49, 3),
(50, 1),
(51, 3),
(52, 3),
(53, 1),
(54, 1),
(55, 2),
(56, 3),
(57, 2),
(58, 2),
(60, 2),
(61, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_profiles`
--

CREATE TABLE IF NOT EXISTS `jos_properties_profiles` (
  `id` int(6) NOT NULL auto_increment,
  `mid` int(6) NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `alias` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL default '',
  `type` int(1) NOT NULL default '0',
  `info` varchar(255) NOT NULL default '',
  `bio` mediumtext NOT NULL,
  `properties` int(3) NOT NULL default '0',
  `address1` varchar(50) NOT NULL default '',
  `address2` varchar(50) NOT NULL default '',
  `locality` varchar(50) NOT NULL default '',
  `pcode` varchar(10) NOT NULL default '',
  `state` varchar(50) NOT NULL default '',
  `country` varchar(50) NOT NULL default '',
  `show` tinyint(1) NOT NULL default '0',
  `email` varchar(50) NOT NULL default '',
  `phone` varchar(20) NOT NULL default '',
  `fax` varchar(20) NOT NULL default '',
  `mobile` varchar(20) NOT NULL default '',
  `skype` varchar(30) NOT NULL default '',
  `ymsgr` varchar(30) NOT NULL default '',
  `icq` varchar(30) NOT NULL default '',
  `web` varchar(255) NOT NULL default '',
  `blog` varchar(255) NOT NULL default '',
  `image` varchar(70) NOT NULL default '',
  `logo_image` varchar(70) NOT NULL default '',
  `logo_image_large` varchar(70) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `ordering` int(3) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `jos_properties_profiles`
--

INSERT INTO `jos_properties_profiles` (`id`, `mid`, `name`, `alias`, `company`, `type`, `info`, `bio`, `properties`, `address1`, `address2`, `locality`, `pcode`, `state`, `country`, `show`, `email`, `phone`, `fax`, `mobile`, `skype`, `ymsgr`, `icq`, `web`, `blog`, `image`, `logo_image`, `logo_image_large`, `published`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(14, 0, 'João', '', 'CCC', 0, 'Escritorio de contabilidade', '', 0, '', '', 'Joinville', '', 'Santa Catarina', 'Brasil', 1, 'maudigital@ig.com.br', '4444444444', '', '4444444444', 'fffffffff', 'fffffffffff', '300.000,00', 'Joinville, Blumenau, São Francisco do Sul', '2', '', '', '', 1, 0, 0, '0000-00-00 00:00:00'),
(13, 0, 'Walther Petris', 'walther-petris', 'Neo-W', 0, 'Plasticos e metalmecânico', '', 0, '', '', 'Jonville', '', 'Santa Catarina', 'Brasil', 1, 'walther_petris@hotmail.com', '47 8802.2250', '', '47 8802.2250', 'walther_petris', 'walther_petris@hotmail.com', '2.000.000,00', 'Joinville', '1', '', '', '', 1, 0, 0, '0000-00-00 00:00:00'),
(12, 0, 'Paulo', '', 'Particular', 0, 'Que não exija conhecimento expecialista', '', 0, '', '', 'Joinville', '', 'Santa Catarina', 'Brasil', 1, 'tech14115@gmail.com', '47 3801-3411', '', '(11) 8160-2731', 'paulo_ricardo_almeida', 'nda', '500.000,00', 'Joinville ou Sul', '2', '', '', '', 1, 0, 0, '0000-00-00 00:00:00'),
(15, 0, 'rogerio facin', 'rogerio-facin', 'italian food beverage', 0, 'Todos os Setores a analizar', '', 0, '', '', 'Joinville', '', 'Santa Catarina', 'Brasil', 1, 'rogeriofacin@bol.com.br', '84- 96204968', '', '84- 96235656', '', '', '300.000,00', 'Joinville', '2', '', '', '', 1, 0, 0, '0000-00-00 00:00:00'),
(16, 0, 'Eliton Flavio Miyazato', '', 'The-amigos...', 0, 'Lotericas', 'Casas lotericas', 0, '', '', 'Lins', '', 'São Paulo', 'Outros', 1, 'flaviomiyazato@uol.com.br', '14-88250547', '', '14-88250547', '', '', '80.000,00', 'qualquer cidade com no minimo 10.000 habitantes', '2', '', '', '', 1, 0, 0, '0000-00-00 00:00:00'),
(17, 0, 'Investim', 'investim', 'Investim', 0, 'Supermercados', 'Faturamento acima de R$ 400.000,00 estudo proposta superior', 0, '', '', 'Joinville', '', 'Santa Catarina', 'Brasil', 1, '', '', '', '', '', '', '1.000.000,00', 'Joinville e Região', '2', '', '', '', 1, 0, 0, '0000-00-00 00:00:00'),
(18, 0, 'Investim', 'investim', '', 0, 'Academia', 'médio porte', 0, '', '', 'Joinville', '', 'Santa Catarina', 'Brasil', 1, '', '', '', '', '', '', '400.000,00', 'Joinville', '2', '', '', '', 1, 0, 0, '0000-00-00 00:00:00'),
(19, 0, 'CLAUDIA', 'claudia', '', 0, 'Escritorio de Contabilidade', 'Contadora e estou a procura de um escritorio de contabilidade ou carta de clientes', 0, '', '', '', '', '', '', 1, 'contabilhp@yahoo.com.br', '', '', '', '', '', '100.000,00', 'Joinville', '2', '', '', '', 1, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_rates`
--

CREATE TABLE IF NOT EXISTS `jos_properties_rates` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `description` text,
  `week` int(11) NOT NULL,
  `validfrom` date default NULL,
  `validto` date default NULL,
  `rateperday` double default '0',
  `rateperweek` double NOT NULL,
  `mindays` int(11) default NULL,
  `maxdays` int(11) default NULL,
  `minpeople` int(11) default NULL,
  `maxpeople` int(11) default NULL,
  `typeid` varchar(10) default NULL,
  `weekonly` tinyint(2) NOT NULL default '0',
  `validfrom_ts` date default NULL,
  `validto_ts` date default NULL,
  `dayofweek` int(1) NOT NULL default '7',
  `productid` int(11) default NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_properties_rates`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_rating`
--

CREATE TABLE IF NOT EXISTS `jos_properties_rating` (
  `product_id` int(11) NOT NULL,
  `rating_sum` int(11) NOT NULL,
  `rating_count` int(11) NOT NULL,
  `lastip` varchar(50) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_properties_rating`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_rating_user`
--

CREATE TABLE IF NOT EXISTS `jos_properties_rating_user` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `lastip` varchar(50) NOT NULL,
  PRIMARY KEY  (`product_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_properties_rating_user`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_state`
--

CREATE TABLE IF NOT EXISTS `jos_properties_state` (
  `id` int(3) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `parent` int(5) NOT NULL,
  `mid` int(5) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `jos_properties_state`
--

INSERT INTO `jos_properties_state` (`id`, `name`, `alias`, `parent`, `mid`, `published`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 'Santa Catarina', 'sc', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(2, 'Paraná', 'pr', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(3, 'Rio Grande do Sul', 'rs', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(4, 'São Paulo', 'sp', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(5, 'Rio de Janeiro', 'rj', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(6, 'Minas Gerais', 'minas-gerais', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(7, 'Rio Grande do Norte', 'rio-grande-do-norte', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(8, 'Tocantins', 'tocantins', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(9, 'Sergipe', 'sergipe', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(11, 'Rondônia', 'rondonia', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(12, 'Roraima', 'roraima', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(13, 'Piauí', 'piaui', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(14, 'Pernambuco', 'pernambuco', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(15, 'Paraíba', 'paraiba', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(16, 'Pará', 'para', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(17, 'Minas Gerais', 'minas-gerais', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(18, 'Mato Grosso do Sul', 'mato-grosso-do-sul', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(19, 'Mato Grosso', 'mato-grosso', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(20, 'Maranhão', 'maranhao', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(21, 'Goiás', 'goias', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(22, 'Espírito Santo', 'espirito-santo', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(23, 'Distrito Federal', 'distrito-federal', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(24, 'Ceará', 'ceara', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(25, 'Bahia', 'bahia', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(26, 'Amazonas', 'amazonas', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(27, 'Amapá', 'amapa', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(28, 'Alagoas', 'alagoas', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(29, 'Acre', 'acre', 1, 0, 1, 0, 0, '0000-00-00 00:00:00'),
(30, 'Região Sul', 'regiao-sul', 1, 0, 1, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_properties_type`
--

CREATE TABLE IF NOT EXISTS `jos_properties_type` (
  `id` int(2) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `alias` varchar(100) default NULL,
  `parent` int(2) default NULL,
  `published` tinyint(1) NOT NULL,
  `ordering` int(1) NOT NULL,
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `jos_properties_type`
--

INSERT INTO `jos_properties_type` (`id`, `name`, `alias`, `parent`, `published`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 'Postos de Combustível', 'postos-de-combustivel', 1, 1, 0, 0, '0000-00-00 00:00:00'),
(2, 'Escritórios de Contabilidade', 'escritorios-de-contabilidade', 3, 1, 0, 0, '0000-00-00 00:00:00'),
(3, 'Padarias e Confeitarias', 'padarias-e-confeitarias', 1, 1, 0, 0, '0000-00-00 00:00:00'),
(4, 'Bares e Lanchonetes', 'bares-e-lanchonetes', 1, 1, 0, 0, '0000-00-00 00:00:00'),
(5, 'Revistaria e Tabacaria', 'revistaria-e-tabacaria', 1, 1, 8, 0, '0000-00-00 00:00:00'),
(6, 'Lotérica', 'loterica', 3, 1, 1, 0, '0000-00-00 00:00:00'),
(7, 'Hotéis e Motéis ', 'hoteis-e-moteis-', 1, 1, 0, 0, '0000-00-00 00:00:00'),
(8, 'Supermercados - Mercado', 'supermercados-mercado', 1, 1, 6, 0, '0000-00-00 00:00:00'),
(9, 'Distribuidoras', 'distribuidoras', 1, 1, 7, 0, '0000-00-00 00:00:00'),
(10, 'Provedora de Internet', 'provedora-de-internet', 3, 1, 0, 0, '0000-00-00 00:00:00'),
(11, 'Metalmecânica', 'metalmecanica', 2, 1, 0, 0, '0000-00-00 00:00:00'),
(12, 'Construtoras', 'construtoras', 3, 1, 0, 0, '0000-00-00 00:00:00'),
(13, 'Plasticos', 'plasticos', 2, 1, 0, 0, '0000-00-00 00:00:00'),
(14, 'Madeiras', 'madeiras', 2, 1, 0, 0, '0000-00-00 00:00:00'),
(15, 'Equipamentos', 'equipamentos', 2, 1, 0, 0, '0000-00-00 00:00:00'),
(16, 'Empresa de Segurança Privada', 'empresa-de-seguranca-privada', 3, 1, 0, 0, '0000-00-00 00:00:00'),
(17, 'Pizzarias', 'pizzarias', 1, 1, 0, 0, '0000-00-00 00:00:00'),
(18, 'Escolas', 'escolas', 3, 1, 0, 0, '0000-00-00 00:00:00'),
(19, 'Auto Escola', 'auto-escola', 3, 1, 0, 0, '0000-00-00 00:00:00'),
(21, 'Importadora e Exportadora', 'importadora-e-exportadora', 3, 1, 0, 0, '0000-00-00 00:00:00'),
(22, 'Trasportes', 'trasportes', 3, 1, 0, 0, '0000-00-00 00:00:00'),
(23, 'Escolas de Idiomas', 'escolas-de-idiomas', 3, 1, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_sections`
--

CREATE TABLE IF NOT EXISTS `jos_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_sections`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_session`
--

CREATE TABLE IF NOT EXISTS `jos_session` (
  `username` varchar(150) default '',
  `time` varchar(14) default '',
  `session_id` varchar(200) NOT NULL default '0',
  `guest` tinyint(4) default '1',
  `userid` int(11) default '0',
  `usertype` varchar(50) default '',
  `gid` tinyint(3) unsigned NOT NULL default '0',
  `client_id` tinyint(3) unsigned NOT NULL default '0',
  `data` longtext,
  PRIMARY KEY  (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_session`
--

INSERT INTO `jos_session` (`username`, `time`, `session_id`, `guest`, `userid`, `usertype`, `gid`, `client_id`, `data`) VALUES
('admin', '1487892719', '6f4c7adccc4b69a2302b01bf0a0c9e30', 0, 62, 'Super Administrator', 25, 0, '__default|a:8:{s:22:"session.client.browser";s:114:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36";s:15:"session.counter";i:32;s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":28:{s:2:"id";s:2:"62";s:4:"name";s:13:"Administrator";s:8:"username";s:5:"admin";s:5:"email";s:24:"investim@investim.com.br";s:8:"password";s:65:"0b379accb2780fcb7ffa0cf429a52c17:VbwJLsna1aeBNGMePvG2wfkWnqtATCSb";s:14:"password_clear";s:0:"";s:8:"usertype";s:19:"Super Administrator";s:5:"block";s:1:"0";s:9:"sendEmail";s:1:"1";s:3:"gid";s:2:"25";s:12:"registerDate";s:19:"2010-03-11 20:06:07";s:13:"lastvisitDate";s:19:"2017-02-23 23:09:42";s:10:"activation";s:0:"";s:6:"params";s:56:"admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n";s:3:"aid";i:2;s:5:"guest";i:0;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:58:"C:\\ServidorWEB\\www\\libraries\\joomla\\html\\parameter\\element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":5:{s:14:"admin_language";s:0:"";s:8:"language";s:0:"";s:6:"editor";s:0:"";s:8:"helpsite";s:0:"";s:8:"timezone";s:1:"0";}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}s:7:"empresa";s:0:"";s:6:"estado";s:0:"";s:6:"cidade";s:0:"";s:4:"pais";s:0:"";s:8:"telefone";s:0:"";s:7:"celular";s:0:"";s:5:"skype";s:0:"";s:3:"msn";s:0:"";s:8:"intencao";s:10:"Investidor";}s:19:"session.timer.start";i:1487890356;s:18:"session.timer.last";i:1487892691;s:17:"session.timer.now";i:1487892719;s:13:"session.token";s:32:"f39e8e2751a9751c938a4a57aa717d68";}securimage_code_value|s:6:"pdhz5k";securimage_code_ctime|i:1487890983;'),
('admin', '1487891786', '90d7144ce93f33361d1a8665f5480810', 0, 62, 'Super Administrator', 25, 1, '__default|a:8:{s:15:"session.counter";i:30;s:19:"session.timer.start";i:1487891116;s:18:"session.timer.last";i:1487891786;s:17:"session.timer.now";i:1487891786;s:22:"session.client.browser";s:114:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:5:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}s:11:"application";a:1:{s:4:"data";O:8:"stdClass":1:{s:4:"lang";s:0:"";}}s:9:"com_users";a:1:{s:4:"data";O:8:"stdClass":6:{s:12:"filter_order";s:6:"a.name";s:16:"filter_order_Dir";s:0:"";s:11:"filter_type";s:19:"Super Administrator";s:13:"filter_logged";i:0;s:6:"search";s:0:"";s:10:"limitstart";s:2:"20";}}s:6:"global";a:1:{s:4:"data";O:8:"stdClass":1:{s:4:"list";O:8:"stdClass":1:{s:5:"limit";s:2:"20";}}}s:9:"com_menus";a:1:{s:4:"data";O:8:"stdClass":1:{s:8:"menutype";s:8:"mainmenu";}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":28:{s:2:"id";s:2:"62";s:4:"name";s:13:"Administrator";s:8:"username";s:5:"admin";s:5:"email";s:24:"investim@investim.com.br";s:8:"password";s:65:"0b379accb2780fcb7ffa0cf429a52c17:VbwJLsna1aeBNGMePvG2wfkWnqtATCSb";s:14:"password_clear";s:0:"";s:8:"usertype";s:19:"Super Administrator";s:5:"block";s:1:"0";s:9:"sendEmail";s:1:"1";s:3:"gid";s:2:"25";s:12:"registerDate";s:19:"2010-03-11 20:06:07";s:13:"lastvisitDate";s:19:"2010-05-18 11:29:46";s:10:"activation";s:0:"";s:6:"params";s:56:"admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n";s:3:"aid";i:2;s:5:"guest";i:0;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:58:"C:\\ServidorWEB\\www\\libraries\\joomla\\html\\parameter\\element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":5:{s:14:"admin_language";s:0:"";s:8:"language";s:0:"";s:6:"editor";s:0:"";s:8:"helpsite";s:0:"";s:8:"timezone";s:1:"0";}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}s:7:"empresa";s:0:"";s:6:"estado";s:0:"";s:6:"cidade";s:0:"";s:4:"pais";s:0:"";s:8:"telefone";s:0:"";s:7:"celular";s:0:"";s:5:"skype";s:0:"";s:3:"msn";s:0:"";s:8:"intencao";s:10:"Investidor";}s:13:"session.token";s:32:"5e43c94dc00909b81953d720eee029e8";}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_stats_agents`
--

CREATE TABLE IF NOT EXISTS `jos_stats_agents` (
  `agent` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_stats_agents`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_templates_menu`
--

CREATE TABLE IF NOT EXISTS `jos_templates_menu` (
  `template` varchar(255) NOT NULL default '',
  `menuid` int(11) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_templates_menu`
--

INSERT INTO `jos_templates_menu` (`template`, `menuid`, `client_id`) VALUES
('investim', 0, 0),
('khepri', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_users`
--

CREATE TABLE IF NOT EXISTS `jos_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  `empresa` varchar(100) default NULL,
  `estado` varchar(100) default NULL,
  `cidade` varchar(100) default NULL,
  `pais` varchar(100) default NULL,
  `telefone` varchar(30) default NULL,
  `celular` varchar(30) default NULL,
  `skype` varchar(255) default NULL,
  `msn` varchar(255) default NULL,
  `intencao` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=143 ;

--
-- Extraindo dados da tabela `jos_users`
--

INSERT INTO `jos_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`, `empresa`, `estado`, `cidade`, `pais`, `telefone`, `celular`, `skype`, `msn`, `intencao`) VALUES
(62, 'Administrator', 'admin', 'investim@investim.com.br', '0b379accb2780fcb7ffa0cf429a52c17:VbwJLsna1aeBNGMePvG2wfkWnqtATCSb', 'Super Administrator', 0, 1, 25, '2010-03-11 20:06:07', '2017-02-23 23:20:25', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n', '', '', '', '', '', '', '', '', 'Investidor'),
(64, 'ADMINISTRADOR ', 'administrador', 'afjdakl@jgld.com', 'a2c796af92f8ebd4c913ad6c86cfd644:96DjGiUoHBZcfqAubEUR4bViGr9Ewcc2', 'Super Administrator', 0, 1, 25, '2010-03-29 02:34:55', '2010-05-18 11:22:07', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n', '', '', '', '', '', '', '', '', 'Investidor'),
(71, 'Anderson R. Moreira', 'Anderson', 'reimor30@hotmail.com', '4fa273488312a4544fd8595b68e941d4:UDyzRIKEnweeEbcxMt7zmZC42fWNEIu9', 'Registered', 0, 1, 18, '2010-04-14 11:04:05', '0000-00-00 00:00:00', 'a2f104c44c5f8357c28619d7ac6f5dfa', 'language=\ntimezone=-3\n\n', 'Mundo Gospel Me', 'Santa Catarina', 'Joinville', 'Brasil', '47 9187 6496', '47 9187 6496', 'sdaa', 'reimor30@hotmail.com', 'Investidor'),
(93, 'Marco Aurélio', 'mafilho', 'marcoaureliofilho@gmail.com', '1e2b8a9ac200caa057fe94fda8e5ac5c:v3iPP5cclBQqmrE3G9PgRjfa999NqVLB', 'Registered', 0, 1, 18, '2010-04-20 11:14:38', '2010-04-20 11:15:45', '', 'language=\ntimezone=-3\n\n', 'Ilhanet', 'Santa Catarina', 'São Francisco do Sul', 'Brasil', '3444-4050', '8803-3300', 'gaspersurf', 'marcoaureliofilho@gmail.com', 'Vendedor Empresa'),
(94, 'elaine', 'elaine', 'elaine.zanda@hotmail.com', '1eb24bc1fc166ccdb0603fc415c9dce0:KiCojV7bygojRW1kOWxxRtEEkVJMjOsK', 'Registered', 0, 1, 18, '2010-04-20 12:15:14', '2010-04-29 23:01:35', '7623b7e5fda15c630709ebf985b9320a', 'language=\ntimezone=-3\n\n', 'zandavalli', 'Santa Catarina', 'concordia', 'Brasil', '49-3442-0928', 'mesmo', 'n', 'mesmo email', 'Investidor'),
(89, 'tatiana nakasone', 'tatiana', 'tatianataen@hotmail.com', 'bb5f379f4f9ee46b882a0f08b5cd46fb:36ntNVxPZw3u7A0XOVQtUHOSQDpyU1Zt', 'Registered', 0, 1, 18, '2010-04-19 15:20:53', '0000-00-00 00:00:00', 'fe3340ed4e2ef18951a5af0380534b09', 'language=\ntimezone=-3\n\n', 'autonomo', 'Santa Catarina', 'joinville', 'Brasil', '32070245', '96568430', 'tatiana tae', 'tatianataen@hotmail.com', 'Investidor'),
(77, 'ronaldo stoppa', 'stoppa', 'stoppa@treinavil.com.br', 'd30a9be54b9ef073d24ec86de930f0ff:CTqktEh6RVhc80kdPNz41obs9aEvxJFN', 'Registered', 0, 1, 18, '2010-04-15 13:45:09', '2010-04-15 13:48:33', '', 'language=\ntimezone=-3\n\n', 'Brasil Sul Segurança', 'Santa Catarina', 'joinville', 'Brasil', '47 34228899', '88595620', 'nao tenho', 'familiastoppa@hotmail.com', 'Investidor'),
(73, 'Marilu Moreira', 'Mari', 'marilu.moreira@fg.com.br', '416bd9459252de17d85a1707373789c3:9J7ZUzO1WSe5k0gAKR0UGH4g5v62DZqP', 'Registered', 0, 1, 18, '2010-04-14 11:30:59', '2010-04-14 11:32:55', '', 'language=\ntimezone=-3\n\n', 'FG', 'Santa Catarina', 'Joinville', 'Brasil', '34318010', '88399500', '.', '.', 'Vendedor Empresa'),
(82, 'Josiane', 'josidigital', 'josidigital@gmail.com', '06792be5a03786f6fc42fd344acc7460:hSMdkVchGl81b6tpkp0vffXfCpM92aOJ', 'Registered', 0, 1, 18, '2010-04-16 13:44:23', '2010-04-16 15:03:48', '', 'language=\ntimezone=-3\n\n', 'nenhuma', 'Santa Catarina', 'Joinville', 'Brasil', '38041543', '99072449', 'josidigital', 'josidigital', 'Investidor'),
(84, 'Paulo', 'tech14115', 'tech14115@gmail.com', 'cf1fa0597e69e4c85a43ae2ad2754214:SI7rMOikjHofFkid9zEH95Vmu3na8UF3', 'Registered', 0, 1, 18, '2010-04-16 18:51:53', '2010-04-20 14:39:26', '6772866b21f819084851455ea51452dc', 'language=\ntimezone=-3\n\n', 'Part', 'Santa Catarina', 'Joinville', 'Brasil', '(47) 3801-3411', '(11) 8160-2731', 'paulo_ricardo_almeida', 'sem', 'Investidor'),
(91, 'Walther Petris', 'walther_petris', 'walther_petris@hotmail.com', 'd86098adbe2d26b0d1ad39dc6af650ea:me6iPOORKAkAzHMcRH2R4K5hFBPjN2tz', 'Registered', 0, 1, 18, '2010-04-19 18:44:52', '2010-04-19 18:47:49', '', 'language=\ntimezone=-3\n\n', 'partiicular', 'Santa Catarina', 'Joinville', 'Brasil', '47 8802.2250', '47 8802.2250', 'walther_petris', 'walther_petris@hotmail.com', 'Investidor'),
(95, 'Bruno', 'Melo', 'bruno@connectmidia.com', '0e563c706e9924d4452d2ad0c9fdc56e:93XA1kttQ814wudUKXBSo3iWTyT0w5sJ', 'Registered', 0, 1, 18, '2010-04-20 12:30:46', '0000-00-00 00:00:00', 'e640e82d480f9c95e6c3dfad3010a94f', 'language=\ntimezone=-3\n\n', 'Connect Mídia', 'Santa Catarina', 'Joinville', 'Brasil', '34222197', '99146666', 'brunodemelocarvalho', 'brunomeloo@hotmail.com', 'Investidor'),
(96, 'André Peres', 'alsp2003', 'alsp2003@hotmail.com', '5cf2df02320dc9e54bc8e58aadc90d32:s4vmrNUhRL2osoAAgpMRCb4ewvfuIolY', 'Registered', 0, 1, 18, '2010-04-20 14:25:54', '2010-04-25 02:19:39', '', 'language=\ntimezone=-3\n\n', 'Reflexus Digital', 'Santa Catarina', 'Joinville', 'Brasil', '47 3801-3900', '47 8415-0478', 'reflexusdigital', 'alsp2003@hotmail.com', 'Investidor'),
(97, 'Pablo lopez', 'Pablo', 'Pablo@inversiones-brasil.es', '5a06df0cf0bdae3110d6380e86dce3ea:OZz4mkTTf6liEAc9l8gVtC3HIm8h69QY', 'Registered', 0, 1, 18, '2010-04-21 14:40:53', '0000-00-00 00:00:00', '34d4997fd8558b5d78b8dc36ea338e7d', 'language=\ntimezone=-3\n\n', 'Inversiones Brasil', 'Rio de Janeiro', 'Torrevieja (España)', 'Brasil', '+34966921680', '+34606045254', 'inversiones.brasil ', '0000', 'Vendedor Empresa'),
(101, 'jose caciolato', 'jose', 'josecaciolato@hotmail.com', '006bd9af8b9ab5cecf8efbb3ba58a9c2:CZat5F93NpPgLV2BATrKHZuovirgyWbw', 'Registered', 0, 1, 18, '2010-04-22 22:27:53', '0000-00-00 00:00:00', 'caead100978c5437b4cf9522acce3384', 'language=\ntimezone=-3\n\n', 'kobrasol colcoes', 'Santa Catarina', 'sao jose', 'Brasil', '048-3034-3461', '044-99706761', 'aaa', 'josecaciolato@hotmail.com', 'Investidor'),
(99, 'João Godinho', 'godinhoj', 'joaogvgodinho@gmail.com', '2d69c1dfa195301cf744e0447b0dbc6f:GCJ3crJXCSdrh2pH8gfdVQL22qsccxlN', 'Registered', 0, 1, 18, '2010-04-22 13:03:40', '2010-04-29 13:54:49', '14c3db1a5f308b3e082e42509e1bedf9', 'language=\ntimezone=-3\n\n', 'Plastmolde', 'Santa Catarina', 'Joinville', 'Brasil', '47 30276749', '47 88277197', 'joao_godinho', 'joaogvgodinho@gmail.com', 'Investidor'),
(100, 'Rodrigo Bruder', 'bruder1981', 'rodrigo_bruder@yahoo.com.br', 'a1ecba942bb477099fdba3b0f9e63ba8:LU5LEZUpfjqTmVBGHMkrXPUbsaeZZtdq', 'Registered', 0, 1, 18, '2010-04-22 13:05:27', '2010-04-22 15:40:26', '', 'language=\ntimezone=-3\n\n', 'rodrigo Bruder', 'Santa Catarina', 'Joinville', 'Brasil', '47 34340086', '47 99875981 ', 'não tenho', 'rodrigo_bruder@yahoo.com.br', 'Vendedor Empresa'),
(102, 'JORGE MAINARDI FERNANDES', 'JORGE', 'jmainardi@uol.com.br', 'ecc3cdfa42db77431115bf42b6740f53:5HAXwxUuG7OE5m3wQfGYvCIouBAxs4K6', 'Registered', 0, 1, 18, '2010-04-23 23:28:26', '2010-04-27 21:59:00', '5ac13436946a5674c5d5dc0e8579b820', 'language=\ntimezone=-3\n\n', 'ETICA CONTABILIDADE E CONSULTORIA S/S LTDA', 'Paraná', 'LONDRINA', 'Brasil', '67 3341-6179', '67 9982-0148', '', '', 'Investidor'),
(103, 'Nelson Cidral', 'NéuCidral', 'neucidral@yahoo.com.br', 'ebfdd3298bd05cd146fe143df4d96d2f:9LljISrw8CoC6s0h2cfUm7axWEp8fmEr', 'Registered', 0, 1, 18, '2010-04-24 01:23:02', '2010-04-24 12:01:32', '', 'language=\ntimezone=-3\n\n', 'NéuCidral ME', 'Santa Catarina', 'Joinville', 'Brasil', '47. 3436-9906', '47. 9102-7945', '', '', 'Investidor'),
(104, 'ary ventura', 'aryventura', 'aryventura@yahoo.com.br', '3deb896bbd5eaadce3caf5641c0174cd:8ZVXgmZ7LCCrhrYadySr5QIvlkruL74P', 'Registered', 0, 1, 18, '2010-04-24 21:07:31', '2010-04-25 12:45:15', '', 'language=\ntimezone=-3\n\n', 'ary ventura', 'Paraná', 'curitiba', 'Brasil', '(41)91991380', '(41)91991380', '', '', 'Investidor'),
(105, 'Carlos Quandt', 'carlos', 'carlosquandt@hotmail.com', 'a7928f2c1e1324c7daf6b7131613af53:UkGo259O8RCk9LMHVuYy5LtAkZRIClBY', 'Registered', 0, 1, 18, '2010-04-24 22:06:09', '2010-04-24 22:12:39', '', 'language=\ntimezone=-3\n\n', 'moveis Kadiz ltda', 'Santa Catarina', 'Rio Negrinho', 'Brasil', '47 36448877', '47 96448530', '', '', 'Investidor'),
(106, 'eduardo campos', 'educampos', 'eduardo.campos@ei-log.com', '30fbe2cf735610ec239886bc3cca9cb8:RulxCs9NVgDu0Xo1wGWapCJclzdEJuZW', 'Registered', 0, 1, 18, '2010-04-24 22:07:47', '0000-00-00 00:00:00', '8dba0aa7c7f74da464a7944d9855e0fb', 'language=\ntimezone=-3\n\n', 'ei-log.com', 'Rio Grande do Sul', 'pelotas', 'Brasil', '53 3025 6323', '85 99983932', 'luiz.eduardo.borges.campos', 'luiz.eduardobc@hotmail.com', 'Vendedor Empresa'),
(107, 'silvio cesar', 'silvio cesar', 'silviocesar@pop.com.br', '92f7339c744d429e6b388aedc8c83b86:L6qe2fxcCcsNwB0NCYqyBuxpMENune9L', 'Registered', 0, 1, 18, '2010-04-24 22:17:49', '2010-04-24 22:37:04', '', 'language=\ntimezone=-3\n\n', 'delgado s/a', 'Santa Catarina', 'joinville', 'Brasil', '47 99566092', '47099566092', '', '', 'Investidor'),
(109, 'Basilio Buyo', 'Basilio Buyo', 'basiliobuyo@gmail.com', 'b35b76883c84c46eb7a48a3a9f193629:JU8TOmVvlBuuWRq4JxQGUN3YnjSEjYQd', 'Registered', 0, 1, 18, '2010-04-25 01:18:17', '0000-00-00 00:00:00', '4dcccb523c2303600d780d8bc372ee9c', 'language=\ntimezone=-3\n\n', 'AQUELARRE e ABRENTE INVESTMENT', 'Santa Catarina', 'Balneario Camboriú', 'Espanha', '+34633498402', '+34633498402', '', '', 'Investidor'),
(110, 'OSVALDO ', 'osvaldopalermo', 'osvaldopalermo@terra.com.br', '839524ae16b81fbc0587955cf362a5b6:BNcssAkZF9mm7mqlv8EXAkitUIfgCY0Q', 'Registered', 0, 1, 18, '2010-04-25 02:36:15', '2010-05-02 19:22:23', '', 'language=\ntimezone=-3\n\n', 'PALERMO COM ALIMENTOS LTDA', 'Santa Catarina', 'joinville', 'Brasil', '47 30273211', '47 84312771', '', 'osvaldopalermo@terra.com.br', 'Investidor'),
(111, 'Claudio', 'Claudio', 'hirmavanessa@hotmail.com', '4723ef09ca033b83bb4de3e854550f32:uHajoNlhHZWLwU1ZQtOnJNk8kF6oeI51', 'Registered', 0, 1, 18, '2010-04-25 03:12:47', '2010-04-25 03:15:18', '', 'language=\ntimezone=-3\n\n', 'investidor', 'Santa Catarina', 'são francisco do sul', 'Brasil', '47 34710337', '47 9113 9600', '', '', 'Investidor'),
(112, 'Jaison Corrêa', 'xerifebc', 'juridico@excelconsultoria.com.br', 'd19ebc2dff143d824cfa3108ce0f9916:iWSE3x9sEO6TQY2nRFdA0RlN3vtz3QRT', 'Registered', 0, 1, 18, '2010-04-25 05:13:26', '2010-05-04 19:02:17', '', 'language=\ntimezone=-3\n\n', 'excel consultoria', 'Santa Catarina', 'balneário camboriu', 'Brasil', '4733673836', '4784228533', '', 'juridico@excelconsultoria.com.br', 'Investidor'),
(113, 'Hugo Lopez', 'Hugo', 'cemdabr@hotmail.com', '25d1a110ffe207275335ebcfb0e9d534:HqqHGhMZP8DzflF4xXoCuKItraj3LYxk', 'Registered', 0, 1, 18, '2010-04-25 12:04:38', '2010-04-25 20:51:03', '', 'language=\ntimezone=-3\n\n', 'Autónomo', 'Rio Grande do Sul', 'Porto Alegre', 'Brasil', '+598 99 66 08 09', '+598 99 66 08 09', '', '', 'Investidor'),
(114, 'GILSON ', 'adm12308', 'gilsonrodrigues19@hotmail.com', 'bdeb8c9250673e78922ae0dedfdd5766:mWpU2VBFzBLBMdkPLkj75JBR6wmCFD95', 'Registered', 0, 1, 18, '2010-04-25 21:46:59', '2010-05-01 02:52:29', '', 'language=\ntimezone=-3\n\n', 'MERCADO RODRIGUES', 'Rio Grande do Sul', 'PINHEIRINHO DO VALE', 'Brasil', '55 96191651 ', '55 96191651', '', '', 'Investidor'),
(115, 'Luis M. G. Bonnecarrère', 'lmbonne', 'lmbonne@gmail.com', '480bb757fd370167c44d5a9b94f7ceb6:t48QWLJ2a6Mqkt7ucp6DvoAESX8flDX8', 'Registered', 0, 1, 18, '2010-04-26 01:27:27', '2010-04-27 13:20:51', '729cc3df944a67206a4e01e5a1bdf494', 'language=\ntimezone=-3\n\n', 'Particular', 'Santa Catarina', 'Joinville', 'Brasil', '4791091871', '4791091871', 'lmbonne', 'lmbonne@hotmail.com', 'Investidor'),
(116, 'Douglas', 'douglas', 'douglas@wadvocacia.adv.br', '4abe80306890f2a6d7bc76fef393a7ec:jJn5Vu7CHpQTpL8aCU1CJnQVnSOFsgiu', 'Registered', 0, 1, 18, '2010-04-26 03:14:39', '2010-04-26 03:16:39', '', 'language=\ntimezone=-3\n\n', 'wadvocacia', 'Santa Catarina', 'Joinville', 'Brasil', '47 34228911', '47 34228911', 'douglas.wyrebski', 'douglasiab@hotmail.com', 'Investidor'),
(117, 'ROGERIO FACIN', 'ROGERIO', 'rogeriofacin@bol.com.br', '2e95c1939a0e52bbeb3820dcc012b1be:UySBLVWs63B4yHuJjQ8mv6oSGUkLnCh6', 'Registered', 0, 1, 18, '2010-04-26 11:45:36', '2010-05-07 21:09:32', '26ac100e042535fea5ff1c2bde7a6bec', 'language=\ntimezone=-3\n\n', 'ITALIAN FOOD BEVERAGE', 'Santa Catarina', 'JOINVILLE', 'Brasil', '84-96204968', '84-96235656', '', '', 'Investidor'),
(118, 'Igor C. Menin', 'igormenin', 'igormenin@gmail.com', 'eb094dde3ce8673bc4a5fc3f91b34e51:A6ZRCTpvZK9DOCNLwB5vO1v4FoZY8z4d', 'Registered', 0, 1, 18, '2010-04-26 11:57:14', '2010-04-26 11:58:26', '', 'language=\ntimezone=-3\n\n', 'nonononono', 'Santa Catarina', 'Jaraguá do Sul', 'Brasil', '4791684813', '4799194665', '', '', 'Investidor'),
(119, 'Cristiam de Oliveira', 'cristoli', 'christopholus@hotmail.com', 'fb3462fdf40dc4fab2f5720c6d1160f9:c5qK68f3FwFJXMbOUj0jLYd0PPT6UKsQ', 'Registered', 0, 1, 18, '2010-04-26 12:01:35', '2010-04-26 12:25:09', '', 'language=\ntimezone=-3\n\n', 'Civocar', 'Rio Grande do Sul', 'São Marcos', 'Brasil', '54 3291 3700', '54 9100 7342', 'cristoli', 'christopholus@hotmail.com', 'Investidor'),
(120, 'Renato', 'Renatofabiano', 'renatoroncador@yahoo.com.br', 'f11af1812745d4ee47c5ec182247f657:vuz2TS8o1obtplte1NdysOvj11nVbMAC', 'Registered', 0, 1, 18, '2010-04-26 13:05:52', '0000-00-00 00:00:00', '', 'language=\ntimezone=-3\n\n', 'Renato', 'São Paulo', 'Catanduva', 'Brasil', '35238214', '1791154778', 'renato.cesar.roncador', 'renato_roncador@hotmail.com', 'Investidor'),
(121, 'EDSON ROSA MARTINS', 'EDSON', 'nosderm@terra.com.br', '30eb440d5a83ebd1df85cc925b6e45f2:Ro8Y1rnwHQUub2wTUEp2RJixpmx4vyV2', 'Registered', 0, 1, 18, '2010-04-26 19:55:21', '2010-04-26 20:16:10', '', 'language=\ntimezone=-3\n\n', 'Loterica Ponto da Sorte Ltda ME', 'Santa Catarina', 'Tubarao', 'Brasil', '48-9986.2001', '48.9986.2001', '', 'edinholoterica@hotmail.com', 'Vendedor Empresa'),
(122, 'marcos', 'viera1991', 'viera91@ig.com.br', '5bbe4343b7568f0a30cd506458bb8672:aWDdKeaRTHM9zzL6hIiyaUQIEM3IgEnN', 'Registered', 0, 1, 18, '2010-04-27 22:21:30', '0000-00-00 00:00:00', '334acd7d5ede2cf994f54bcecc304216', 'language=\ntimezone=-3\n\n', 'ramos', 'São Paulo', 'atibaia', 'Brasil', '44120905', '85473553', '', '', 'Investidor'),
(123, 'juan', 'juan', 'vendas-juan@hotmail.com', '3b7030179f2483325677a225a7a5e4e9:ku9KNxG5xaUIyvD6XH8Zsvqv6E5bdLZl', 'Registered', 0, 1, 18, '2010-04-28 13:29:15', '2010-05-12 11:26:24', '', 'language=\ntimezone=-3\n\n', 'cfc matias nunes', 'Santa Catarina', 'jaragua do sul', 'Brasil', '47 88033546', '47 88033546', '', 'vendas-juan@hotmail.com', 'Investidor'),
(127, 'Jaime', 'Jaime', 'jaimejferreira@terra.com.br', 'f7b317e258a78daa773401b2cbeb3a5a:gKiDN3DYd2PbBREpB3dZHxMQZ1kKJe5Y', 'Registered', 0, 1, 18, '2010-04-30 11:38:32', '2010-05-17 21:50:36', '', 'language=\ntimezone=-3\n\n', 'Lotérica Sorte & Cia', 'Santa Catarina', 'Joinville', 'Brasil', '47-3439-0080', '47-8478-6202', 'jaime.ferreira3', '', 'Investidor'),
(125, 'Claudio', 'cboff', 'cboff62@gmail.com', 'c8031c09ec07cb211d97455d0de46fa0:gndUuoiKubVEpx4oS6eEe6CkgIo7dAoM', 'Registered', 0, 1, 18, '2010-04-29 13:09:05', '0000-00-00 00:00:00', '4a6d980b0d91b81a9a35458d4c799e6d', 'language=\ntimezone=-3\n\n', 'Autonomo', 'Santa Catarina', 'Joinville', 'Brasil', '47 34251614', '8458 5401', '', '', 'Investidor'),
(126, 'Eduardo Bauer', 'esbauer', 'esbauer@gvmail.br', '1f0918ce9c7a56384b53cf4515f84a3e:bQIaMEwkMZBa5pFwfgs2cgRvAw7mapbe', 'Registered', 0, 1, 18, '2010-04-29 16:42:56', '2010-04-29 16:44:41', '', 'language=\ntimezone=-3\n\n', 'Auto posto bucarein', 'Santa Catarina', 'joinville', 'Brasil', '47 30288035', '47 88643177', '', '', 'Investidor'),
(128, 'Ivan Silvério Junior', 'Ivan', 'ivan@columbiamalls.com.br', '044e2cbf8e0b0545c8cbea0848e71810:VzsXT86InzYzbdsrceYdfVuHWAFG6PlI', 'Registered', 1, 0, 18, '2010-05-03 14:46:15', '0000-00-00 00:00:00', 'b57d512e107e76822445c960c88fbdfa', '\n', 'columbia malls', 'Santa Catarina', 'joinville', 'Brasil', '(04703467-8991', '(047) 8802-4817', '', '', 'Vendedor Empresa'),
(129, 'Paulo Henrique de Oliveira', 'Paulo Henrique', 'soch4@ibest.com.br', '9d366d37c43504a2d98fbc912d22340f:1zs5pW2NEgfPEljhPAncLiq7ryQa92ym', 'Registered', 0, 0, 18, '2010-05-03 22:10:07', '2010-05-10 11:34:18', '', '\n', 'Não', 'São Paulo', 'Mogi das Cruzes', 'Brasil', '00 xx 244 933 220 245', '00 xx 244 933 220 245', 'paulo.henrique81', 'soch44@hotmail.com', 'Investidor'),
(130, 'Paulo', 'prccjr', 'prccjr@terra.com.br', '05de29143d219772bc24ebf977c7aae7:m5ycsjhPyKuqzxKTnip8z5vFfLsuv2Vx', 'Registered', 1, 0, 18, '2010-05-04 02:00:11', '2010-05-04 02:04:51', '', 'language=\ntimezone=-3\n\n', 'prccjr', 'Santa Catarina', 'Joinville', 'Brasil', '47 88', '47 88', '', '', 'Investidor'),
(131, 'Marco', 'Marco', 'maudigital@ig.com.br', '9d6bfb793001136028ce69a4b46527bb:iZETbLbynii5Wf9Tz5xzOX2Iws24rxPf', 'Registered', 0, 1, 18, '2010-05-04 13:29:54', '2010-05-14 17:32:22', '', 'language=\ntimezone=-3\n\n', 'BBB', 'Santa Catarina', 'Jo', 'Alemanha', 'iiii', 'iiiiii', 'iiiiiiiiii', 'iiiiiiiiiii', 'Vendedor Empresa'),
(132, 'Claudio', 'cadaol', 'cadaol@yahoo.com', '7fd1013c28e1e535ada6fdd3f9f8a155:cYJ6G9ANeOLqByr8jLos22oTA18mobE5', 'Registered', 0, 1, 18, '2010-05-04 15:17:22', '2010-05-04 18:39:32', 'd6311017d9311b974aafa6973ef13443', 'language=\ntimezone=-3\n\n', 'Autonomo', 'Santa Catarina', 'Joinville', 'Brasil', '47-3442128', '47-99227764', '', '', 'Investidor'),
(133, 'RICARDO', 'RI007BR', 'RI007BR@HOTMAIL.COM', '64b5e52e8902ae73fee1f347a0907000:yP9dG4ZrBDpKRWp1mdtW7kIkf8xvDtBg', 'Registered', 0, 1, 18, '2010-05-04 16:37:12', '2010-05-04 18:22:53', '11dccc1abfec3e770a9e0ac34e6ee179', 'language=\ntimezone=-3\n\n', '..', 'Santa Catarina', 'FLORIANOPOLIS', 'Brasil', '48 32077691', '48 84620176', '', '', 'Investidor'),
(134, 'Lisandro Prestes', 'prothege', 'prothege@prothege.com.br', '817ff32057b3b291664ed73c5901863e:fH8ELVIlQsmgeEBCSA9bZXHopIvLBatM', 'Registered', 0, 1, 18, '2010-05-05 00:34:25', '2010-05-05 14:58:31', 'cafaf87f4b28dafa0950b9208b2066ad', 'language=\ntimezone=-3\n\n', 'Prothege Sistemas de Alarme Monitoramento', 'Santa Catarina', 'Joinville', 'Brasil', '47 3427-3988', '47 9616-7729 / 8473-3748', '', 'monitoramento.jlle@hotmail.com', 'Investidor'),
(135, 'ELIO LOPES', 'ELIO', 'elio.lopes@bol.com.br', '44ec8053f37ea8be5a76a66a433d3ef9:kkgKcM1f3YXxz9ZY8YgTkgpdkg1oTpkt', 'Registered', 0, 0, 18, '2010-05-05 01:21:12', '2010-05-06 00:59:05', '', '\n', 'PROPRIA', 'Santa Catarina', 'JOINVILLE', 'Brasil', '47 38034684', '47 96546321', '', '', 'Investidor'),
(136, 'Ademir José Fagundes', 'xexport', 'ady_jlle@hotmail.com', '0ad944e6d6cfc76e5c29ab42452bcdc6:zLObHuFD1GboyiUPAHs8TchJOtMOTnOJ', 'Registered', 0, 1, 18, '2010-05-08 20:07:24', '2010-05-08 23:01:56', '', 'language=\ntimezone=-3\n\n', 'Autonomo', 'Santa Catarina', 'Joinville', 'Brasil', '4734395015', '4799564331', '', 'ady_jlle@hotmail.com', 'Investidor'),
(137, 'Jairo Cândido Espindola', 'Jairo', 'jairo.ce@brturbo.com.br', '122e6f5a8247e77670c850d28fb40cbb:pxePcy6YMTo7IcoqQdiFwukHFkP1sABI', 'Registered', 0, 0, 18, '2010-05-11 00:35:52', '2010-05-11 00:39:13', '', '\n', 'Particular', 'Santa Catarina', 'Joinville', 'Brasil', '47 9974 4323', '47 9974 4323', '', '', 'Investidor'),
(138, 'vagner', 'vagner', 'larsupermercados@hotmail.com', '0cb9e704edbc718f3426be28cb2dea6c:6NutSp9QRjNflP2ZTlloBqKC8ZcRG4Tg', 'Registered', 0, 1, 18, '2010-05-11 13:09:16', '0000-00-00 00:00:00', 'e0f14c5c156bfad6bc6b2a41f6e11e8a', 'language=\ntimezone=-3\n\n', 'super', 'Santa Catarina', 'joinville', 'Brasil', '38042464', '9744238', '', '', 'Investidor'),
(139, 'raul', 'raul', 'raul@grupoabra.com', '9cfe2c6901dddccbd956a0acbef81f71:CO5lOTVgpD8DDB6xavtaBS7IOjsLneDG', 'Registered', 1, 0, 18, '2010-05-11 17:49:06', '0000-00-00 00:00:00', 'e98aaca6f5f81a962f8f47f0484107c9', 'language=\ntimezone=-3\n\n', 'grupo abra', 'Santa Catarina', 'joinville', 'Brasil', '3028-2180', '99740249', '', '', 'Investidor'),
(140, 'catia almeida', 'catia', 'catia.almeida@hotmail.com', '1531b0c25d64aedcdce31df7446622a7:4Zz7vfLrXG8uK96L6VjYqihHQgKwSZ28', 'Registered', 0, 1, 18, '2010-05-17 11:41:20', '2010-05-18 10:41:21', '', 'language=\ntimezone=-3\n\n', 'autonomo', 'Santa Catarina', 'joinville', 'Brasil', '30284831', '99045031', '', 'catia.almeida@hotmail.com', 'Investidor'),
(141, 'mauricio teixeira de souza', 'mauricio teixeira', 'contato@multiplancontabil.com.br', '3b237ca9d666d39bf82a4ffc1d521bdd:MGyhBV1idavlaoYq8rsvUDpdYpENILFS', 'Registered', 0, 0, 18, '2010-05-17 13:49:25', '2010-05-17 13:57:34', '', '\n', 'multiplan', 'Santa Catarina', 'joinville', 'Brasil', '34677893', '84364474', '', '', 'Investidor'),
(142, 'Éder', 'cbs011', 'cbs011@terra.com.br', '987d547f2925a953fb6d5d8f62c2835f:8jed1Tm2hPhreT2X3qt1nljit0gQQG9P', 'Registered', 0, 0, 18, '2010-05-18 02:05:24', '2010-05-18 02:26:24', '', '\n', 'Investidor', 'Santa Catarina', 'Joinville', 'Brasil', '3', '3', '', '', 'Investidor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_vvcounter_logs`
--

CREATE TABLE IF NOT EXISTS `jos_vvcounter_logs` (
  `time` int(10) unsigned NOT NULL,
  `visits` mediumint(8) unsigned NOT NULL default '0',
  `guests` mediumint(8) unsigned NOT NULL default '0',
  `members` mediumint(8) unsigned NOT NULL default '0',
  `bots` mediumint(8) unsigned NOT NULL default '0',
  UNIQUE KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_vvcounter_logs`
--

INSERT INTO `jos_vvcounter_logs` (`time`, `visits`, `guests`, `members`, `bots`) VALUES
(1269714469, 2, 1, 1, 0),
(1269716400, 0, 0, 0, 0),
(1269717311, 0, 0, 0, 0),
(1269720000, 0, 0, 0, 0),
(1269722943, 0, 0, 0, 0),
(1269723600, 0, 0, 0, 0),
(1269724941, 0, 0, 0, 0),
(1269730800, 0, 0, 0, 0),
(1269732081, 0, 0, 0, 0),
(1269741600, 0, 0, 0, 0),
(1269743150, 1, 1, 0, 0),
(1269745200, 0, 0, 0, 0),
(1269746362, 1, 1, 0, 0),
(1269752400, 0, 0, 0, 0),
(1269753501, 0, 0, 0, 0),
(1269755506, 1, 1, 0, 0),
(1269820800, 0, 0, 0, 0),
(1269821845, 1, 1, 0, 0),
(1269822836, 0, 0, 0, 0),
(1269823907, 0, 0, 0, 0),
(1269824400, 0, 0, 0, 0),
(1269825305, 0, 0, 0, 0),
(1269826554, 0, 0, 0, 0),
(1269827652, 1, 0, 1, 0),
(1269828000, 0, 0, 0, 0),
(1269830039, 0, 0, 0, 0),
(1269830963, 1, 1, 0, 0),
(1269831600, 2, 0, 2, 0),
(1269903600, 0, 0, 0, 0),
(1269905547, 1, 1, 0, 0),
(1269907200, 0, 0, 0, 0),
(1269909660, 0, 0, 0, 0),
(1269910597, 0, 0, 0, 0),
(1269910800, 0, 0, 0, 0),
(1269912476, 0, 0, 0, 0),
(1269913669, 0, 0, 0, 0),
(1269914400, 0, 0, 0, 0),
(1269915867, 0, 0, 0, 0),
(1270321200, 0, 0, 0, 0),
(1270323323, 2, 1, 1, 0),
(1270324291, 0, 0, 0, 0),
(1270324800, 0, 0, 0, 0),
(1270325934, 0, 0, 0, 0),
(1270326887, 0, 0, 0, 0),
(1270327793, 0, 0, 0, 0),
(1270328400, 0, 0, 0, 0),
(1270329757, 0, 0, 0, 0),
(1270330669, 0, 0, 0, 0),
(1270332000, 0, 0, 0, 0),
(1270333081, 0, 0, 0, 0),
(1270339200, 0, 0, 0, 0),
(1270340221, 0, 0, 0, 0),
(1270346400, 0, 0, 0, 0),
(1270347361, 0, 0, 0, 0),
(1270353600, 0, 0, 0, 0),
(1270354501, 0, 0, 0, 0),
(1270360800, 0, 0, 0, 0),
(1270368000, 0, 0, 0, 0),
(1270375200, 0, 0, 0, 0),
(1270382400, 0, 0, 0, 0),
(1270389600, 0, 0, 0, 0),
(1270396800, 0, 0, 0, 0),
(1270404000, 0, 0, 0, 0),
(1270407600, 0, 0, 0, 0),
(1270408934, 1, 1, 0, 0),
(1270410062, 0, 0, 0, 0),
(1270411200, 0, 0, 0, 0),
(1270412120, 0, 0, 0, 0),
(1270413183, 0, 0, 0, 0),
(1270414093, 0, 0, 0, 0),
(1270414800, 0, 0, 0, 0),
(1270415884, 0, 0, 0, 0),
(1270416954, 0, 0, 0, 0),
(1270417901, 0, 0, 0, 0),
(1270418400, 0, 0, 0, 0),
(1270429200, 0, 0, 0, 0),
(1270430364, 1, 1, 0, 0),
(1270431434, 2, 1, 1, 0),
(1270432675, 0, 0, 0, 0),
(1270432800, 0, 0, 0, 0),
(1270433779, 0, 0, 0, 0),
(1270434713, 0, 0, 0, 0),
(1270435682, 0, 0, 0, 0),
(1270436400, 0, 0, 0, 0),
(1270437482, 0, 0, 0, 0),
(1270438501, 0, 0, 0, 0),
(1270439455, 0, 0, 0, 0),
(1270440000, 0, 0, 0, 0),
(1270441004, 0, 0, 0, 0),
(1270441905, 0, 0, 0, 0),
(1270442920, 0, 0, 0, 0),
(1270555200, 0, 0, 0, 0),
(1270558654, 1, 1, 0, 0),
(1270558800, 0, 0, 0, 0),
(1270560374, 0, 0, 0, 0),
(1270561604, 0, 0, 0, 0),
(1270562400, 0, 0, 0, 0),
(1270573200, 0, 0, 0, 0),
(1270574364, 1, 1, 0, 0),
(1270575416, 1, 0, 1, 0),
(1270576339, 0, 0, 0, 0),
(1270576800, 0, 0, 0, 0),
(1270577720, 3, 3, 0, 0),
(1270579349, 1, 1, 0, 0),
(1270580264, 1, 0, 1, 0),
(1270580400, 0, 0, 0, 0),
(1270581456, 1, 1, 0, 0),
(1270584000, 0, 0, 0, 0),
(1270584906, 1, 1, 0, 0),
(1270585814, 1, 0, 1, 0),
(1270586791, 1, 1, 0, 0),
(1270587600, 0, 0, 0, 0),
(1270588506, 0, 0, 0, 0),
(1270589679, 0, 0, 0, 0),
(1270590622, 4, 3, 1, 0),
(1270591200, 0, 0, 0, 0),
(1270592213, 1, 1, 0, 0),
(1270598400, 0, 0, 0, 0),
(1270599912, 1, 1, 0, 0),
(1270600830, 1, 0, 1, 0),
(1270601964, 0, 0, 0, 0),
(1270602000, 0, 0, 0, 0),
(1270602908, 0, 0, 0, 0),
(1270603826, 1, 0, 1, 0),
(1270638000, 0, 0, 0, 0),
(1270645200, 0, 0, 0, 0),
(1270648364, 1, 1, 0, 0),
(1270648800, 1, 1, 0, 0),
(1270650596, 0, 0, 0, 0),
(1270651561, 0, 0, 0, 0),
(1270652400, 0, 0, 0, 0),
(1270653309, 0, 0, 0, 0),
(1270659600, 0, 0, 0, 0),
(1270661598, 1, 1, 0, 0),
(1270677600, 0, 0, 0, 0),
(1270679827, 1, 1, 0, 0),
(1270680795, 3, 2, 1, 0),
(1270681200, 0, 0, 0, 0),
(1270683218, 0, 0, 0, 0),
(1270684376, 0, 0, 0, 0),
(1270684800, 0, 0, 0, 0),
(1270687381, 2, 2, 0, 0),
(1270688400, 0, 0, 0, 0),
(1270689899, 0, 0, 0, 0),
(1270691003, 0, 0, 0, 0),
(1270692000, 1, 0, 1, 0),
(1270692920, 0, 0, 0, 0),
(1270694388, 1, 0, 1, 0),
(1270724400, 0, 0, 0, 0),
(1270726312, 1, 1, 0, 0),
(1270727931, 1, 1, 0, 0),
(1270728000, 0, 0, 0, 0),
(1270729179, 0, 0, 0, 0),
(1270731600, 2, 1, 1, 0),
(1270733025, 1, 1, 0, 0),
(1270735200, 0, 0, 0, 0),
(1270737884, 1, 1, 0, 0),
(1270738800, 0, 0, 0, 0),
(1270746000, 0, 0, 0, 0),
(1270747476, 1, 1, 0, 0),
(1270749068, 2, 2, 0, 0),
(1270749600, 0, 0, 0, 0),
(1270753200, 1, 1, 0, 0),
(1270767600, 0, 0, 0, 0),
(1270769463, 2, 1, 1, 0),
(1270770383, 3, 3, 0, 0),
(1270771200, 0, 0, 0, 0),
(1270773034, 1, 1, 0, 0),
(1270774800, 0, 0, 0, 0),
(1270777607, 1, 1, 0, 0),
(1270778400, 0, 0, 0, 0),
(1270779303, 0, 0, 0, 0),
(1270780205, 0, 0, 0, 0),
(1270781150, 0, 0, 0, 0),
(1270807200, 0, 0, 0, 0),
(1270810326, 1, 1, 0, 0),
(1270810800, 0, 0, 0, 0),
(1270813109, 1, 1, 0, 0),
(1270814400, 1, 1, 0, 0),
(1270816546, 0, 0, 0, 0),
(1270818000, 0, 0, 0, 0),
(1270820360, 0, 0, 0, 0),
(1270839600, 0, 0, 0, 0),
(1270840569, 1, 1, 0, 0),
(1270841831, 0, 0, 0, 0),
(1270843070, 0, 0, 0, 0),
(1270846800, 0, 0, 0, 0),
(1270848006, 0, 0, 0, 0),
(1270850400, 1, 0, 1, 0),
(1270851316, 2, 2, 0, 0),
(1270857600, 0, 0, 0, 0),
(1270859999, 1, 1, 0, 0),
(1270861200, 2, 2, 0, 0),
(1270900800, 0, 0, 0, 0),
(1270901701, 2, 1, 1, 0),
(1270902601, 0, 0, 0, 0),
(1270904272, 0, 0, 0, 0),
(1270904400, 0, 0, 0, 0),
(1270922400, 0, 0, 0, 0),
(1270925744, 1, 1, 0, 0),
(1270926000, 1, 1, 0, 0),
(1270929081, 2, 2, 0, 0),
(1270929600, 0, 0, 0, 0),
(1270930934, 0, 0, 0, 0),
(1270932981, 2, 2, 0, 0),
(1270933200, 0, 0, 0, 0),
(1270934522, 0, 0, 0, 0),
(1270947600, 0, 0, 0, 0),
(1270998000, 0, 0, 0, 0),
(1270999913, 1, 1, 0, 0),
(1271001040, 1, 1, 0, 0),
(1271001600, 0, 0, 0, 0),
(1271002609, 0, 0, 0, 0),
(1271003884, 1, 1, 0, 0),
(1271004786, 0, 0, 0, 0),
(1271012400, 0, 0, 0, 0),
(1271015069, 4, 4, 0, 0),
(1271016000, 1, 1, 0, 0),
(1271017927, 0, 0, 0, 0),
(1271019320, 0, 0, 0, 0),
(1271019600, 0, 0, 0, 0),
(1271020835, 1, 1, 0, 0),
(1271021735, 0, 0, 0, 0),
(1271022636, 1, 1, 0, 0),
(1271034000, 0, 0, 0, 0),
(1271035571, 1, 1, 0, 0),
(1271037438, 1, 1, 0, 0),
(1271037600, 0, 0, 0, 0),
(1271070000, 0, 0, 0, 0),
(1271070903, 4, 1, 3, 0),
(1271071915, 0, 0, 0, 0),
(1271073600, 0, 0, 0, 0),
(1271074606, 1, 1, 0, 0),
(1271075519, 0, 0, 0, 0),
(1271076467, 0, 0, 0, 0),
(1271077200, 1, 0, 1, 0),
(1271078427, 2, 1, 1, 0),
(1271079670, 0, 0, 0, 0),
(1271084400, 0, 0, 0, 0),
(1271095200, 0, 0, 0, 0),
(1271096104, 1, 1, 0, 0),
(1271097019, 1, 1, 0, 0),
(1271098800, 0, 0, 0, 0),
(1271099908, 0, 0, 0, 0),
(1271102346, 1, 1, 0, 0),
(1271102400, 0, 0, 0, 0),
(1271109600, 0, 0, 0, 0),
(1271112943, 1, 1, 0, 0),
(1271113200, 0, 0, 0, 0),
(1271114450, 0, 0, 0, 0),
(1271115353, 0, 0, 0, 0),
(1271116746, 0, 0, 0, 0),
(1271116800, 0, 0, 0, 0),
(1271118412, 1, 1, 0, 0),
(1271120263, 0, 0, 0, 0),
(1271120400, 0, 0, 0, 0),
(1271121419, 1, 1, 0, 0),
(1271122347, 4, 4, 0, 0),
(1271123361, 2, 2, 0, 0),
(1271124000, 0, 0, 0, 0),
(1271124908, 2, 2, 0, 0),
(1271125835, 1, 0, 1, 0),
(1271126742, 1, 0, 1, 0),
(1271156400, 0, 0, 0, 0),
(1271157580, 1, 1, 0, 0),
(1271163600, 0, 0, 0, 0),
(1271164686, 1, 1, 0, 0),
(1271166779, 2, 2, 0, 0),
(1271167200, 0, 0, 0, 0),
(1271168104, 2, 1, 1, 0),
(1271169050, 0, 0, 0, 0),
(1271170015, 1, 1, 0, 0),
(1271170800, 3, 2, 1, 0),
(1271171916, 1, 1, 0, 0),
(1271172843, 0, 0, 0, 0),
(1271173744, 0, 0, 0, 0),
(1271174400, 1, 1, 0, 0),
(1271175366, 0, 0, 0, 0),
(1271176275, 0, 0, 0, 0),
(1271178000, 0, 0, 0, 0),
(1271181088, 1, 1, 0, 0),
(1271181600, 0, 0, 0, 0),
(1271182600, 1, 1, 0, 0),
(1271183958, 2, 2, 0, 0),
(1271188800, 0, 0, 0, 0),
(1271190549, 2, 2, 0, 0),
(1271191489, 2, 1, 1, 0),
(1271192391, 2, 1, 1, 0),
(1271192400, 0, 0, 0, 0),
(1271193354, 0, 0, 0, 0),
(1271199600, 4, 4, 0, 0),
(1271200855, 2, 1, 1, 0),
(1271201808, 0, 0, 0, 0),
(1271202781, 0, 0, 0, 0),
(1271203200, 0, 0, 0, 0),
(1271204202, 0, 0, 0, 0),
(1271205452, 0, 0, 0, 0),
(1271206800, 0, 0, 0, 0),
(1271207724, 0, 0, 0, 0),
(1271209424, 0, 0, 0, 0),
(1271210400, 0, 0, 0, 0),
(1271239200, 0, 0, 0, 0),
(1271240359, 1, 0, 1, 0),
(1271241260, 1, 0, 1, 0),
(1271242209, 1, 1, 0, 0),
(1271242800, 0, 0, 0, 0),
(1271244156, 2, 2, 0, 0),
(1271245412, 2, 1, 1, 0),
(1271246400, 2, 1, 1, 0),
(1271248270, 1, 1, 0, 0),
(1271249888, 0, 0, 0, 0),
(1271250000, 0, 0, 0, 0),
(1271252957, 2, 2, 0, 0),
(1271260800, 0, 0, 0, 0),
(1271262494, 1, 1, 0, 0),
(1271264400, 1, 0, 1, 0),
(1271266070, 1, 1, 0, 0),
(1271268000, 1, 0, 1, 0),
(1271271600, 1, 0, 1, 0),
(1271273803, 1, 1, 0, 0),
(1271278800, 0, 0, 0, 0),
(1271280158, 1, 1, 0, 0),
(1271282062, 2, 2, 0, 0),
(1271282400, 0, 0, 0, 0),
(1271283327, 3, 3, 0, 0),
(1271284648, 2, 2, 0, 0),
(1271289600, 2, 1, 1, 0),
(1271290992, 1, 1, 0, 0),
(1271291902, 3, 2, 1, 0),
(1271292847, 0, 0, 0, 0),
(1271293200, 0, 0, 0, 0),
(1271294172, 2, 2, 0, 0),
(1271295558, 1, 1, 0, 0),
(1271296461, 2, 1, 1, 0),
(1271296800, 0, 0, 0, 0),
(1271297700, 1, 1, 0, 0),
(1271325600, 0, 0, 0, 0),
(1271328723, 1, 1, 0, 0),
(1271329200, 0, 0, 0, 0),
(1271330232, 2, 0, 2, 0),
(1271331270, 2, 0, 2, 0),
(1271332219, 4, 1, 3, 0),
(1271332800, 1, 0, 1, 0),
(1271333732, 0, 0, 0, 0),
(1271334682, 2, 1, 1, 0),
(1271335584, 2, 1, 1, 0),
(1271336400, 2, 0, 2, 0),
(1271337460, 0, 0, 0, 0),
(1271338607, 1, 0, 1, 0),
(1271339905, 2, 1, 1, 0),
(1271340000, 1, 0, 1, 0),
(1271341088, 0, 0, 0, 0),
(1271342026, 1, 0, 1, 0),
(1271343600, 1, 1, 0, 0),
(1271344569, 3, 2, 1, 0),
(1271345632, 1, 1, 0, 0),
(1271347200, 1, 0, 1, 0),
(1271348642, 1, 1, 0, 0),
(1271349768, 3, 2, 1, 0),
(1271350669, 2, 1, 1, 0),
(1271350800, 1, 1, 0, 0),
(1271351702, 0, 0, 0, 0),
(1271352621, 0, 0, 0, 0),
(1271358000, 0, 0, 0, 0),
(1271358902, 0, 0, 0, 0),
(1271360919, 4, 4, 0, 0),
(1271361600, 1, 1, 0, 0),
(1271362540, 0, 0, 0, 0),
(1271363457, 0, 0, 0, 0),
(1271365200, 2, 1, 1, 0),
(1271368043, 1, 1, 0, 0),
(1271368800, 0, 0, 0, 0),
(1271370850, 1, 1, 0, 0),
(1271372400, 0, 0, 0, 0),
(1271373551, 1, 1, 0, 0),
(1271379600, 1, 1, 0, 0),
(1271380697, 1, 1, 0, 0),
(1271381977, 1, 1, 0, 0),
(1271383200, 0, 0, 0, 0),
(1271384106, 2, 0, 2, 0),
(1271412000, 0, 0, 0, 0),
(1271412900, 4, 0, 4, 0),
(1271414106, 1, 1, 0, 0),
(1271415600, 2, 2, 0, 0),
(1271416638, 1, 0, 1, 0),
(1271417692, 0, 0, 0, 0),
(1271418645, 2, 2, 0, 0),
(1271419200, 2, 1, 1, 0),
(1271421330, 0, 0, 0, 0),
(1271422335, 2, 1, 1, 0),
(1271422800, 0, 0, 0, 0),
(1271423918, 1, 1, 0, 0),
(1271424917, 3, 3, 0, 0),
(1271425819, 3, 2, 1, 0),
(1271426400, 1, 1, 0, 0),
(1271427506, 0, 0, 0, 0),
(1271428666, 0, 0, 0, 0),
(1271429983, 0, 0, 0, 0),
(1271430000, 0, 0, 0, 0),
(1271431219, 2, 1, 1, 0),
(1271432778, 1, 1, 0, 0),
(1271433600, 1, 1, 0, 0),
(1271435213, 0, 0, 0, 0),
(1271436130, 2, 2, 0, 0),
(1271437200, 1, 1, 0, 0),
(1271440056, 1, 1, 0, 0),
(1271440800, 0, 0, 0, 0),
(1271441830, 2, 1, 1, 0),
(1271442898, 0, 0, 0, 0),
(1271443806, 5, 2, 3, 0),
(1271444400, 2, 2, 0, 0),
(1271445369, 0, 0, 0, 0),
(1271446302, 0, 0, 0, 0),
(1271447591, 4, 3, 1, 0),
(1271451600, 1, 0, 1, 0),
(1271453031, 1, 1, 0, 0),
(1271454112, 1, 0, 1, 0),
(1271455200, 2, 1, 1, 0),
(1271456118, 6, 5, 1, 0),
(1271458800, 0, 0, 0, 0),
(1271461985, 1, 1, 0, 0),
(1271469600, 0, 0, 0, 0),
(1271473200, 1, 1, 0, 0),
(1271475833, 1, 1, 0, 0),
(1271498400, 0, 0, 0, 0),
(1271501935, 1, 1, 0, 0),
(1271502000, 0, 0, 0, 0),
(1271503053, 3, 2, 1, 0),
(1271504302, 0, 0, 0, 0),
(1271505301, 0, 0, 0, 0),
(1271505600, 0, 0, 0, 0),
(1271506683, 1, 1, 0, 0),
(1271507687, 0, 0, 0, 0),
(1271508688, 1, 1, 0, 0),
(1271509200, 1, 1, 0, 0),
(1271510105, 1, 1, 0, 0),
(1271512066, 1, 1, 0, 0),
(1271512800, 0, 0, 0, 0),
(1271513951, 3, 3, 0, 0),
(1271516400, 0, 0, 0, 0),
(1271518567, 2, 2, 0, 0),
(1271523600, 0, 0, 0, 0),
(1271524776, 1, 1, 0, 0),
(1271526262, 2, 2, 0, 0),
(1271530800, 0, 0, 0, 0),
(1271533598, 1, 1, 0, 0),
(1271534400, 1, 0, 1, 0),
(1271538000, 1, 1, 0, 0),
(1271552400, 0, 0, 0, 0),
(1271566800, 0, 0, 0, 0),
(1271570400, 1, 0, 0, 1),
(1271573297, 1, 1, 0, 0),
(1271574000, 5, 0, 0, 5),
(1271575114, 19, 1, 0, 18),
(1271576109, 9, 1, 0, 8),
(1271577600, 0, 0, 0, 0),
(1271580017, 1, 1, 0, 0),
(1271592000, 0, 0, 0, 0),
(1271592925, 1, 1, 0, 0),
(1271620800, 0, 0, 0, 0),
(1271622362, 1, 1, 0, 0),
(1271623645, 3, 2, 1, 0),
(1271624400, 1, 1, 0, 0),
(1271635200, 0, 0, 0, 0),
(1271636281, 1, 1, 0, 0),
(1271638748, 4, 3, 1, 0),
(1271667600, 0, 0, 0, 0),
(1271670583, 1, 1, 0, 0),
(1271671200, 17, 0, 0, 17),
(1271672446, 4, 1, 0, 3),
(1271678400, 1, 0, 0, 1),
(1271679819, 1, 1, 0, 0),
(1271681406, 5, 4, 1, 0),
(1271682000, 1, 1, 0, 0),
(1271683211, 0, 0, 0, 0),
(1271685600, 0, 0, 0, 0),
(1271687206, 1, 1, 0, 0),
(1271688209, 1, 0, 1, 0),
(1271689200, 1, 1, 0, 0),
(1271690453, 1, 1, 0, 0),
(1271692800, 0, 0, 0, 0),
(1271696400, 0, 0, 0, 0),
(1271698331, 1, 1, 0, 0),
(1271699318, 0, 0, 0, 0),
(1271700000, 3, 1, 1, 1),
(1271700907, 2, 2, 0, 0),
(1271701814, 0, 0, 0, 0),
(1271702863, 1, 1, 0, 0),
(1271703600, 2, 1, 1, 0),
(1271705090, 4, 3, 1, 0),
(1271707200, 0, 0, 0, 0),
(1271710800, 1, 0, 0, 1),
(1271711722, 3, 2, 1, 0),
(1271713170, 1, 1, 0, 0),
(1271714169, 2, 2, 0, 0),
(1271714400, 1, 1, 0, 0),
(1271715301, 0, 0, 0, 0),
(1271717613, 2, 2, 0, 0),
(1271718000, 1, 0, 1, 0),
(1271719188, 2, 2, 0, 0),
(1271720182, 0, 0, 0, 0),
(1271721333, 2, 2, 0, 0),
(1271721600, 0, 0, 0, 0),
(1271722519, 2, 0, 1, 1),
(1271723492, 2, 1, 0, 1),
(1271724399, 0, 0, 0, 0),
(1271725200, 2, 1, 1, 0),
(1271728800, 1, 0, 1, 0),
(1271729963, 1, 1, 0, 0),
(1271730875, 2, 2, 0, 0),
(1271732400, 0, 0, 0, 0),
(1271733604, 3, 3, 0, 0),
(1271739600, 0, 0, 0, 0),
(1271741655, 1, 1, 0, 0),
(1271746800, 0, 0, 0, 0),
(1271748973, 1, 1, 0, 0),
(1271757600, 0, 0, 0, 0),
(1271760816, 1, 1, 0, 0),
(1271761200, 0, 0, 0, 0),
(1271762117, 1, 1, 0, 0),
(1271763103, 3, 2, 1, 0),
(1271764027, 2, 2, 0, 0),
(1271764800, 2, 2, 0, 0),
(1271765714, 2, 2, 0, 0),
(1271766618, 4, 4, 0, 0),
(1271767645, 1, 1, 0, 0),
(1271768400, 1, 1, 0, 0),
(1271769311, 2, 2, 0, 0),
(1271772000, 0, 0, 0, 0),
(1271773554, 0, 0, 0, 0),
(1271774473, 1, 0, 1, 0),
(1271775600, 2, 1, 1, 0),
(1271776517, 3, 2, 1, 0),
(1271777437, 1, 1, 0, 0),
(1271778537, 0, 0, 0, 0),
(1271779200, 0, 0, 0, 0),
(1271781750, 2, 0, 2, 0),
(1271782737, 1, 1, 0, 0),
(1271782800, 0, 0, 0, 0),
(1271784524, 1, 1, 0, 0),
(1271785453, 4, 2, 2, 0),
(1271786400, 0, 0, 0, 0),
(1271787379, 1, 1, 0, 0),
(1271788612, 1, 1, 0, 0),
(1271789980, 0, 0, 0, 0),
(1271790000, 0, 0, 0, 0),
(1271791124, 1, 0, 1, 0),
(1271792649, 0, 0, 0, 0),
(1271793600, 2, 1, 1, 0),
(1271794571, 1, 1, 0, 0),
(1271795798, 1, 1, 0, 0),
(1271797200, 1, 1, 0, 0),
(1271798825, 2, 2, 0, 0),
(1271799744, 1, 1, 0, 0),
(1271800800, 1, 1, 0, 0),
(1271801769, 1, 1, 0, 0),
(1271802926, 2, 2, 0, 0),
(1271803979, 1, 1, 0, 0),
(1271804400, 1, 0, 0, 1),
(1271808000, 1, 0, 0, 1),
(1271810210, 1, 1, 0, 0),
(1271811316, 2, 1, 1, 0),
(1271815200, 1, 1, 0, 0),
(1271816175, 13, 1, 0, 12),
(1271817219, 4, 1, 0, 3),
(1271836800, 0, 0, 0, 0),
(1271839037, 1, 1, 0, 0),
(1271851200, 0, 0, 0, 0),
(1271852179, 1, 1, 0, 0),
(1271853864, 2, 1, 1, 0),
(1271854800, 1, 1, 0, 0),
(1271857607, 1, 1, 0, 0),
(1271858400, 0, 0, 0, 0),
(1271859309, 0, 0, 0, 0),
(1271860211, 0, 0, 0, 0),
(1271861229, 3, 3, 0, 0),
(1271862000, 3, 2, 1, 0),
(1271863021, 1, 1, 0, 0),
(1271863949, 1, 1, 0, 0),
(1271865205, 2, 2, 0, 0),
(1271865600, 2, 2, 0, 0),
(1271868046, 1, 1, 0, 0),
(1271868986, 2, 1, 1, 0),
(1271869200, 0, 0, 0, 0),
(1271870897, 1, 1, 0, 0),
(1271872278, 2, 1, 0, 1),
(1271883600, 0, 0, 0, 0),
(1271887037, 1, 1, 0, 0),
(1271887200, 0, 0, 0, 0),
(1271894400, 0, 0, 0, 0),
(1271895304, 3, 1, 2, 0),
(1271898000, 2, 2, 0, 0),
(1271900058, 1, 1, 0, 0),
(1271937600, 0, 0, 0, 0),
(1271941200, 4, 3, 1, 0),
(1271944800, 2, 2, 0, 0),
(1271945765, 3, 2, 1, 0),
(1271948299, 0, 0, 0, 0),
(1271948400, 0, 0, 0, 0),
(1271949378, 1, 1, 0, 0),
(1271950819, 3, 3, 0, 0),
(1271955600, 1, 1, 0, 0),
(1271957349, 0, 0, 0, 0),
(1271958500, 2, 2, 0, 0),
(1271959200, 3, 1, 0, 2),
(1271960648, 2, 2, 0, 0),
(1271962241, 2, 1, 1, 0),
(1271962800, 2, 2, 0, 0),
(1271963703, 0, 0, 0, 0),
(1271964920, 2, 2, 0, 0),
(1271966400, 0, 0, 0, 0),
(1271968009, 2, 2, 0, 0),
(1271970000, 0, 0, 0, 0),
(1271973369, 1, 1, 0, 0),
(1271973600, 0, 0, 0, 0),
(1271974535, 5, 4, 1, 0),
(1271975487, 1, 1, 0, 0),
(1271976398, 1, 1, 0, 0),
(1271977200, 1, 1, 0, 0),
(1271978523, 2, 2, 0, 0),
(1271991600, 0, 0, 0, 0),
(1272013200, 0, 0, 0, 0),
(1272016676, 1, 1, 0, 0),
(1272016800, 2, 0, 0, 2),
(1272017952, 4, 1, 0, 3),
(1272020400, 2, 0, 0, 2),
(1272022188, 1, 1, 0, 0),
(1272023162, 2, 1, 1, 0),
(1272024000, 4, 3, 1, 0),
(1272024990, 1, 1, 0, 0),
(1272026164, 1, 1, 0, 0),
(1272027600, 0, 0, 0, 0),
(1272028763, 0, 0, 0, 0),
(1272030329, 1, 1, 0, 0),
(1272031200, 1, 0, 0, 1),
(1272032421, 0, 0, 0, 0),
(1272033634, 2, 2, 0, 0),
(1272034800, 0, 0, 0, 0),
(1272035775, 2, 2, 0, 0),
(1272036942, 0, 0, 0, 0),
(1272042000, 4, 2, 0, 2),
(1272042943, 1, 1, 0, 0),
(1272044550, 1, 1, 0, 0),
(1272045600, 0, 0, 0, 0),
(1272046692, 4, 1, 0, 3),
(1272047661, 3, 1, 0, 2),
(1272049200, 0, 0, 0, 0),
(1272050359, 7, 4, 1, 2),
(1272056400, 1, 1, 0, 0),
(1272058158, 1, 1, 0, 0),
(1272059541, 3, 2, 1, 0),
(1272060000, 1, 0, 1, 0),
(1272063600, 4, 2, 2, 0),
(1272064864, 1, 1, 0, 0),
(1272070800, 2, 2, 0, 0),
(1272071908, 1, 1, 0, 0),
(1272072972, 3, 3, 0, 0),
(1272073900, 2, 2, 0, 0),
(1272081600, 0, 0, 0, 0),
(1272083992, 1, 1, 0, 0),
(1272103200, 0, 0, 0, 0),
(1272106800, 1, 0, 0, 1),
(1272109406, 1, 1, 0, 0),
(1272110400, 2, 1, 1, 0),
(1272112242, 3, 2, 1, 0),
(1272113154, 3, 2, 1, 0),
(1272114000, 0, 0, 0, 0),
(1272116750, 3, 3, 0, 0),
(1272117600, 0, 0, 0, 0),
(1272120185, 1, 1, 0, 0),
(1272121200, 0, 0, 0, 0),
(1272122102, 1, 1, 0, 0),
(1272124183, 1, 1, 0, 0),
(1272124800, 0, 0, 0, 0),
(1272126027, 2, 2, 0, 0),
(1272127666, 1, 1, 0, 0),
(1272128400, 0, 0, 0, 0),
(1272130525, 1, 1, 0, 0),
(1272131800, 1, 1, 0, 0),
(1272132000, 0, 0, 0, 0),
(1272133322, 1, 1, 0, 0),
(1272134978, 6, 5, 1, 0),
(1272135600, 2, 2, 0, 0),
(1272136585, 3, 3, 0, 0),
(1272137627, 3, 3, 0, 0),
(1272138789, 2, 2, 0, 0),
(1272139200, 1, 1, 0, 0),
(1272141504, 1, 1, 0, 0),
(1272142800, 1, 1, 0, 0),
(1272144158, 3, 3, 0, 0),
(1272145179, 2, 2, 0, 0),
(1272146080, 6, 5, 0, 1),
(1272146400, 0, 0, 0, 0),
(1272147330, 3, 3, 0, 0),
(1272148553, 2, 2, 0, 0),
(1272149467, 0, 0, 0, 0),
(1272150000, 1, 1, 0, 0),
(1272151030, 1, 1, 0, 0),
(1272152513, 2, 2, 0, 0),
(1272157200, 0, 0, 0, 0),
(1272158297, 4, 3, 1, 0),
(1272160593, 1, 1, 0, 0),
(1272160800, 2, 1, 1, 0),
(1272161950, 3, 3, 0, 0),
(1272162975, 2, 2, 0, 0),
(1272164400, 0, 0, 0, 0),
(1272165305, 1, 1, 0, 0),
(1272166496, 1, 1, 0, 0),
(1272171600, 1, 1, 0, 0),
(1272172530, 1, 1, 0, 0),
(1272178800, 0, 0, 0, 0),
(1272186000, 1, 1, 0, 0),
(1272189600, 3, 0, 0, 3),
(1272191248, 1, 1, 0, 0),
(1272192400, 3, 1, 0, 2),
(1272193200, 3, 2, 1, 0),
(1272196405, 1, 1, 0, 0),
(1272196800, 0, 0, 0, 0),
(1272198163, 0, 0, 0, 0),
(1272199297, 1, 1, 0, 0),
(1272200400, 0, 0, 0, 0),
(1272201716, 3, 3, 0, 0),
(1272202620, 2, 2, 0, 0),
(1272203660, 2, 2, 0, 0),
(1272204000, 0, 0, 0, 0),
(1272204994, 3, 2, 0, 1),
(1272206282, 1, 0, 1, 0),
(1272207254, 4, 3, 1, 0),
(1272207600, 2, 2, 0, 0),
(1272208793, 1, 1, 0, 0),
(1272210400, 0, 0, 0, 0),
(1272211200, 2, 2, 0, 0),
(1272213669, 2, 2, 0, 0),
(1272214605, 2, 2, 0, 0),
(1272214800, 0, 0, 0, 0),
(1272218400, 0, 0, 0, 0),
(1272219382, 2, 2, 0, 0),
(1272220358, 6, 2, 4, 0),
(1272222000, 1, 1, 0, 0),
(1272223401, 3, 3, 0, 0),
(1272224708, 3, 3, 0, 0),
(1272225600, 3, 3, 0, 0),
(1272227364, 1, 1, 0, 0),
(1272228599, 1, 1, 0, 0),
(1272229200, 0, 0, 0, 0),
(1272231831, 1, 1, 0, 0),
(1272232800, 0, 0, 0, 0),
(1272236284, 1, 1, 0, 0),
(1272240000, 0, 0, 0, 0),
(1272243009, 1, 1, 0, 0),
(1272243600, 2, 1, 1, 0),
(1272244976, 3, 2, 1, 0),
(1272245882, 1, 1, 0, 0),
(1272247200, 0, 0, 0, 0),
(1272249086, 1, 1, 0, 0),
(1272250800, 0, 0, 0, 0),
(1272251757, 1, 1, 0, 0),
(1272254047, 1, 1, 0, 0),
(1272254400, 0, 0, 0, 0),
(1272256873, 1, 1, 0, 0),
(1272258000, 0, 0, 0, 0),
(1272261172, 2, 1, 0, 1),
(1272261600, 0, 0, 0, 0),
(1272262747, 1, 1, 0, 0),
(1272272400, 1, 1, 0, 0),
(1272275695, 1, 1, 0, 0),
(1272276000, 3, 0, 0, 3),
(1272277919, 3, 1, 0, 2),
(1272279479, 2, 2, 0, 0),
(1272279600, 0, 0, 0, 0),
(1272280515, 2, 2, 0, 0),
(1272281477, 3, 2, 1, 0),
(1272282806, 2, 2, 0, 0),
(1272283200, 3, 2, 1, 0),
(1272284486, 3, 3, 0, 0),
(1272285799, 3, 3, 0, 0),
(1272286756, 1, 1, 0, 0),
(1272286800, 0, 0, 0, 0),
(1272287755, 0, 0, 0, 0),
(1272288753, 2, 2, 0, 0),
(1272289779, 3, 2, 1, 0),
(1272290400, 3, 3, 0, 0),
(1272291373, 4, 1, 0, 3),
(1272292899, 3, 3, 0, 0),
(1272294000, 0, 0, 0, 0),
(1272295073, 1, 0, 1, 0),
(1272295979, 3, 3, 0, 0),
(1272297600, 1, 1, 0, 0),
(1272301177, 1, 1, 0, 0),
(1272301200, 0, 0, 0, 0),
(1272302792, 1, 1, 0, 0),
(1272304200, 2, 2, 0, 0),
(1272304800, 0, 0, 0, 0),
(1272306319, 1, 1, 0, 0),
(1272308400, 1, 1, 0, 0),
(1272309304, 1, 1, 0, 0),
(1272310241, 3, 2, 1, 0),
(1272311370, 1, 1, 0, 0),
(1272312000, 5, 3, 0, 2),
(1272312916, 6, 5, 1, 0),
(1272314161, 2, 1, 1, 0),
(1272315600, 1, 0, 0, 1),
(1272317851, 2, 2, 0, 0),
(1272319200, 0, 0, 0, 0),
(1272321853, 1, 1, 0, 0),
(1272322800, 1, 1, 0, 0),
(1272324339, 2, 2, 0, 0),
(1272325855, 2, 1, 1, 0),
(1272326400, 0, 0, 0, 0),
(1272327467, 0, 0, 0, 0),
(1272329774, 5, 5, 0, 0),
(1272330000, 0, 0, 0, 0),
(1272333600, 1, 1, 0, 0),
(1272335931, 1, 1, 0, 0),
(1272340800, 0, 0, 0, 0),
(1272342073, 1, 1, 0, 0),
(1272355200, 0, 0, 0, 0),
(1272357777, 1, 1, 0, 0),
(1272366000, 0, 0, 0, 0),
(1272369057, 2, 2, 0, 0),
(1272369600, 0, 0, 0, 0),
(1272370571, 4, 3, 1, 0),
(1272371526, 0, 0, 0, 0),
(1272372958, 0, 0, 0, 0),
(1272373200, 0, 0, 0, 0),
(1272374125, 0, 0, 0, 0),
(1272375456, 4, 3, 1, 0),
(1272376748, 0, 0, 0, 0),
(1272376800, 0, 0, 0, 0),
(1272377708, 0, 0, 0, 0),
(1272378634, 1, 1, 0, 0),
(1272380224, 1, 0, 1, 0),
(1272380400, 1, 1, 0, 0),
(1272381704, 0, 0, 0, 0),
(1272383489, 3, 2, 1, 0),
(1272384000, 1, 1, 0, 0),
(1272387600, 2, 0, 0, 2),
(1272389420, 1, 1, 0, 0),
(1272391200, 2, 0, 0, 2),
(1272393084, 1, 1, 0, 0),
(1272394800, 0, 0, 0, 0),
(1272395722, 2, 2, 0, 0),
(1272396843, 4, 4, 0, 0),
(1272398400, 5, 4, 1, 0),
(1272402000, 1, 1, 0, 0),
(1272404512, 1, 1, 0, 0),
(1272405540, 2, 2, 0, 0),
(1272405600, 0, 0, 0, 0),
(1272406639, 2, 2, 0, 0),
(1272407556, 3, 2, 1, 0),
(1272408532, 3, 3, 0, 0),
(1272409200, 1, 1, 0, 0),
(1272410692, 1, 1, 0, 0),
(1272411900, 5, 2, 1, 2),
(1272412800, 3, 3, 0, 0),
(1272413866, 3, 3, 0, 0),
(1272415048, 1, 1, 0, 0),
(1272416288, 2, 2, 0, 0),
(1272416400, 0, 0, 0, 0),
(1272417475, 3, 3, 0, 0),
(1272420000, 1, 1, 0, 0),
(1272421432, 1, 1, 0, 0),
(1272427200, 0, 0, 0, 0),
(1272430800, 2, 1, 0, 1),
(1272432229, 1, 1, 0, 0),
(1272434400, 0, 0, 0, 0),
(1272437287, 1, 1, 0, 0),
(1272438000, 0, 0, 0, 0),
(1272440673, 1, 1, 0, 0),
(1272445200, 0, 0, 0, 0),
(1272447254, 1, 1, 0, 0),
(1272448404, 2, 1, 0, 1),
(1272452400, 0, 0, 0, 0),
(1272453791, 1, 1, 0, 0),
(1272455218, 3, 2, 1, 0),
(1272456000, 6, 5, 1, 0),
(1272456971, 2, 2, 0, 0),
(1272458021, 3, 3, 0, 0),
(1272459000, 4, 2, 0, 2),
(1272459600, 1, 1, 0, 0),
(1272460903, 1, 1, 0, 0),
(1272461886, 4, 2, 2, 0),
(1272463051, 2, 2, 0, 0),
(1272463200, 0, 0, 0, 0),
(1272464398, 0, 0, 0, 0),
(1272466300, 1, 1, 0, 0),
(1272466800, 0, 0, 0, 0),
(1272467839, 2, 2, 0, 0),
(1272468779, 1, 1, 0, 0),
(1272470096, 4, 3, 0, 1),
(1272470400, 2, 0, 0, 2),
(1272471686, 1, 1, 0, 0),
(1272474000, 0, 0, 0, 0),
(1272474987, 1, 1, 0, 0),
(1272475996, 2, 2, 0, 0),
(1272477600, 3, 1, 0, 2),
(1272479013, 4, 4, 0, 0),
(1272481200, 0, 0, 0, 0),
(1272483188, 1, 1, 0, 0),
(1272484800, 1, 1, 0, 0),
(1272487310, 2, 2, 0, 0),
(1272488400, 0, 0, 0, 0),
(1272489334, 1, 1, 0, 0),
(1272490714, 3, 2, 1, 0),
(1272491616, 0, 0, 0, 0),
(1272492000, 0, 0, 0, 0),
(1272495600, 2, 2, 0, 0),
(1272497462, 1, 0, 1, 0),
(1272499200, 0, 0, 0, 0),
(1272500766, 2, 2, 0, 0),
(1272502800, 1, 1, 0, 0),
(1272506400, 0, 0, 0, 0),
(1272508077, 1, 1, 0, 0),
(1272510000, 0, 0, 0, 0),
(1272513365, 1, 1, 0, 0),
(1272513600, 0, 0, 0, 0),
(1272517103, 1, 1, 0, 0),
(1272520800, 1, 0, 0, 1),
(1272524043, 3, 1, 0, 2),
(1272538800, 0, 0, 0, 0),
(1272540280, 1, 1, 0, 0),
(1272542400, 0, 0, 0, 0),
(1272545663, 1, 1, 0, 0),
(1272546000, 0, 0, 0, 0),
(1272547497, 2, 2, 0, 0),
(1272548570, 2, 1, 1, 0),
(1272549600, 1, 0, 1, 0),
(1272552863, 1, 1, 0, 0),
(1272553200, 0, 0, 0, 0),
(1272554263, 1, 1, 0, 0),
(1272555964, 4, 3, 1, 0),
(1272556800, 1, 1, 0, 0),
(1272557704, 3, 2, 0, 1),
(1272558730, 2, 2, 0, 0),
(1272559641, 4, 2, 2, 0),
(1272560400, 0, 0, 0, 0),
(1272562517, 1, 1, 0, 0),
(1272564000, 1, 1, 0, 0),
(1272566280, 4, 2, 0, 2),
(1272567600, 1, 1, 0, 0),
(1272569247, 1, 1, 0, 0),
(1272571200, 1, 1, 0, 0),
(1272572658, 3, 2, 1, 0),
(1272573562, 4, 4, 0, 0),
(1272574509, 0, 0, 0, 0),
(1272574800, 0, 0, 0, 0),
(1272575992, 5, 5, 0, 0),
(1272576902, 0, 0, 0, 0),
(1272577996, 0, 0, 0, 0),
(1272578400, 0, 0, 0, 0),
(1272579696, 2, 2, 0, 0),
(1272581738, 2, 2, 0, 0),
(1272582000, 0, 0, 0, 0),
(1272583017, 3, 3, 0, 0),
(1272583948, 1, 1, 0, 0),
(1272584861, 4, 3, 0, 1),
(1272585600, 1, 1, 0, 0),
(1272586526, 3, 3, 0, 0),
(1272587447, 1, 1, 0, 0),
(1272588741, 2, 2, 0, 0),
(1272592800, 1, 0, 1, 0),
(1272594512, 1, 1, 0, 0),
(1272596400, 0, 0, 0, 0),
(1272598889, 1, 1, 0, 0),
(1272603600, 0, 0, 0, 0),
(1272604528, 1, 1, 0, 0),
(1272607122, 1, 1, 0, 0),
(1272610800, 1, 0, 0, 1),
(1272612888, 1, 1, 0, 0),
(1272614400, 1, 0, 0, 1),
(1272618000, 1, 0, 0, 1),
(1272621600, 1, 1, 0, 0),
(1272623408, 5, 1, 0, 4),
(1272624855, 3, 1, 0, 2),
(1272625200, 0, 0, 0, 0),
(1272627170, 2, 1, 0, 1),
(1272628577, 3, 1, 0, 2),
(1272628800, 1, 1, 0, 0),
(1272630322, 2, 2, 0, 0),
(1272631563, 0, 0, 0, 0),
(1272632400, 1, 1, 0, 0),
(1272634248, 0, 0, 0, 0),
(1272635525, 2, 2, 0, 0),
(1272636000, 1, 0, 0, 1),
(1272637372, 1, 1, 0, 0),
(1272638507, 2, 2, 0, 0),
(1272639526, 0, 0, 0, 0),
(1272639600, 0, 0, 0, 0),
(1272640514, 3, 2, 1, 0),
(1272641534, 1, 1, 0, 0),
(1272642577, 3, 0, 1, 2),
(1272646800, 1, 1, 0, 0),
(1272648184, 1, 1, 0, 0),
(1272654000, 0, 0, 0, 0),
(1272656043, 5, 3, 1, 1),
(1272661200, 0, 0, 0, 0),
(1272664175, 1, 1, 0, 0),
(1272664800, 0, 0, 0, 0),
(1272665766, 0, 0, 0, 0),
(1272667161, 1, 1, 0, 0),
(1272672000, 1, 0, 0, 1),
(1272673690, 1, 1, 0, 0),
(1272675600, 0, 0, 0, 0),
(1272677007, 1, 1, 0, 0),
(1272679200, 0, 0, 0, 0),
(1272682349, 1, 1, 0, 0),
(1272682800, 0, 0, 0, 0),
(1272683945, 1, 1, 0, 0),
(1272686400, 0, 0, 0, 0),
(1272687713, 1, 1, 0, 0),
(1272690000, 67, 67, 0, 0),
(1272691672, 1, 1, 0, 0),
(1272693600, 0, 0, 0, 0),
(1272696206, 1, 1, 0, 0),
(1272704400, 0, 0, 0, 0),
(1272708000, 2, 0, 0, 2),
(1272710211, 1, 1, 0, 0),
(1272711600, 0, 0, 0, 0),
(1272714525, 1, 1, 0, 0),
(1272715200, 4, 2, 1, 1),
(1272716709, 1, 1, 0, 0),
(1272717958, 2, 2, 0, 0),
(1272718800, 1, 1, 0, 0),
(1272720347, 1, 1, 0, 0),
(1272721294, 3, 3, 0, 0),
(1272722400, 0, 0, 0, 0),
(1272723750, 4, 4, 0, 0),
(1272724941, 2, 2, 0, 0),
(1272726000, 2, 2, 0, 0),
(1272728421, 4, 2, 0, 2),
(1272729600, 1, 1, 0, 0),
(1272730646, 0, 0, 0, 0),
(1272733200, 0, 0, 0, 0),
(1272735865, 1, 1, 0, 0),
(1272736800, 1, 1, 0, 0),
(1272738101, 1, 1, 0, 0),
(1272740400, 0, 0, 0, 0),
(1272742138, 2, 1, 0, 1),
(1272743366, 4, 3, 1, 0),
(1272744000, 0, 0, 0, 0),
(1272745536, 2, 1, 0, 1),
(1272747501, 1, 1, 0, 0),
(1272754800, 0, 0, 0, 0),
(1272757393, 2, 2, 0, 0),
(1272765600, 0, 0, 0, 0),
(1272768934, 1, 1, 0, 0),
(1272780000, 0, 0, 0, 0),
(1272790800, 0, 0, 0, 0),
(1272793076, 1, 1, 0, 0),
(1272794400, 1, 0, 0, 1),
(1272795501, 1, 1, 0, 0),
(1272797248, 22, 1, 0, 21),
(1272805200, 0, 0, 0, 0),
(1272808472, 1, 1, 0, 0),
(1272808800, 2, 0, 0, 2),
(1272811335, 1, 1, 0, 0),
(1272812400, 0, 0, 0, 0),
(1272814943, 1, 1, 0, 0),
(1272816000, 0, 0, 0, 0),
(1272817094, 1, 1, 0, 0),
(1272818641, 2, 1, 0, 1),
(1272823200, 0, 0, 0, 0),
(1272824434, 1, 1, 0, 0),
(1272825620, 11, 9, 1, 1),
(1272826582, 3, 3, 0, 0),
(1272826800, 1, 1, 0, 0),
(1272827805, 5, 5, 0, 0),
(1272828810, 4, 2, 2, 0),
(1272830318, 0, 0, 0, 0),
(1272830400, 0, 0, 0, 0),
(1272832021, 7, 7, 0, 0),
(1272833135, 1, 1, 0, 0),
(1272834000, 0, 0, 0, 0),
(1272834986, 2, 1, 0, 1),
(1272844800, 0, 0, 0, 0),
(1272845868, 1, 1, 0, 0),
(1272848400, 1, 1, 0, 0),
(1272850307, 1, 1, 0, 0),
(1272859200, 0, 0, 0, 0),
(1272860814, 1, 1, 0, 0),
(1272862800, 1, 0, 0, 1),
(1272864598, 1, 1, 0, 0),
(1272870000, 0, 0, 0, 0),
(1272872399, 1, 1, 0, 0),
(1272877200, 0, 0, 0, 0),
(1272880800, 1, 0, 0, 1),
(1272882040, 5, 1, 0, 4),
(1272884214, 1, 1, 0, 0),
(1272884400, 0, 0, 0, 0),
(1272886197, 2, 1, 0, 1),
(1272887633, 2, 1, 0, 1),
(1272888000, 1, 1, 0, 0),
(1272890207, 2, 2, 0, 0),
(1272891291, 1, 1, 0, 0),
(1272891600, 0, 0, 0, 0),
(1272892889, 0, 0, 0, 0),
(1272894360, 3, 3, 0, 0),
(1272895200, 2, 1, 1, 0),
(1272897426, 5, 1, 0, 4),
(1272898396, 5, 4, 1, 0),
(1272898800, 0, 0, 0, 0),
(1272900168, 0, 0, 0, 0),
(1272901521, 2, 2, 0, 0),
(1272902400, 1, 0, 0, 1),
(1272905365, 2, 2, 0, 0),
(1272906000, 1, 1, 0, 0),
(1272907906, 3, 1, 0, 2),
(1272909600, 1, 1, 0, 0),
(1272913200, 1, 1, 0, 0),
(1272915372, 1, 1, 0, 0),
(1272916686, 2, 2, 0, 0),
(1272916800, 0, 0, 0, 0),
(1272917844, 2, 2, 0, 0),
(1272919119, 3, 3, 0, 0),
(1272920081, 2, 1, 1, 0),
(1272920400, 0, 0, 0, 0),
(1272921327, 2, 0, 1, 1),
(1272922363, 1, 1, 0, 0),
(1272923298, 4, 2, 2, 0),
(1272924000, 0, 0, 0, 0),
(1272925273, 5, 4, 1, 0),
(1272926249, 2, 1, 0, 1),
(1272927194, 1, 1, 0, 0),
(1272927600, 0, 0, 0, 0),
(1272928560, 0, 0, 0, 0),
(1272931200, 5, 3, 0, 2),
(1272932726, 1, 1, 0, 0),
(1272934800, 0, 0, 0, 0),
(1272938305, 1, 1, 0, 0),
(1272938400, 0, 0, 0, 0),
(1272939324, 0, 0, 0, 0),
(1272942000, 0, 0, 0, 0),
(1272945526, 1, 1, 0, 0),
(1272952800, 0, 0, 0, 0),
(1272954755, 1, 1, 0, 0),
(1272956400, 0, 0, 0, 0),
(1272957469, 1, 1, 0, 0),
(1272959178, 2, 1, 0, 1),
(1272970800, 0, 0, 0, 0),
(1272971739, 3, 2, 1, 0),
(1272978000, 1, 1, 0, 0),
(1272979302, 1, 1, 0, 0),
(1272980242, 8, 8, 0, 0),
(1272981600, 0, 0, 0, 0),
(1272985048, 1, 1, 0, 0),
(1272985200, 0, 0, 0, 0),
(1272986108, 1, 1, 0, 0),
(1272987037, 0, 0, 0, 0),
(1272988049, 1, 1, 0, 0),
(1272988800, 0, 0, 0, 0),
(1272990924, 4, 3, 1, 0),
(1272992400, 0, 0, 0, 0),
(1272993474, 1, 1, 0, 0),
(1272994721, 1, 1, 0, 0),
(1272996000, 3, 2, 1, 0),
(1272997258, 1, 1, 0, 0),
(1272998187, 5, 4, 1, 0),
(1272999087, 1, 0, 1, 0),
(1272999600, 1, 0, 0, 1),
(1273000595, 1, 0, 1, 0),
(1273002921, 0, 0, 0, 0),
(1273003200, 0, 0, 0, 0),
(1273004214, 1, 1, 0, 0),
(1273005475, 7, 1, 0, 6),
(1273006385, 1, 0, 1, 0),
(1273006800, 0, 0, 0, 0),
(1273008510, 1, 1, 0, 0),
(1273010400, 0, 0, 0, 0),
(1273012572, 1, 1, 0, 0),
(1273014000, 2, 2, 0, 0),
(1273017198, 2, 2, 0, 0),
(1273017600, 1, 0, 0, 1),
(1273019665, 1, 1, 0, 0),
(1273021200, 1, 1, 0, 0),
(1273022103, 5, 4, 1, 0),
(1273032000, 0, 0, 0, 0),
(1273039200, 0, 0, 0, 0),
(1273042286, 1, 1, 0, 0),
(1273042800, 0, 0, 0, 0),
(1273043711, 1, 1, 0, 0),
(1273050000, 0, 0, 0, 0),
(1273052869, 1, 1, 0, 0),
(1273053600, 1, 1, 0, 0),
(1273055861, 1, 1, 0, 0),
(1273057200, 1, 1, 0, 0),
(1273059106, 1, 1, 0, 0),
(1273060457, 8, 8, 0, 0),
(1273060800, 0, 0, 0, 0),
(1273061706, 4, 3, 1, 0),
(1273063901, 2, 2, 0, 0),
(1273064400, 1, 1, 0, 0),
(1273066301, 2, 1, 0, 1),
(1273067767, 5, 4, 1, 0),
(1273068000, 0, 0, 0, 0),
(1273069179, 5, 3, 1, 1),
(1273070098, 2, 2, 0, 0),
(1273071389, 1, 1, 0, 0),
(1273071600, 1, 0, 1, 0),
(1273073266, 0, 0, 0, 0),
(1273074452, 1, 1, 0, 0),
(1273075200, 0, 0, 0, 0),
(1273076690, 0, 0, 0, 0),
(1273077911, 1, 0, 1, 0),
(1273078800, 0, 0, 0, 0),
(1273079756, 4, 4, 0, 0),
(1273080660, 2, 2, 0, 0),
(1273081565, 1, 1, 0, 0),
(1273082400, 1, 1, 0, 0),
(1273084757, 2, 0, 0, 2),
(1273086000, 1, 1, 0, 0),
(1273087925, 1, 1, 0, 0),
(1273089486, 1, 1, 0, 0),
(1273089600, 0, 0, 0, 0),
(1273096800, 1, 1, 0, 0),
(1273098314, 2, 2, 0, 0),
(1273100307, 6, 6, 0, 0),
(1273100400, 0, 0, 0, 0),
(1273102618, 2, 2, 0, 0),
(1273103555, 4, 1, 1, 2),
(1273104000, 0, 0, 0, 0),
(1273104934, 1, 1, 0, 0),
(1273106042, 1, 1, 0, 0),
(1273107048, 1, 1, 0, 0),
(1273107600, 0, 0, 0, 0),
(1273110614, 1, 1, 0, 0),
(1273111200, 0, 0, 0, 0),
(1273114800, 1, 1, 0, 0),
(1273116449, 2, 1, 0, 1),
(1273125600, 0, 0, 0, 0),
(1273128108, 1, 1, 0, 0),
(1273136400, 0, 0, 0, 0),
(1273140000, 1, 1, 0, 0),
(1273142088, 1, 1, 0, 0),
(1273143208, 1, 1, 0, 0),
(1273143600, 0, 0, 0, 0),
(1273145731, 2, 2, 0, 0),
(1273147012, 3, 2, 1, 0),
(1273147200, 0, 0, 0, 0),
(1273148126, 1, 1, 0, 0),
(1273149689, 1, 1, 0, 0),
(1273150800, 2, 0, 0, 2),
(1273152782, 1, 1, 0, 0),
(1273153693, 2, 2, 0, 0),
(1273154400, 0, 0, 0, 0),
(1273156894, 2, 1, 0, 1),
(1273158000, 2, 0, 0, 2),
(1273159379, 1, 1, 0, 0),
(1273161600, 0, 0, 0, 0),
(1273163563, 1, 1, 0, 0),
(1273165200, 0, 0, 0, 0),
(1273168800, 3, 1, 0, 2),
(1273171101, 1, 1, 0, 0),
(1273172400, 0, 0, 0, 0),
(1273173720, 1, 1, 0, 0),
(1273174626, 2, 2, 0, 0),
(1273176000, 1, 1, 0, 0),
(1273177816, 1, 1, 0, 0),
(1273179600, 1, 1, 0, 0),
(1273181362, 1, 1, 0, 0),
(1273183200, 1, 1, 0, 0),
(1273186284, 1, 1, 0, 0),
(1273190400, 0, 0, 0, 0),
(1273192931, 1, 1, 0, 0),
(1273194000, 2, 2, 0, 0),
(1273195394, 1, 1, 0, 0),
(1273197600, 2, 0, 2, 0),
(1273199209, 3, 1, 0, 2),
(1273204800, 0, 0, 0, 0),
(1273205822, 1, 1, 0, 0),
(1273206888, 3, 1, 0, 2),
(1273208400, 0, 0, 0, 0),
(1273211035, 1, 1, 0, 0),
(1273215600, 0, 0, 0, 0),
(1273216536, 1, 1, 0, 0),
(1273230000, 0, 0, 0, 0),
(1273232224, 1, 1, 0, 0),
(1273233128, 2, 2, 0, 0),
(1273233600, 0, 0, 0, 0),
(1273235599, 2, 2, 0, 0),
(1273237042, 1, 1, 0, 0),
(1273237200, 0, 0, 0, 0),
(1273238257, 2, 1, 0, 1),
(1273239159, 2, 0, 1, 1),
(1273240275, 1, 1, 0, 0),
(1273240800, 2, 0, 0, 2),
(1273241708, 1, 1, 0, 0),
(1273244400, 0, 0, 0, 0),
(1273248000, 2, 0, 0, 2),
(1273249052, 6, 4, 1, 1),
(1273251600, 1, 1, 0, 0),
(1273253944, 1, 1, 0, 0),
(1273255108, 6, 6, 0, 0),
(1273258800, 0, 0, 0, 0),
(1273261805, 3, 3, 0, 0),
(1273262400, 2, 0, 0, 2),
(1273263984, 1, 1, 0, 0),
(1273266000, 0, 0, 0, 0),
(1273268890, 3, 2, 1, 0),
(1273284000, 0, 0, 0, 0),
(1273287574, 1, 1, 0, 0),
(1273291200, 0, 0, 0, 0),
(1273292453, 1, 1, 0, 0),
(1273294429, 3, 1, 0, 2),
(1273294800, 0, 0, 0, 0),
(1273296672, 1, 1, 0, 0),
(1273298400, 0, 0, 0, 0),
(1273300335, 2, 1, 0, 1),
(1273305600, 0, 0, 0, 0),
(1273308259, 1, 1, 0, 0),
(1273309200, 0, 0, 0, 0),
(1273310221, 1, 1, 0, 0),
(1273320000, 0, 0, 0, 0),
(1273323295, 1, 1, 0, 0),
(1273323600, 0, 0, 0, 0),
(1273326504, 1, 1, 0, 0),
(1273334400, 0, 0, 0, 0),
(1273337482, 1, 1, 0, 0),
(1273338000, 0, 0, 0, 0),
(1273340583, 1, 1, 0, 0),
(1273341580, 1, 1, 0, 0),
(1273348800, 0, 0, 0, 0),
(1273352400, 1, 1, 0, 0),
(1273354389, 1, 1, 0, 0),
(1273359600, 0, 0, 0, 0),
(1273362351, 2, 1, 1, 0),
(1273363200, 0, 0, 0, 0),
(1273365705, 1, 1, 0, 0),
(1273370400, 0, 0, 0, 0),
(1273372427, 1, 1, 0, 0),
(1273377600, 1, 0, 0, 1),
(1273379427, 1, 1, 0, 0),
(1273381200, 1, 0, 0, 1),
(1273395600, 0, 0, 0, 0),
(1273399035, 1, 1, 0, 0),
(1273399200, 0, 0, 0, 0),
(1273400507, 1, 1, 0, 0),
(1273402332, 12, 1, 0, 11),
(1273402800, 0, 0, 0, 0),
(1273406400, 2, 0, 0, 2),
(1273407793, 1, 1, 0, 0),
(1273410000, 0, 0, 0, 0),
(1273413537, 1, 1, 0, 0),
(1273413600, 0, 0, 0, 0),
(1273415385, 1, 1, 0, 0),
(1273417200, 0, 0, 0, 0),
(1273419316, 1, 1, 0, 0),
(1273420800, 0, 0, 0, 0),
(1273421978, 1, 1, 0, 0),
(1273428000, 0, 0, 0, 0),
(1273431428, 1, 1, 0, 0),
(1273431600, 1, 0, 0, 1),
(1273433542, 1, 1, 0, 0),
(1273435200, 0, 0, 0, 0),
(1273438113, 2, 2, 0, 0),
(1273438800, 4, 4, 0, 0),
(1273441236, 3, 2, 1, 0),
(1273442400, 1, 1, 0, 0),
(1273443550, 4, 4, 0, 0),
(1273446000, 0, 0, 0, 0),
(1273447317, 1, 1, 0, 0),
(1273449600, 1, 1, 0, 0),
(1273453200, 1, 1, 0, 0),
(1273454366, 1, 1, 0, 0),
(1273464000, 0, 0, 0, 0),
(1273465747, 1, 1, 0, 0),
(1273471200, 0, 0, 0, 0),
(1273473117, 1, 1, 0, 0),
(1273474548, 1, 1, 0, 0),
(1273474800, 0, 0, 0, 0),
(1273485600, 0, 0, 0, 0),
(1273489200, 2, 0, 0, 2),
(1273491220, 3, 1, 0, 2),
(1273500000, 0, 0, 0, 0),
(1273503600, 3, 0, 0, 3),
(1273506118, 1, 1, 0, 0),
(1273507200, 3, 3, 0, 0),
(1273508396, 0, 0, 0, 0),
(1273510800, 1, 1, 0, 0),
(1273513363, 2, 1, 0, 1),
(1273514400, 3, 3, 0, 0),
(1273518000, 1, 1, 0, 0),
(1273519650, 3, 3, 0, 0),
(1273520748, 2, 2, 0, 0),
(1273521600, 1, 1, 0, 0),
(1273523267, 3, 3, 0, 0),
(1273524280, 2, 2, 0, 0),
(1273525200, 3, 3, 0, 0),
(1273527383, 1, 1, 0, 0),
(1273528534, 3, 3, 0, 0),
(1273528800, 0, 0, 0, 0),
(1273529820, 2, 2, 0, 0),
(1273531159, 1, 1, 0, 0),
(1273532128, 2, 2, 0, 0),
(1273532400, 0, 0, 0, 0),
(1273533371, 8, 7, 0, 1),
(1273534661, 1, 1, 0, 0),
(1273535791, 4, 4, 0, 0),
(1273536000, 0, 0, 0, 0),
(1273537833, 1, 1, 0, 0),
(1273538742, 1, 0, 1, 0),
(1273550400, 0, 0, 0, 0),
(1273551651, 1, 1, 0, 0),
(1273572000, 0, 0, 0, 0),
(1273575566, 1, 1, 0, 0),
(1273575600, 0, 0, 0, 0),
(1273577291, 3, 0, 1, 2),
(1273578728, 3, 3, 0, 0),
(1273579200, 0, 0, 0, 0),
(1273580571, 0, 0, 0, 0),
(1273581493, 1, 1, 0, 0),
(1273582580, 2, 2, 0, 0),
(1273582800, 0, 0, 0, 0),
(1273583736, 0, 0, 0, 0),
(1273584913, 2, 2, 0, 0),
(1273586306, 1, 0, 1, 0),
(1273586400, 0, 0, 0, 0),
(1273587330, 1, 1, 0, 0),
(1273593600, 1, 1, 0, 0),
(1273595025, 1, 1, 0, 0),
(1273596412, 2, 2, 0, 0),
(1273597200, 0, 0, 0, 0),
(1273599315, 1, 1, 0, 0),
(1273600234, 1, 1, 0, 0),
(1273600800, 0, 0, 0, 0),
(1273601748, 3, 2, 1, 0),
(1273603164, 3, 3, 0, 0),
(1273604221, 1, 1, 0, 0),
(1273604400, 1, 1, 0, 0),
(1273605356, 1, 1, 0, 0),
(1273608000, 0, 0, 0, 0),
(1273609261, 1, 1, 0, 0),
(1273611600, 4, 0, 0, 4),
(1273613781, 2, 2, 0, 0),
(1273615167, 2, 2, 0, 0),
(1273615200, 0, 0, 0, 0),
(1273616249, 2, 2, 0, 0),
(1273618800, 2, 2, 0, 0),
(1273622312, 1, 1, 0, 0),
(1273622400, 0, 0, 0, 0),
(1273624097, 1, 1, 0, 0),
(1273625960, 1, 1, 0, 0),
(1273626000, 0, 0, 0, 0),
(1273627454, 0, 0, 0, 0),
(1273633200, 0, 0, 0, 0),
(1273635322, 1, 1, 0, 0),
(1273636800, 0, 0, 0, 0),
(1273637810, 1, 1, 0, 0),
(1273640400, 0, 0, 0, 0),
(1273641636, 1, 1, 0, 0),
(1273644000, 0, 0, 0, 0),
(1273646733, 1, 1, 0, 0),
(1273647600, 0, 0, 0, 0),
(1273650853, 1, 1, 0, 0),
(1273654800, 0, 0, 0, 0),
(1273655901, 1, 1, 0, 0),
(1273658400, 1, 0, 0, 1),
(1273659526, 1, 1, 0, 0),
(1273661252, 2, 2, 0, 0),
(1273662000, 0, 0, 0, 0),
(1273663480, 1, 1, 0, 0),
(1273664965, 1, 1, 0, 0),
(1273665600, 0, 0, 0, 0),
(1273667467, 0, 0, 0, 0),
(1273668488, 2, 1, 1, 0),
(1273669200, 0, 0, 0, 0),
(1273670228, 1, 0, 0, 1),
(1273672800, 0, 0, 0, 0),
(1273674974, 1, 1, 0, 0),
(1273676060, 1, 1, 0, 0),
(1273676400, 0, 0, 0, 0),
(1273677575, 1, 1, 0, 0),
(1273687200, 0, 0, 0, 0),
(1273688749, 1, 1, 0, 0),
(1273689913, 2, 2, 0, 0),
(1273694400, 1, 1, 0, 0),
(1273697840, 2, 2, 0, 0),
(1273698000, 0, 0, 0, 0),
(1273699526, 2, 2, 0, 0),
(1273708800, 0, 0, 0, 0),
(1273710128, 1, 1, 0, 0),
(1273712400, 3, 3, 0, 0),
(1273719600, 0, 0, 0, 0),
(1273721546, 1, 1, 0, 0),
(1273726800, 0, 0, 0, 0),
(1273729936, 3, 1, 0, 2),
(1273744800, 0, 0, 0, 0),
(1273748034, 1, 1, 0, 0),
(1273748400, 0, 0, 0, 0),
(1273750331, 1, 1, 0, 0),
(1273752000, 0, 0, 0, 0),
(1273753622, 0, 0, 0, 0),
(1273755231, 2, 2, 0, 0),
(1273755600, 0, 0, 0, 0),
(1273757026, 1, 1, 0, 0),
(1273758319, 1, 0, 0, 1),
(1273759200, 4, 2, 0, 2),
(1273761236, 3, 1, 0, 2),
(1273762418, 2, 2, 0, 0),
(1273762800, 0, 0, 0, 0),
(1273764476, 1, 1, 0, 0),
(1273765410, 2, 2, 0, 0),
(1273766400, 4, 4, 0, 0),
(1273770000, 3, 3, 0, 0),
(1273771661, 1, 1, 0, 0),
(1273772603, 1, 1, 0, 0),
(1273773597, 1, 1, 0, 0),
(1273773600, 0, 0, 0, 0),
(1273774527, 0, 0, 0, 0),
(1273775828, 1, 1, 0, 0),
(1273777200, 0, 0, 0, 0),
(1273779835, 2, 1, 0, 1),
(1273780780, 1, 0, 1, 0),
(1273780800, 0, 0, 0, 0),
(1273782199, 1, 1, 0, 0),
(1273783121, 1, 1, 0, 0),
(1273784400, 0, 0, 0, 0),
(1273785891, 2, 2, 0, 0),
(1273786811, 4, 4, 0, 0),
(1273787741, 2, 2, 0, 0),
(1273788000, 0, 0, 0, 0),
(1273789287, 1, 1, 0, 0),
(1273790680, 2, 2, 0, 0),
(1273791600, 2, 2, 0, 0),
(1273793741, 0, 0, 0, 0),
(1273794921, 1, 1, 0, 0),
(1273795200, 1, 0, 0, 1),
(1273796418, 2, 2, 0, 0),
(1273806000, 0, 0, 0, 0),
(1273808257, 1, 1, 0, 0),
(1273809600, 1, 1, 0, 0),
(1273810808, 1, 1, 0, 0),
(1273813200, 0, 0, 0, 0),
(1273831200, 0, 0, 0, 0),
(1273833402, 1, 1, 0, 0),
(1273834800, 0, 0, 0, 0),
(1273837127, 1, 1, 0, 0),
(1273838400, 0, 0, 0, 0),
(1273839949, 1, 1, 0, 0),
(1273841040, 2, 2, 0, 0),
(1273842000, 0, 0, 0, 0),
(1273843485, 1, 1, 0, 0),
(1273844391, 3, 2, 1, 0),
(1273845456, 0, 0, 0, 0),
(1273845600, 1, 1, 0, 0),
(1273846532, 0, 0, 0, 0),
(1273849200, 1, 0, 0, 1),
(1273850159, 0, 0, 0, 0),
(1273852800, 1, 1, 0, 0),
(1273853995, 1, 1, 0, 0),
(1273855920, 1, 1, 0, 0),
(1273856400, 0, 0, 0, 0),
(1273858187, 0, 0, 0, 0),
(1273860000, 0, 0, 0, 0),
(1273861335, 1, 1, 0, 0),
(1273862324, 2, 1, 1, 0),
(1273863600, 2, 0, 0, 2),
(1273865834, 1, 1, 0, 0),
(1273867176, 3, 3, 0, 0),
(1273867200, 0, 0, 0, 0),
(1273868484, 1, 1, 0, 0),
(1273870098, 1, 1, 0, 0),
(1273870800, 1, 1, 0, 0),
(1273873256, 1, 1, 0, 0),
(1273874274, 2, 2, 0, 0),
(1273874400, 0, 0, 0, 0),
(1273876570, 1, 1, 0, 0),
(1273878000, 0, 0, 0, 0),
(1273879665, 1, 1, 0, 0),
(1273888800, 0, 0, 0, 0),
(1273890112, 1, 1, 0, 0),
(1273892333, 1, 1, 0, 0),
(1273896000, 1, 0, 0, 1),
(1273897438, 1, 1, 0, 0),
(1273914000, 0, 0, 0, 0),
(1273915298, 1, 1, 0, 0),
(1273917600, 1, 0, 0, 1),
(1273918920, 1, 1, 0, 0),
(1273921200, 1, 0, 0, 1),
(1273924800, 1, 0, 0, 1),
(1273926369, 1, 1, 0, 0),
(1273927328, 1, 1, 0, 0),
(1273928400, 0, 0, 0, 0),
(1273931298, 1, 1, 0, 0),
(1273932000, 3, 1, 0, 2),
(1273932937, 4, 3, 0, 1),
(1273934742, 3, 2, 1, 0),
(1273935600, 0, 0, 0, 0),
(1273936973, 7, 5, 0, 2),
(1273938767, 2, 2, 0, 0),
(1273939200, 0, 0, 0, 0),
(1273950000, 0, 0, 0, 0),
(1273953600, 1, 1, 0, 0),
(1273964400, 0, 0, 0, 0),
(1273965309, 1, 1, 0, 0),
(1273967192, 1, 1, 0, 0),
(1273968000, 0, 0, 0, 0),
(1273971600, 2, 1, 0, 1),
(1273974131, 1, 1, 0, 0),
(1273986000, 0, 0, 0, 0),
(1274004000, 0, 0, 0, 0),
(1274005411, 1, 1, 0, 0),
(1274006475, 6, 1, 0, 5),
(1274007600, 0, 0, 0, 0),
(1274011200, 2, 0, 0, 2),
(1274013242, 2, 1, 0, 1),
(1274018400, 1, 0, 0, 1),
(1274021189, 3, 1, 0, 2),
(1274022000, 0, 0, 0, 0),
(1274023541, 1, 1, 0, 0),
(1274024731, 1, 1, 0, 0),
(1274025600, 1, 1, 0, 0),
(1274027203, 1, 1, 0, 0),
(1274029200, 0, 0, 0, 0),
(1274030985, 1, 1, 0, 0),
(1274032800, 2, 0, 0, 2),
(1274035181, 1, 1, 0, 0),
(1274036400, 1, 0, 0, 1),
(1274037494, 1, 1, 0, 0),
(1274039177, 3, 1, 0, 2),
(1274040000, 2, 0, 0, 2),
(1274042060, 2, 1, 0, 1),
(1274043082, 1, 1, 0, 0),
(1274043600, 1, 0, 0, 1),
(1274046933, 1, 1, 0, 0),
(1274054400, 0, 0, 0, 0),
(1274057614, 1, 1, 0, 0),
(1274058000, 0, 0, 0, 0),
(1274059130, 2, 2, 0, 0),
(1274061600, 0, 0, 0, 0),
(1274062519, 2, 2, 0, 0),
(1274068800, 0, 0, 0, 0),
(1274070712, 1, 1, 0, 0),
(1274079600, 0, 0, 0, 0),
(1274081668, 1, 1, 0, 0),
(1274090400, 0, 0, 0, 0),
(1274094000, 2, 0, 0, 2),
(1274096078, 2, 1, 0, 1),
(1274097600, 0, 0, 0, 0),
(1274099671, 1, 1, 0, 0),
(1274100713, 1, 0, 1, 0),
(1274101200, 0, 0, 0, 0),
(1274103440, 2, 2, 0, 0),
(1274104432, 2, 2, 0, 0),
(1274104800, 0, 0, 0, 0),
(1274105707, 5, 0, 1, 4),
(1274106664, 8, 6, 1, 1),
(1274107612, 1, 1, 0, 0),
(1274108400, 2, 1, 0, 1),
(1274109866, 3, 3, 0, 0),
(1274111361, 3, 2, 0, 1),
(1274112000, 0, 0, 0, 0),
(1274113197, 5, 5, 0, 0),
(1274114163, 3, 3, 0, 0),
(1274115584, 2, 2, 0, 0),
(1274115600, 0, 0, 0, 0),
(1274116632, 5, 4, 0, 1),
(1274117571, 8, 8, 0, 0),
(1274118477, 6, 6, 0, 0),
(1274119200, 4, 4, 0, 0),
(1274120121, 4, 3, 1, 0),
(1274121045, 1, 1, 0, 0),
(1274122088, 3, 2, 1, 0),
(1274122800, 1, 1, 0, 0),
(1274123969, 1, 1, 0, 0),
(1274124988, 4, 4, 0, 0),
(1274126319, 1, 1, 0, 0),
(1274126400, 1, 1, 0, 0),
(1274128624, 1, 1, 0, 0),
(1274129907, 2, 2, 0, 0),
(1274130000, 0, 0, 0, 0),
(1274131363, 4, 4, 0, 0),
(1274132281, 3, 2, 1, 0),
(1274133277, 3, 0, 2, 1),
(1274133600, 1, 1, 0, 0),
(1274134501, 2, 2, 0, 0),
(1274135583, 2, 2, 0, 0),
(1274137200, 0, 0, 0, 0),
(1274139438, 1, 1, 0, 0),
(1274140430, 3, 3, 0, 0),
(1274140800, 0, 0, 0, 0),
(1274141838, 1, 1, 0, 0),
(1274143406, 1, 1, 0, 0),
(1274144400, 0, 0, 0, 0),
(1274146846, 1, 1, 0, 0),
(1274147813, 2, 2, 0, 0),
(1274148000, 0, 0, 0, 0),
(1274149476, 1, 1, 0, 0),
(1274151600, 0, 0, 0, 0),
(1274152532, 3, 1, 0, 2),
(1274155200, 0, 0, 0, 0),
(1274156294, 1, 1, 0, 0),
(1274158315, 7, 2, 0, 5),
(1274169600, 0, 0, 0, 0),
(1274171878, 1, 1, 0, 0),
(1274176800, 0, 0, 0, 0),
(1274179243, 1, 1, 0, 0),
(1274180400, 0, 0, 0, 0),
(1274181671, 1, 1, 0, 0),
(1274182639, 3, 1, 2, 0),
(1487869200, 0, 0, 0, 0),
(1487871373, 1, 1, 0, 0),
(1487887200, 0, 0, 0, 0),
(1487890300, 1, 1, 0, 0),
(1487890800, 0, 0, 0, 0),
(1487891774, 1, 0, 1, 0),
(1487892691, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_weblinks`
--

CREATE TABLE IF NOT EXISTS `jos_weblinks` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `archived` tinyint(1) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '1',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_weblinks`
--

INSERT INTO `jos_weblinks` (`id`, `catid`, `sid`, `title`, `alias`, `url`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `archived`, `approved`, `params`) VALUES
(1, 5, 0, 'Links', 'lin', 'http://www.templodaadoracao.com.br/', '', '2010-05-05 17:31:28', 0, 0, 0, '0000-00-00 00:00:00', 1, 0, 1, 'target=0\n\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
