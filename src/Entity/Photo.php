<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
#[Vich\Uploadable]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $creer = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $modifier = null;

    #[Vich\UploadableField(mapping: 'animaux', fileNameProperty: 'nomImage', size: 'tailleImage')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPhoto = null;

    #[ORM\Column(length: 255)]
    private ?string $taillePhoto = null;


    #[ORM\ManyToOne(inversedBy: 'photo')]
    private ?Animal $animal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreer(): ?\DateTimeImmutable
    {
        return $this->creer;
    }

    public function setCreer(?\DateTimeImmutable $creer): static
    {
        $this->creer = $creer;

        return $this;
    }

    public function getModifier(): ?\DateTimeImmutable
    {
        return $this->modifier;
    }

    public function setModifier(\DateTimeImmutable $modifier): static
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

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }
}
