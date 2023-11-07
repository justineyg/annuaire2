<?php 

namespace App\Entity;

class PropertySearch{
    private $id;
    
    public function getId(): ?int{
        return $this->id;
    }
    
    private $lastname;
    public function getLastname(): ?string{
        return $this->lastname;
    }
    public function setLastname(string $lastname): self{
        $this->lastname = $lastname;
        return $this;
    }

    private $firstname;
    public function getFirstname(): ?string{
        return $this->firstname;
    }
    public function setFirstname(string $firstname): self{
        $this->firstname = $firstname;
        return $this;
    }
}