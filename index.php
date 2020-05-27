<?php require 'pages/header.php'; ?>
<?php
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
require 'classes/categorias.class.php';
require 'classes/pesquisa.class.php';
$a = new Anuncios();
$u = new Usuarios();
$c = new Categorias();
$pe = new Pesquisa();
$filtros = array(
	'categoria' => '',
	'anuncios' => ''
        
        
);
if(isset($_GET['filtros'])) {
	$filtros = $_GET['filtros'];
}

$total_anuncios = $a->getTotalAnuncios($filtros);
$total_usuarios = $u->getTotalUsuarios();

$p = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {
	$p = addslashes($_GET['p']);
}

$por_pagina = 10;
$total_paginas = ceil($total_anuncios / $por_pagina);

$anuncios = $a->getUltimosAnuncios($p, $por_pagina, $filtros);
$categorias = $c->getLista();
$pesquisab = $pe->getListaPesquisaBairro();
$pesquisac = $pe->getListaPesquisaCidade();
$pesquisauf = $pe->getListaPesquisauf();
?>

<div class="container-fluid">
	<div class="jumbotron">
            <h4>Seja bem Vindos</h4> 
            <h6>Cadastre o seu o Salão.</h6>
            <h6>É Gratuito.</h6>
		
		
	</div>

	<div class="row">
		<div class="col-sm-3">
			<h4>Pesquisa Avançada</h4>
			<form method="GET">
				<div class="form-group">
					<label for="categoria">Categoria:</label>
					<select id="categoria" name="filtros[categoria]" class="form-control">
						<option></option>
						<?php foreach($categorias as $cat): ?>
						<option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id']==$filtros['categoria'])?'selected="selected"':''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="anuncios">Estado</label>
					<select id="anuncios" name="filtros[anuncios]" class="form-control">
						<option></option>
						<?php foreach($pesquisauf as $estado): ?>
						<option value="<?php echo $estado['uf']; ?>" <?php echo ($estado['uf']==$filtros['anuncios'])?'selected="selected"':''; ?>><?php echo utf8_encode($estado['uf']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
                                    <label for="anuncios">Cidade</label>
					<select id="categoria" name="filtros[anuncios]" class="form-control">
						<option></option>
						<?php foreach($pesquisac as $estado): ?>
						<option value="<?php echo $estado['cidade']; ?>" <?php echo ($estado['cidade']==$filtros['anuncios'])?'selected="selected"':''; ?>><?php echo utf8_encode($estado['cidade']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					 <label for="anuncios">Bairro</label>
					<select id="categoria" name="filtros[anuncios]" class="form-control">
						<option></option>
						<?php foreach($pesquisab as $estado): ?>
						<option value="<?php echo $estado['bairro']; ?>" <?php echo ($estado['bairro']==$filtros['anuncios'])?'selected="selected"':''; ?>><?php echo utf8_encode($estado['bairro']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Buscar" />
				</div>
			</form>

		</div>
		<div class="col-sm-9">
			<h4>Últimos Anúncios</h4>
			<table class="table table-striped">
				<tbody>
					<?php foreach($anuncios as $anuncio): ?>
					<tr>
						<td>
							<?php if(!empty($anuncio['url'])): ?>
							<img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" border="0" />
							<?php else: ?>
							<img src="assets/images/default.jpg" height="50" border="0" />
							<?php endif; ?>
						</td>
						<td>
							<a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['estabelecimento']; ?></a><br/>
							<?php echo utf8_encode($anuncio['categoria']); ?>
						</td>
						<td> <?php echo $anuncio['descricao']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<ul class="pagination">
				<?php for($q=1;$q<=$total_paginas;$q++): ?>
				<li class="<?php echo ($p==$q)?'active':''; ?>"><a href="index.php?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
				<?php endfor; ?>
			</ul>
		</div>
	</div>


</div>

<?php require 'pages/footer.php'; ?>