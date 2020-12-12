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
     * Curso constructor.
     * @param int|null $id
     * @param string $descricao
     */
    public function __construct(?int $id, string $descricao)
    {
        $this->id = $id;
        $this->descricao = $descricao;
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
}
