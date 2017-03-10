<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];

if($type != "teacher"){
    die ("请重新登录");
}


$score = $_POST["score"];
$student = $_GET["student"];
$subject = $_GET["subject"];

try{
    $db = pdo_init();
    $sql = "update htu_score set score=:score where student=:student and subject=:subject";
    $stat = $db->prepare($sql);
    $stat->bindParam(':student',$student);
    $stat->bindParam(':subject',$subject);
    $stat->bindParam(':score',$score);
    $stat->execute();
    
    $url = "location:stulist.php?id=".$subject;
    echo $student;
    echo $subject;
    header($url);
}catch (PDOException $ex) {
    die("添加失败");
}


?>