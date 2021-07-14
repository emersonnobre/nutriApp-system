<?php
require_once("../app/config.php");

/**
 * Classe responsável por manipular e executar funcionalidades referentes ao paciente que utiliza a aplicação.
 */
class Paciente
{

    private $nome;
    private $dtNascimento;
    private $dtAcompanhamento;
    private $cpf;
    private $id;
    private $peso;
    private $anotacoes;
    private $email;
    private $telefone;
    private $senha;
    private $objetivo;
    private $idPlano;

    /**
     * Método que retorna a variável $nome do objeto.
     * @return string $this->nome Variavel $nome.
     */
    public function getNome()
    {
        return $this->nome;
    }
    /**
     * Método que altera o valor da variavel $nome do objeto.
     * @param string $value Variavel novo valor a ser agregado na variável $nome.
     */
    public function setNome($value)
    {
        $this->nome = $value;
    }

    /**
     * Método que retorna a variável $telefone do objeto.
     * @return string $this->telefone Variavel $telefone.
     */
    public function getTelefone()
    {
        return $this->telefone;
    }
    /**
     * Método que altera o valor da variavel $telefone do objeto.
     * @param string $value  novo valor a ser agregado na variável $telefone.
     */
    public function setTelefone($value)
    {
        $this->telefone = $value;
    }

    /**
     * Método que retorna a variável $objetivo do objeto.
     * @return string $this->objetivo Variavel $objetivo.
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }
    /**
     * Método que altera o valor da variavel $objetivo do objeto.
     * @param string $value  novo valor a ser agregado na variável $objetivo.
     */
    public function setObjetivo($value)
    {
        $this->objetivo = $value;
    }

    /**
     * Método que retorna a variável $senha do objeto.
     * @return string $this->senha Variavel $senha.
     */
    public function getSenha()
    {
        return $this->senha;
    }
    /**
     * Método que altera o valor da variavel $senha do objeto.
     * @param string $value  novo valor a ser agregado na variável $senha.
     */
    public function setSenha($value)
    {
        $this->senha = $value;
    }

    /**
     * Método que retorna a variável $email do objeto.
     * @return string $this->email Variavel $email.
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Método que altera o valor da variavel $email do objeto.
     * @param string $value  novo valor a ser agregado na variável $email.
     */
    public function setEmail($value)
    {
        $this->email = $value;
    }

    /**
     * Método que retorna a variável $dtNascimento do objeto.
     * @return string $this->dtNascimento Variavel $dtNascimento.
     */
    public function getdtNascimento()
    {
        return $this->dtNascimento;
    }
    /**
     * Método que altera o valor da variavel $dtNascimento do objeto.
     * @param string $value  novo valor a ser agregado na variável $dtNascimento.
     */
    public function setdtNascimento($value)
    {
        $this->dtNascimento = $value;
    }
    public function showdtNascimento()
    {
        $ts = strtotime($this->getdtNascimento());
        return date("d/m/Y", $ts);
    }

    /**
     * Método que retorna a variável $dtAcompanhamento do objeto.
     * @return string $this->dtAcompanhamento  Variavel $dtAcompanhamento .
     */
    public function getdtAcompanhamento()
    {
        return $this->dtAcompanhamento;
    }
    /**
     * Método que altera o valor da variavel $dtAcompanhamento do objeto.
     * @param string $value  novo valor a ser agregado na variável $dtAcompanhamento.
     */
    public function setdtAcompanhamento($value)
    {
        $this->dtAcompanhamento = $value;
    }
    public function showdtAcompanhamento()
    {
        $ts = strtotime($this->getdtAcompanhamento());
        return date("d/m/Y", $ts);
    }

    /**
     * Método que retorna a variável $anotacoes do objeto.
     * @return string $this->anotacoes  Variavel $anotacoes .
     */
    public function getAnotacoes()
    {
        return $this->anotacoes;
    }
    /**
     * Método que altera o valor da variavel $anotacoes do objeto.
     * @param string $value  novo valor a ser agregado na variável $anotacoes.
     */
    public function setAnotacoes($value)
    {
        $this->anotacoes = $value;
    }

    /**
     * Método que retorna a variável $peso do objeto.
     * @return string $this->peso  Variavel $peso .
     */
    public function getPeso()
    {
        return $this->peso;
    }
    /**
     * Método que altera o valor da variavel $peso do objeto.
     * @param string $value  novo valor a ser agregado na variável $peso.
     */
    public function setPeso($value)
    {
        $this->peso = $value;
    }

    /**
     * Método que retorna a variável $Cpf do objeto.
     * @return string $this->peso  Variavel $Cpf .
     */
    public function getCpf()
    {
        return $this->Cpf;
    }
    /**
     * Método que altera o valor da variavel $Cpf do objeto.
     * @param string $value  novo valor a ser agregado na variável $Cpf.
     */
    public function setCpf($value)
    {
        $this->cpf = $value;
    }

    /**
     * Método que retorna a variável $id do objeto.
     * @return string $this->id  Variavel $id .
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Método que altera o valor da variavel $id do objeto.
     * @param string $value  novo valor a ser agregado na variável $id.
     */
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * Método que retorna a variável $idPlano do objeto.
     * @return string $this->idPlano  Variavel $idPlano .
     */
    public function getPlanoId()
    {
        return $this->idPlano;
    }
    /**
     * Método que altera o valor da variavel $idPlano do objeto.
     * @param string $value  novo valor a ser agregado na variável $idPlano.
     */
    public function setPlanoId($value)
    {
        $this->idPlano = $value;
    }

    /**
     * Método que preenche os atributos do objeto a partir dos dados recebidos de um array.
     * @param array $data  array de chaves e valores.
     */
    public function setData($data)
    {
        $row = $data[0];

        $this->setId($row['id']);
        $this->setNome($row['nome']);
        $this->setCpf($row['cpf']);
        $this->setEmail($row['email']);
        $this->setSenha($row['senha']);
        $this->setTelefone($row['telefone']);
        $this->setdtNascimento($row['dataNascimento']);
        $this->setPeso($row['peso']);
        $this->setObjetivo($row['objetivo']);
        $this->setAnotacoes($row['anotacoes']);
        $this->setdtAcompanhamento($row['inicio_acompanhamento']);
    }

    /**
     * Método que busca no banco os dados (caso exista) de um paciente por meio de seu id.
     * @param string $id numero do id do paciente ao qual deseja incorporar os dados.
     */
    public function loadbyId($id)
    {
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM pacientes WHERE id=:ID", array(
            ":ID" => $id
        ));
        if (count($results) > 0) {
            $this->setData($results);
        }
    }

    /**
     * Método que busca e retorna um array contendo as dicas associadas a um usuario. O usuario sera determinado considerando o id do objeto em questao.
     * @return array $results  array com as dicas encontradas.
     */
    public function returnDicas()
    {
        $sql = new Sql();
        $results = $sql->select(
            "select tb_dicas.dica 
            from tb_dicas, tb_dicas_pacientes, pacientes
            where id_paciente = pacientes.id AND
            id_dica = tb_dicas.id AND
            pacientes.id = :ID",
            array(
                ':ID' => $this->getId()
            )
        );

        return $results;
    }

    /**
     * Método que atualiza os dados do usuario no banco tendo como base os dados contidos nos atributos do objeto.
     */
    public function updatePaciente()
    {
        $sql = new Sql();
        $sql->solquery(
            "
        update pacientes set
        nome =  :NOME,
        email = :EMAIL,
        senha = :SENHA,
        dataNascimento = :DATA,
        telefone = :TEL
        where id = :ID
        ",
            array(
                ':NOME' => $this->getNome(),
                ':EMAIL' => $this->getEmail(),
                ':SENHA' => $this->getSenha(),
                ':TEL' => $this->getTelefone(),
                ':DATA' => $this->getdtNascimento(),
                ':ID' => $this->getId()
            )
        );
    }

    /**
     * Método que retorna um array contendo as refeicoes do paciente.
     */
    public static function returnRefeicoes()
    {
        $sql = new Sql();

        $results = $sql->select("select nome from tb_refeicoes");
        return $results;
    }

    public function __toString()
    {
        return "<strong>Dados do usuário: </strong><br>
        Nome: " . $this->getNome() . "<br>
        Email: " . $this->getEmail() . "<br>
        Senha: " . $this->getSenha() . "<br>";
    }

    /**
     * Método que busca e retorna o id da refeicao a partir de seu nome.
     * @param string $name nome da refeicao a qual se deseja obter o id.
     * @return integer $idref id da refeicao.
     */
    public static function returnIdbyName($name)
    {
        $sql = new Sql();
        $results = $sql->select("
        select id from tb_refeicoes where
        nome = :NAME 
        ", array(
            ':NAME' => $name
        ));

        foreach ($results as $result) {
            foreach ($result as $key => $value) {
                $idref = $value;
            }
        }

        return $idref;
    }

    /**
     * Método que retorna todas as datas em que alimentos foram registrados. O retorno é filtrado pelo id do paciente e pela refeicao.
     * @param string $ref nome da refeicao.
     * @return array $dates array contendo as datas encontradas.
     */
    public function getAllDateByRef($ref)
    {
        $sql = new Sql();
        $dates = $sql->select("
        select data from alimentos_consumidos, tb_refeicoes where 
        id_paciente = :IDPACIENTE and
        id_refeicao = tb_refeicoes.id and
        tb_refeicoes.nome = :NOME
        group by data
        ", array(
            ':IDPACIENTE' => $this->getId(),
            ':NOME' => $ref
        ));

        return $dates;
    }

    /**
     * Método que retorna todas as datas em que alimentos foram registrados dentro de um periodo especificado. O retorno é filtrado pelo id do paciente e pela refeicao.
     * @param string $ref nome da refeicao.
     * @param string $inic data inicial do periodo.
     * @param string $fin data final do periodo.
     * @return array $dates array contendo as datas encontradas.
     */
    public function getPersonalizeDateByRef($inic, $fin, $ref)
    {
        $sql = new Sql();
        $dates = $sql->select("
        select data from alimentos_consumidos, tb_refeicoes where 
        id_paciente = :IDPACIENTE and
        id_refeicao = tb_refeicoes.id and
        tb_refeicoes.nome = :NOME and
        data between cast(:INICIAL as date) and cast(:FINAL as date)
        group by data
        ", array(
            ':IDPACIENTE' => $this->getId(),
            ':NOME' => $ref,
            ':INICIAL' => $inic,
            ':FINAL' => $fin
        ));

        return $dates;
    }

    /**
     * Método que retorna os alimentos consumidos em uma refeicao de acordo com a data. O retorno é filtrado pelo id do paciente e pelo id da refeicao.
     * @param string $date data desejada para consulta.
     * @param string $idrefeicao refeicao desejada para consulta.
     * @return array $alimentos array contendo os alimentos encontradas.
     */
    public function getAlimentosByDate($date, $idrefeicao)
    {
        $sql = new Sql();
        $alimentos = $sql->select("
        select alimentos.nome from alimentos, alimentos_consumidos, pacientes, tb_refeicoes where
        alimentos_consumidos.id_alimento = alimentos.id and
        alimentos_consumidos.id_paciente = :IDPACIENTE and
        alimentos_consumidos.id_refeicao = :IDREFEICAO and
        data = :DATA group by alimentos.nome
        ", array(
            ':IDPACIENTE' => $this->getId(),
            ':IDREFEICAO' => $idrefeicao,
            ':DATA' => $date
        ));

        return $alimentos;
    }

    /**
     * Método que vincula uma dica a um paciente.
     * @param string $dica dica desejada.
     */
    public function insertDica($dica)
    {
        $iddica = $this->getIdDicabyName($dica);

        $sql = new Sql();
        $sql->solquery("
        insert into tb_dicas_pacientes (id_dica, id_paciente) values
        (:IDDICA, :IDPACIENTE)
        ", array(
            ':IDDICA' => $iddica,
            ':IDPACIENTE' => $this->getId()
        ));
    }

    public function removeDica($dica)
    {
        $iddica = $this->getIdDicabyName($dica);

        $sql = new Sql();
        $sql->solquery("
        delete from tb_dicas_pacientes where
        id_dica = :IDDICA and
        id_paciente = :IDPACIENTE
        ", array(
            ':IDDICA' => $iddica,
            ':IDPACIENTE' => $this->getId()
        ));
    }

    /**
     * Método que retorna o id de uma dica por meio da string da propria.
     * @param string $dica dica desejada.
     * @return integer $id id da dica.
     */
    public function getIdDicabyName($dica)
    {
        $sql = new Sql();
        $results = $sql->select("
        select id from tb_dicas where
        dica = :DICA
        ", array(
            ':DICA' => $dica
        ));

        echo $dica;

        foreach ($results as $row) {
            foreach ($row as $key => $value) {
                $id = $value;
            }
        }

        return $id;
    }

    /**
     * Método que valida as credenciais de um usuario.
     * @param string $email email inserido pelo usuario.
     * @param string $senha senha inserida pelo usuario.
     * @return boolean retorna true se as credenciais estiverem corretas e false se não.
     */
    public function login($email, $senha)
    {
        global $pdo;

        $sql = "SELECT id, senha FROM pacientes where email= :email";

        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            if (password_verify($senha, $dado['senha'])) {
                $_SESSION["id"] = $dado["id"];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Método que insere no banco de dados um novo paciente.
     * @param string $nome nome do novo paciente.
     * @param string $telefone telefone do novo paciente.
     * @param string $email email do novo paciente.
     * @param string $senha senha do novo paciente.
     * @param string $dataNascimento data de nascimento do novo paciente.
     * @param string $cpf cpf do novo paciente.
     */
    public function InserirPaciente($nome, $telefone, $email, $senha, $dataNascimento, $cpf)
    {
        $sql = new Sql();
        $sql->solquery("insert into pacientes(nome,telefone,dataNascimento,email,senha,cpf) values(:NOME,:TELEFONE,:DATANASCIMENTO,:EMAIL,:SENHA,:CPF", array(
            ':NOME' => $nome,
            ':TELEFONE' => $telefone,
            ':DATANASCIMENTO' => $dataNascimento,
            ':EMAIL' => $email,
            ':SENHA' => $senha,
            ':CPF' => $cpf
        ));
        header("location:tela_login.php");
    }

    /**
     * Método que verifica se um numero de telefone ja existe no banco de dados.
     * @param string $telefone telefone do paciente ao qual se deseja validar.
     * @return boolean retorna true caso o numero ja exista na base de dados.
     */
    public function ValidaNumero($telefone)
    {

        $sql = new Sql();

        $results = $sql->select("select * from pacientes where telefone=:telefone ", array(
            ':telefone' => $telefone
        ));

        if (count($results) > 0) {
            return true;
        }
    }

    /**
     * Método que verifica se um email ja existe no banco de dados.
     * @param string $email email do paciente ao qual se deseja validar.
     * @return boolean retorna true caso o email ja exista na base de dados.
     */
    public function ValidaEmail($email)
    {

        $sql = new Sql();

        $results = $sql->select("select * from pacientes where email=:email ", array(
            ':email' => $email
        ));

        if (count($results) > 0) {
            return true;
        }
    }

    /**
     * Método que verifica se um numero de cpf ja existe no banco de dados.
     * @param string $cpf cpf do paciente ao qual se deseja validar.
     * @return boolean retorna true caso o cpf ja exista na base de dados.
     */
    public function ValidaCpf($cpf)
    {

        $sql = new Sql();

        $results = $sql->select("select * from pacientes where cpf=:cpf ", array(
            ':cpf' => $cpf
        ));

        if (count($results) > 0) {
            return true;
        }
    }

    /**
     * Método que apaga um paciente e todas as suas relacoes no banco de dados. O paciente e determinado de acordo com o id do objeto em questao.
     */
    public function autoRemove()
    {
        $sql = new Sql();
        $sql->solquery("
        delete from tb_dicas_pacientes where
        id_paciente = :ID
        ",  array(
            ':ID' => $this->getId()
        ));

        $sql->solquery("
        delete from alimentos_consumidos where
        id_paciente = :ID
        ",  array(
            ':ID' => $this->getId()
        ));

        $sql->solquery("
        delete from tb_refeicoes_alimentos, tb_planos where
        id_plano = tb_planos.id and
        tb_planos.id_paciente = :ID
        ",  array(
            ':ID' => $this->getId()
        ));

        $sql->solquery("
        delete from tb_planos_refeicoes, tb_planos where
        id_plano = tb_planos.id and
        tb_planos.id_paciente = :ID
        ",  array(
            ':ID' => $this->getId()
        ));

        $sql->solquery("
        delete from tb_planos where
        id_paciente = :ID
        ",  array(
            ':ID' => $this->getId()
        ));

        $sql->solquery("
        delete from pacientes where
        id = :ID
        ",  array(
            ':ID' => $this->getId()
        ));
    }

    /**
     * Método que vincula o id do plano alimentar de um paciente de acordo com o seu id.
     */
    public function insertPlanoId()
    {
        $sql = new Sql();
        $results = $sql->select("
        select id from tb_planos where id_paciente = :ID
        ", array(
            ':ID' => $this->getId()
        ));

        foreach ($results as $result) {
            foreach ($result as $key => $value) {
                $idPlano = $value;
            }
        }

        $sql->solquery("update pacientes set id_plano = :ID where id = :IDPA", array(
            ':ID' => $idPlano,
            ':IDPA' => $this->getId()
        ));
    }

    /**
     * Método que preenche o atributo idPlano do objeto de acordo com o valor registrado no banco de dados.
     */
    public function loadPlanoId()
    {
        $sql = new Sql();
        $ids = $sql->select("
        select id from tb_planos where
        id_paciente = :IDPACIENTE
        ", array(
            ':IDPACIENTE' => $this->getId()
        ));

        foreach ($ids as $id) {
            foreach ($id as $key => $value) {
                $this->setPlanoId($value);
            }
        }
    }

    
}