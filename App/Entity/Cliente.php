<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Cliente
{
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
  public $clt_CNPJ;

  /**
   * responsável do projeto
   * @var string
   */
  public $clt_empresa;

  /**
   * responsável do projeto
   * @var string
   */
  public $clt_tipo;

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
      'clt_tipo' => $this->clt_tipo,
      'clt_CNPJ' => $this->clt_CNPJ,
      'clt_empresa' => $this->clt_empresa,
    ]); 

    $obDatabase = new Database('tb_endereco_teste');
    $this->id = $obDatabase->insert([
      'end_estado' => $this->end_estado,
      'end_cidade' => $this->end_cidade,
      'end_bairro' => $this->end_bairro,
      'end_CEP' => $this->end_CEP,
      'end_numero' => $this->end_numero,
      'end_rua' => $this->end_rua,
      'end_complemento' => $this->end_complemento,
      'end_cliente_codigo' => $this->id
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
    return (new Database('tb_cliente'))->uptade('clt_codigo =' . $this->clt_codigo, [
      'clt_tipo' => $this->clt_tipo,
      'clt_nome' => $this->clt_nome,
      'clt_CPF' => $this->clt_CPF,
      'clt_email' => $this->clt_email,
      'clt_telefone' => $this->clt_telefone,
      'clt_CNPJ' => $this->clt_CNPJ,
      'clt_empresa' => $this->clt_empresa
    ]);
    return (new Database('tb_endereco_teste'))->uptade('clt_codigo =' . $this->clt_codigo, [
      'end_bairro' => $this->end_bairro,
      'end_cidade' => $this->end_cidade,
      'end_CEP' => $this->end_CEP,
      'end_rua' => $this->end_rua,
      'end_numero' => $this->end_numero,
      'end_complemento' => $this->end_complemento,
      'end_estado' => $this->end_estado
    ]);
  }

  /**
   * método responsável por excluir um produto do do banco
   * @return boolean
   */
  public function Excluir()
  {
    return (new Database('tb_cliente'))->delete('clt_codigo =' . $this->clt_codigo);
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
  public static function getCliente($clt_codigo)
  {
    return (new Database('tb_cliente'))->select('clt_codigo =' . $clt_codigo)->fetchObject(self::class);
  }

  public static function getEndereco($clt_codigo)
  {
    return (new Database('tb_endereco_teste'))->select('end_cliente_codigo =' . $clt_codigo)->fetchObject(self::class);
  }
}
