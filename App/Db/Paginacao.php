<?php

namespace App\Db;

class Paginacao {
    /**
     * Número máximo de resultados por página
     * @var integer
     */
    private $limite;

    /**
     * Número total de resultados do banco de dados
     * @var integer
     */
    private $resultados;

    /**
     * Número de páginas
     * @var integer
     */
    private $paginas;

    /**
     * Página atual
     * @var integer
     */
    private $pagAtual;

    /**
     * Construtor da classe
     * @param integer $resultados
     * @param integer $pagAtual
     * @param integer $limite
     */
    public function __construct($resultados, $pagAtual = 1, $limite = 10) {
        $this->resultados = $resultados;
        $this->limite = $limite;
        $this->pagAtual = (is_numeric($pagAtual) and $pagAtual > 0) ? $pagAtual : 1;
        $this->calculate();
    }

    /**
     * Método responsavel por calcular o número de páginas
     */
    private function calculate() {
        //Calcula o total de páginas
        $this->paginas = $this->resultados > 0 ? ceil($this->resultados / $this->limite) : 1;

        //Verifica se a página atual excede o número de páginas
        $this->pagAtual = $this->pagAtual <= $this->paginas ? $this->pagAtual : $this->paginas;
    }

    public function getLimite() {
        $ofset = ($this->limite * ($this->pagAtual -1));
        return $ofset.','.$this->limite;
    }

    public function getPaginas() {
        if($this->paginas == 1) return [];

        $paginas = [];
        for($i = 1; $i <= $this->paginas; $i++) {
            $paginas[] = [
                'pagina' => $i,
                'atual' => $i == $this->pagAtual
            ];
        }

        return $paginas;
    }
}