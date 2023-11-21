<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;

#[ORM\Entity(repositoryClass: SauceRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function setId($newId){
        $this->id = $newId;
    }

    public function getId(){
        return $this->id;
    }

    public function setImage($newImage){
        $this->image = $newImage;
    }

    public function getComment(){
        return $this->image;
    }
}