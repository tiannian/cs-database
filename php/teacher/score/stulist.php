<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];

if($type != "teacher"){
    die ("请重新登录");
}

$id = $_GET["id"];

$db = pdo_init();
$sql = "select id,name,grade,major,sex,collage,score from htu_score inner join htu_student on htu_score.student=htu_student.id where subject=:id";
$stat = $db->prepare($sql);
$stat->bindParam(':id',$id);
$stat->execute();

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>查看课程</title>
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
        <div class="row">
        	<div class="col-xs-12">
                <nav class="navbar navbar-default" role="navigation">
                	<div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">成绩管理系统</span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">成绩管理系统</a>
                        </div>
                        <div class="collapse navbar-collapse">
                        	<ul class="nav navbar-nav navbar-right">
                        		<li>
                                    <p class="navbar-text"><?php echo $user; ?></p>
                                </li>
                        	</ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-12">
            <ol class="breadcrumb">
              <li>教师</li>
              <li>查看课程</li>
              <li class="active">学生列表</li>
            </ol>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-3">
                <div class="list-group">
                    <a href="/teacher/subject/list.php" class="list-group-item">查看课程</a>
                    <a href="/teacher/score/list.php" class="list-group-item active">课程评分</a>
                </div>
            </div>
        	<div class="col-xs-9">
                <div class="row">
                	<div class="col-xs-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>学生编号</th>
                                    <th>学生姓名</th>
                                    <th>年级</th>
                                    <th>专业</th>
                                    <th>性别</th>
                                    <th>所属学院</th>
                                    <th>分数</th>
                                    <th>评分</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($stat as $value){
                            ?>
                                <tr>
                                    <td><?php echo $value["id"]; ?></td>
                                    <td><?php echo $value["name"]; ?></td>
                                    <td><?php echo $value["grade"]; ?></td>
                                    <td><?php echo $value["major"]; ?></td>
                                    <td><?php echo $value["sex"]==1?'男':'女'; ?></td>
                                    <td><?php echo $value["collage"]; ?></td>
                                    <td><?php echo $value["score"] == ""?"未评分":$value["score"]; ?></td>
                                    <td><button class="btn btn-default btn-xs infodelete" onClick="onClickDelete(<?php echo $value["id"]; ?>)">评分</button></td>
                                </tr>
                                <?php //print_r( $value);?>
                            <?php
                                }
                            ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <!-- javascript file -->
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function onClickDelete(id){
            location.href = "add.php?id="+id+"&subject=<?php echo $id; ?>";
        }
    </script>
</body>
</html>