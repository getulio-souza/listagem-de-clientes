<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- databases link -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.5/datatables.min.css"/>
    
    <title>Listagem de clientes - CRUD</title>
  </head>
  <body>
    <h1 class="text-center">Tabela de dados de clientes</h1>
      <!-- container -->
      <section class="container-fluid">
        <article class="row">
            <div class="container">
              <!--btn modal -->
               <div class="row">
               <div class="col-md-2"></div>
                 <div class="col-md-8">
                   <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary mt-4 mb-4"  data-bs-toggle="modal" data-bs-target="#addUserModal">
                 Adicionar usuário
                 </button>
                 </div>
               </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <!--colunas -->
                    <div class="col-md-8">
                    <!-- tabela -->
                    <table id="datatable" class="table text-center">
                        <thead>
                            <th>Quantidade</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone </th>
                            <th>Cidade</th>
                        </thead>
                        <!-- corpo da tabela -->
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>João da Silva</td>
                                <td>joao_da_silva@gmail.com</td>
                                <td>(11) 0000-0000</td>
                                <td><a class="btn">Editar</a><a href="">Deletar</a></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </article>
      </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--javascript link-->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- inserindo o rodape dinâmico com jquery-->
    <script type="text/javaScript">
        $('#datatable').DataTable({
            'serveside': true, 
            'processing': true,
            'paging': true,
             'order':[],
             'ajax':{
               'url': 'fetch_data.php',
               'type': 'post',
             },
             fncreateRow: function(nRow, aData, IdataIndex){
                 $(nRow).attr('id', aData[0]);
             },
             'columnDefs':[{
                 'target': [0,5],
                 orderable:false,
             }]
        });
    </script>
    <!-- modal script-->
    <script type="text/javascript">
     $(document).on('submit', '$addUserModal', function(event){
       event.preventDefault();
       let nome = $('#inputUserName').val()
       let email = $('#inputEmail').val()
       let telefone = $('#inputPhone').val()
       let estado = $('#estado').val()
       
       if(nome != '' &&  email != '' && telefone != '' && estado != ''){
         $.ajax({
           url:"add_user.php",
           data:{name:name, email:email, telefone:telefone, estado:estado},
           type:'post',
           success:function(data){

           }
         });
       }
       else{
         alert ('Por favor, preencha todos os campos')
       }
     })
    </script>
    <!-- inserindo o modal -->
    <!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informe os dados do cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- form control-->
      <form id="salvarUsuarioForm" action="javascript:void();" method="post">
      <div class="modal-body">
        <!-- usuário -->
        <div class="mb-3 row">
    <label for="inputUsername" class="col-sm-2 col-form-label">Usuário*</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUserName" value="">
    </div>
  </div>
  <!-- email-->
  <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">E-mail*</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail" name="inputEmail">
    </div>
  </div>
  <!-- Telefone-->
  <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Telefone*</label>
    <div class="col-sm-10">
    <input type="tel" name="phone" pattern="[0-9]{10}" id="inputPhone"  title="número com 11 digitos(incluindo DDD)" maxlength="11" required/>    
    </div>
  </div>
  <!-- Cidade-->
  <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Estado*</label>
    <div class="col-sm-10">
    <select id="estado" name="estado">
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
</select>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar alterações</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </body>
</html>
