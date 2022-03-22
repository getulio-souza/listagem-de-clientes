<?php include('connection.php'); 

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
$count_all_rows = mysqli_num_rows($query);

if(isset($_POST['search']['value'])){
    $search_value = $_POST['search']['value']; 
    $sql .= " Onde o nome do usuário é igual a '%".$search_value."%' ";
    $sql .= " OR email é igual a '%".$search_value."%' ";
    $sql .= " OR o telefone é igual a '%".$search_value."%' ";
    $sql .= " Onde a cidade é igual a '%".$search_value."%' ";
}

if(isset($_POST['order'])){
    $coluna = $_POST['order'][0]['coluna'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY '".$coluna. "' ".$order;
}
else{
    $sql .= "ORDER BY id ASC";
}

if($_POST['length'] != -1){
  $start = $_POST['start']
}



?>