<?php include('connection.php'); 

$sql = "SELECT * FROM `database_lista_clientes`;";
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

if($_POST['length'] ?? null){
    
  $start = $_POST['start'];
  $length = $_POST['length'];
  $sql .= " LIMIT ".$start.", ".$length;
}

$data = array();

$run_query = mysqli_query($con, $sql);
$filtered_rows = mysqli_num_rows($run_query);

while($row = mysqli_fetch_assoc($run_query)){
    $subarray = array();
    $subarray[] = $row['id'];
    $subarray[] = $row['nome'];
    $subarray[] = $row['email'];
    $subarray[] = $row['telefone'];
    $subarray[] = $row['cidade'];
    $subarray[] = '<a href="javascript:void();" data-id="'.$row['id'].'" class= "btn btn-sm btn-info editBtn">Editar</a> <a href="javascript:void();" data-id="'.$row['id'].'" class= "btn btn-sm btn-danger">Deletar</a>';
    $data[] = $subarray;
}

$output = array(
    'data'=>$data,
    'draw'=>intval($_POST['draw']),
    'recordsTotal'=>$count_all_rows,
    'recordsFiltered'=>$filtered_rows,
);

echo json_encode($output);

//22:05