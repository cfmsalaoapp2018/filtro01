<?php
require 'pages/header.php';

if(!empty($_GET['token'])) {
	$token = $_GET['token'];

	$sql = "SELECT * FROM usuarios_token WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":hash", $token);
	$sql->execute();

	if($sql->rowCount() > 0) {
		$sql = $sql->fetch();
		$id = $sql['id_usuario'];

		if(!empty($_POST['senha'])) {
			$senha = $_POST['senha'];

			$sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":id", $id);
			$sql->execute();

			$sql = "UPDATE usuarios_token SET used = 1 WHERE hash = :hash";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(":hash", $token);
			$sql->execute();

			echo "Senha alterada com sucesso!";
			exit;
		}

		?>
		<form method="POST">
                    <div class="row">
                      <div class="col">      
                      </div>
                        <div class="form-group col"> 
                                          <label for="senha"><h3>Digite sua Nova Senha.</h3></label>
                                          <input type="password" name="senha" id="senha" class="form-control" /><br/>
                                          <input type="submit"  class="btn btn-success" value="Enviar"/>
                                  </div>
                        <div class="col">      
                        </div>
                    </div>
                </form>
		<?php



	} else {
		echo "Token inválido ou usado!";
		exit;
	}
}
require 'pages/footer.php';

?>
