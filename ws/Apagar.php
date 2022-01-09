<?php
//require_once; da pagina que vai ta com os objetos, gets e sets e adaptar os campos
require_once "../model/Detalhes.php";
echo $_GET["id"];
Detalhes::deletar($_GET["id"]);

header("Location: ../index.php?msg=Item deletado");


