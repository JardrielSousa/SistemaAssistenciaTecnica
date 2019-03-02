<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
<link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
<link href = "https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css"  rel = "stylesheet" >

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Assistencia técnica</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Cadastro
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="cadmaterial.php">Materiais</a>
          <a class="dropdown-item" href="cadCliente.php">Clientes</a>
          <a class="dropdown-item" href="#">Usuarios</a>
          <a class="dropdown-item" href="#">Serviços</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Consultar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Materiais</a>
          <a class="dropdown-item" href="conCliente.php">Clientes </a>
          <a class="dropdown-item" href="#">Estoque</a>
          <a class="dropdown-item" href="#">Usuarios</a>
          <a class="dropdown-item" href="#">Serviços</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Financeiro
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Receita</a>
          <a class="dropdown-item" href="#">Despesas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Abrir O.S</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sair.php">Sair</a>
      </li>
    </ul>
  </div>
</nav>
<br>

<form method="post">
  <div class="form-row">
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <div class="form-group col-md-3">
      <label for="inputEmail4">Nome*</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Email*</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
  <div class="form-group col-md-3">
    <label for="inputAddress">Telefone*</label>
    <input type="text" class="form-control" id="numero" name="telefone" placeholder="Número">
  </div>
  </div>
 <div class="form-row">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="form-group col-md-4">
    <label for="inputAddress2">Endereço*</label>
    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, nº casa...">
  </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Bairro*</label>
      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Cidade*</label>
      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">  
    </div>
    </div>
    <div class="form-row">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form-group col-md-4">
      <label for="inputZip">Complemento</label>
      <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
    </div>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" class="btn btn-primary" value="Salvar">
  <br>

                              <?php
                              include '../Model/classes/cliente.php';
                              $cliente = new cliente();
                              
                              if(isset($_POST['nome']))
                              {
                                
                              $nome = $_POST['nome'];
                              $email = $_POST['email'];
                              $telefone= $_POST['telefone'];
                              $endereco= $_POST['endereco'];
                              $bairro= $_POST['bairro'];
                              $cidade= $_POST['cidade'];
                              $complemento= $_POST['complemento'];

                              //verificar se os campos estão todos preenchidos
                              if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($endereco) && !empty($bairro))
                              {
                                $cliente->conectar("assistenciatecnica", "localhost","root","vertrigo");

                                  if($cliente->msgErro == "")
                                  {     
                                        
                                          if($cliente->cadastrar($nome, $email, $telefone, $endereco, $bairro, $cidade, $complemento))
                                          {
                                            ?>
                                            <br>
                                          <div class="alert alert-success" role="alert">
                                              cadastrado com sucesso.
                                          </div>
                                            <?php           
                                          }
                                          else
                                          {
                                          ?>
                                          <br>
                                        <div class="alert alert-danger" role="alert">
                                          já cadastrado, tente novamente.
                                          </div>
                                          <?php
                                          }
                                  }
                                  else
                                  {
                                  ?>
                                  <br>
                                  <div class="alert alert-danger" role="alert">
                                  <?php
                                  echo "erro: ". $cliente->msgErro;
                                    ?>
                                  </div>
                                  <?php
                                  }
                              }
                              else
                              {
                                ?>
                                <br>
                              <div class="alert alert-danger" role="alert">
                              Preencha todos os campos obrigatórios.
                              </div>
                              <?php
                              }
                              }
                              ?>
</form>

<script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/Popper.js/dist/Popper.js"></script>
        <script src="node_modules/bootstrap/dist/ja/bootstrap.js"></script>
        <script src="node_modules/glyph-iconset-master/svg/"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
