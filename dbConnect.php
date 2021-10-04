<?php

class Connection{
    public $conn;
    public $result;

    public function connectDB(){ 
        $conn = mysqli_connect('localhost','gustavs','test1234','email_list');
        if(!$conn){
            echo 'connect error: ' . mysqli_connect_error();
        }
        $this->conn = $conn;
        return $conn;
    }
    public function updateView($LIKE, $ORDERBY){      
        $sql = "SELECT * FROM emails $LIKE $ORDERBY";
        $result = mysqli_query($this->conn, $sql);
        $this->result = $result;
        return $result;
    }
    public function addToDB($conn){
        if(isset($_POST['submit'])){
            if (isset($_POST["submit"]) && !empty($_POST['email'])){
                $email = $_POST['email'];
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $sql = "INSERT INTO emails(email) VALUES('$email')";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }
}
?>



