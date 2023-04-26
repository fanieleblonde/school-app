<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CoursevalueRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
#[ORM\Entity(repositoryClass: CoursevalueRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            uriTemplate: '/coursevalues',
        ),
        new Post(
            uriTemplate: '/coursevalue/create',
        ),
        new get(
            uriTemplate: '/get/coursevalue/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Patch(
            uriTemplate: '/edit/coursevalue/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Delete(
            uriTemplate: '/delete/coursevalue/{id}',
            requirements: ['id' => '\d+'],
        ),
    ]
)]
class Coursevalue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min:1,
        minMessage: 'the Course Value must be at least {{ limit }} characters long',
    )]
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
