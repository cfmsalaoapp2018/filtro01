
<?php
require 'pages/header.php';
if(!empty($_POST['email'])) {

	$email = $_POST['email'];

	$sql = "SELECT * FROM usuarios WHERE email = :email";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":email", $email);
	$sql->execute();

	if($sql->rowCount() > 0) {

		$sql = $sql->fetch();
		$id = $sql['id'];

		$token = md5(time().rand(0, 99999).rand(0, 99999));

		$sql = "INSERT INTO usuarios_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_usuario", $id);
		$sql->bindValue(":hash", $token);
		$sql->bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+2 months')));
		$sql->execute();

		$link = "https://salaoaberto.com.br/redefinir.php?token=".$token;

		$mensagem = "Clique no link para redefinir sua senha:<br/>".$link;

		$assunto = "Redefinição de senha";

		$headers = 'From: recuperarsenha@salaoaberto.com.br'."\r\n" .
				   'X-Mailer: PHP/'.phpversion();

		mail($email, $assunto, $mensagem, $headers);
                $aviso = "Confira sua Caixa de E-mail";
                ?>

                
              <div class="row">
                <div class="col">      
                </div>
                  <div class="form-group col"> <h3><?php echo $aviso; ?>.</h3>

                            </div>
                  <div class="col">      
                </div>
              </div>
                <?PHP
		echo 
		exit;

	}

}

?>
<form method="POST">
  <div class="row">
    <div class="col">      
    </div>
      <div class="form-group col"> <h3>Para recuperar sua senha.</h3>
			<label for="email">Digite o seu e-mail:</label>
			<input type="email" name="email" id="email" class="form-control" /><br/>
                        <input type="submit"  class="btn btn-success" value="Enviar"/>
		</div>
      <div class="col">      
    </div>
  </div>
</form>
<?php require 'pages/footer.php'; ?>