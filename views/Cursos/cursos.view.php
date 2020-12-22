<?php
include_once __DIR__ . '/../layout/header.view.php';
?>
    <div>
        <a class="btn btn-primary" href="/cursos/novo">Novo Curso</a>
    </div>
    <ul class="list-group">
        <?php foreach ($cursos as $curso) : ?>
            <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <?= $curso->getDescricao(); ?>
                    <div>
                        <a class="btn btn-primary" href="/cursos/update?id=<?= $curso->getId() ?>">Editar</a>
                        <a class="btn btn-danger" href="/cursos/delete?id=<?= $curso->getId() ?>">Deletar</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

<?php
include_once __DIR__ . '/../layout/footer.view.php';
?>