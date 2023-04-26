<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DepartmentRepository;
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

#[ORM\Entity(repositoryClass: DepartmentRepository::class)]
#[ApiResource( operations:[
    new GetCollection(
        uriTemplate: '/departments',
    ),

    new Post(
        uriTemplate: '/department/create',
    ),

    new Get(
        uriTemplate: '/get/department/{id}',
        requirements: ['id' => '\d+'],
        
    ),
   
    new Patch(
        uriTemplate: '/edit/department/{id}',
        requirements: ['id' => '\d+'],
        
    ),
    new Delete(
        uriTemplate: '/delete/department/{id}',
        requirements: ['id' => '\d+'],
    ),
]
)]
#[UniqueEntity(
    fields: ['name'],
    message: 'This name already exist.',
)]
class Department
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:DepartmentDegree'])]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    #[Assert\Length(
        max: 10,
        maxMessage: 'The Department name cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['read:DepartmentDegree'])]
    private ?string $code = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['read:DepartmentDegree'])]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
