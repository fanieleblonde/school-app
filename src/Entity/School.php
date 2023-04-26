<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SchoolRepository;
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

#[ORM\Entity(repositoryClass: SchoolRepository::class)]
#[ApiResource(
operations:[
    new GetCollection(
        uriTemplate: '/schools',
    ),
    
    new Post(
        uriTemplate: '/school/create',
    ),
    new Get(
        uriTemplate: '/get/school/{id}',
        requirements: ['id' => '\d+'],
        
    ),
    new Patch(
        uriTemplate: '/edit/school/{id}',
        requirements: ['id' => '\d+'],
        
    ),
    new Delete(
        uriTemplate: '/delete/school/{id}',
        requirements: ['id' => '\d+'],
    ),

]
)]
#[UniqueEntity(
    fields: ['name'],
    message: 'This name already exist.',
)]
class School
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:DepartmentDegree'])]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    #[Assert\Length(
        max: 80,
        maxMessage: 'The School name cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['read:DepartmentDegree'])]
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
