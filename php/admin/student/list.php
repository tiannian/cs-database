<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];

if($type != "admin"){
    die ("请重新登录");
}

$db = pdo_init();
$sql = "select * from htu_student order by id asc";

$stat = $db->query($sql);

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>学生管理</title>
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
              <li>管理员</li>
              <li class="active">学生管理</li>
            </ol>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-3">
                <div class="list-group">
                    <a href="/admin/subject/list.php" class="list-group-item">课程管理</a>
                    <a href="/admin/teacher/list.php" class="list-group-item">教师管理</a>
                    <a href="/admin/student/list.php" class="list-group-item active">学生管理</a>
                </div>
            </div>
        	<div class="col-xs-9">
                <div class="row">
                	<div class="col-xs-12"><a href="add.php"><button class="btn btn-default">添加</button></a></div>
                </div>
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
                                    <th>修改</th>
                                    <th>删除</th>
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
                                    <td><button class="btn btn-default btn-xs infochange" onClick="onClickChange(<?php echo $value["id"]; ?>)">修改</button></td>
                                    <td><button class="btn btn-default btn-xs infodelete" onClick="onClickDelete(<?php echo $value["id"]; ?>)">删除</button></td>
                                </tr>
                                
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
        function onClickChange(id){
            location.href = "update.php?id="+id;
        }
        function onClickDelete(id){
            location.href = "del.php?id="+id;
        }
    </script>
</body>
</html>