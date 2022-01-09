<?php 
require_once "model/Detalhes.php";

if(isset($_GET["id"])){
    $detalhe = Detalhes::getPorId($_GET["id"]);
    //print_r($bebida);
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>EspeciaisNBA</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
	 crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
	</script>

	<link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script src="js/scriptjs.js"></script>
</head>
<body class="bg-body-image text-light">
	<div id="header"></div>

  <main class="container p-4 p-md-8">
		
<?php
        $detalhes = detalhes::listarTodos();
        //print_r($bebidas);
        foreach($detalhes as $b):
    ?>
    
    <table class="table table-dark">
  <thead class="text-center bg-success">
    <tr>
      <div class="container ">
        <div class="row">
      <th scope="col" class="col-lg-2">Time</th>
      <th scope="col" class="col-lg-2">Ano de Lançamento</th>
      <th scope="col" class="col-lg-3">Estrela que Usou</th>
      <th scope="col" class="col-lg-3">Jogo Marcante</th>
      <th scope="col" >Número</th>
      <th scope="col">Imagem</th>
    </div>
    </div>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center">
      <td><?php echo $b->getNomeTime(); ?></td>
      <td><?= $b->getAnoDLanc(); ?></td>
      <td><?= $b->getEstrelaQUsou(); ?></td>
      <td><?= $b->getJogoM(); ?></td>
      <td><?= $b->getNumero(); ?></td>
      <td><figure class="mx-auto text-center">
                <img src="<?= $b->getImagemRota(); ?>" alt="Imagem do item" width="100%" style="min-width:88px;">
              </figure></td>
      
    </tr>
  </tbody>
</table>

<a href="index.php?id=<?= $b->getId(); ?>"
    class="card-link">
    Editar
</a>
<a href="ws/Apagar.php?id=<?= $b->getId(); ?>"
    class="card-link" onclick ="conf(this);">
    Deletar
</a>
        </div>
    </div>
     <?php 
   endforeach;
   ?>

    </main> 
    <div class="bg_img m-3">
    <a class="plano_de_fundo" title="View the photo by Jason Leung" href="https://unsplash.com/photos/nM2WEy42Npg">Photo of background</a> by 
    <span class="img_JL">
    <a class="fotografo" href="https://unsplash.com/@ninjason">Jason Leung</a>
    </span>
  </div>

  <div id="footer"></div>
  </body>
</html>