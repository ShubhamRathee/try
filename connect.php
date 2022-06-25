<?php
session_start():
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$date = $_POST['date'];
//my

$host = "localhost";
$dbUsername="root";
$dbPassword="";
$dbname = "book";

//connect
$conn = new mysqli($host ,$dbUsername, $dbPassword, $dbname);
if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{
    $SELECT = "SELECT email From bookings Where email = ? Limit=1";
    $INSERT ="INSERT Into book (name, number, email, date) values(?,?,?,?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result();
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum==0){
        $stmt-> close();
        $stmt = $con->prepare($INSERT);
        $stmt->bind_param("sisi", $name, $number, $email, $date);
        $stmt->execute();
    }
    $stmt->close();
    $conn->close();
}


?>



 