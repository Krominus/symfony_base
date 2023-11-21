<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\EntityManager;

#[ORM\Entity(repositoryClass: BurgerRepository::class)]

class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity:Pain::class)]
    private ?int $pain = null;

    #[ORM\ManyToMany(targetEntity:Oignon::class)]
    private ?int $oignon = null;

    #[ORM\ManyToMany(targetEntity:Sauce::class)]
    private ?int $sauce = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?int $image = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?string $commentaire = null;

    public function setId($newId){
        $this->id = $newId;
    }

    public function getId(){
        return $this->id;
    }

    public function setPain($nbPain)
    {
        $this->pain = $nbPain;
    }

    public function getPain()
    {
        return $this->pain;
    }

    public function setOignon($nbOignon)
    {
        $this->oignon = $nbOignon;
    }

    public function getOignon()
    {
        return $this->oignon;
    }

    public function setSauce($quelleSauce)
    {
        $this->sauce = $quelleSauce;
    }

    public function getSauce()
    {
        return $this->sauce;
    }

    public function setImage($nbImage)
    {
        $this->image = $nbImage;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setCommentaire($comm)
    {
        $this->commentaire = $comm;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }
}