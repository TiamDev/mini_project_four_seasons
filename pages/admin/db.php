<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "four_seasons";

// إنشاء اتصال بقاعدة البيانات
$conn = mysqli_connect($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if (!$conn) {
   // die(" Error Connection: " . mysqli_connect_error());
}


// $conn->close();

?>