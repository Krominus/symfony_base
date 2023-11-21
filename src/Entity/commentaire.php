<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;

#[ORM\Entity(repositoryClass: SauceRepository::class)]
class Sauce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    public function setId($newId){
        $this->id = $newId;
    }

    public function getId(){
        return $this->id;
    }

    public function setComment($newComment){
        $this->nom = $newComment;
    }

    public function getComment(){
        return $this->comment;
    }
}