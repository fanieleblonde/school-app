<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\InstitutionRepository;
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

#[ORM\Entity(repositoryClass: InstitutionRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            uriTemplate: '/institutions',
        ),
        new Post(
            uriTemplate: '/institution/create',
        ),
        new get(
            uriTemplate: '/get/institution/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Patch(
            uriTemplate: '/edit/institution/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Delete(
            uriTemplate: '/delete/institution/{id}',
            requirements: ['id' => '\d+'],
        ),
    ]
)]
#[UniqueEntity(
    fields: ['name'],
    message: 'This name already exist.',
)]
class Institution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:CurrentSession'])]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    #[Assert\Length(
        max: 10,
        maxMessage: 'The code cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['read:CurrentSession'])]
    private ?string $code = null;

    #[ORM\Column(length: 50)]
    #[Groups(['read:CurrentSession'])]
    private ?string $name = null;

    #[ORM\Column(length: 30)]
    #[Assert\Length(
        max: 30,
        maxMessage: 'The email cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['read:CurrentSession'])]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    #[Assert\Length(
        max: 10,
        maxMessage: 'The phone number cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['read:CurrentSession'])]
    private ?string $phone = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['read:CurrentSession'])]
    private ?string $address = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['read:CurrentSession'])]
    private ?string $website = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Groups(['read:CurrentSession'])]
    private ?string $pobox = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['read:CurrentSession'])]
    private ?string $city = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Groups(['read:CurrentSession'])]
    private ?string $region = null;

    #[ORM\Column(length: 30, nullable: true)]
    #[Groups(['read:CurrentSession'])]
    private ?string $logo = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getPobox(): ?string
    {
        return $this->pobox;
    }

    public function setPobox(?string $pobox): self
    {
        $this->pobox = $pobox;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }
}
