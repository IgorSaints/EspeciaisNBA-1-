<?php
require_once "Conexao.php";
class Detalhes{
    private $id;
    private $nomeTime;
    private $anoDLanc;
    private $estrelaQUsou;
    private $jogoM;
    private $numero;
    private $imagem = array("nome"=>"","tipo"=>"","pasta"=>"");

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function getnomeTime(){
        return $this->nomeTime;
    }

    public function setnomeTime($nomeTime){
        $this->nomeTime = $nomeTime;
        return $this;
    }
    public function getAnoDLanc(){
        return $this->anoDLanc;
    }

    public function setAnoDLanc($anoDLanc){
        $this->anoDLanc = $anoDLanc;
        return $this;
    }
    public function getEstrelaQUsou(){
        return $this->estrelaQUsou;
    }

    public function setEstrelaQUsou($estrelaQUsou){
        $this->estrelaQUsou = $estrelaQUsou;
        return $this;
    }
    public function getJogoM(){
        return $this->jogoM;
    }

    public function setJogoM($jogoM){
        $this->jogoM = $jogoM;
        return $this;
    }
    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
        return $this;
    }
    public function getImagem(){
        return $this->imagem;
    }
    public function getImagemRota(){
        return $this->imagem["pasta"];
    }
    public function getImagemNome(){
        return $this->imagem["nome"];
    }
    public function setImagem($nome,$tipo,$pasta){
       
        $this->imagem['nome']=$nome;
        $this->imagem['tipo']=$tipo;
        $this->imagem['pasta']=$pasta;

        return $this;
    }


    public function salvar(){
        $tabela = "itens";
        $parametros = "nometime, anoDLanc, estrelaQUsou, jogoM, numero, imagem"; 
        $valores = "'".$this->nomeTime."', ".
        $this->anoDLanc.", '".$this->estrelaQUsou."', '".
        $this->jogoM."', ".
        $this->numero.", '".
        $this->imagem["pasta"]."'";
        Conexao::insert($tabela, $parametros,
        $valores);
    }

    public static function listarTodos(){
        $tabela = "itens";
        $parametros = "id, nometime, anodlanc, estrelaqusou, jogom, numero, imagem";
        $dados = Conexao::select($tabela, $parametros);
        $detalhes = [];
        foreach($dados as $d){
            $b = new Detalhes();
            $b->id = $d["id"];
            $b->nomeTime = $d["nometime"];
            $b->anoDLanc = $d["anodlanc"];
            $b->estrelaQUsou = $d["estrelaqusou"];
            $b->jogoM = $d["jogom"];
            $b->numero = $d["numero"];
            $b->imagem["pasta"]=$d["imagem"];
            $detalhes[] = $b;
        }

        return $detalhes;
    }

    public static function getPorId($id){
        $tabela = "itens";
        $parametros = "id, nometime, anodlanc, estrelaqusou, jogom, numero, imagem";
        $dados = Conexao::selectById($tabela, $parametros, $id);
        foreach($dados as $d){
            $b = new Detalhes();
            $b->id = $d["id"];
            $b->nomeTime = $d["nometime"];
            $b->anoDLanc = $d["anodlanc"];
            $b->estrelaQUsou = $d["estrelaqusou"];
            $b->jogoM = $d["jogom"];
            $b->numero = $d["numero"];
            $b->imagem= $d["imagem"] ;
            return $b;
        }

        return null;
    }
    public static function deletar($id){
        Conexao::delete("itens", "$id"); 
    }
    public function editar(){
        $tabela = "itens"; 
        $parametros = "nometime='".$this->nomeTime."', anoDLanc='".$this->anoDLanc."',
        estrelaQUsou='".$this->estrelaQUsou."', jogoM='".$this->jogoM."', numero='".$this->numero."',
        imagem='".$this->imagem."'";

        Conexao::update($tabela, $parametros,
        $this->id);
    }

}

