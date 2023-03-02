<?php

namespace App\Entity;

use App\Repository\ApiBillAddressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiBillAddressRepository::class)
 */
class ApiBillAddress
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $direction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $province;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $codeCountry;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $additionalInformation;

    public function getId(): ?string
    {
        return $this->id;
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
}
