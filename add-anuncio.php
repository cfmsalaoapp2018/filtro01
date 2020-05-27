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

	$a->addAnuncio($estabelecimento, $categoria,$descricao, $insta, $what, $cep, $rua, $numero, $bairro, $cidade, $uf);

	?>
	<div class="alert alert-success">
		Produto adicionado com sucesso!
	</div>
	<?php
}
?>
<div class="container">
	<h4>Adicione o seu  Anúncio</h4><br/> preencha todos os campos  e salve, lembre-se são essas informaçoes que vao aparecer para seus clientes.<br/><br/>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
<form method="POST" enctype="multipart/form-data">
    
   <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="categoria">categoria</label>
                        <select name="categoria" id="categoria" class="form-control">
				<?php
				require 'classes/categorias.class.php';
				$c = new Categorias();
				$cats = $c->getLista();
				foreach($cats as $cat):
				?>
				<option value="<?php echo $cat['id']; ?>"><?php echo utf8_encode($cat['nome']); ?></option>
				<?php
				endforeach;
				?>
			</select>
                        </div>

                       
	
                      <div class="form-group col-md-6">
			<label for="estabelecimento"> Nome do Estabelecimento:</label>
			<input type="text" name="estabelecimento" id="estabelecimento" class="form-control" />
                        </div>
                        

                        <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="insta">Instagram@</label>
                        <input name="insta" type="text" id="insta"  class="form-control" placeholder="seuNomenoInstragram  ( sem => @)"/>
                        </div>

                        <div class="form-group col-md-6">
                        <label for="what">WhatsApp</label>
                        <input name="what" type="text" id="what"  class="form-control" placeholder="31 9 9999-9999" />
                        </div>
                         
        
                       <div class="form-group col-md-12">
			<label for="descricao">Atribuiçoes do Salao ( escreva as atividade do salão)Obs:. não use tag, o site ja é programado para fazer tudo isso.</label>
			<textarea class="form-control" name="descricao" size="40"></textarea>
                        </div>
	
            
            	 	 
			  
                        <div class="form-group col-md-2">
                        <label for="cep">Cep ( automatico )</label>
                        <input name="cep" type="text" id="cep"  size="10" maxlength="9" 
                               onblur="pesquisacep(this.value);" class="form-control" />
                        </div>

                        <div class="form-group col-md-8">
                         <label for="rua">Endereço</label>
                         <input name="rua" type="text" id="rua"   class="form-control"/>
                        </div>

                        <div class="form-group col-md-2">
                        <label for="numero">Numero</label>
                        <input name="numero" type="numero" id="numero"  class="form-control" required="required"/>
                        </div>
                            
                             <div class="form-group col-md-2">
                        <label for="bairro">Bairro</label>
                        <input name="bairro" type="text" id="bairro" class="form-control" />
                        </div>

                        <div class="form-group col-md-8">
                         <label for="cidade">Cidade</label>
                         <input name="cidade" type="text" id="cidade"   class="form-control"/>
                        </div>

                        <div class="form-group col-md-2">
                        <label for="uf">Estado</label>
                        <input name="uf" type="text" id="uf"  class="form-control" required="required"/>
                        </div>

                      

                                <div class="form-group">
                                <label for="ibge"></label>
                                <input name="ibge" type="hidden" id="ibge" class="form-control"/>
                                </div>
                        </div>

       <input type="submit" value="Adicionar" class="btn btn-primary" /><br/><br/>   Depois de salver vai ate o local de Editar o anuncio e edite adicionando fotos.
                                   
 </form>
</div>
                                <div class="col-md-1"></div>
</div>
<?php require 'pages/footer.php'; ?>