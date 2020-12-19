<?php


namespace Denis\MVC\Domain\Repository\Interfaces;


use Denis\MVC\Domain\Entity\Curso;

interface ICursoRepository
{

    /**
     * @return array
     */
    public function all(): array;

    /**
     * @param Curso $curso
     * @return bool
     */
    public function save(Curso $curso): bool;


    public function getOne(int $id): Curso;

    /**
     * @param Curso $curso
     * @return bool
     */
    public function remove(Curso $curso): bool;

    /**
     * @param Curso $curso
     * @return bool
     */
    public function update(Curso $curso): bool;

    /**
     * @param Curso[]
     * @return bool
     */
    public function insertGroup(array $cursos): bool;

}