<?php


$rotas = [
    "/cursos" => 'listar-cursos.php',
    "/cursos/novo" => 'novo-curso.php'
];
verificaRota($rotas);

/**
 * @param array $rotas
 */
function verificaRota(array $rotas): void
{
    $rotaParaExecutar = null;
    foreach ($rotas as $rota => $arquivo) {
        if ($_SERVER["REQUEST_URI"] === $rota) {
            $rotaParaExecutar = $arquivo;
            break;
        }
    }
    executaRota($rotaParaExecutar);
}

/**
 * @param $rotaParaExecutar
 */
function executaRota($rotaParaExecutar): void
{
    if (is_null($rotaParaExecutar)) {
        echo "Erro 404!<br>Rota:  {$rotaParaExecutar} não encontrada!";
        die();
    }
    require_once __DIR__ . '/' . $rotaParaExecutar;
}

