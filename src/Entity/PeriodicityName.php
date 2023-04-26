<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PeriodicityNameRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Patch;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: PeriodicityNameRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            uriTemplate: '/periodicity_names',
        ),

        new Post(
            uriTemplate: '/periodicity_name/create',
        ),

        new Get(
            uriTemplate: '/get/periodicity_name/{id}',
            requirements: ['id' => '\d+'],
            
        ),
       
        new Patch(
            uriTemplate: '/edit/periodicity_name/{id}',
            requirements: ['id' => '\d+'],
            
        ),
        new Delete(
            uriTemplate: '/delete/periodicity_name/{id}',
            requirements: ['id' => '\d+'],
        ),

        
        ]
)]
#[UniqueEntity(
    fields: ['name'],
    message: 'This name already exist.',
)]
class PeriodicityName
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    #[Assert\Length(
        max: 30,
        maxMessage: 'The periodicity name cannot be longer than {{ limit }} characters',
    )]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $value = null;

    #[ORM\Column(length: 10, nullable: true)]
   
    #[ORM\Column(nullable: true)]
 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

        return $this;
    }


}
