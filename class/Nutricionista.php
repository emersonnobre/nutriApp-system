<?php

require_once("config.php");
/**
 * Classe responsável por manipular e executar funcionalidades referentes ao nutricionista que utiliza a aplicação.
 */
class Nutricionista {

    private $nome;
    private $email;
    private $senha;

    public function getNome(){
        return $this->nome;
    }
    public function setNome($value){
        $this->nome = $value;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($value){
        $this->senha = $value;
    }

    /**
     * Método que altera os atributos do objeto com os dados passados.
     * @param $data array com os dados.
     */
    public function setData($data){
        $row = $data[0];

        $this->setNome($row['nome']);
        $this->setEmail($row['email']);
        $this->setSenha($row['senha']);
    }

    /**
     * Método que busca os dados do nutricionista no banco e os envia ao metodo que preenche os atributos.
     */
    public function loadbyId(){
        $sql = new Sql();
        $results = $sql->select("select * from tb_nutricionista");

        if(count($results) > 0){
            $this->setData($results);
        }
    }

    /**
     * Método que atualiza no banco as informações de acordo com os dados do objeto
     */
    public function  updateNutri(){
        $sql = new Sql();
        $sql->solquery("
        update tb_nutricionista set
        nome = :NAME,
        senha = :SENHA,
        email = :EMAIL
        ", array(
            ':NAME'=>$this->getNome(),
            ':EMAIL'=>$this->getEmail(),
            ':SENHA'=>$this->getSenha()
        ));
    }

    /**
     * Método que retorna um array contendo todos os id de paciente contidos no banco.
     * @return array $results array com os id.
     */
    public static function returnPacientes(){
        $sql = new Sql();
        $results = $sql->select("select id from pacientes order by nome");
        return $results;
    }

    /**
     * Método que retorna um array com os nomes dos pacientes iguais ou semelhante ao nome passado como parametro.
     * @param string $search nome a ser buscado.
     * @return array $results array com os nomes encontrados.
     */
    public static function searchPacientes($search){
        $sql = new Sql();
        $results = $sql->select("select id from pacientes where lower(nome) like :SEARCH order by nome", array(
            ':SEARCH'=>'%'.$search.'%'
        ));

        return $results;
    }

    
    /**
     * Método que atualiza no banco os dados de um paciente.
     * @param array $dados dados novos.
     */
    public static function updatePaciente($dados = array()){
        $sql = new Sql();
        $sql->solquery("
        update pacientes set
        peso = :PESO,
        inicio_acompanhamento = :DATE,
        objetivo = :OBJETIVO,
        anotacoes = :ANOTACOES
        where id = :ID  
        ", array(
            ':PESO'=>$dados[0],
            ':DATE'=>$dados[1],
            ':OBJETIVO'=>$dados[2],
            ':ANOTACOES'=>$dados[3],
            ':ID'=>$dados[4]
        ));
    }

    /**
     * Método que retorna todas as dicas registradas no banco.
     * @return array $results array com as dicas.
     */
    public static function getAllDicas(){
        $sql = new Sql();
        $results = $sql->select("
        select dica from tb_dicas
        ");

        return $results;
    }

    /**
     * Método que deleta uma dica do banco de dados.
     * @param string $dica string da dica a ser deletada.
     */
    public static function deleteDica($dica){
        $sql = new Sql();
        $sql->solquery("
        delete from tb_dicas where 
        dica = :DICA
        ", array(
            ':DICA'=>$dica
        ));
    }

    /**
     * Método que insere um dica no banco de dados.
     * @param string $dica string da dica a ser adicionada.
     */
    public static function insertDica($dica){
        $sql = new Sql();
        $sql->solquery("
        insert into tb_dicas (dica) values 
        (:DICA)
        ", array(
            ':DICA'=>$dica
        ));
    }

    /**
     * Método que insere um alimento no plano alimentar de um paciente.
     * @param integer $idAlimento id do alimento a ser adicionado.
     * @param integer $idPlano id do plano alimentar do paciente.
     * @param integer $idRefeicao id da refeicao a qual o alimento sera vinculado.
     * @param integer $qtd quantidade do alimento.
     */
    public static function insertAlimentoPlano($idAlimento, $idPlano, $idRefeicao, $qtd) {
        $sql = new Sql();
        $valida = Nutricionista::verificaAlimentoPlano($idAlimento, $idPlano, $idRefeicao);
        if ($valida) {
            $sql->solquery("
            update tb_refeicoes_alimentos set qtd = qtd + :QTD where
            id_alimento = :IDALIMENTO and
            id_plano = :IDPLANO and
            id_refeicao = :IDREFEICAO
            ", array(
                ':IDALIMENTO'=>$idAlimento,
                ':IDPLANO'=>$idPlano,
                ':IDREFEICAO'=>$idRefeicao,
                ':QTD'=>$qtd
            ));
        } else {
            $sql->solquery("
            insert into tb_refeicoes_alimentos (id_alimento, id_refeicao, id_plano, qtd) values
            (:IDALIMENTO, :IDREFEICAO, :IDPLANO, :QTD)
            ", array(
                ':IDALIMENTO'=>$idAlimento,
                ':IDREFEICAO'=>$idRefeicao, 
                ':IDPLANO'=>$idPlano,
                ':QTD'=>$qtd
            ));
        }
        
    }

    /**
     * Método que verifica se o id de um alimento ja esta no plano alimentar de um paciente especifico.
     * @return boolean retorna true caso o alimento ja esteja vinculado.
     */
    public static function verificaAlimentoPlano($idAlimento, $idPlano, $idRefeicao){
        $sql = new Sql();
        $results = $sql->select("
        select * from tb_refeicoes_alimentos where
        id_alimento = :IDALIMENTO and
        id_plano = :IDPLANO and
        id_refeicao = :IDREFEICAO
        ", array(
            ':IDALIMENTO'=>$idAlimento,
            ':IDPLANO'=>$idPlano,
            ':IDREFEICAO'=>$idRefeicao
        ));

        if (count($results) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método que remove um alimento do plano alimentar de um paciente.
     */
    public static function deleteAlimentoPlano($idAlimento, $idPlano, $idRefeicao, $qtd) {
        $sql = new Sql();
        $sql->solquery("
        delete from tb_refeicoes_alimentos where
        id_alimento = :IDALIMENTO and 
        id_plano = :IDPLANO and
        id_refeicao = :IDREFEICAO and
        qtd = :QTD
        ", array(
            ':IDALIMENTO'=>$idAlimento,
            ':IDREFEICAO'=>$idRefeicao, 
            ':IDPLANO'=>$idPlano,
            ':QTD'=>$qtd
        ));
    }

    /**
     * Atualiza a quantidade de um alimento contido no plano alimentar de um paciente.
     */
    public static function updateAlimentoPlano($idAlimento, $idPlano, $idRefeicao, $qtd){
        $sql = new Sql();
        $sql->solquery("
        update tb_refeicoes_alimentos set qtd = :QTD where
        id_alimento = :IDALIMENTO and
        id_plano = :IDPLANO and
        id_refeicao = :IDREFEICAO
        ", array(
            ':QTD'=>$qtd,
            ':IDALIMENTO'=>$idAlimento,
            ':IDPLANO'=>$idPlano,
            ':IDREFEICAO'=>$idRefeicao
        ));
    }

    /**
     * Processa o login do nutricionista.
     * @param string $email email inserido pelo usuario.
     * @param string $senha senha inserida pelo usuario.
     * @return boolean retorna true caso as credenciais estejam corretas e false caso não.
     */
    public static function login ($email, $senha) {
        global $pdo;
        
        $sql="SELECT senha FROM tb_nutricionista where email=:email";
            
        $sql=$pdo->prepare($sql);
        $sql->bindValue("email",$email);
        $sql->execute();
    
        if($sql->rowCount()>0){
            $dado = $sql->fetch();
            if (password_verify($senha, $dado['senha'])){
                $_SESSION["id"] = 1;
                $_SESSION["nutri"] = true;
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }

}

?>