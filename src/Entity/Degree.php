<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use App\Repository\DegreeRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DegreeRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            #uriTemplate: '/degrees',
            normalizationContext: [
                'groups' => ['read:collection', 'read:item', 'read:Degree'],
            ],
        ),
        new Post(
            uriTemplate: '/degree/create',
        ),
        new get(
            uriTemplate: '/get/degree/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Put(
            uriTemplate: '/edit/degree/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Delete(
            uriTemplate: '/delete/degree/{id}',
            requirements: ['id' => '\d+'],
        ),
    ],

    normalizationContext: ['groups' => ['read:collection' ]],
    denormalizationContext: ['groups' => ['read:collection'],],
)]

#[UniqueEntity(
    fields: ['name'],
    message: 'This code already exist.',
)]
class Degree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:collection'])]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    #[Groups(['read:collection'])]
    private ?string $code = null;
    #[Assert\Length(
        max: 30,
        maxMessage: 'The  code cannot be longer than {{ limit }} characters',
    )]
    #[ORM\Column(length: 30)]
    #[Groups(['read:collection'])]
    private ?string $name = null;
    #[Assert\Length(
        max: 30,
        maxMessage: 'The  name cannot be longer than {{ limit }} characters',
    )]

    #[ORM\Column]
    #[Groups(['read:collection'])]
    private ?int $minyear = null;

    #[ORM\Column]
    #[Groups(['read:collection'])]
    private ?int $maxyear = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:collection','read:item'])]
    private ?DegreeType $degreeType = null;

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

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMinyear(): ?int
    {
        return $this->minyear;
    }

    public function setMinyear(int $minyear): self
    {
        $this->minyear = $minyear;

        return $this;
    }

    public function getMaxyear(): ?int
    {
        return $this->maxyear;
    }

    public function setMaxyear(int $maxyear): self
    {
        $this->maxyear = $maxyear;

        return $this;
    }

    public function getDegreeType(): ?DegreeType
    {
        return $this->degreeType;
    }

    public function setDegreeType(?DegreeType $degreeType): self
    {
        $this->degreeType = $degreeType;

        return $this;
    }
}
