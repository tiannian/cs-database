<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];

if($type != "student"){
    die ("请重新登录");
}

$id = $_GET["id"];

try{
    
    $db = pdo_init();
    $sql = "delete from htu_score where subject=:id and student=:student";
    $stat = $db->prepare($sql);
    $stat->bindParam(':id',$id);
    $stat->bindParam(':student',$user);
    $stat->execute();
    
    $url = "location:list.php";
    header($url);
}catch (PDOException $ex) {
    die("添加失败");
}

?>