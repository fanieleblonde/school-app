<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use App\Repository\DepartmentDegreeRepository;
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

#[ORM\Entity(repositoryClass: DepartmentDegreeRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            #uriTemplate: '/department_degrees',
            normalizationContext: [
                'groups' => ['read:collection', 'read:item', 'read:department_degree'],
            ],
        ),
        new Post(
            uriTemplate: '/department_degree/create',
        ),
        new get(
            uriTemplate: '/get/department_degree/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Put(
            uriTemplate: '/edit/department_degree/{id}',
            requirements: ['id' => '\d+'],
        ),
        new Delete(
            uriTemplate: '/delete/department_degree/{id}',
            requirements: ['id' => '\d+'],
        ),
    ],

    normalizationContext: ['groups' => ['read:collection' ]],
    denormalizationContext: ['groups' => ['read:collection'],],
)]
class DepartmentDegree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:collection'])]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:collection','read:item'])]
    private ?degree $degree = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:collection','read:item'])]
    private ?department $department = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:collection','read:item'])]
    private ?school $school = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:collection','read:item'])]
    private ?currentSession $currentsession = null;

    #[ORM\Column(length: 30)]
    #[Assert\Length(
        max: 30,
        maxMessage: 'The graduate level cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['read:collection'])]
    private ?string $graduatelevel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegree(): ?degree
    {
        return $this->degree;
    }

    public function setDegree(?degree $degree): self
    {
        $this->degree = $degree;

        return $this;
    }

    public function getDepartment(): ?department
    {
        return $this->department;
    }

    public function setDepartment(?department $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getSchool(): ?school
    {
        return $this->school;
    }

    public function setSchool(?school $school): self
    {
        $this->school = $school;

        return $this;
    }

    public function getCurrentsession(): ?currentSession
    {
        return $this->currentsession;
    }

    public function setCurrentsession(?currentSession $currentsession): self
    {
        $this->currentsession = $currentsession;

        return $this;
    }

    public function getGraduatelevel(): ?string
    {
        return $this->graduatelevel;
    }

    public function setGraduatelevel(string $graduatelevel): self
    {
        $this->graduatelevel = $graduatelevel;

        return $this;
    }
}
