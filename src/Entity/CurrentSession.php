<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use App\Repository\CurrentSessionRepository;
use App\Entity\Session;
use App\Entity\Institution;
use Doctrine\DBAL\Types\Types;
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

#[ORM\Entity(repositoryClass: CurrentSessionRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            #uriTemplate: '/current/sessions',
            normalizationContext: [
                'groups' => ['read:collection', 'read:item', 'read:CurrentSession'],
            ],
        ),
        new Post(
            uriTemplate: '/current/session/create',
        ),
        new get(
            uriTemplate: '/get/current/session/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Put(
            uriTemplate: '/edit/current/session/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Delete(
            uriTemplate: '/delete/current/session/{id}',
            requirements: ['id' => '\d+'],
        ),
    ],

    normalizationContext: ['groups' => ['read:collection' ]],
    denormalizationContext: ['groups' => ['read:collection'],],
)]

class CurrentSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:collection'],['read:DepartmentDegree'])]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:collection','read:item'],['read:DepartmentDegree'])]
    private ?session $session = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:collection','read:item'],['read:DepartmentDegree'])]
    private ?institution $institution = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['read:collection'],['read:DepartmentDegree'])]
    private ?\DateTimeInterface $begenning_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['read:collection'],['read:DepartmentDegree'])]
    private ?\DateTimeInterface $ending_date = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read:collection'],['read:DepartmentDegree'])]
    private ?int $number_of_exam = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:collection'],['read:DepartmentDegree'])]
    private ?string $skills = null;

    #[ORM\Column(length: 20)]
    #[Groups(['read:collection'],['read:DepartmentDegree'])]
    private ?string $status = null;
    #[Assert\Length(
        max: 30,
        maxMessage: 'The status cannot be longer than {{ limit }} characters',
    )]

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSession(): ?session
    {
        return $this->session;
    }

    public function setSession(?session $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getInstitution(): ?institution
    {
        return $this->institution;
    }

    public function setInstitution(?institution $institution): self
    {
        $this->institution = $institution;

        return $this;
    }

    public function getBegenningDate(): ?\DateTimeInterface
    {
        return $this->begenning_date;
    }

    public function setBegenningDate(?\DateTimeInterface $begenning_date): self
    {
        $this->begenning_date = $begenning_date;

        return $this;
    }

    public function getEndingDate(): ?\DateTimeInterface
    {
        return $this->ending_date;
    }

    public function setEndingDate(?\DateTimeInterface $ending_date): self
    {
        $this->ending_date = $ending_date;

        return $this;
    }

    public function getNumberOfExam(): ?int
    {
        return $this->number_of_exam;
    }

    public function setNumberOfExam(?int $number_of_exam): self
    {
        $this->number_of_exam = $number_of_exam;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(string $skills): self
    {
        $this->skills = $skills;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
