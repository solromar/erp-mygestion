<?php

namespace App\Entity;

use App\Repository\ApiContactPersonsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiContactPersonsRepository::class)
 */
class ApiContactPersons
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    protected $id;

    protected $reference;

    protected $name;

    protected $worked;

    protected $phone;

    protected $email;

    protected $automaticSendDocuments;

    protected $linkedin;

    /**
     * @ORM\ManyToOne(targetEntity=ApiEventContacts::class, inversedBy="personContact")
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

    public function getWorked(): ?string
    {
        return $this->worked;
    }

    public function setWorked(?string $worked): self
    {
        $this->worked = $worked;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAutomaticSendDocuments(): ?string
    {
        return $this->automaticSendDocuments;
    }

    public function setAutomaticSendDocuments(?string $automaticSendDocuments): self
    {
        $this->automaticSendDocuments = $automaticSendDocuments;

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

    public function getLinkedin()
    {
        return $this->linkedin;
    }

    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }
}
