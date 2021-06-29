<?php
/**
 * Classe responsável por obter, inserir e deletar os dados presentes no banco de dados.
 */

class Sql extends PDO
{
    private $conn;

    /**
     * Método responsável por conectar o sistema ao banco de dados.
     */
    public function __construct()
    {
        $this->conn = new PDO("mysql:dbname=id17044767_nutri;host=localhost", "root", "");
    }
    //id17044767_root - usuario
    //6&6xqgE3Ho9s_m@T - senha
    
    /**
     * Método automatiza o processo de definição dos parâmetros através do método setParam.
     *
     *@param string $statment Comando sql.
     *@param array $parameters Array de dados que serão utilizados na solicitação.
     */
    private function setParams($statment, $parameters = array())
    {
        foreach ($parameters as $key => $value) {
            $this->setParam($statment, $key, $value);
        }
    }

    /**
     * Método que define e configura cada um dos dados passados ao statment.
     * @param string $statment Comando sql.
     * @param string $key Nome do campo.
     * @param string $value Valor do campo.
     */
    private function setParam($statment, $key, $value)
    {
        $statment->bindParam($key, $value);
    }


    /**
     * Método que executa a solicitação ao banco e retorna seu resultado.
     * @param string $rawsolquery Comando sql bruto.
     * @param array $params Array de dados a serem utilizados na solicitação.
     */
    public function solquery($rawsolquery, $params = array()){

        //linha do prepare
        $stmt = $this->conn->prepare($rawsolquery);

        //configurando os parâmetros utilizando a outra função
        $this->setParams($stmt, $params);

        //executa e retorna  a execução
        $stmt->execute();

        return $stmt;
    }


    /**
     * Método utilizado quando uma solicitação de select é feita ao banco. Diferente do método solquery, este retorna os valores de maneira associativa.
     * @param string $rawsolquery Comando sql bruto.
     * @param array $params Array de dados a serem utilizados na solicitação.
     */
    public function select($rawsolquery, $params = array()): array
    {
        $stmt = $this->solquery($rawsolquery, $params);
        //retorna os dados coletados 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
