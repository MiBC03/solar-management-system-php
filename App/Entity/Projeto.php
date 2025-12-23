<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Projeto
{

  /**
   * identificador único do projeto
   * @var integer
   */
  public $prj_id;

  /**
   * nome do projeto
   * @var string
   */
  public $prj_nome;

  /**
   * funil do projeto
   * @var string
   */
  public $prj_funil;

  /**
   * etapa do projeto
   * @var string
   */
  public $prj_etapa;

  /**
   * descrição do projeto
   * @var string
   */
  public $prj_descricao;

  /**
   * representante do projeto
   * @var string
   */
  public $prj_representante;

  /**
   * responsável do projeto
   * @var string
   */
  public $prj_responsavel;

    /**
   * responsável do projeto
   * @var string
   */
  public $clt_id;

  /**
   * responsável do projeto
   * @var string
   */
  public $clt_nome;

  /**
   * responsável do projeto
   * @var string
   */
  public $clt_CPF;

  /**
   * responsável do projeto
   * @var string
   */
  public $clt_email;

  /**
   * responsável do projeto
   * @var string
   */
  public $clt_telefone;

  /**
   * responsável do projeto
   * @var string
   */
  //public $clt_genero;

  /**
   * responsável do projeto
   * @var string
   */
  //public $clt_CNPJ;

  /**
   * responsável do projeto
   * @var string
   */
  //public $clt_empresa;

  /**
   * responsável do projeto
   * @var string
   */
  //public $clt_tipo;

  /**
   * método responsável por cadastrar um novo projeto no banco de dados
   * @return boolean
   */
  public function Cadastrar()
  {
    // DEFINIR A DATA
    date_default_timezone_set('America/Fortaleza');
    $this->data = date('d-m-Y H:i:s', time());

    // INSERIR O PROJETO NO BANCO
    $obDatabase = new Database('tb_cliente');
    $this->id = $obDatabase->insert([
      'clt_nome' => $this->clt_nome,
      'clt_CPF' => $this->clt_CPF,
      'clt_email' => $this->clt_email,
      'clt_telefone' => $this->clt_telefone,
      //'clt_genero' => $this->clt_genero,
      //'clt_CNPJ' => $this->clt_CNPJ,
      //'clt_empresa' => $this->clt_empresa,
      //'clt_tipo' => $this->clt_tipo

    ]); 

    $obDatabase = new Database('teste_projeto');
    $this->id = $obDatabase->insert([
      'prj_nome' => $this->prj_nome,
      'prj_funil' => $this->prj_funil,
      'prj_etapa' => $this->prj_etapa,
      'prj_responsavel' => $this->prj_responsavel,
      'prj_representante' => $this->prj_representante,
      'prj_descricao' => $this->prj_descricao,
      'prj_data' => $this->data,
      'cliente_id' =>$this->id
    ]);
    // RETORNAR SUCESSO
    return true;
  }

  /**
   * método responsável por atualizar dados do banco
   * @return boolean
   */
  public function Atualizar()
  {
    return (new Database('placas'))->uptade('id =' . $this->id, [
      'preco' => $this->preco,
      'prj_funil' => $this->prj_funil,
      'prj_etapa' => $this->prj_etapa,
      'data' => $this->data
    ]);;
  }

  /**
   * método responsável por excluir um produto do do banco
   * @return boolean
   */
  public function Excluir()
  {
    return (new Database('tb_cliente'))->delete('id =' . $this->id);
  }

  /**
   * método responsável por obter os produtos do banco
   *  @param string $where
   *  @param string $order
   *  @param string $limit
   *  @return array
   */
  public static function getClientes($where = null, $order = null, $limit = null)
  {
    return (new Database('tb_cliente'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  /**
   * método responsável por obter a quantidade de os produtos do banco
   *  @param string $where
   *  @return integer
   */
  public static function getQuantidadeClientes($where = null)
  {
    return (new Database('tb_cliente'))->select($where, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
  }

  /**
   * método responsável por buscar um produto com base no seu id
   *  @param interger $id
   *  @return array
   */
  public static function getCliente($id)
  {
    return (new Database('tb_cliente'))->select('id =' . $id)->fetchObject(self::class);
  }
}
