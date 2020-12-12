<?php
namespace Denis\MVC\Domain\Entity;
/**
 * @Entity
 * @Table(name="usuarios")
 */
class Usuario
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
    private string $email;
    /**
     * @Column(type="string")
     */
    private string $senha;

    /**
     * @var Curso[]
     */
    private ?array $cursos;

    
    /**
     * Usuario constructor.
     * @param int|null $id
     * @param string $email
     * @param string $senha
     * @param Curso[] $cursos
     */
    public function __construct(?int $id, string $email, string $senha, ?array $cursos)
    {
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
        $this->cursos = $cursos;
    }

    /**
     * @return Curso[]
     */
    public function getCursos(): array
    {
        return $this->cursos;
    }

    /**
     * @param Curso[] $cursos | null
     */
    public function setCursos(?array $cursos): void
    {
        $this->cursos = $cursos;
    }

    
    public function senhaEstaCorreta(string $senhaPura): bool
    {
        return password_verify($senhaPura, $this->senha);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     */
    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    
}
