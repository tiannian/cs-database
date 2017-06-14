<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];

if($type != "student"){
    die ("请重新登录");
}

$db = pdo_init();
$sql = "select * from htu_student where id=:id";
$stat = $db->prepare($sql);
$stat->bindParam(':id',$user);
$stat->execute();
$value = $stat->fetch();
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>查看个人信息</title>
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
                                <span class="sr-only">学生信息管理系统</span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">学生信息管理系统</a>
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
              <li>学生</li>
              <li class="active">个人信息</li>
            </ol>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-3">
                <div class="list-group">
                    <a href="/student/choose/list.php" class="list-group-item">选课管理</a>
                    <a href="/student/score/list.php" class="list-group-item active">分数查看</a>
                </div>
            </div>
        	<div class="col-xs-9">
                <div class="row">
                	<div class="col-xs-12">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>学号</td>
                                    <td><?php echo $value["id"]; ?></td>
                                </tr>
                                <tr>
                                    <td>姓名</td>
                                    <td><?php echo $value["name"]; ?></td>
                                </tr>
                                <tr>
                                    <td>年级</td>
                                    <td><?php echo $value["grade"]; ?></td>
                                </tr>
                                <tr>
                                    <td>专业</td>
                                    <td><?php echo $value["major"]; ?></td>
                                </tr>
                                <tr>
                                    <td>性别</td>
                                    <td><?php echo $value["sex"]; ?></td>
                                </tr>
                                <tr>
                                    <td>学院</td>
                                    <td><?php echo $value["collage"]; ?></td>
                                </tr>
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
            location.href = "del.php?id="+id;
        }
    </script>
</body>
</html>