<?php

trait AttackableTraits {
    protected int $hp;

     /**
     * Get the value of hp
     */ 
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     *
     * @return  self
     */ 
    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }
}
?>