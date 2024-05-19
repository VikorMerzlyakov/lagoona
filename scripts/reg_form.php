<?php 

$link = mysqli_connect("localhost", "root", "", "cosmetics_store");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}

if (isset($_POST["auth_FirstName"]) && isset($_POST["auth_LastName"]) 
&& isset($_POST["auth_login"]) && isset($_POST["auth_email"])&& isset($_POST["auth_pass"])) {
  $conn = new mysqli("localhost", "root", "", "cosmetics_store");
  if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);

}
$auth_FirstName = $conn->real_escape_string($_POST['auth_FirstName']);
$auth_LastName = $conn->real_escape_string($_POST['auth_LastName']);
$auth_login = $conn->real_escape_string($_POST['auth_login']);
$auth_email = $conn->real_escape_string($_POST['auth_email']);
$auth_pass = $conn->real_escape_string($_POST['auth_pass']);


$sql = "INSERT INTO Users (FirstName, LastName, UserLogin, Passw, Email)
 VALUES ('$auth_FirstName', '$auth_LastName', '$auth_login', '$auth_pass', '$auth_email')";
    if($conn->query($sql)){
      echo "Данные успешно добавлены";
  } else{
      echo "Ошибка: " . $conn->error;
  }
  $conn->close();
  header('Location: http://lagoona');
}

?> 