<?php
include('dbConnect.php');
$connection = new Connection;

$conn = $connection->connectDB();
$connection->addToDB($conn);

mysqli_close($conn);
?>

<?php 
    include('template/header.php');
?>

<?php
if(isset($_POST["submit"]) && !empty($_POST['email'])){
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        include('template/mainContentSuccess.php'); 
    }else {
        include('template/mainContent.php'); 
    } 
}else {
    include('template/mainContent.php'); 
}           
?>
</body>
<script src="script.js"></script>
</html>