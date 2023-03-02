<?php

namespace App\Entity;

use App\Repository\ApiDefaultRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiDefaultRepository::class)
 */
class ApiConfig
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    protected $id;

    protected $salesChannel;

    protected $expenseAccount;

    protected $expirationDate;

    protected $paymentMethod;

    protected $discount;

    protected $idiom;

    protected $badge;

    protected $taxes;

    protected $retentions;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getSalesChannel(): ?string
    {
        return $this->salesChannel;
    }

    public function setSalesChannel(?string $salesChannel): self
    {
        $this->salesChannel = $salesChannel;

        return $this;
    }

    public function getExpenseAccount(): ?string
    {
        return $this->expenseAccount;
    }

    public function setExpenseAccount(?string $expenseAccount): self
    {
        $this->expenseAccount = $expenseAccount;

        return $this;
    }

    public function getExpirationDate(): ?string
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?string $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    public function setDiscount(?string $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getIdiom(): ?string
    {
        return $this->idiom;
    }

    public function setIdiom(?string $idiom): self
    {
        $this->idiom = $idiom;

        return $this;
    }

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    public function setBadge(?string $badge): self
    {
        $this->badge = $badge;

        return $this;
    }

    public function getTaxes(): ?string
    {
        return $this->taxes;
    }

    public function setTaxes(?string $taxes): self
    {
        $this->taxes = $taxes;

        return $this;
    }

    public function getRetentions(): ?string
    {
        return $this->retentions;
    }

    public function setRetentions(?string $retentions): self
    {
        $this->retentions = $retentions;

        return $this;
    }
}
