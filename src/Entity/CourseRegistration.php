<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CourseRegistrationRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Patch;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: CourseRegistrationRepository::class)]
#[ApiResource(
    operations:[
        new GetCollection(
            uriTemplate: '/course_registrations',
        ),

        new Post(
            uriTemplate: '/course_registration/create',
        ),

        new Get(
            uriTemplate: '/get/course_registration/{id}',
            requirements: ['id' => '\d+'],
            
        ),
       
        new Patch(
            uriTemplate: '/edit/course_registration/{id}',
            requirements: ['id' => '\d+'],
            
        ),
        new Delete(
            uriTemplate: '/delete/course_registration/{id}',
            requirements: ['id' => '\d+'],
        ), 
        ]
)]
#[UniqueEntity(
    fields: ['name'],
    message: 'This name already exist.',
)]
class CourseRegistration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $code = null;

    #[ORM\Column(length: 30)]
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

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
