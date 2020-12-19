<?php


namespace Denis\MVC\Domain\Repository;


use Denis\MVC\Domain\Entity\Curso;
use Denis\MVC\Domain\Repository\Interfaces\ICursoRepository;
use Exception;
use PDO;
use PDOException;
use PDOStatement;

class CursosRepositoryPDO implements ICursoRepository
{
    private PDO $pdoConnection;

    /**
     * CursosRepositoryPDO constructor.
     * @param PDO $pdoConnection
     */
    public function __construct(PDO $pdoConnection)
    {
        $this->pdoConnection = $pdoConnection;
    }

    /**
     * @return Curso[]
     */
    public function all(): array
    {
        $query = 'SELECT * FROM `cursos`;';
        $stmt = $this->pdoConnection->prepare($query);
        $stmt->execute();

        return $this->hydrateCursos($stmt);
    }

    /**
     * @param Curso $curso
     * @return bool
     */
    public function save(Curso $curso): bool
    {
        try {
            $query = 'INSERT INTO `cursos` (descricao, user_id) VALUES (:descricao, :user_id)';
            $stmt = $this->pdoConnection->prepare($query);
            $stmt->bindValue(':descricao', $curso->getDescricao());
            $stmt->bindValue(':user_id', $curso->getUserId());
            $stmt->execute();
            return true;
        } catch (PDOException | Exception $ex) {
            return false;
        }
    }

    public function getOne(int $id): Curso
    {
        // TODO: Implement getOne() method.
    }

    public function remove(Curso $curso): bool
    {
        // TODO: Implement remove() method.
    }

    public function update(Curso $curso): bool
    {
        // TODO: Implement update() method.
    }

    public function insertGroup(array $cursos): bool
    {
        // TODO: Implement insertGroup() method.
    }

    /**
     * @param PDOStatement $stmt
     * @return Curso[]
     */
    private function hydrateCursos(PDOStatement $stmt): array
    {

        $cursos = [];
        while ($data = $stmt->fetch()) {
            array_push($cursos, new Curso($data["id"], $data["descricao"], $data['user_id']));
        }
        return $cursos;
    }
}