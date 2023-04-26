<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\HonorsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: HonorsRepository::class)]

#[ApiResource(
    operations:[
        new GetCollection(
            uriTemplate: '/honors',
        ),
        new Post(
            uriTemplate: '/honor/create',
        ),
        new get(
            uriTemplate: '/get/honor/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Patch(
            uriTemplate: '/edit/honor/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Delete(
            uriTemplate: '/delete/honor/{id}',
            requirements: ['id' => '\d+'],
        ),
    ]
)]
class Honors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 1,
        minMessage: 'the name must be at least {{ limit }} characters long',
    )]
    private ?string $name = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank]
    #[Assert\Length(
        max:4,
        minMessage: 'the maxscore must be at least {{ limit }} characters long',
    )]
    private ?float $maxscore = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank]
    #[Assert\Length(
        max: 4,
        minMessage: 'the minscore must be at least {{ limit }} characters long',
    )]
    private ?float $minscore = null;

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

    public function getMaxscore(): ?float
    {
        return $this->maxscore;
    }

    public function setMaxscore(float $maxscore): self
    {
        $this->maxscore = $maxscore;

        return $this;
    }

    public function getMinscore(): ?float
    {
        return $this->minscore;
    }

    public function setMinscore(float $minscore): self
    {
        $this->minscore = $minscore;

        return $this;
    }
}
