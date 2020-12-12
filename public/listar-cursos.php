<?php

use Denis\MVC\Domain\Repository\UsuarioRepositoryPDO;
use Denis\MVC\Infra\Config\CreateConnectionPDO;

require __DIR__ . '/../vendor/autoload.php';


$mysqlConnection = CreateConnectionPDO::mysql();
$usuariosRepository = new UsuarioRepositoryPDO($mysqlConnection);
$usuario = $usuariosRepository->getOne(1);
$cursos = $usuario->getCursos();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Listar cursos</h1>
        </div>
        <div>
            <a class="btn btn-primary" href="/cursos/novo">Novo Curso</a>
        </div>
        <ul class="list-group">
            <?php foreach ($cursos as $curso) : ?>
                <li class="list-group-item">
                    <?= $curso->getDescricao(); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>
