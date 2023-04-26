<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LevelRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Patch;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



#[ORM\Entity(repositoryClass: LevelRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            uriTemplate: '/levels',
        ),

        new Post(
            uriTemplate: '/level/create',
        ),

        new Get(
            uriTemplate: '/get/level/{id}',
            requirements: ['id' => '\d+'],
            
        ),
       
        new Patch(
            uriTemplate: '/edit/level/{id}',
            requirements: ['id' => '\d+'],
            
        ),
        new Delete(
            uriTemplate: '/delete/level/{id}',
            requirements: ['id' => '\d+'],
        ),

        
        ]
)]
#[UniqueEntity(
    fields: ['name'],
    message: 'This name already exist.',
)]
class Level
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    #[Assert\Length(
        max: 10,
        maxMessage: 'The level cannot be longer than {{ limit }} characters',
    )]
    #[Assert\NotBlank]
    private ?string $name = null;
    

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
}
