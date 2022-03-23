<?php include ('connection.php');
$user_id = $_POST['id'];
$sql = "DELETE FROM users WHERE id='$user_id'";
$delquery = mysqli_query($con,$sql);
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