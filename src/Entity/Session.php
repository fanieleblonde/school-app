<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SessionRepository;
use Doctrine\DBAL\Types\Types;
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

#[ORM\Entity(repositoryClass: SessionRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            uriTemplate: '/sessions',
        ),
        
        new Post(
            uriTemplate: '/session/create',
        ),
        new Get(
            uriTemplate: '/get/session/{id}',
            requirements: ['id' => '\d+'],
            
        ),
        new Patch(
            uriTemplate: '/edit/session/{id}',
            requirements: ['id' => '\d+'],
            
        ),
        new Delete(
            uriTemplate: '/delete/session/{id}',
            requirements: ['id' => '\d+'],
        ),
    
    ]
    )]
    #[UniqueEntity(
        fields: ['code'],
        message: 'This code already exist.',
    )]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:CurrentSession'])]
    private ?int $id = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Assert\Length(
        max: 10,
        maxMessage: 'The year cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['read:CurrentSession'])]
    private ?string $code = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Assert\Length(
        max: 30,
        maxMessage: 'The code cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['read:CurrentSession'])]
    private ?string $description = null;

    #[ORM\Column(length: 6)]
    #[Groups(['read:CurrentSession'])]
    private ?string $year = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }
}
