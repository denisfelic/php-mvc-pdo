<?php


namespace Denis\MVC\Domain\Repository;


use Denis\MVC\Domain\Entity\Curso;
use Denis\MVC\Domain\Entity\Usuario;
use Denis\MVC\Domain\Repository\Interfaces\IUsuarioRepository;
use PDO;
use PDOStatement;

/**
 * Class UsuarioRepositoryPDO
 * @package Denis\MVC\Domain\Repository
 */
class UsuarioRepositoryPDO implements IUsuarioRepository
{
    /**
     * @var PDO 
     */
    private PDO $pdoConnection;

    /**
     * UsuarioRepositoryPDO constructor.
     * @param PDO $pdoConnection
     */
    public function __construct(PDO $pdoConnection)
    {
        $this->pdoConnection = $pdoConnection;
    }

    /**
     * @return Usuario[]
     */
    public function all(): array
    {
        // TODO: Implement all() method.
        return [];
    }

    public function save(Usuario $usuario): bool
    {
        // TODO: Implement save() method.
        return false;
    }

    public function remove(Usuario $usuario): bool
    {
        // TODO: Implement remove() method.
        return false;
    }

    public function update(Usuario $usuario): bool
    {
        // TODO: Implement update() method.
        return false;
    }

    /**
     * @param array $usuarios
     * @return bool
     */
    public function insertGroup(array $usuarios): bool
    {
        // TODO: Implement insertGroup() method.
        return false;
    }

    /**
     * @param int $id
     * @return Usuario
     */
    public function getOne(int $id): Usuario
    {
        $query = 'SELECT usuarios.id, usuarios.email, usuarios.senha,
                   c.id AS curso_id,
                   c.descricao,
                   c.user_id
            FROM usuarios
                     JOIN cursos c
                          ON usuarios.id = c.user_id
            WHERE usuarios.id = :id;';
        $stmt = $this->pdoConnection->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->hydrateUser($stmt);

    }

    /**
     * @param PDOStatement $stmt
     * @return Usuario
     */
    private function hydrateUser(PDOStatement $stmt): Usuario
    {
        $cursos = [];
        $user = null;
        $addedUser = false;
        while ($data = $stmt->fetch()) {
            if (!$addedUser) {
                $user = new Usuario($data["id"], $data["email"], $data["senha"], null);
                $addedUser = true;
            }
            array_push($cursos, new Curso($data["curso_id"], $data["descricao"], $data['user_id']));
        }
        $user->setCursos($cursos);
        return $user;
    }
}