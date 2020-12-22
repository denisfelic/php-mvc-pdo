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
        try {
            $query = 'SELECT * FROM cursos WHERE id = :id';
            $stmt = $this->pdoConnection->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $this->hydrateCurso($stmt);
        } catch (PDOException | Exception $ex) {
            // TODO : Implementar error
        }
    }

    public function remove(int $idCurso): bool
    {
        try {
            $query = 'DELETE FROM `cursos` WHERE `cursos`.`id` = :id';
            $stmt = $this->pdoConnection->prepare($query);
            $stmt->bindValue(':id', $idCurso);
            $stmt->execute();
            return true;
        } catch (PDOException | Exception $ex) {
            return false;
        }
    }

    public function update(Curso $curso): bool
    {
        try {
            $query = 'UPDATE `cursos` SET `descricao` = :descricao WHERE `cursos`.`id` = :id;';
            $stmt = $this->pdoConnection->prepare($query);
            $stmt->bindValue(':descricao', $curso->getDescricao());
            $stmt->bindValue(':id', $curso->getId());
            $stmt->execute();
            return true;
        } catch (PDOException | Exception $ex) {
            return false;
        }
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

    private function hydrateCurso(PDOStatement $stmt): Curso
    {
        $cursoData = $stmt->fetch();
        return new Curso($cursoData["id"], $cursoData["descricao"], $cursoData['user_id']);
    }
}