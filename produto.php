<?php require 'pages/header.php'; ?>
<?php
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
$a = new Anuncios();
$u = new Usuarios();

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);
} else {
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
	exit;
}

$info = $a->getAnuncio($id);
?>

        
        
      <div class="container-fluid">
	  <div class="row">
	      <div class="col-sm-6">
                   <div class="panel panel-default">
                               <div class="panel-heading">Fotos do Anúncio</div>
                               <div class="panel-body">
                               <?php foreach($info['fotos'] as $foto): ?>
                                       <div class="foto_item">
                                       <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0" /><br/>
                                       
                                       </div>
                               <?php endforeach; ?>
                               </div>
                         </div>
                  
                           
             </div>    
    		<div class="col-sm-4">
			<h1><?php echo $info['estabelecimento']; ?></h1>
			<h3>Tipo:<?php echo utf8_encode($info['categoria']); ?></h3>
			<p>Descrição<?php echo $info['descricao']; ?></p>
			<br/>
                        <h3>instagram:<a href="https://www.instagram.com/<?php echo $info['insta']; ?>/" >Instagram</a></h3>                        
                        <h4>Telefone:<a href="https://api.whatsapp.com/send?phone=55<?php echo $info['what']; ?>" target="_trank">whatsapp</a></h4>
                        <br/>
                        <h6>Endereço:<?php echo $info['rua']; ?>,<?php echo $info['numero']; ?></h6>                     
			<h6>Bairro: <?php echo $info['bairro']; ?></h6>
                        <h6>Cidade:<?php echo $info['cidade']; ?></h6>                        
	       </div>
	</div>
          
    </div>

<?php require 'pages/footer.php'; ?>