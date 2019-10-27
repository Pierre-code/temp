<?php

namespace App\Entity;




class UserSearch
{
    /**
     * type="integer"
     */
    private $min_note;

    /**
     * type="integer"
     */
    private $max_weight;


    public function getMinNote(): ?int
    {
        return $this->min_note;
    }

    public function setMinNote(int $min_note): self
    {
        $this->min_note = $min_note;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxWeight()
    {
        return $this->max_weight;
    }

    /**
     * @param mixed $max_weight
     * @return UserSearch
     */
    public function setMaxWeight($max_weight)
    {
        $this->max_weight = $max_weight;
        return $this;
    }


}
