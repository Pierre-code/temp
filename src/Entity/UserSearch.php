<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query;
use Symfony\Component\Validator\Constraint as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserSearchRepository")
 */
class UserSearch
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)homestead@192.168.10.10
     */
    private $user_name;

    /**
     * @ORM\Column(type="float")
     */
    private $user_note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;

        return $this;
    }

    public function getUserNote(): ?int
    {
        return $this->user_note;
    }

    public function setUserNote(float $user_note): self
    {
        $this->user_note = $user_note;

        return $this;
    }
}
