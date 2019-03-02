<html>
<head>
<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    		<link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
            <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
            <link href = "https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css"  rel = "stylesheet" >

</head>
<div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 
                   <form action="" method="post" name="login" novalidate="novalidate">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="col-md-12 text-center"><h1>Assistência técnica</h1></label>
                              <div class="logo mb-3">
                              <br>
                              <br>
						 <div class="col-md-12 text-center">
							<h2>Login</h2>
						 </div>
                   </div><label for="exampleInputEmail1"></label>
					</div><input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <div class="container">
        
                     </div><label for="exampleInputEmail1"></label>
                              <input type="password" name="senha" id="name" class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                         
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <br>
                           <br>
                           </div>
                           <div class="form-group">
                              <p class="text-center">Esqueceu sua senha? <a href="#" id="signup">Clique aqui</a></p>
                           </div>
                        </form>         
				</div>
			</div>                 
       </div>
	</div>
		</div>
               <?php
               include '../Model/classes/usuario.php';
               $usuario = new usuario();
               if(isset($_POST['email']))
               {
               $email = $_POST['email'];
               $senha = $_POST['senha'];
               //verificar se os campos estão todos preenchidos
                  if(!empty($email) && !empty($senha))
                  {
                     $usuario->conectar("assistenciatecnica", "localhost","root","vertrigo");
                     if($usuario->msgErro == "")
                     {
                        if($usuario->logar($email, $senha))
                        {
                           header("location: ../view/index.php");
                        }
                        else
                        {
                           ?>
                        <div class="msn-erro">
                           Usuário e/ou senha não estão corretos.
                        </div>
                        <?php
                        }
                     }
                     else{
                     ?>
                     <div class="msn-erro">
                        <?php
                     echo "erro: ". $usuario->msgErro;
                     ?>
                     </div>
                     <?php
                     }
                  }
                  else
                  {
                     ?>
                     <div class="msn-erro">
                     Preencha todos os campos.
                     </div>   
                     <?php
                  }
               }
               ?>
        </body>
        </html>