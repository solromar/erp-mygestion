<?php

namespace App\Entity;

use App\Repository\ApiCustomDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiCustomDataRepository::class)
 */
class ApiCustomData
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    protected $id;

    protected $description;

    protected $dataString;

    protected $dataAmount;

    protected $dataDate;

    protected $dataTimestamp;

    protected $dataNumeric;

    /**
     * @ORM\ManyToOne(targetEntity=ApiEmployee::class, inversedBy="customData")
     */
    protected $apiEmployee;

    /**
     * @ORM\ManyToOne(targetEntity=ApiEventContacts::class, inversedBy="customData")
     */
    protected $apiEventContacts;

    /**
     * @ORM\ManyToOne(targetEntity=ApiInvoiceEmitted::class, inversedBy="customData")
     */
    protected $apiInvoiceEmitted;

    /**
     * @ORM\ManyToOne(targetEntity=ApiInvoiceRecieved::class, inversedBy="customData")
     */
    protected $apiInvoiceRecieved;

    public function getId()
    {
        return $this->id;
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

    public function getDataString(): ?string
    {
        return $this->dataString;
    }

    public function setDataString(?string $dataString): self
    {
        $this->dataString = $dataString;

        return $this;
    }

    public function getDataAmount(): ?float
    {
        return $this->dataAmount;
    }

    public function setDataAmount(?string $dataAmount): self
    {
        $this->dataAmount = $dataAmount;

        return $this;
    }

    public function getDataDate(): ?string
    {
        return $this->dataDate;
    }

    public function setDataDate(?string $dataDate): self
    {
        $this->dataDate = $dataDate;

        return $this;
    }

    public function getDataTimestamp(): ?string
    {
        return $this->dataTimestamp;
    }

    public function setDataTimestamp(?string $dataTimestamp): self
    {
        $this->dataTimestamp = $dataTimestamp;

        return $this;
    }

    public function getDataNumeric(): ?string
    {
        return $this->dataNumeric;
    }

    public function setDataNumeric(?string $dataNumeric): self
    {
        $this->dataNumeric = $dataNumeric;

        return $this;
    }

    public function getApiEmployee(): ?ApiEmployee
    {
        return $this->apiEmployee;
    }

    public function setApiEmployee(?ApiEmployee $apiEmployee): self
    {
        $this->apiEmployee = $apiEmployee;

        return $this;
    }

    public function getApiInvoiceEmitted(): ?ApiInvoiceEmitted
    {
        return $this->apiInvoiceEmitted;
    }

    public function setApiInvoiceEmitted(?ApiInvoiceEmitted $apiInvoiceEmitted): self
    {
        $this->apiInvoiceEmitted = $apiInvoiceEmitted;

        return $this;
    }

    public function getApiInvoiceRecieved(): ?ApiInvoiceRecieved
    {
        return $this->apiInvoiceRecieved;
    }

    public function setApiInvoiceRecieved(?ApiInvoiceRecieved $apiInvoiceRecieved): self
    {
        $this->apiInvoiceRecieved = $apiInvoiceRecieved;

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
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
