<?php
namespace CrudPoo;
use PDO;

final class Fabricante {
    private int $id;
    private string $nome;

    /* Esta propriedade receberá os recursos PDO
    através da classe Banco (denpendência do projeto) */
    private PDO $conexao;

    public function __construct()
    {
        /* No momento em que for criado um objeto a partir
        da classe Fabricante, automaticamente será
        feita a conexão com o banco. */
        $this->conexao = Banco::conecta();        
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
}