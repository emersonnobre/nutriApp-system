<?php

/**
 * Classe responsável por manipular e executar funcionalidades relativas aos alimentos cadastrados no banco de dados.
 */
class Alimento
{

    private $nome;
    private $codigo;
    private $qtdGorduras;
    private $qtdCarboidratos;
    private $qtdProteinas;
    private $qtdCalorias;

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($value)
    {
        $this->nome = $value;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($value)
    {
        $this->codigo = $value;
    }

    public function getQtdGorduras()
    {
        return $this->qtdGorduras;
    }
    public function setQtdGorduras($value)
    {
        $this->qtdGorduras = $value;
    }

    public function getQtdCarboidratos()
    {
        return $this->qtdCarboidratos;
    }
    public function setQtdCarboidratos($value)
    {
        $this->qtdCarboidratos = $value;
    }

    public function getQtdProteinas()
    {
        return $this->qtdProteinas;
    }
    public function setQtdProteinas($value)
    {
        $this->qtdProteinas = $value;
    }

    public function getQtdCalorias()
    {
        return $this->qtdCalorias;
    }
    public function setQtdCalorias($value)
    {
        $this->qtdCalorias = $value;
    }

    /**
     * Atribui valores aos atributos do objeto.
     * @param array $data valores a serem atribuidos.
     */
    public function setData($data)
    {
        $row = $data[0];

        $this->setCodigo($row['id']);
        $this->setNome($row['nome']);
        $this->setQtdGorduras($row['gorduras']);
        $this->setQtdCarboidratos($row['carboidratos']);
        $this->setQtdProteinas($row['proteinas']);
        $this->setQtdCalorias($row['calorias']);
    }

    /**
     * Busca um alimento no banco de dados através do seu id e atribui seus valores ao objeto.
     * @param integer $codigo id do alimento.
     */
    public function loadbyId($codigo)
    {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM alimentos WHERE id=:ID", array(
            ":ID" => $codigo
        ));
        if (count($results) > 0) {
            $this->setData($results);
        }
    }

    /**
     * Busca um alimento no banco de dados através do seu nome e atribui seus valores ao objeto.
     * @param string $nome nome do alimento.
     */
    public function loadbyName($nome)
    {
        $sql = new Sql();
        $ids = $sql->select("
        select id from alimentos where 
        nome = :NOME
        ", array(
            ':NOME' => $nome
        ));

        foreach ($ids as $id) {
            foreach ($id as $key => $value) {
                $this->loadbyId($value);
            }
        }
    }

    /**
     * Retorna um array com o nome de todos os alimentos contidos no banco de dados.
     * @return array lista dos nomes dos alimentos.
     */
    public static function list()
    {
        $sql = new Sql();
        return $sql->select("select nome from alimentos");
    }

    /**
     * Verifica se um alimento existe no banco de dados.
     * @param string $nome nome do alimento.
     * @return int retorna 1 caso o alimento exista e 0 caso não.
     */
    public static function validaAlimento($nome)
    {
        $sql = new Sql();
        $results = $sql->select("select nome from alimentos where lower(nome) = :NOME", array(
            ':NOME' => strtolower($nome)
        ));
        if (count($results) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Insere um novo alimento no banco de dados.
     * @param string $nome nome do alimento.
     * @param float $carb carboidratos/grama do alimento.
     * @param float $cal calorias/grama do alimento.
     * @param float $prot proteinas/grama do alimento.
     * @param float $gord gorduras/grama do alimento.
     */
    public static function insereAlimento($nome, $cal, $carb, $prot, $gord)
    {
        $sql = new Sql();
        $sql->solquery("
        insert into alimentos (nome, calorias, proteinas, carboidratos, gorduras) values 
        (:NOME, :CAL, :PROT, :CARB, :GORD)
        ", array(
            ':NOME' => $nome,
            ':CAL' => $cal,
            ':PROT' => $prot,
            ':CARB' => $carb,
            ':GORD' => $gord
        ));
    }

    /**
     * Delete um alimento do banco de dados.
     * @param string $name name do alimento.
     */
    public static function removerAlimentoDoBanco($name)
    {
        $sql = new Sql();
        $sql->solquery("
        delete from alimentos_consumidos, alimentos where
        alimentos_consumidos.id_alimento = alimentos.id and
        alimentos.nome = :NOME
        ", array(
            ':NOME' => $name
        ));

        $sql->solquery("
        delete from tb_refeicoes_alimentos, alimentos where
        tb_refeicoes_alimentos.id_alimento = alimentos.id and
        alimentos.nome = :NOME
        ", array(
            ':NOME' => $name
        ));

        $sql->solquery("
        delete from alimentos where
        alimentos.nome = :NOME
        ", array(
            ':NOME' => $name
        ));
    }

    /**
     * Retorna todos os alimentos presentes em uma especifica refeicao de um especifico paciente.
     * @param string $ref refeicao desejada para consulta.
     * @param int $id id do paciente.
     * @return array $results alimentos encontrados.
     */
    public static function alimentosPlano($id, $ref)
    {
        $sql = new Sql();
        $results = $sql->select("
        select alimentos.nome from 
        alimentos, pacientes, tb_refeicoes, tb_planos, tb_planos_refeicoes, tb_refeicoes_alimentos where
        tb_refeicoes_alimentos.id_alimento = alimentos.id and
        tb_refeicoes_alimentos.id_refeicao = tb_refeicoes.id and
        tb_refeicoes_alimentos.id_plano = tb_planos.id and
        tb_planos_refeicoes.id_plano = tb_planos.id and
        tb_planos_refeicoes.id_refeicao = tb_refeicoes.id and
        tb_planos.id_paciente = pacientes.id and
        pacientes. id = :ID AND
        tb_refeicoes.nome = :REF
        ", array(
            ':REF' => $ref,
            ':ID' => $id
        ));

        return $results;
    }

    /**
     * Insere um alimento consumido pelo paciente no banco de dados.
     * @param string $data data do dia do consumo.
     * @param integer $idpaciente id do paciente.
     * @param integer $idrefeicao id da refeicao.
     * @param integer $qtd quantidade consumida.
     */
    public function inserirAlimentoConsumido($idpaciente, $data, $idrefeicao, $qtd)
    {
        $sql = new Sql();

        $results = $this->validarAlimentoConsumido($idpaciente, $data, $idrefeicao);

        if (count($results) > 0) {
            $sql->solquery("
            update alimentos_consumidos set quantidade = quantidade + :QUANT where
            id_alimento = :IDAL and
            id_refeicao = :IDRE and
            id_paciente = :IDPA and
            data = :DATA
            ", array(
                ':IDAL' => $this->getCodigo(),
                ':IDRE' => $idrefeicao,
                ':IDPA' => $idpaciente,
                ':DATA' => $data,
                ':QUANT' => $qtd
            ));
        } else {
            $sql->solquery("
            insert into alimentos_consumidos (id_alimento, id_paciente, data, id_refeicao, quantidade) values
            (:IDALIMENTO, :IDPACIENTE, :DATA, :IDREF, :QTD)
            ", array(
                ':IDALIMENTO' => $this->getCodigo(),
                ':IDPACIENTE' => $idpaciente,
                ':DATA' => $data,
                ':IDREF' => $idrefeicao,
                ':QTD' => $qtd
            ));
        }
    }

    /**
     * Deleta um alimento consumido pelo paciente do banco de dados.
     * @param string $data data do dia do consumo.
     * @param integer $idpaciente id do paciente.
     * @param integer $idrefeicao id da refeicao.
     */
    public function excluirAlimentoConsumido($idpaciente, $idrefeicao, $data)
    {
        $sql = new Sql();
        $sql->solquery("
        delete from alimentos_consumidos where
        id_paciente = :IDPA and
        id_refeicao = :IDRE and
        id_alimento = :IDAL and
        data = :DATA
        ", array(
            ':IDPA' => $idpaciente,
            ':IDRE' => $idrefeicao,
            ':IDAL' => $this->getCodigo(),
            ':DATA' => $data
        ));
    }

    /**
     * Atualiza a quantidade consumida de um alimento.
     * @param string $data data do dia do consumo.
     * @param integer $idpaciente id do paciente.
     * @param integer $idrefeicao id da refeicao.
     * @param integer $qtd nova quantidade.
     */
    public function atualizarAlimentoConsumido($idpaciente, $idrefeicao, $data, $qtd)
    {
        $sql = new Sql();
        $sql->solquery("
        update alimentos_consumidos set quantidade = :QTD where
        id_paciente = :IDPA and
        id_refeicao = :IDRE and
        id_alimento = :IDAL and 
        data = :DATA
        ", array(
            ':QTD' => $qtd,
            ':IDPA' => $idpaciente,
            ':IDRE' => $idrefeicao,
            ':IDAL' => $this->getCodigo(),
            ':DATA' => $data
        ));
    }

    /**
     * Verifica se o alimento consumido a ser inserido ja foi registrado no banco.
     * @param string $data data do dia do consumo.
     * @param integer $idpaciente id do paciente.
     * @param integer $idrefeicao id da refeicao.
     * @return array $results array com os resultados encontrados.
     */
    private function validarAlimentoConsumido($idpaciente, $data, $idrefeicao)
    {
        $sql = new Sql();
        $results = $sql->select("
        select * from alimentos_consumidos where
        id_alimento = :IDAL and
        id_refeicao = :IDRE and
        id_paciente = :IDPA and
        data = :DATA
        ", array(
            ':IDAL' => $this->getCodigo(),
            ':IDRE' => $idrefeicao,
            ':IDPA' => $idpaciente,
            ':DATA' => $data
        ));

        return $results;
    }


    public function __toString()
    {
        return json_encode(array(
            "codigo" => $this->getCodigo(),
            "nome" => $this->getNome(),
            "qtdGorduras" => $this->getQtdGorduras(),
            "qtdCarboidratos" => $this->getQtdCarboidratos(),
            "qtdProteinas" => $this->getQtdProteinas(),
            "qtdCalorias" => $this->getQtdCalorias()
        ));
    }

    /**
     * Retorna a quantidade ingerida de um alimento consumido pelo paciente.
     * @param string $data data do dia do consumo.
     * @param integer $idpaciente id do paciente.
     * @param integer $idrefeicao id da refeicao.
     * @param string $nomealimento nome do alimento.
     * @return array $quantidade array com um unico indice contendo a quantidade encontrada.
     */
    public static function returnQuantidade($nomealimento, $idpaciente, $idrefeicao, $data)
    {
        $sql = new Sql();

        $quantidade = $sql->select("
        select quantidade from alimentos_consumidos, alimentos, pacientes, tb_refeicoes where
        alimentos_consumidos.id_alimento = alimentos.id and
        alimentos.nome = :NOME and 
        alimentos_consumidos.id_paciente = pacientes.id and
        pacientes.id = :ID and 
        alimentos_consumidos.id_refeicao = tb_refeicoes.id and
        tb_refeicoes.id = :IDREF and 
        data = :DATA
        ", array(
            ':NOME' => $nomealimento,
            ':ID' => $idpaciente,
            ':IDREF' => $idrefeicao,
            ':DATA' => $data
        ));

        return $quantidade;
    }

    /**
     * Calcula a quantidade de macronutrientes em uma porção (quantidade) do alimento contido no objeto.
     * @param integer $quantidade quantidade em gramas.
     * @param string $macro macronutriente desejado.
     * @return float carboidratos totais.
     */
    public function returnMacroCalc($macro, $quantidade)
    {
        if ($macro == "caloria")
        {
            return $this->getQtdCalorias() * $quantidade;
        }
        if ($macro == "proteina")
        {
            return $this->getQtdProteinas() * $quantidade;
        }
        if ($macro == "carboidrato")
        {
            return $this->getQtdCarboidratos() * $quantidade;
        }
        if ($macro == "gordura")
        {
            return $this->getQtdGorduras() * $quantidade;
        }
    }
    
    public function insertMacroConsumed($id, $proteina, $caloria, $gordura, $carboidrato, $type = 1)
    {
        $sql = new Sql();
        $results = $sql->select("select * from tb_macros_pacientes where data_insercao = :DATE and id_usuario = :ID", 
        array(':DATE' => date("Y-m-d"), ':ID' => $id));
        
        if (count($results) > 0)
        {
            $this->updateMacro($id, $proteina, $caloria, $gordura, $carboidrato, $type);
        } else {
            $sql->solquery("insert into tb_macros_pacientes (id_usuario, calorias, proteinas, carboidratos, gorduras, data_insercao) values (:ID, :PROTEINA, :CAL, :CARBO, :GORDURAS, :DATA)", array(':ID' => $id, ':PROTEINA' => $proteina, ':CAL' => $caloria, ':CARBO' => $carboidrato, ':GORDURAS' => $gordura, ':DATA' => date("Y-m-d")));
        }
    }
    
    private function updateMacro($id, $proteina, $caloria, $gordura, $carboidrato, $type)
    {
        $sql = new Sql();
        if ($type == 1)
        {
            $sql->solquery("update tb_macros_pacientes set proteinas = proteinas + :PROTEINA, calorias = calorias + :CAL, carboidratos = carboidratos + :CARBO, gorduras = gorduras + :GORDURAS where data_insercao =  :DATA and id_usuario = :ID", array(':ID' => $id, ':PROTEINA' => $proteina, ':CAL' => $caloria, ':CARBO' => $carboidrato, ':GORDURAS' => $gordura, ':DATA' => date("Y-m-d")));
        } else if ($type == 2) 
        {
            $sql->solquery("update tb_macros_pacientes set proteinas = proteinas - :PROTEINA, calorias = calorias - :CAL, carboidratos = carboidratos - :CARBO, gorduras = gorduras - :GORDURAS where data_insercao =  :DATA and id_usuario = :ID", array(':ID' => $id, ':PROTEINA' => $proteina, ':CAL' => $caloria, ':CARBO' => $carboidrato, ':GORDURAS' => $gordura, ':DATA' => date("Y-m-d")));
        }
        
    }

    /**
     * Calcula a quantidade de calorias em uma porção (quantidade) do alimento contido no objeto.
     * @param integer $quantidade quantidade em gramas.
     * @return float calorias totais.
     */
    public function calculaCalorias($quantidade)
    {
        return $this->getQtdCalorias() * $quantidade;
    }

    /**
     * Calcula a quantidade de carboidratos em uma porção (quantidade) do alimento contido no objeto.
     * @param integer $quantidade quantidade em gramas.
     * @return float carboidratos totais.
     */
    public function calculaCarboidratos($quantidade)
    {
        return $this->getQtdCarboidratos() * $quantidade;
    }

    /**
     * Calcula a quantidade de proteinas em uma porção (quantidade) do alimento contido no objeto.
     * @param integer $quantidade quantidade em gramas.
     * @return float proteinas totais.
     */
    public function calculaProteinas($quantidade)
    {
        return $this->getQtdProteinas() * $quantidade;
    }

    /**
     * Calcula a quantidade de gorduras em uma porção (quantidade) do alimento contido no objeto.
     * @param integer $quantidade quantidade em gramas.
     * @return float gorduras totais.
     */
    public function calculaGorduras($quantidade)
    {
        return $this->getQtdGorduras() * $quantidade;
    }

    /**
     * Retorna a média ingerida do macronutriente desejado em um período de tempo. 
     * @param integer $id id do paciente em questão.
     * @param string $opt macronutriente desejado.
     * @param array $date array com a data inicial e final do período desejado.
     * @return float média calculada.
     */
    static function mediaMacroByDate($id, $opt, $date = null)
    {
        $sql = new Sql();
        

        if($date == null) {
            $count = 0;
            $res = $sql->select("select id from tb_macros_pacientes where id_usuario = :ID",
            array(
                ':ID' => $id
            ));
            $count = count($res); 
            if ($count == 0) {
                return 0;
            } else {
                if($opt == "cal") 
                {
                    $res = $sql->select("select sum(calorias) from tb_macros_pacientes where id_usuario = :ID",
                    array(
                        ':ID' => $id
                    ));
                    foreach($res as $row)
                    {
                        foreach ($row as $key => $value) {
                            $sum = $value;
                        }
                    }
                    return $sum/$count;
                } else if($opt == "prot")
                {
                    $res = $sql->select("select sum(proteinas) from tb_macros_pacientes where id_usuario = :ID",
                    array(
                        ':ID' => $id
                    ));
                    foreach($res as $row)
                    {
                        foreach ($row as $key => $value) {
                            $sum = $value;
                        }
                    }
                    return $sum/$count;
                } else if($opt == "carb")
                {
                    $res = $sql->select("select sum(carboidratos) from tb_macros_pacientes where id_usuario = :ID",
                    array(
                        ':ID' => $id
                    ));
                    foreach($res as $row)
                    {
                        foreach ($row as $key => $value) {
                            $sum = $value;
                        }
                    }
                    return $sum/$count;
                } else if($opt == "gord")
                {
                    $res = $sql->select("select sum(gorduras) from tb_macros_pacientes where id_usuario = :ID",
                    array(
                        ':ID' => $id
                    ));
                    foreach($res as $row)
                    {
                        foreach ($row as $key => $value) {
                            $sum = $value;
                        }
                    }
                    return $sum/$count;  
                }
            }
            
        } else {
            $count = 0;
            $res = $sql->select("select id from tb_macros_pacientes where id_usuario = :ID and data_insercao between :DATEIN and :DATEND",
             array(
                 ':ID' => $id,
                 ':DATEIN' => $date[0],
                 ':DATEND' => $date[1]
            ));
            $count = count($res); 
            if ($count == 0) {
                return 0;
            } else {
                if($opt == "cal") 
                {
                    $res = $sql->select("select sum(calorias) from tb_macros_pacientes where id_usuario = :ID and data_insercao between :DATEIN and :DATEND",
                    array(
                        ':ID' => $id,
                        ':DATEIN' => $date[0],
                        ':DATEND' => $date[1]
                    ));
                    foreach($res as $row)
                    {
                        foreach ($row as $key => $value) {
                            $sum = $value;
                        }
                    }
                    return $sum/$count;
                } else if($opt == "prot")
                {
                    $res = $sql->select("select sum(proteinas) from tb_macros_pacientes where id_usuario = :ID and data_insercao between :DATEIN and :DATEND",
                    array(
                        ':ID' => $id,
                        ':DATEIN' => $date[0],
                        ':DATEND' => $date[1]
                    ));
                    foreach($res as $row)
                    {
                        foreach ($row as $key => $value) {
                            $sum = $value;
                        }
                    }
                    return $sum/$count;
                } else if($opt == "carb")
                {
                    $res = $sql->select("select sum(carboidratos) from tb_macros_pacientes where id_usuario = :ID and data_insercao between :DATEIN and :DATEND",
                    array(
                        ':ID' => $id,
                        ':DATEIN' => $date[0],
                        ':DATEND' => $date[1]
                    ));
                    foreach($res as $row)
                    {
                        foreach ($row as $key => $value) {
                            $sum = $value;
                        }
                    }
                    return $sum/$count;
                } else if($opt == "gord")
                {
                    $res = $sql->select("select sum(gorduras) from tb_macros_pacientes where id_usuario = :ID and data_insercao between :DATEIN and :DATEND",
                    array(
                        ':ID' => $id,
                        ':DATEIN' => $date[0],
                        ':DATEND' => $date[1]
                    ));
                    foreach($res as $row)
                    {
                        foreach ($row as $key => $value) {
                            $sum = $value;
                        }
                    }
                    return $sum/$count;  
                }
            }
        }
        
        
    }

}
