<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database {
    const HOST = '';

    const NAME = '';

    const USER = '';

    const PASS = '';

    /**
     * nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * instância de conexão com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * define a tabela e instancia a conexão
     * @param string $table
     */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection(); 
    }

    /**
     * método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='. self::HOST. ';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Método responsável por executar queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */

    public function execute($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;

        } catch(PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Método responsável inserir dados no banco
     * @param array $values [field => value]
     * @return interger ID Inserido
     */
    public function insert($values) {
        //Dados da query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //Monta query
        $query = 'INSERT INTO '. $this->table.'('.implode(', ', $fields).') VALUES ('.implode(', ', $binds).')';

        //Executa o Insert
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId(); 

    }

    /**
     * método responsável por realizar uma consulta no banco
     *  @param string $where
     *  @param string $order
     *  @param string $limit
     *  @param string $fields
     *  @return PDOStatment
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*') {
        //Dados da query
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY'.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //Monta a query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        //Excuta a query
        return $this->execute($query);
        
      }

      /**
     * método responsável por realizar atualizações do banco de dados
     *  @param string $where
     *  @param array $values
     *  @return boolean
     */
    public function uptade($where, $values) {
        //Dados da query
        $fields = array_keys($values);

        //Monta a query
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields). '=? WHERE '. $where;

        //Excuta a query
        $this->execute($query, array_values($values));

        return true; 
        
      }

        /**
     * método responsável por excluir dados do banco de dados
     *  @param string $where
     *  @return boolean
     */
    public function delete($where) {

        //Monta a query
        $query = 'DELETE FROM '.$this->table.' WHERE '. $where;

        //Excuta a query
        $this->execute($query);

        return true; 
        
      }
}