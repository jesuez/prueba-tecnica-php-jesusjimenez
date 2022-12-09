<?php
declare(strict_types=1);
class User
{
    protected ?int $id;
    protected string $name;
    protected string $email;

    public function __construct(?int $id, string $name, string $email) {
        $this->id = $id??null;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getEmail(): string {
        return $this->email;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setName(string $name): void {
        $this->name = $name;
    }
    public function setEmail(string $email): void {
        $this->email = $email;
    }

}