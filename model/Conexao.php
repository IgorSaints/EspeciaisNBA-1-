<?php
//adaptar todos os campos
class Conexao{


    public static function delete($tabela, $id){
        $sql= "DELETE FROM $tabela WHERE id=$id";
        self::getConexao()->exec($sql);
    }

    public static function update($tabela, $valores, $id){
        $sql = "UPDATE $tabela SET $valores WHERE id=$id;";
        $resource = Conexao::getConexao()
        ->prepare($sql);
        $resource->execute();
    }
    public static function selectById($tabela, $projecao, $id){
        $sql = "SELECT $projecao FROM $tabela WHERE id= $id;";
        $resource = Conexao::getConexao()
        ->prepare($sql);
        $resource->execute();
        return $resource->fetchAll();
    }
    public static function select($tabela, $projecao){
        $sql = "SELECT $projecao FROM $tabela;";
        $resource = Conexao::getConexao()
        ->prepare($sql);
        $resource->execute();
        return $resource->fetchAll();
    }
    
    public static function insert($tabela, $parametros, $valores){
        $sql = "INSERT INTO ".$tabela." (".
            $parametros.") VALUES (".$valores.");";
        var_dump($sql);
        self::getConexao()->exec($sql);
        echo $sql;
    }


    private static function getConexao(){
        try{
            $conexao = new PDO(
                "pgsql:host=ec2-3-231-253-230.compute-1.amazonaws.com
                ;port=5432;dbname=d3lns6q0tlf6o9", "ihbvshzzcnosem", "7661be933a0c1b0cbcd36d4332ff3ddd12319bb3e9854b1c7e0b2cbebdb389eb"
            );
            $conexao->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
    
            return $conexao;
        }
        catch(PDOException $e){
            echo "Deu erro: " . $e->getMessage();
        }
    }
}
?>