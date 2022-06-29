<?php
namespace CrudPoo;
use PDO, Exception;

final class Produto {
    private int $id;
    private string $nome;
    private float $preco;
    private int $quantidade;
    private string $descricao;
    private int $fabricanteId;
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Banco::conecta();
    }

    public function lerProdutos():array {
        $sql = "SELECT
                    produtos.id,
                    produtos.nome AS produto,
                    produtos.preco,
                    produtos.descricao,
                    produtos.quantidade,
                    fabricantes.nome AS fabricante
                FROM produtos INNER JOIN fabricantes
                ON produtos.fabricante_id = fabricantes.id
                ORDER BY produto";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $erro){
            die("Erro: " . $erro->getMessage());
        }
        return $resultado;
    }
    

    public function inserirProduto():void {
        $sql = "INSERT INTO produtos(nome, preco, 
        quantidade, descricao, fabricante_id) 
        VALUES(:nome, :preco, :quantidade, :descricao, 
        :fabricante_id)";
        
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(':preco', $this->preco, PDO::PARAM_STR);
            $consulta->bindParam(':quantidade', $this->quantidade, PDO::PARAM_INT);
            $consulta->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
            $consulta->bindParam(':fabricante_id', $this->fabricanteId, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ". $erro->getMessage());
        }
}




    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * Get the value of nome
     *
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param string $nome
     *
     * @return self
     */
    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    /**
     * Get the value of preco
     *
     * @return float
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @param float $preco
     *
     * @return self
     */
    public function setPreco(float $preco)
    {
        $this->preco = filter_var(
            $preco, 
            FILTER_SANITIZE_NUMBER_FLOAT,
            FILTER_FLAG_ALLOW_FRACTION
        );
    }

    /**
     * Get the value of quantidade
     *
     * @return int
     */
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     *
     * @param int $quantidade
     *
     * @return self
     */
    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = filter_var(
            $quantidade, 
            FILTER_SANITIZE_NUMBER_INT
        );
    }

    /**
     * Get the value of descricao
     *
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @param string $descricao
     *
     * @return self
     */
    public function setDescricao(string $descricao)
    {
        $this->descricao = filter_var(
            $descricao,
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }

    /**
     * Get the value of fabricanteId
     *
     * @return int
     */
    public function getFabricanteId(): int
    {
        return $this->fabricanteId;
    }

    /**
     * Set the value of fabricanteId
     *
     * @param int $fabricanteId
     *
     * @return self
     */
    public function setFabricanteId(int $fabricanteId)
    {
        $this->fabricanteId = filter_var(
            $fabricanteId, 
            FILTER_SANITIZE_NUMBER_INT
        );
    }
}