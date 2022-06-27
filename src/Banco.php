<?php
namespace CrudPoo;

abstract class Banco {
    /* Propriedades/atributos
    de acesso ao servidor de Banco de Dados */
    private static string $servidor = "localhost";
    private static string $usuario = "root";
    private static string $senha = "";
    private static string $banco = "vendas";
    private static PDO $conexao;
}