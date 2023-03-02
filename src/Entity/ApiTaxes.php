<?php

namespace App\Entity;

use App\Model\AbstractApi;
use App\Repository\ApiTaxesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiTaxesRepository::class)
 */
class ApiTaxes extends AbstractApi
{
    protected $scopeTax;
    protected $groupTax;

    protected $amountTax;

    protected $taxKey;

    protected $taxName;

    protected $taxType;

    protected $holderBookSocialName;
    
    public function getId(): ?string
    {
        return $this->id;
    }

    public function getScopeTax(): ?string
    {
        return $this->scopeTax;
    }

    public function setScopeTax(?string $scopeTax): self
    {
        $this->scopeTax = $scopeTax;

        return $this;
    }
    

    public function getGroupTax(): ?string
    {
        return $this->groupTax;
    }

    public function setGroupTax(?string $groupTax): self
    {
        $this->groupTax = $groupTax;

        return $this;
    }

    public function getAmountTax(): ?int
    {
        return $this->amountTax;
    }

    public function setAmountTax(?int $amountTax): self
    {
        $this->amountTax = $amountTax;

        return $this;
    }

    public function getTaxKey(): ?string
    {
        return $this->taxKey;
    }

    public function setTaxKey(?string $taxKey): self
    {
        $this->taxKey = $taxKey;

        return $this;
    }

    public function getTaxName(): ?string
    {
        return $this->taxName;
    }

    public function setTaxName(?string $taxName): self
    {
        $this->taxName = $taxName;

        return $this;
    }

    public function getTaxType(): ?string
    {
        return $this->taxType;
    }

    public function setTaxType(?string $taxType): self
    {
        $this->taxType = $taxType;

        return $this;
    }

    public function getHolderBookSocialName(): ?string
    {
        return $this->holderBookSocialName;
    }

    public function setHolderBookSocialName(?string $holderBookSocialName): self
    {
        $this->holderBookSocialName = $holderBookSocialName;

        return $this;
    }

    public function getHolderBookNif(): ?string
    {
        return $this->holderBookNif;
    }

    public function setHolderBookNif(?string $holderBookNif): self
    {
        $this->holderBookNif = $holderBookNif;

        return $this;
    }

    public function getHolderAlternativeNifId(): ?string
    {
        return $this->holderAlternativeNifId;
    }

    public function setHolderAlternativeNifId(?string $holderAlternativeNifId): self
    {
        $this->holderAlternativeNifId = $holderAlternativeNifId;

        return $this;
    }
}
