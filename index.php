<?php
require_once "model/Detalhes.php";

if(isset($_GET["id"])){
    $detalhe = Detalhes::getPorId($_GET["id"]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>EspeciaisNBA</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
	 crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
	</script>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js">
	</script>

	<script src="js/scriptjs.js">
	</script>
</head>

<body class="bg-body-image text-light">
	<div id="header"></div>
	<main class="container">
		<div class="form-st p-4 p-md-5 container">

			<form onsubmit="validation(event, this)" action="ws/Salvar.php" class="w-100" id="form-login" target="_parent" method="POST" enctype="multipart/form-data">

				<fieldset class="fild_ie border p-3">
					<legend class="w-auto">Item Especial</legend>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="time">Time</label>
              <input type="text" class="form-control" id="time" name="time" placeholder="Exemplo: Lakers" autofocus maxlength="100" minlength="3" required value="<?= 
              isset($detalhe) ? $detalhe->getNomeTime() : ''; ?>">
             
            </div>
            <div class="form-group col-md-6">
              <label for="anoDLanc">Ano de lançamento</label>
              <input type="number" name="anoDLanc" min="1946" max="2030" placeholder="Exemplo: 2017" step="1" class="form-control" id="anoDLanc" required value="<?= 
              isset($detalhe) ? $detalhe->getAnoDLanc() : ''; ?>">
            </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="estrelaQUsou">Estrela que usou</label>
            <input type="text" class="form-control" name="estrelaQUsou" id="estrelaQUsou" placeholder="Exem: LeBron James" maxlength="50" minlength="1" required value="<?= 
              isset($detalhe) ? $detalhe->getEstrelaQUsou() : ''; ?>">
         
          </div>
          <div class="form-group col-md-6">
            <label for="jogoM">Jogo marcante</label>
            <input type="text" class="form-control" name="jogoM" id="jogoM" placeholder="Exem: Lakers x Miame Heat, 19/20" maxlength="100" minlength="5" required value="<?= 
              isset($detalhe) ? $detalhe->getJogoM() : ''; ?>">
            
          </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="numero">Número</label>
              <input type="text" class="form-control" name="numero" id="numero" placeholder="Exem: 23" maxlength="2" minlength="1" required value="<?= 
              isset($detalhe) ? $detalhe->getNumero() : ''; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="imagem">Adicione uma imagem</label>
              <input type="file" class=" form-control" name="imagem" id="imagem" required value="<?= 
              isset($detalhe) ? $detalhe->getImagem() : ''; ?>">
            </div>
          </div>
          <div class="botoes pt-3">
          <input type="hidden" name="id" value="<?= isset($detalhe)? $detalhe->getId() : '';?>">
            <input class="login btn btn-success" type="submit" name="send" id="send" value="Enviar" data-toggle="modal" data-target="#modal-mensagem" onclick="abrePopup()">
            <input class="cancelar btn btn-danger"  type ="button" value="Cancelar">
          </div>
          </fieldset>
          
          <div class="modal fade" id="modal-mensagem">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <h4 class="modal-title">Sucesso!!!</h4>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body btn-dark" id="getCode">
                <p>Item cadastrado com sucesso!</p>
            </div>
        </div>
    </div>
</div>
        </form>
      </div>

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