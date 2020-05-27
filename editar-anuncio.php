<?php require 'pages/header.php'; ?>
<?php
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}

require 'classes/anuncios.class.php';
$a = new Anuncios();

if(isset($_POST['estabelecimento']) && !empty($_POST['estabelecimento'])) {
	$estabelecimento = addslashes($_POST['estabelecimento']);
	$categoria = addslashes($_POST['categoria']);	  
	$descricao = addslashes($_POST['descricao']);
        $insta = addslashes($_POST['insta']);
        $what = addslashes($_POST['what']);      
        $cep = addslashes($_POST['cep']);
	$rua = addslashes($_POST['rua']);
	$numero = addslashes($_POST['numero']);
	$bairro = addslashes($_POST['bairro']);
	$cidade = addslashes($_POST['cidade']);
	$uf = addslashes($_POST['uf']);
	if(isset($_FILES['fotos'])) {
		$fotos = $_FILES['fotos'];
	} else {
		$fotos = array();
	}

	$a->editAnuncio($estabelecimento, $categoria, $descricao, $insta, $what, $cep, $rua,$numero,$bairro, $cidade, $uf, $fotos, $_GET['id']);

	?>
	<div class="alert alert-success">
		Anuncio editado com sucesso!
	</div>
	<?php
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$info = $a->getAnuncio($_GET['id']);
} else {
	?>
	<script type="text/javascript">window.location.href="meus-anuncios.php";</script>
	<?php
	exit;
}
?>
 <div class="container">
                <h1> Editar Anúncio</h1>

    <form method="POST" enctype="multipart/form-data">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                       <label for="categoria">Categoria:</label>
                                       <select name="categoria" id="categoria" class="form-control">
                                               <?php
                                               require 'classes/categorias.class.php';
                                               $c = new Categorias();
                                               $cats = $c->getLista();
                                               foreach($cats as $cat):
                                               ?>
                                               <option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria']==$cat['id'])?'selected="selected"':''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
                                               <?php
                                               endforeach;
                                               ?>
                                       </select>
                               </div>
                                 <div class="form-group col-md-6">
                                       <label for="estabelecimento">Titulo:</label>
                                       <input type="text" name="estabelecimento" id="estabelecimento" class="form-control" value="<?php echo $info['estabelecimento']; ?>" />
                               </div>
                                <div class="form-row">
                                       <div class="form-group col-md-6">
                                       <label for="insta">Instagram</label>
                                       <input name="insta" type="text" id="insta"  class="form-control" value="<?php echo $info['insta']; ?>"/>
                                       </div>

                                       <div class="form-group col-md-6">
                                       <label for="what">WhatsApp</label>
                                       <input name="what" type="text" id="what"  class="form-control" value="<?php echo $info['what']; ?>" />
                                       </div>

                               <div class="form-group col-md-12">
                                       <label for="descricao">Descrição:</label>
                                       <textarea class="form-control" name="descricao"><?php echo $info['descricao']; ?></textarea>
                               </div>
                               <div class="form-group col-md-2">
                                       <label for="cep">Cep</label>
                                       <input name="cep" type="text" id="cep"  size="10" maxlength="9" 
                                              onblur="pesquisacep(this.value);" class="form-control" value="<?php echo $info['cep']; ?>"/>
                                       </div>

                                       <div class="form-group col-md-8">
                                        <label for="rua">Endereço</label>
                                        <input name="rua" type="text" id="rua"   class="form-control" value="<?php echo $info['rua']; ?>"/>
                                       </div>

                                       <div class="form-group col-md-2">
                                       <label for="numero">Numero</label>
                                       <input name="numero" type="numero" id="numero"  class="form-control" value="<?php echo $info['numero']; ?>" required="required"/>
                                       </div>

                                       <div class="form-row">
                                       <div class="form-group col-md-4">
                                       <label for="bairro">Bairro</label>
                                       <input name="bairro" type="text" id="bairro"  class="form-control" value="<?php echo $info['bairro']; ?>"/>
                                       </div>

                                       <div class="form-row">
                                       <div class="form-group col-md-4">
                                       <label for="cidasde">cidade</label>
                                       <input name="cidade" type="text" id="cidade" size="10" class="form-control" value="<?php echo $info['cidade']; ?>"/>
                                       </div>

                                       <div class="form-group col-md-4">
                                       <label for="uf">Estado</label>
                                       <input name="uf" type="text" id="uf" size="10" class="form-control" value="<?php echo $info['uf']; ?>"/>
                                       </div>


                       <div class="form-group">
                            <label for="ibge"></label>
                            <input name="ibge" type="hidden" id="ibge" size="8" class="form-control"/><br/>			
                       <div class="form-group">
                                
                            <label for="add_foto">Fotos do anúncio:</label>
                            <input type="file" name="fotos[]" multiple /><br/>

                         <div class="panel panel-default">
                               <div class="panel-heading">Fotos do Anúncio</div>
                               <div class="panel-body">
                               <?php foreach($info['fotos'] as $foto): ?>
                                       <div class="foto_item">
                                       <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0" /><br/>
                                       <a href="excluir-foto.php?id=<?php echo $foto['id']; ?>" class="btn btn-default">Excluir Imagem</a>
                                       </div>
                               <?php endforeach; ?>
                               </div>
                         </div>
                         </div>                               
                  <button type="submit" class="btn btn-primary">Salvar</button>
     </form>

                      </div>
 </div>
<?php require 'pages/footer.php'; ?>