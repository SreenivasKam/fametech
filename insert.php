<?php
$username = $_POST['inputname'];
$email = $_POST['inputEmail'];
$password = $_POST['inputPassword'];

if(!empty($username) ||!empty($email) ||!empty($password)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "checks";

    $conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

    if($conn->connection_error){
        die('Connection Failed :'.$conn->connection_error);
    }else{
        $stmt = $conn->prepare("insert into test(username,email,password) values(?,?,?)");
        $stmt->bind_param("sss",$username,$email,$password);
        $stmt->execute();
        echo "Registraion Successful";
        $stmt->close();
        $conn->close();
    }

}else{
    echo "Please enter all the fields";
    die();
}
?>