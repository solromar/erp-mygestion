<?php

namespace App\Entity;

use App\Repository\ApiShippingAddressesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiShippingAddressesRepository::class)
 */
class ApiShippingAddresses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    protected $id;

    protected $reference;

    protected $name;

    protected $direction;

    protected $city;

    protected $postalCode;

    protected $province;

    protected $country;

    protected $codeCountry;

    protected $additionalInformation;

    protected $additionalPrivateInformation;

    /**
     * @ORM\ManyToOne(targetEntity=ApiEventContacts::class, inversedBy="addresses")
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

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function setDirection(?string $direction): self
    {
        $this->direction = $direction;

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

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(?string $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCodeCountry(): ?string
    {
        return $this->codeCountry;
    }

    public function setCodeCountry(?string $codeCountry): self
    {
        $this->codeCountry = $codeCountry;

        return $this;
    }

    public function getAdditionalInformation(): ?string
    {
        return $this->additionalInformation;
    }

    public function setAdditionalInformation(?string $additionalInformation): self
    {
        $this->additionalInformation = $additionalInformation;

        return $this;
    }

    public function getAdditionalPrivateInformation(): ?string
    {
        return $this->additionalPrivateInformation;
    }

    public function setAdditionalPrivateInformation(?string $additionalPrivateInformation): self
    {
        $this->additionalPrivateInformation = $additionalPrivateInformation;

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
