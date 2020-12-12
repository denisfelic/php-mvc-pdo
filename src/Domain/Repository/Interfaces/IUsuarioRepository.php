<?php


namespace Denis\MVC\Domain\Repository\Interfaces;


use Denis\MVC\Domain\Entity\Usuario;

/**
 * Interface IUsuarioRepository
 * @package Denis\MVC\Domain\Repository\Interfaces
 */
interface IUsuarioRepository 
{

    /**
     * @return Usuario[]
     */
    public function all(): array;

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function save(Usuario  $usuario): bool;

    public function getOne(int $id) : Usuario;
    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function remove(Usuario  $usuario): bool;

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function update(Usuario  $usuario): bool;

    /**
     * @param Usuario[]
     * @return bool
     */
    public function insertGroup(array $usuarios) : bool;
    
}