<pre>
<?php
require_once "../model/Detalhes.php";

    print_r($_POST);
    var_dump($_FILES);
    var_dump($_POST);

    $novoDetalhe = new Detalhes();
    $novoDetalhe->setNomeTime($_POST["nometime"]);
    $novoDetalhe->setAnoDLanc($_POST["anoDLanc"]);
    $novoDetalhe->setEstrelaQUsou($_POST["estrelaQUsou"]);
    $novoDetalhe->setJogoM($_POST["jogoM"]);
    $novoDetalhe->setNumero($_POST["numero"]);
    


if(isset($_FILES['imagem']['error'])){
    echo "Deu ruim";
}else{

    if($_FILES["imagem"]["size"]<=33554432){
        
        $pasta = "../fotos/";
        $nome = uniqid();
        $extensao = strtolower(pathinfo($_FILES["imagem"]["name"],PATHINFO_EXTENSION));
        $rota = $pasta . $nome .".".$extensao;
        if(!$extensao == "jpeg" && !$extensao == "png"){
            echo "tipo de arquivo diferente de .png ou .jpeg";
        }else{
            $funcionou = move_uploaded_file($_FILES['imagem']['tmp_name'],$rota);
            if($funcionou == false){
                echo "ERROR";
            }else{
                
                $novoDetalhe->setimagem($nome,$extensao,$rota);
                
            }
            
        }
        var_dump($_FILES['imagem']);
    }else{
        echo "arquivo de foto muito grande - Max: 32MB";
    }
}

 $novoDetalhe->setId($_POST["id"]);

    var_dump($novoDetalhe);
    print_r($novoDetalhe);
    
    if($novoDetalhe->getId() == ""){
        $novoDetalhe->salvar();
    }
    else{
        $novoDetalhe->editar();
    }
    header("Location: ../catalogo.php");
    ?>
</pre>