<?php 

$link = mysqli_connect("localhost", "root", "", "cosmetics_store");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}

if (isset($_POST["city"]) && isset($_POST["date"]) 
&& isset($_POST["phone"]) && isset($_POST["content"])) {
  $conn = new mysqli("localhost", "root", "", "cosmetics_store");
  if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);

}
$city = $conn->real_escape_string($_POST['city']);
$date = $conn->real_escape_string($_POST['date']);
$phone = $conn->real_escape_string($_POST['phone']);
$content = $conn->real_escape_string($_POST['content']);


$sql = "INSERT INTO Feedback (City, Date_call, Phone_num, Comment)
 VALUES ('$city', '$date', '$phone', '$content')";
    if($conn->query($sql)){
      echo "Данные успешно добавлены";
  } else{
      echo "Ошибка: " . $conn->error;
  }
  $conn->close();
  header('Location: http://lagoona');
}

?> 