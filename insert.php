<html>
<head>
<title>Sql注入演示</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
 
<body >
<form action="" method="post">
    <fieldset >
        <legend>Sql注入演示</legend>
        <table>
            <tr>
                <td>用户名：</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>密  码：</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="提交"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </fieldset>
</form>
</body>
</html>
 
<?php
 
    if($_POST['username']){
        $mysqli = mysqli_connect("hostname","username","password","database") or die("连接失败".mysqli_connect_error());
        $name=$_POST['username'];
        $pwd=md5($_POST['password']);
        $sql="select * from users where username='$name' and passwd='$pwd'";
        $result = mysqli_query($mysqli, $sql);
 
        echo $sql."<br><br>";
        echo $_POST['password']."<br><br>";
        // 这两行为了调试

	    $row = mysqli_fetch_array($result,MYSQLI_NUM);	
        if(!is_null($row)){
            echo "登陆成功！<br>";
            var_dump($row);
            }else{
                echo "您的用户名或密码输入有误，请重新登录！";
            }

    }
?>
