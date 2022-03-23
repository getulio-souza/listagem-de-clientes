<?php include('connection.php');
 
 $username = $_POST['name'];
 $email = $_POST['email'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone'];
 $estado = $_POST['estado'];

$sql = "INSERT INTO `users` (`username`, `email`, `mobile`, `estado`) VALUES *('$username', '$email', '$telefone','$estado')";

$query = mysqli_query(($con,$sql){
    if($query==true){
        $data = array(
            'status'=>'sucess',
        );
        echo json_encode($data);
    }
    else{
        $data = array(
            'status'=>'failed',
        );
        echo json_encode($data);
    }
}

?>
