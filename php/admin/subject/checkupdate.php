<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];

if($type != "admin"){
    die ("ÇëÖØÐÂµÇÂ¼");
}
//print_r ($_POST);

$id = $_POST["id"];
$name = $_POST["name"];
$grade = $_POST["grade"];
$major = $_POST["major"];
$sex = $_POST["sex"];
$collage = $_POST["collage"];
$password = $_POST["password"];

try{
    
    $db = pdo_init();
    $sql = "update htu_subject set name=:name,collage=:collage,teacher=:teacher where id=:id";
    $stat = $db->prepare($sql);
    $stat->bindParam(':id',$id);
    $stat->bindParam(':name',$name);
    $stat->bindParam(':grade',$grade);
    $stat->bindParam(':major',$major);
    $stat->bindParam(':sex',$sex);
    $stat->bindParam(':collage',$collage);
    $stat->bindParam(':password',$password);
    $stat->execute();
    
    $url = "location:list.php";
    header($url);
}catch (PDOException $ex) {
    die("ÐÞ¸ÄÊ§°Ü");
}


?>