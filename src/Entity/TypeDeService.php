<?php

namespace App\Entity;

use App\Repository\TypeDeServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: TypeDeServiceRepository::class)]
#[Vich\Uploadable]
class TypeDeService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, Service>
     */
    #[ORM\OneToMany(targetEntity: Service::class, mappedBy: 'typeDeService')]
    private Collection $service;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $creer = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $modifier = null;

    #[Vich\UploadableField(mapping: 'typeDeServices', fileNameProperty: 'nomImage', size: 'tailleImage')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPhoto = null;

    #[ORM\Column(length: 255)]
    private ?string $taillePhoto = null;

    public function __construct()
    {
        $this->service = new ArrayCollection();
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

    /**
     * @return Collection<int, Service>
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addService(Service $service): static
    {
        if (!$this->service->contains($service)) {
            $this->service->add($service);
            $service->setTypeDeService($this);
        }

        return $this;
    }

    public function removeService(Service $service): static
    {
        if ($this->service->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getTypeDeService() === $this) {
                $service->setTypeDeService(null);
            }
        }

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
}
