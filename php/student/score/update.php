<?php 

require_once("../../config.php");

session_start();

$user = $_SESSION["account"];
$type = $_SESSION["type"];
$id = $_GET["id"];

if($type != "admin"){
    die ("请重新登录");
}

$db = pdo_init();


$sql = "select * from htu_teacher where id=:id";

$stat = $db->prepare($sql);
$stat->bindParam(':id',$id);
$stat->execute();
$row = $stat->fetch(PDO::FETCH_BOTH);
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>添加学生</title>
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
              <li>学生管理</li>
              <li class="active">修改学生</li>
            </ol>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-3">
                <div class="list-group">
                    <a href="#" class="list-group-item">课程管理</a>
                    <a href="#" class="list-group-item">教师管理</a>
                    <a href="#" class="list-group-item active">学生管理</a>
                </div>
            </div>
        	<div class="col-xs-9">
                <form class="form-horizontal" role="form" method='post' action='checkupdate.php'>
                    <div class="form-group">
                        <label for="inputID" class="col-sm-2 control-label">学号</label>
                        <div class="col-sm-10">
                            <input name="id" type="text" class="form-control" id="inputID" value="<?php echo $row["id"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">学生姓名</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="inputName" value="<?php echo $row["name"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputGollage" class="col-sm-2 control-label">学院</label>
                        <div class="col-sm-10">
                            <input name="collage" type="text" class="form-control" id="inputGollage" value="<?php echo $row["collage"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="密码">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">确认</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
    <!-- javascript file -->
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>