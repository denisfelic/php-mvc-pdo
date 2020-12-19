<?php

namespace Denis\MVC\Domain\Entity;

/**
 * @Entity
 * @Table(name="cursos")
 */
class Curso
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private ?int $id;
    /**
     * @Column(type="string")
     */
    private string $descricao;

    /**
     * @var int 
     */
    private int $user_id;


    /**
     * Curso constructor.
     * @param int|null $id
     * @param string $descricao
     * @param int $user_id
     */
    public function __construct(?int $id, string $descricao, int $user_id)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->user_id = $user_id;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
    

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }
}
