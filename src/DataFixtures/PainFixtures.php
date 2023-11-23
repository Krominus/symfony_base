<?php

namespace App\DataFixtures;
 
use App\Entity\Pain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PainFixtures extends Fixture
{
    private const PAIN_REFERENCE = 'Pain';
    
    public function load(ObjectManager $manager)
    {
        $nomsPains = [
            'Nature',
            'Brioche',
            'Complet'
        ];

        foreach ($nomsPains as $key => $nomsPains) {
            $pain = new Pain();
            $pain->setNom($nomsPains);
            $manager->persist($pain);
            $this->addReference(self::PAIN_REFERENCE . '_' . $key, $pain);
        }
 
        $manager->flush();
    }
}