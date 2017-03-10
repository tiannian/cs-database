<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];

if($type != "admin"){
    die ("ÇëÖØÐÂµÇÂ¼");
}


//$id = $_POST["id"];
$name = $_POST["name"];
$collage = $_POST["collage"];
$teacher = $_POST["teacher"];

echo $teacher;

try{
    $db = pdo_init();
    $sql = "insert into htu_subject (name,collage,teacher) values(:name,:collage,:teacher)";
    $stat = $db->prepare($sql);
    $stat->bindParam(':name',$name);
    $stat->bindParam(':collage',$collage);
    $stat->bindParam(':teacher',$teacher);
    $stat->execute();
    
    $url = "location:list.php";
    header($url);
}catch (PDOException $ex) {
    die("Ìí¼ÓÊ§°Ü");
}


?>