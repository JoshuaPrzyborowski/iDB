<?php
/*
    This program is free software; you can redistribute it and/or modify
    it under the terms of the Revised BSD License.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    Revised BSD License for more details.

    Copyright 2004-2009 iDB Support - http://idb.berlios.de/
    Copyright 2004-2009 Game Maker 2k - http://gamemaker2k.org/
    iDB Installer made by Game Maker 2k - http://idb.berlios.net/

    $FileInfo: pgsql.php - Last Update: 12/12/2009 SVN 401 - Author: cooldude2k $
*/
$File3Name = basename($_SERVER['SCRIPT_NAME']);
if ($File3Name=="mysql.php"||$File3Name=="/mysql.php") {
	require('index.php');
	exit(); }
if(!isset($SetupDir['setup'])) { $SetupDir['setup'] = "setup/"; }
if(!isset($SetupDir['convert'])) { $SetupDir['convert'] = "setup/convert/"; }
/*
$query=sql_pre_query("ALTER DATABASE \"".$_POST['DatabaseName']."\" DEFAULT CHARACTER SET ".$SQLCharset." COLLATE ".$SQLCollate.";", array(null));
sql_query($query,$SQLStat);
*/
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."categories\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"OrderID\" int NOT NULL default '0',\n".
"  \"Name\" varchar(150) NOT NULL default '',\n".
"  \"ShowCategory\" varchar(5) NOT NULL default '',\n".
"  \"CategoryType\" varchar(15) NOT NULL default '',\n".
"  \"SubShowForums\" varchar(5) NOT NULL default '',\n".
"  \"InSubCategory\" int NOT NULL default '0',\n".
"  \"PostCountView\" int NOT NULL default '0',\n".
"  \"KarmaCountView\" int NOT NULL default '0',\n".
"  \"Description\" text NOT NULL\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."categories\" (\"OrderID\", \"Name\", \"ShowCategory\", \"CategoryType\", \"SubShowForums\", \"InSubCategory\", \"PostCountView\", \"KarmaCountView\", \"Description\")\n". 
"VALUES (1, 'A Test Category', 'yes', 'category', 'yes', 0, 0, 0, 'A test category that may be removed at any time.')", array(null));
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."catpermissions\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"PermissionID\" int NOT NULL default '0',\n".
"  \"Name\" varchar(150) NOT NULL default '',\n".
"  \"CategoryID\" int NOT NULL default '0',\n".
"  \"CanViewCategory\" varchar(5) NOT NULL default ''\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."catpermissions\" (\"PermissionID\", \"Name\", \"CategoryID\", \"CanViewCategory\") VALUES\n".
"(1, 'Admin', 1, 'yes'),\n".
"(2, 'Moderator', 1, 'yes'),\n".
"(3, 'Member', 1, 'yes'),\n".
"(4, 'Guest', 1, 'yes'),\n".
"(5, 'Banned', 1, 'no'),\n".
"(6, 'Validate', 1, 'yes');", array(null)); 
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."events\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"UserID\" int NOT NULL default '0',\n".
"  \"GuestName\" varchar(150) NOT NULL default '',\n".
"  \"EventName\" varchar(150) NOT NULL default '',\n".
"  \"EventText\" text NOT NULL,\n".
"  \"TimeStamp\" int NOT NULL default '0',\n".
"  \"TimeStampEnd\" int NOT NULL default '0',\n".
"  \"EventMonth\" int NOT NULL default '0',\n".
"  \"EventMonthEnd\" int NOT NULL default '0',\n".
"  \"EventDay\" int NOT NULL default '0',\n".
"  \"EventDayEnd\" int NOT NULL default '0',\n".
"  \"EventYear\" int NOT NULL default '0',\n".
"  \"EventYearEnd\" int NOT NULL default '0'\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."events\" (\"UserID\", \"GuestName\", \"EventName\", \"EventText\", \"TimeStamp\", \"TimeStampEnd\", \"EventMonth\", \"EventMonthEnd\", \"EventDay\", \"EventDayEnd\", \"EventYear\", \"EventYearEnd\") VALUES\n".
"(-1, '".$iDB_Author."', 'Opening', 'This is the day the Board was made. ^_^', %i, %i, %i, %i, %i, %i, %i, %i)", array($YourDate,$YourDateEnd,$EventMonth,$EventMonthEnd,$EventDay,$EventDayEnd,$EventYear,$EventYearEnd));
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."forums\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"CategoryID\" int NOT NULL default '0',\n".
"  \"OrderID\" int NOT NULL default '0',\n".
"  \"Name\" varchar(150) NOT NULL default '',\n".
"  \"ShowForum\" varchar(5) NOT NULL default '',\n".
"  \"ForumType\" varchar(15) NOT NULL default '',\n".
"  \"InSubForum\" int NOT NULL default '0',\n".
"  \"RedirectURL\" text NOT NULL,\n".
"  \"Redirects\" int NOT NULL default '0',\n".
"  \"NumViews\" int NOT NULL default '0',\n".
"  \"Description\" text NOT NULL,\n".
"  \"PostCountAdd\" varchar(15) NOT NULL default '',\n".
"  \"PostCountView\" int NOT NULL default '0',\n".
"  \"KarmaCountView\" int NOT NULL default '0',\n".
"  \"CanHaveTopics\" varchar(5) NOT NULL default '',\n".
"  \"HotTopicPosts\" int NOT NULL default '0',\n".
"  \"NumPosts\" int NOT NULL default '0',\n".
"  \"NumTopics\" int NOT NULL default '0'\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."forums\" (\"CategoryID\", \"OrderID\", \"Name\", \"ShowForum\", \"ForumType\", \"InSubForum\", \"RedirectURL\", \"Redirects\", \"NumViews\", \"Description\", \"PostCountAdd\", \"PostCountView\", \"KarmaCountView\", \"CanHaveTopics\", \"HotTopicPosts\", \"NumPosts\", \"NumTopics\") VALUES\n".
"(1, 1, 'A Test Forum', 'yes', 'forum', 0, 'http://', 0, 0, 'A test forum that may be removed at any time.', 'off', 0, 0, 'yes', 15, 1, 1)", array(null));
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."groups\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"Name\" varchar(150) NOT NULL default '',\n".
"  \"PermissionID\" int NOT NULL default '0',\n".
"  \"NamePrefix\" varchar(150) NOT NULL default '',\n".
"  \"NameSuffix\" varchar(150) NOT NULL default '',\n".
"  \"CanViewBoard\" varchar(5) NOT NULL default '',\n".
"  \"CanViewOffLine\" varchar(5) NOT NULL default '',\n".
"  \"CanEditProfile\" varchar(5) NOT NULL default '',\n".
"  \"CanAddEvents\" varchar(5) NOT NULL default '',\n".
"  \"CanPM\" varchar(5) NOT NULL default '',\n".
"  \"CanSearch\" varchar(5) NOT NULL default '',\n".
"  \"FloodControl\" int NOT NULL default '0',\n".
"  \"SearchFlood\" int NOT NULL default '0',\n".
"  \"PromoteTo\" int NOT NULL default '0',\n".
"  \"PromotePosts\" int NOT NULL default '0',\n".
"  \"PromoteKarma\" int NOT NULL default '0',\n".
"  \"HasModCP\" varchar(5) NOT NULL default '',\n".
"  \"HasAdminCP\" varchar(5) NOT NULL default '',\n".
"  \"ViewDBInfo\" varchar(5) NOT NULL default '',\n".
"  UNIQUE (\"Name\")\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."groups\" (\"Name\", \"PermissionID\", \"NamePrefix\", \"NameSuffix\", \"CanViewBoard\", \"CanViewOffLine\", \"CanEditProfile\", \"CanAddEvents\", \"CanPM\", \"CanSearch\", \"FloodControl\", \"SearchFlood\", \"PromoteTo\", \"PromotePosts\", \"PromoteKarma\", \"HasModCP\", \"HasAdminCP\", \"ViewDBInfo\") VALUES\n".
"('Admin', 1, '', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 30, 30, 0, 0, 0, 'yes', 'yes', 'yes'),\n".
"('Moderator', 2, '', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 30, 30, 0, 0, 0, 'yes', 'no', 'no'),\n".
"('Member', 3, '', '', 'yes', 'no', 'yes', 'yes', 'yes', 'yes', 30, 30, 0, 0, 0, 'no', 'no', 'no'),\n".
"('Guest', 4, '', '', 'yes', 'no', 'no', 'no', 'no', 'no', 30, 30, 0, 0, 0, 'no', 'no', 'no'),\n".
"('Banned', 5, '', '', 'no', 'no', 'no', 'no', 'no', 'no', 30, 30, 0, 0, 0, 'no', 'no', 'no'),\n".
"('Validate', 6, '', '', 'yes', 'no', 'yes', 'no', 'no', 'yes', 30, 30, 0, 0, 0, 'no', 'no', 'no');", array(null)); 
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."members\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"Name\" varchar(150) NOT NULL default '',\n".
"  \"UserPassword\" varchar(250) NOT NULL default '',\n".
"  \"HashType\" varchar(50) NOT NULL default '',\n".
"  \"Email\" varchar(150) NOT NULL default '',\n".
"  \"GroupID\" int NOT NULL default '0',\n".
"  \"Validated\" varchar(20) NOT NULL default '',\n".
"  \"HiddenMember\" varchar(20) NOT NULL default '',\n".
"  \"WarnLevel\" int NOT NULL default '0',\n".
"  \"Interests\" varchar(150) NOT NULL default '',\n".
"  \"Title\" varchar(150) NOT NULL default '',\n".
"  \"Joined\" int NOT NULL default '0',\n".
"  \"LastActive\" int NOT NULL default '0',\n".
"  \"LastPostTime\" int NOT NULL default '0',\n".
"  \"BanTime\" int NOT NULL default '0',\n".
"  \"BirthDay\" int NOT NULL default '0',\n".
"  \"BirthMonth\" int NOT NULL default '0',\n".
"  \"BirthYear\" int NOT NULL default '0',\n".
"  \"Signature\" text NOT NULL,\n".
"  \"Notes\" text NOT NULL,\n".
"  \"Avatar\" varchar(150) NOT NULL default '',\n".
"  \"AvatarSize\" varchar(10) NOT NULL default '',\n".
"  \"Website\" varchar(150) NOT NULL default '',\n".
"  \"Gender\" varchar(15) NOT NULL default '',\n".
"  \"PostCount\" int NOT NULL default '0',\n".
"  \"Karma\" int NOT NULL default '0',\n".
"  \"KarmaUpdate\" int NOT NULL default '0',\n".
"  \"RepliesPerPage\" int NOT NULL default '0',\n".
"  \"TopicsPerPage\" int NOT NULL default '0',\n".
"  \"MessagesPerPage\" int NOT NULL default '0',\n".
"  \"TimeZone\" varchar(5) NOT NULL default '0',\n".
"  \"DST\" varchar(5) NOT NULL default '0',\n".
"  \"UseTheme\" varchar(26) NOT NULL default '0',\n".
"  \"IP\" varchar(20) NOT NULL default '',\n".
"  \"Salt\" varchar(50) NOT NULL default '',\n".
"  UNIQUE (\"Name\"),\n".
"  UNIQUE (\"Email\")\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."members\" (\"id\", \"Name\", \"UserPassword\", \"HashType\", \"Email\", \"GroupID\", \"Validated\", \"HiddenMember\", \"WarnLevel\", \"Interests\", \"Title\", \"Joined\", \"LastActive\", \"LastPostTime\", \"BanTime\", \"BirthDay\", \"BirthMonth\", \"BirthYear\", \"Signature\", \"Notes\", \"Avatar\", \"AvatarSize\", \"Website\", \"Gender\", \"PostCount\", \"Karma\", \"KarmaUpdate\", \"RepliesPerPage\", \"TopicsPerPage\", \"MessagesPerPage\", \"TimeZone\", \"DST\", \"UseTheme\", \"IP\", \"Salt\") VALUES\n".
"(-1, 'Guest', '%s', '".$iDBHashType."', '%s', 4, 'no', 'yes', 0, 'Guest Account', 'Guest', %i, %i, '0', '0', '0', '0', '0', '[B]Test[/B] :)', 'Your Notes', 'http://', '100x100', '%s', 'UnKnow', 1, 0, 0, 10, 10, 10, '%s', '%s', 'iDB', '127.0.0.1', '%s'),\n".
"(1, '%s', '%s', '".$iDBHashType."', '%s', 1, 'yes', 'no', 0, '%s', 'Admin', %i, %i, '0', '0', '0', '0', '0', '%s', 'Your Notes', '%s', '100x100', '%s', 'UnKnow', 0, 0, 0, 10, 10, 10, '%s', '%s', 'iDB', '%s', '%s');", array($GuestPassword,$GEmail,$YourDate,$YourDate,$YourWebsite,$AdminTime,$AdminDST,$GSalt,$_POST['AdminUser'],$NewPassword,$_POST['AdminEmail'],$Interests,$YourDate,$YourDate,$NewSignature,$Avatar,$YourWebsite,$AdminTime,$AdminDST,$UserIP,$YourSalt));
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."messenger\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"SenderID\" int NOT NULL default '0',\n".
"  \"ReciverID\" int NOT NULL default '0',\n".
"  \"GuestName\" varchar(150) NOT NULL default '',\n".
"  \"MessageTitle\" varchar(150) NOT NULL default '',\n".
"  \"MessageText\" text NOT NULL,\n".
"  \"Description\" text NOT NULL,\n".
"  \"DateSend\" int NOT NULL default '0',\n".
"  \"Read\" int NOT NULL default '0'\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."messenger\" (\"SenderID\", \"ReciverID\", \"GuestName\", \"MessageTitle\", \"MessageText\", \"Description\", \"DateSend\", \"Read\") VALUES\n".
"(-1, 1, '".$iDB_Author."', 'Test', 'Hello Welcome to your board.\r\nThis is a Test PM. :P ', 'Hello Welcome', %i, 0)", array($YourDate));
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."permissions\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"PermissionID\" int NOT NULL default '0',\n".
"  \"Name\" varchar(150) NOT NULL default '',\n".
"  \"ForumID\" int NOT NULL default '0',\n".
"  \"CanViewForum\" varchar(5) NOT NULL default '',\n".
"  \"CanMakeTopics\" varchar(5) NOT NULL default '',\n".
"  \"CanMakeReplys\" varchar(5) NOT NULL default '',\n".
"  \"CanMakeReplysCT\" varchar(5) NOT NULL default '',\n".
"  \"CanEditTopics\" varchar(5) NOT NULL default '',\n".
"  \"CanEditTopicsCT\" varchar(5) NOT NULL default '',\n".
"  \"CanEditReplys\" varchar(5) NOT NULL default '',\n".
"  \"CanEditReplysCT\" varchar(5) NOT NULL default '',\n".
"  \"CanDeleteTopics\" varchar(5) NOT NULL default '',\n".
"  \"CanDeleteTopicsCT\" varchar(5) NOT NULL default '',\n".
"  \"CanDeleteReplys\" varchar(5) NOT NULL default '',\n".
"  \"CanDeleteReplysCT\" varchar(5) NOT NULL default '',\n".
"  \"CanCloseTopics\" varchar(5) NOT NULL default '',\n".
"  \"CanPinTopics\" varchar(5) NOT NULL default '',\n".
"  \"CanDohtml\" varchar(5) NOT NULL default '',\n".
"  \"CanUseBBags\" varchar(5) NOT NULL default '',\n".
"  \"CanModForum\" varchar(5) NOT NULL default ''\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."permissions\" (\"PermissionID\", \"Name\", \"ForumID\", \"CanViewForum\", \"CanMakeTopics\", \"CanMakeReplys\", \"CanMakeReplysCT\", \"CanEditTopics\", \"CanEditTopicsCT\", \"CanEditReplys\", \"CanEditReplysCT\", \"CanDeleteTopics\", \"CanDeleteTopicsCT\", \"CanDeleteReplys\", \"CanDeleteReplysCT\", \"CanCloseTopics\", \"CanPinTopics\", \"CanDohtml\", \"CanUseBBags\", \"CanModForum\") VALUES\n".
"(1, 'Admin', 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes'),\n".
"(2, 'Moderator', 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes'),\n".
"(3, 'Member', 1, 'yes', 'yes', 'yes', 'no', 'yes', 'no', 'yes', 'no', 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', 'yes', 'no'),\n".
"(4, 'Guest', 1, 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no'),\n".
"(5, 'Banned', 1, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no'),\n".
"(6, 'Validate', 1, 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no');", array(null)); 
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."posts\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"TopicID\" int NOT NULL default '0',\n".
"  \"ForumID\" int NOT NULL default '0',\n".
"  \"CategoryID\" int NOT NULL default '0',\n".
"  \"UserID\" int NOT NULL default '0',\n".
"  \"GuestName\" varchar(150) NOT NULL default '',\n".
"  \"TimeStamp\" int NOT NULL default '0',\n".
"  \"LastUpdate\" int NOT NULL default '0',\n".
"  \"EditUser\" int NOT NULL default '0',\n".
"  \"EditUserName\" varchar(150) NOT NULL default '',\n".
"  \"Post\" text NOT NULL,\n".
"  \"Description\" text NOT NULL,\n".
"  \"IP\" varchar(20) NOT NULL default '',\n".
"  \"EditIP\" varchar(20) NOT NULL default ''\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."posts\" (\"TopicID\", \"ForumID\", \"CategoryID\", \"UserID\", \"GuestName\", \"TimeStamp\", \"LastUpdate\", \"EditUser\", \"EditUserName\", \"Post\", \"Description\", \"IP\", \"EditIP\") VALUES\n".
"(1, 1, 1, -1, '".$iDB_Author."', %i, %i, 1, '".$_POST['AdminUser']."', 'Welcome to your new Internet Discussion Board! :) ', 'Welcome %s', '127.0.0.1', '127.0.0.1')", array($YourDate,$YourEditDate,$_POST['AdminUser'])); 
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."restrictedwords\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"Word\" text NOT NULL,\n".
"  \"RestrictedUserName\" varchar(5) NOT NULL default '',\n".
"  \"RestrictedTopicName\" varchar(5) NOT NULL default '',\n".
"  \"RestrictedEventName\" varchar(5) NOT NULL default '',\n".
"  \"RestrictedMessageName\" varchar(5) NOT NULL default '',\n".
"  \"CaseInsensitive\" varchar(5) NOT NULL default '',\n".
"  \"WholeWord\" varchar(5) NOT NULL default ''\n".
");", array(null));
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."sessions\" (\n".
"  \"session_id\" varchar(150) PRIMARY KEY NOT NULL default '',\n".
"  \"session_data\" text NOT NULL,\n".
"  \"expires\" int NOT NULL default '0'\n".
");", array(null));
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."smileys\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"FileName\" text NOT NULL,\n".
"  \"SmileName\" text NOT NULL,\n".
"  \"SmileText\" text NOT NULL,\n".
"  \"Directory\" text NOT NULL,\n".
"  \"Display\" varchar(5) NOT NULL default '',\n".
"  \"ReplaceCI\" varchar(5) NOT NULL default ''\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."smileys\" (\"FileName\", \"SmileName\", \"SmileText\", \"Directory\", \"Display\", \"ReplaceCI\") VALUES\n".
"('angry.png', 'Angry', ':angry:', 'smileys/', 'yes', 'yes'),\n".
"('closedeyes.png', 'Sleep', 'v_v', 'smileys/', 'yes', 'no'),\n".
"('cool.png', 'Cool', 'B)', 'smileys/', 'yes', 'no'),\n".
"('glare.png', 'Hmph', ':hmph:', 'smileys/', 'yes', 'yes'),\n".
"('happy.png', 'Happy', '^_^', 'smileys/', 'yes', 'no'),\n".
"('hmm.png', 'Hmm', ':unsure:', 'smileys/', 'yes', 'yes'),\n".
"('huh.png', 'Huh', ':huh:', 'smileys/', 'yes', 'yes'),\n".
"('laugh.png', 'lol', ':laugh:', 'smileys/', 'yes', 'yes'),\n".
"('lol.png', 'lol', ':lol:', 'smileys/', 'yes', 'yes'),\n".
"('mad.png', 'Mad', ':mad:', 'smileys/', 'yes', 'yes'),\n".
"('ninja.png', 'Ninja', ':ninja:', 'smileys/', 'yes', 'yes'),\n".
"('ohmy.png', 'ohmy', ':o', 'smileys/', 'yes', 'yes'),\n".
"('ohno.png', 'ohno', ':ohno:', 'smileys/', 'yes', 'yes'),\n".
"('sad.png', 'Sad', ':(', 'smileys/', 'yes', 'no'),\n".
"('sleep.png', 'Sleep', '-_-', 'smileys/', 'yes', 'no'),\n".
"('smile.png', 'Happy', ':)', 'smileys/', 'yes', 'no'),\n".
"('sweat.png', 'Sweat', ':sweat:', 'smileys/', 'yes', 'yes'),\n".
"('tongue.png', 'Tongue', ':P', 'smileys/', 'yes', 'no'),\n".
"('wub.png', 'Wub', ':wub:', 'smileys/', 'yes', 'yes'),\n".
"('x.png', 'X', ':x:', 'smileys/', 'yes', 'yes');", array(null));
sql_query($query,$SQLStat);
/*
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."tagboard\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"UserID\" int NOT NULL default '0',\n".
"  \"GuestName\" varchar(150) NOT NULL default '',\n".
"  \"TimeStamp\" int NOT NULL default '0',\n".
"  \"Post\" text NOT NULL,\n".
"  \"IP\" varchar(20) NOT NULL default ''
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."tagboard\" VALUES (1,-1,'".$iDB_Author."',".$YourDate.",'Welcome to Your New Tag Board. ^_^','127.0.0.1'), array(null)); 
sql_query($query,$SQLStat);
*/
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."topics\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"ForumID\" int NOT NULL default '0',\n".
"  \"CategoryID\" int NOT NULL default '0',\n".
"  \"OldForumID\" int NOT NULL default '0',\n".
"  \"OldCategoryID\" int NOT NULL default '0',\n".
"  \"UserID\" int NOT NULL default '0',\n".
"  \"GuestName\" varchar(150) NOT NULL default '',\n".
"  \"TimeStamp\" int NOT NULL default '0',\n".
"  \"LastUpdate\" int NOT NULL default '0',\n".
"  \"TopicName\" varchar(150) NOT NULL default '',\n".
"  \"Description\" text NOT NULL,\n".
"  \"NumReply\" int NOT NULL default '0',\n".
"  \"NumViews\" int NOT NULL default '0',\n".
"  \"Pinned\" int NOT NULL default '0',\n".
"  \"Closed\" int NOT NULL default '0'\n".
");", array(null));
sql_query($query,$SQLStat);
$query = sql_pre_query("INSERT INTO \"".$_POST['tableprefix']."topics\" (\"ForumID\", \"CategoryID\", \"OldForumID\", \"OldCategoryID\", \"UserID\", \"GuestName\", \"TimeStamp\", \"LastUpdate\", \"TopicName\", \"Description\", \"NumReply\", \"NumViews\", \"Pinned\", \"Closed\") VALUES\n".
"(1, 1, 1, 1, -1, '".$iDB_Author."', %i, %i, 'Welcome', 'Welcome %s', 0, 0, 1, 1)", array($YourDate,$YourDate,$_POST['AdminUser']));
sql_query($query,$SQLStat);
$query=sql_pre_query("CREATE TABLE \"".$_POST['tableprefix']."wordfilter\" (\n".
"  \"id\" SERIAL PRIMARY KEY NOT NULL,\n".
"  \"FilterWord\" text NOT NULL,\n".
"  \"Replacement\" text NOT NULL,\n".
"  \"CaseInsensitive\" varchar(5) NOT NULL default '',\n".
"  \"WholeWord\" varchar(5) NOT NULL default ''\n".
");", array(null));
sql_query($query,$SQLStat);
?>