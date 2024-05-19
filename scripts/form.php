<?php 
if(isset($_POST['submit'])) {
    $auth_FirstName = $_REQUEST['auth_FirstName'];
    $auth_LastName = $_REQUEST['auth_LastName'];
    $auth_date = $_REQUEST['auth_date'];
    $auth_login = $_REQUEST['auth_login'];
    $auth_email = $_REQUEST['auth_email'];
    $auth_tel = $_REQUEST['auth_tel'];
    $auth_pass = $_REQUEST['auth_pass'];
}

// детали базы данных
$host = "localhost";
$username = "root";
$password = "";
$dbname = "cosmetics_store";

// создание соединения
$con = mysqli_connect($host, $username, $password, $dbname);

// отправка запроса в базу данных
$sql = "INSERT INTO users (FirstName, LastName, Year_of_birth, Login, Passw, Email, Phone)" .
"VALUES('{$auth_FirstName}', '{$auth_LastName}', '{$auth_date}', '{$auth_login}', '{$auth_pass}, '{$auth_email}', '{$auth_tel}');";
// подтверждение успешного выполнения запроса
$rs = mysqli_query($con, $sql);

if($rs) {
  echo "Entries added!";
}

// закрытие соединения
mysqli_close($con);

?>
