<?php require 'pages/header.php'; ?>
<div class="container">
	<h1>Cadastre-se</h1>
	<?php
        
	require 'classes/usuarios.class.php';
	$u = new Usuarios();
	if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
                $datacadastro = explode('/',addslashes($_POST['datacadastro']));               
                $datacadastro = $datacadastro[2].'-'.$datacadastro[1].'-'.$datacadastro[0];
	       	$senha = $_POST['senha'];
		

		if(!empty($nome) && !empty($email) && !empty($datacadastro) && !empty($senha)) {
			if($u->cadastrar($nome, $email, $datacadastro, $senha )) {
                         
				?>
                            
				<div class="alert alert-primary" role="alert">
					<strong>Parabéns!</strong> Cadastrado com sucesso.<a href="login.php" class="alert-link" >Faça o login Aqui agora</a>
				</div>
				<?php
			} else {
				?>
				<div class="alert alert-warning">
					Este usuário já existe! <a href="login.php" class="alert-link">Faça o login agora</a>
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-warning">
				Preencha todos os campos!
			</div>
			<?php
		}

	}
	?>
	<form method="POST">
		<div class="form-group">
                    <div>Faça o seu Cadastro, é simples mesmo, apenas nome, e-mail e senha e despois vc so preenche o seu anuncio</div><br/>
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" />
		</div>
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control" />
                      
		</div>
            
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control" />
		</div>
		<div class="form-group">
			<label for="datacadastro">Data do cadastro: <?php  echo date("d/m/Y H:i"); ?></label>
                        <input type="hidden" name="datacadastro" id="datacadastro" value="<?php  echo date("d/m/Y"); ?>" class="form-control" />
                       
		</div>
		<input type="submit" value="Cadastrar" class="btn btn-default" />
	</form>

</div>
<?php require 'pages/footer.php'; ?>