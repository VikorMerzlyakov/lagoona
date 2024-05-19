
<?php 

$link = mysqli_connect("localhost", "root", "", "cosmetics_store");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}

if (isset($_POST["radio"]) && !empty($_POST["radio"]))
{
$conn = new mysqli("localhost", "root", "", "cosmetics_store");
if($conn->connect_error){
  die("Ошибка: " . $conn->connect_error);
}
$val = $conn->real_escape_string($_POST["radio"]);

$sql="INSERT INTO vote_coockies (value_vote) VALUES ('$val')";

if($conn->query($sql)){
    echo "Данные успешно добавлены";
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
header('Location: http://lagoona');
}
?> 