<?php

?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Adicionar nova Curso</title>
</head>
<body>

<div class="container d-flex flex-column justify-content-center">
    <div class="jumbotron">
        <h1>Adicionar novo curso</h1>
    </div>
        <form class="input-group w-100" action="/cursos" method="post">
                <div class="d-flex w-100">
                    <labe>Descrição do Curso
                        <input type="text" class="form-control" placeholder="Descrição do curso" name="descricao">
                    </labe>
                </div>
                <a href="/cursos" class="btn btn-primary ml-3 mr-3" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
    </div>
</div>
</body>
</html>
