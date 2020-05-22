<!DOCTYPE html>
<html>
<head>
    <title>install</title>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        html,body{
       width: 100%;
       height: 100%;
}

 body {
     background: #0d161f;
}

#circle {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 150px;
    height: 150px;  
}

.loader {
    width: calc(100% - 0px);
    height: calc(100% - 0px);
    border: 8px solid #162534;
    border-top: 8px solid #09f;
    border-radius: 50%;
    animation: rotate 5s linear infinite;
}
.title{
    position: absolute;
    top: 30%;
    left: 50%;
}
.left{
    float: left;
    margin-right: 30px 
}

@keyframes rotate {
100% {transform: rotate(360deg);}
} 
    </style>
</head>
<body>


<?php
require_once "../../system/config/config.php";

$db = new PDO('mysql:host='.DB_HOST.';charset=utf8', DB_USER, DB_PASSWORD);
$db->setAttribute(PDO::ERRMODE_EXCEPTION,TRUE);
try{
    $db->exec("CREATE DATABASE IF NOT EXISTS ".DB_DATABASE);
    $db->__construct('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8',DB_USER,DB_PASSWORD);
}catch(PDOException $e){
    die($e->getMessage());
}
$error = '';
try{
    $sql = file_get_contents('../../system/sql/mvc.sql');

    $db->exec($sql);
    
    $default_username = 'Administrator';
    $default_email = 'admin@oneshootstyle.com';
    $default_password = md5($default_username.$default_email.'s4lt$t61N9');
    $statement = $db->prepare("INSERT INTO ".TABLE_USERS."(name,pass,email)VALUES(:u,:p,:e)");
    $statement->bindValue(':u',$default_username,PDO::PARAM_STR);
    $statement->bindValue(':p',$default_password,PDO::PARAM_STR);
    $statement->bindValue(':e',$default_email,PDO::PARAM_STR);
    $statement->execute();
}catch(PDOException $e){
    $error = $e->getMessage();
}
// echo '<h1 style="text-align:center;color:blue">';
// echo '<div ><div class="loader"></div></div>';
// echo '<h3 style="text-align:center">';

// echo '</h3>';


?>
<div id="circle">
  <div class="loader">
    <div class="loader">
        <div class="loader">
           <div class="loader">

           </div>
        </div>
    </div>
  </div>
</div> 
<div class="container">
  <div class="row justify-content-center">
    <h1>Page installing....</h1><br/>
    <span class="title" style="color:white">
        <?php
            for($i=10; $i > 0; $i--)
            {
                if($i == 4 && $error != ''){
                    ob_implicit_flush(true);
                    echo '<p class="left">loading resources content_'.rand(100,1000).'</p>';
                    ob_flush();
                    sleep(1);
                    echo '<p class="left" style="color:red">fail       </p><br/>';
                }
                ob_implicit_flush(true);
                echo '<p class="left">loading resources content_'.rand(100,1000).'</p>';
                ob_flush();
                sleep(1);
                echo '<p class="left" style="color:green">ok       </p><br/>';
            }

          ?>

    <span>
  </div>
</div>
<?php if($error == ''){ ?>
<script>
    window.location.href = "../index.php";
</script>
<?php }else{
 ?>
    <span style="color:white; position: absolute; top: 10%;left: 40%">
        <p class="left" style="color:red">Installation has a few errors</p>
    </span>
<?php } ?>

</body>
</html>