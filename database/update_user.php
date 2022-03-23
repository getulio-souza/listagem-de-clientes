<?php 
include ('connection.php');

$name = $_POST['name'];
$id = $_POST['id'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$estado = $_POST['estado'];

$sql = "UPDATE `users` SET `name`= '$name', `email` = '$email', `phone`= '$phone', `estado`= '$estado' WHERE id='$id' ";
$query = mysqli_query($con,$sql);
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

?>

