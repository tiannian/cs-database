<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];

if($type != "student"){
    die ("ÇëÖØÐÂµÇÂ¼");
}


$id = $_GET["id"];

try{
    $db = pdo_init();
    $sql = "insert into htu_score (student,subject) values(:student,:subject)";
    $stat = $db->prepare($sql);
    $stat->bindParam(':student',$user);
    $stat->bindParam(':subject',$id);
    $stat->execute();
    
    $url = "location:list.php";
    header($url);
}catch (PDOException $ex) {
    die("Ìí¼ÓÊ§°Ü");
}


?>