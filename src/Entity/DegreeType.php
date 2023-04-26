<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use App\Repository\DegreeTypeRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Patch;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DegreeTypeRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            uriTemplate: '/degree_types',
        ),

        new Post(
            uriTemplate: '/degree_type/create',
        ),

        new Get(
            uriTemplate: '/get/degree_type/{id}',
            requirements: ['id' => '\d+'],
            
        ),
       
        new Patch(
            uriTemplate: '/edit/degree_type/{id}',
            requirements: ['id' => '\d+'],
            
        ),
        new Delete(
            uriTemplate: '/delete/degree_type/{id}',
            requirements: ['id' => '\d+'],
        ), 
        ]
)]
#[UniqueEntity(
    fields: ['name'],
    message: 'This name already exist.',
)]
class DegreeType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:Degree'])]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    #[Assert\Length(
        max: 30,
        maxMessage: 'The degree type name cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['read:Degree'])]
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
