<?php

namespace App\Entity;

use App\Repository\ApiProductsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiProductsRepository::class)
 */
class ApiProducts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    protected string $id;

    protected $productDescription;

    protected $amountWithTaxesLine;

    protected $totalAmountTaxesArticle;

    protected $totalAmountRetainedItem;

    protected $productName;

    protected $totalWeightItem;

    protected $totalPriceCostItem;

    protected $referenceProductAdditional;

    protected $referenceProductSupplier;

    protected $productUnitsType;

    protected $totalDiscountsItem;

    /**
     * @ORM\ManyToOne(targetEntity=ApiInvoiceRecieved::class, inversedBy="apiProducts")
     */
    protected $apiInvoiceRecieved;

    /**
     * @ORM\ManyToOne(targetEntity=ApiInvoiceRecieved::class, inversedBy="apiProducts")
     */
    protected $products;

    public function getId(): ?string
    {
        return $this->id;
    }
    
    public function setId(?string $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->productDescription;
    }

    public function setProductDescription(?string $productDescription): self
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    public function getAmountWithTaxesLine(): ?string
    {
        return $this->amountWithTaxesLine;
    }

    public function setAmountWithTaxesLine(?string $amountWithTaxesLine): self
    {
        $this->amountWithTaxesLine = $amountWithTaxesLine;

        return $this;
    }

    public function getTotalAmountTaxesArticle(): ?string
    {
        return $this->totalAmountTaxesArticle;
    }

    public function setTotalAmountTaxesArticle(?string $totalAmountTaxesArticle): self
    {
        $this->totalAmountTaxesArticle = $totalAmountTaxesArticle;

        return $this;
    }

    public function getTotalAmountRetainedItem(): ?string
    {
        return $this->totalAmountRetainedItem;
    }

    public function setTotalAmountRetainedItem(?string $totalAmountRetainedItem): self
    {
        $this->totalAmountRetainedItem = $totalAmountRetainedItem;

        return $this;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(?string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getTotalWeightItem(): ?string
    {
        return $this->totalWeightItem;
    }

    public function setTotalWeightItem(?string $totalWeightItem): self
    {
        $this->totalWeightItem = $totalWeightItem;

        return $this;
    }

    public function getTotalPriceCostItem(): ?string
    {
        return $this->totalPriceCostItem;
    }

    public function setTotalPriceCostItem(?string $totalPriceCostItem): self
    {
        $this->totalPriceCostItem = $totalPriceCostItem;

        return $this;
    }

    public function getReferenceProductAdditional(): ?string
    {
        return $this->referenceProductAdditional;
    }

    public function setReferenceProductAdditional(?string $referenceProductAdditional): self
    {
        $this->referenceProductAdditional = $referenceProductAdditional;

        return $this;
    }

    public function getReferenceProductSupplier(): ?string
    {
        return $this->referenceProductSupplier;
    }

    public function setReferenceProductSupplier(?string $referenceProductSupplier): self
    {
        $this->referenceProductSupplier = $referenceProductSupplier;

        return $this;
    }

    public function getProductUnitsType(): ?string
    {
        return $this->productUnitsType;
    }

    public function setProductUnitsType(?string $productUnitsType): self
    {
        $this->productUnitsType = $productUnitsType;

        return $this;
    }

    public function getTotalDiscountsItem(): ?string
    {
        return $this->totalDiscountsItem;
    }

    public function setTotalDiscountsItem(?string $totalDiscountsItem): self
    {
        $this->totalDiscountsItem = $totalDiscountsItem;

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

    public function getProducts(): ?ApiInvoiceRecieved
    {
        return $this->products;
    }

    public function setProducts(?ApiInvoiceRecieved $products): self
    {
        $this->products = $products;

        return $this;
    }
}
