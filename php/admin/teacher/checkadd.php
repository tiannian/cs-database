<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];

if($type != "admin"){
    die ("ÇëÖØÐÂµÇÂ¼");
}


$id = $_POST["id"];
$name = $_POST["name"];
$collage = $_POST["collage"];
$password = $_POST["password"];

try{
    $db = pdo_init();
    $sql = "insert into htu_teacher values(:id,:name,:collage,md5(:password))";
    $stat = $db->prepare($sql);
    $stat->bindParam(':id',$id);
    $stat->bindParam(':name',$name);
    $stat->bindParam(':collage',$collage);
    $stat->bindParam(':password',$password);
    $stat->execute();
    
    $url = "location:list.php";
    header($url);
}catch (PDOException $ex) {
    die("Ìí¼ÓÊ§°Ü");
}


?>