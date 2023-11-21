<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;

#[ORM\Entity(repositoryClass: SauceRepository::class)]
class Oignon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    public function setId($newId){
        $this->id = $newId;
    }

    public function getId(){
        return $this->id;
    }

    public function setNom($nouveauNom){
        $this->nom = $nouveauNom;
    }

    public function getNom(){
        return $this->nom;
    }
}