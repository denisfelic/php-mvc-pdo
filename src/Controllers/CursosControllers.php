<?php


namespace Denis\MVC\Controllers;


use Denis\MVC\Domain\Entity\Curso;
use Denis\MVC\Domain\Entity\Usuario;
use Denis\MVC\Domain\Repository\CursosRepositoryPDO;
use Denis\MVC\Infra\Config\CreateConnectionPDO;

class CursosControllers implements Controller
{

    /**
     * @var CursosRepositoryPDO
     */
    private CursosRepositoryPDO $cursoRepository;
    private Usuario $loogedUser;

    public function __construct()
    {
        $mysqlConnection = CreateConnectionPDO::mysql();
        $this->cursoRepository = new CursosRepositoryPDO($mysqlConnection);
        $this->loogedUser = new Usuario(1, 'test@gmail.com', '12345', null);
    }

    public function index()
    {

        $userId = $this->loogedUser->getId();
        $cursosData = $this->cursoRepository->all();
        $cursos = [];

        foreach ($cursosData as $curso) {
            if ($curso->getUserId() === $userId) {
                array_push($cursos, $curso);
            }
        }


        $titulo = "Página de Cursos";
        require_once __DIR__ . '/../../views/Cursos/cursos.view.php';
    }

    public function store()
    {
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        if ($descricao === false) {
            // TODO: Implementar erro
        }
        $curso = new Curso(null, $descricao, $this->loogedUser->getId());
        $this->cursoRepository->save($curso);

        header('Location: /cursos', true, 302);

    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function update()
    {
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        if (!$descricao || !$id) { 
            // TODO: Implementar erro
        }
        
        $curso = new Curso($id, $descricao, $this->loogedUser->getId());
        if(!$this->cursoRepository->update($curso)){
            echo  'erro 500 - Erro ao atualizar curso, tente novamente.';
            return;
        }
        
        header('Location: /cursos');
        
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (!$id) {
            header('Location: /cursos', true, 302);
            return;
        }
        $curso = $this->cursoRepository->getOne($id);
        $titulo = 'Editar Curso';
        require_once __DIR__ . '/../../views/Cursos/editarCurso.view.php';
    }

    public function destroy()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (!$id) {
            header('Location: /cursos', true, 302);
            return;
        }
        $this->cursoRepository->remove($id);
        header('Location: /cursos', true, 302);
    }

    public function create()
    {
        $titulo = 'Criar novo Curso';
        require_once __DIR__ . '/../../views/Cursos/criarCurso.view.php';
    }
}