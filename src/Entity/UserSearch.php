<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="integer")
     */
    private $min_note;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinNote(): ?int
    {
        return $this->min_note;
    }

    public function setMinNote(int $min_note): self
    {
        $this->min_note = $min_note;

        return $this;
    }

    public function getMaxNote(): ?int
    {
        return $this->max_note;
    }

    public function setMaxNote(int $max_note): self
    {
        $this->max_note = $max_note;

        return $this;
    }
}
