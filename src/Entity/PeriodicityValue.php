<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PeriodicityValueRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Patch;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: PeriodicityValueRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            uriTemplate: '/periodicity_values',
        ),

        new Post(
            uriTemplate: '/periodicity_value/create',
        ),

        new Get(
            uriTemplate: '/get/periodicity_value/{id}',
            requirements: ['id' => '\d+'],
            
        ),
       
        new Patch(
            uriTemplate: '/edit/periodicity_value/{id}',
            requirements: ['id' => '\d+'],
            
        ),
        new Delete(
            uriTemplate: '/delete/periodicity_value/{id}',
            requirements: ['id' => '\d+'],
        ),

        
        ]
)]
class PeriodicityValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $value = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
