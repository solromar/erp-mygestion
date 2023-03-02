<?php

namespace App\Entity;

use App\Repository\ApiNotesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiNotesRepository::class)
 */
class ApiNotes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    protected $id;

    protected $reference;

    protected $name;

    protected $description;

    protected $noteType;

    protected $lastUpdateDate;

    protected $userReference;

    /**
     * @ORM\ManyToOne(targetEntity=ApiEventContacts::class, inversedBy="notes")
     */
    protected $apiEventContacts;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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

    public function getNoteType(): ?string
    {
        return $this->noteType;
    }

    public function setNoteType(?string $noteType): self
    {
        $this->noteType = $noteType;

        return $this;
    }

    public function getLastUpdateDate(): ?string
    {
        return $this->lastUpdateDate;
    }

    public function setLastUpdateDate(?string $lastUpdateDate): self
    {
        $this->lastUpdateDate = $lastUpdateDate;

        return $this;
    }

    public function getUserReference(): ?string
    {
        return $this->userReference;
    }

    public function setUserReference(?string $userReference): self
    {
        $this->userReference = $userReference;

        return $this;
    }

    public function getApiEventContacts(): ?ApiEventContacts
    {
        return $this->apiEventContacts;
    }

    public function setApiEventContacts(?ApiEventContacts $apiEventContacts): self
    {
        $this->apiEventContacts = $apiEventContacts;

        return $this;
    }
}
