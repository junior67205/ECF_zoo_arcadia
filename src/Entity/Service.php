<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
#[Vich\Uploadable]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $creer = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $modifier = null;

    #[Vich\UploadableField(mapping: 'services', fileNameProperty: 'nomImage', size: 'tailleImage')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPhoto = null;

    #[ORM\Column(length: 255)]
    private ?string $taillePhoto = null;

    #[ORM\ManyToOne(inversedBy: 'service')]
    private ?TypeDeService $typeDeService = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCréer(): ?\DateTimeImmutable
    {
        return $this->creer;
    }

    public function setCréer(?\DateTimeImmutable $creer): static
    {
        $this->creer = $creer;

        return $this;
    }

    public function getModifier(): ?\DateTimeImmutable
    {
        return $this->modifier;
    }

    public function setModifier(?\DateTimeImmutable $modifier): static
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): static 
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->modifier = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getNomPhoto(): ?string
    {
        return $this->nomPhoto;
    }

    public function setNomPhoto(string $nomPhoto): static
    {
        $this->nomPhoto = $nomPhoto;

        return $this;
    }

    public function getTaillePhoto(): ?string
    {
        return $this->taillePhoto;
    }

    public function setTaillePhoto(string $taillePhoto): static
    {
        $this->taillePhoto = $taillePhoto;

        return $this;
    }

    public function getTypeDeService(): ?TypeDeService
    {
        return $this->typeDeService;
    }

    public function setTypeDeService(?TypeDeService $typeDeService): static
    {
        $this->typeDeService = $typeDeService;

        return $this;
    }
}
