<?php

namespace App\Entity;

use App\Repository\HabitatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: HabitatRepository::class)]
#[Vich\Uploadable]
class Habitat
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

    #[ORM\Column]
    private ?\DateTimeImmutable $modifier = null;

    #[Vich\UploadableField(mapping: 'habitats', fileNameProperty: 'nomImage', size: 'tailleImage')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPhoto = null;

    #[ORM\Column(length: 255)]
    private ?string $taillePhoto = null;

    /**
     * @var Collection<int, Animal>
     */
    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'habitat')]
    private Collection $animal;

    public function __construct()
    {
        $this->animal = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimal(): Collection
    {
        return $this->animal;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animal->contains($animal)) {
            $this->animal->add($animal);
            $animal->setHabitat($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animal->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getHabitat() === $this) {
                $animal->setHabitat(null);
            }
        }

        return $this;
    }
}
