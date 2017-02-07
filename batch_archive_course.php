<?php
set_time_limit(0);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_WARNING);

date_default_timezone_set("Europe/Athens");

ini_set('display_errors','On');
ini_set('memory_limit','1024M');

//chdir('../../');
require_once 'config/config.php';
require_once 'modules/course_info/archive_functions.php';
require_once 'include/baseTheme.php';
require_once 'include/lib/fileManageLib.inc.php';

$db = new PDO( "mysql:host=".$mysqlServer."; dbname=".$mysqlMainDb, $mysqlUser, $mysqlPassword );
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->query("SET NAMES UTF8");

$sql = "SELECT * FROM course";
$rows = $db->query($sql);
$rowCount = $rows->rowCount();
$rowCount = str_pad($rowCount, 4, 0, STR_PAD_LEFT);

$Counter = str_pad(0, 4, 0, STR_PAD_LEFT);
foreach ($rows as $course) {
    $Counter = str_pad($Counter + 1, 4, 0, STR_PAD_LEFT);

    echo "Backup ".$Counter."/".$rowCount." ==> ".$course["id"].":".$course["code"]."... ";

    doArchive($course["id"], $course["code"]);

    rename("courses/archive/".$course["code"]."/", "courses/backups/".$course["code"]."/");

    rmdir("courses/archive/".$course["code"]."/");

    echo "Done\n";
}