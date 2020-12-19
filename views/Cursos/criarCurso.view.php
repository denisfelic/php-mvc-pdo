<?php
include_once __DIR__ . '/../layout/header.view.php';
?>

    <form class="input-group w-100" action="/cursos/novo" method="post">
        <div class="d-flex w-100">
            <labe>Descrição do Curso
                <input type="text" class="form-control" placeholder="Descrição do curso" name="descricao">
            </labe>
        </div>
        <a href="/cursos" class="btn btn-primary ml-3 mr-3" type="submit">Cancelar</a>
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>

<?php
include_once __DIR__ . '/../layout/footer.view.php';