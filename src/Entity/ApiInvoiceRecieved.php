<?php

namespace App\Entity;


use App\Model\AbstractApi;
use App\Entity\ApiCustomData;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\ApiInvoiceRecievedRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ApiInvoiceRecievedRepository::class)
 */
class ApiInvoiceRecieved extends AbstractApi
{    protected $taxableBaseTotal;

    protected $buyerSocialDenomination;

    protected $buyerNif;

    protected $buyerAlternativeNifId;

    protected $descriptionObject;

    protected $invoiceWithPayments;

    protected $invoiceDate;

    protected $payDay = [];

    protected $datePaymentTerm;

    protected $paymentAmount = [];

    protected $totalAmountInvoice;

    protected $totalAmountTaxInvoic;

    protected $invoiceNumber;

    protected $supplierSocialDenomination;

    protected $supplierNif;

    protected $supplierAlternativaNifId;

    protected $exchangeRateInvoiceCux;

    protected $holderBookSocialName;

    protected $totalGlobalDiscounts;

    /**
     * @ORM\OneToMany(targetEntity=ApiCustomData::class, mappedBy="apiInvoiceRecieved")
     */
    protected $customData;

    /**
     * @ORM\OneToMany(targetEntity=ApiProducts::class, mappedBy="products")
     */
    protected $products;

    public function __construct($value)
    {
        parent::__construct($value);

        $this->customData = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }
    

    public function getTaxableBaseTotal(): ?string
    {
        return $this->taxableBaseTotal;
    }

    public function setTaxableBaseTotal(?string $taxableBaseTotal): self
    {
        $this->taxableBaseTotal = $taxableBaseTotal;

        return $this;
    }

    public function getBuyerSocialDenomination(): ?string
    {
        return $this->buyerSocialDenomination;
    }

    public function setBuyerSocialDenomination(?string $buyerSocialDenomination): self
    {
        $this->buyerSocialDenomination = $buyerSocialDenomination;

        return $this;
    }

    public function getBuyerNif(): ?string
    {
        return $this->buyerNif;
    }

    public function setBuyerNif(?string $buyerNif): self
    {
        $this->buyerNif = $buyerNif;

        return $this;
    }

    public function getBuyerAlternativeNifId(): ?string
    {
        return $this->buyerAlternativeNifId;
    }

    public function setBuyerAlternativeNifId(?string $buyerAlternativeNifId): self
    {
        $this->buyerAlternativeNifId = $buyerAlternativeNifId;

        return $this;
    }

    public function getDescriptionObject(): ?string
    {
        return $this->descriptionObject;
    }

    public function setDescriptionObject(?string $descriptionObject): self
    {
        $this->descriptionObject = $descriptionObject;

        return $this;
    }

    public function getInvoiceWithPayments(): ?string
    {
        return $this->invoiceWithPayments;
    }

    public function setInvoiceWithPayments(?string $invoiceWithPayments): self
    {
        $this->invoiceWithPayments = $invoiceWithPayments;

        return $this;
    }

    public function getInvoiceDate(): ?string
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(?string $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    public function getPayDay(): ?array
    {
        return $this->payDay;
    }

    public function addPayDay(\DateTime $payDay): self
    {
        $this->payDay[] = $payDay;

        return $this;
    }

    public function getDatePaymentTerm(): ?string
    {
        return $this->datePaymentTerm;
    }

    public function setDatePaymentTerm(?string $datePaymentTerm): self
    {
        $this->datePaymentTerm = $datePaymentTerm;

        return $this;
    }

    public function getPaymentAmount(): ?array
    {
        return $this->paymentAmount;
    }

    public function addPaymentAmount(?float $paymentAmount): self
    {
        $this->paymentAmount[] = $paymentAmount;

        return $this;
    }

    public function getTotalAmountInvoice(): ?string
    {
        return $this->totalAmountInvoice;
    }

    public function setTotalAmountInvoice(?string $totalAmountInvoice): self
    {
        $this->totalAmountInvoice = $totalAmountInvoice;

        return $this;
    }

    public function getTotalAmountTaxInvoic(): ?string
    {
        return $this->totalAmountTaxInvoic;
    }

    public function setTotalAmountTaxInvoic(?string $totalAmountTaxInvoic): self
    {
        $this->totalAmountTaxInvoic = $totalAmountTaxInvoic;

        return $this;
    }

    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(?string $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    public function getSupplierSocialDenomination(): ?string
    {
        return $this->supplierSocialDenomination;
    }

    public function setSupplierSocialDenomination(?string $supplierSocialDenomination): self
    {
        $this->supplierSocialDenomination = $supplierSocialDenomination;

        return $this;
    }

    public function getSupplierNif(): ?string
    {
        return $this->supplierNif;
    }

    public function setSupplierNif(?string $supplierNif): self
    {
        $this->supplierNif = $supplierNif;

        return $this;
    }

    public function getSupplierAlternativaNifId(): ?int
    {
        return $this->supplierAlternativaNifId;
    }

    public function setSupplierAlternativaNifId(?int $supplierAlternativaNifId): self
    {
        $this->supplierAlternativaNifId = $supplierAlternativaNifId;

        return $this;
    }

    public function getExchangeRateInvoiceCux(): ?string
    {
        return $this->exchangeRateInvoiceCux;
    }

    public function setExchangeRateInvoiceCux(?string $exchangeRateInvoiceCux): self
    {
        $this->exchangeRateInvoiceCux = $exchangeRateInvoiceCux;

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

    public function getTotalGlobalDiscounts(): ?string
    {
        return $this->totalGlobalDiscounts;
    }

    public function setTotalGlobalDiscounts(?string $totalGlobalDiscounts): self
    {
        $this->totalGlobalDiscounts = $totalGlobalDiscounts;

        return $this;
    }

    /**
     * @return Collection<int, ApicustomData>
     */
    public function getCustomData(): Collection
    {
        return $this->customData;
    }

    public function addCustomData(ApiCustomData $customData): self
    {
        if (!$this->customData->contains($customData)) {
            $this->customData[] = $customData;
            $customData->setApiInvoiceRecieved($this);
        }

        return $this;
    }

    public function removeCustomData(ApiCustomData $customData): self
    {
        if ($this->customData->removeElement($customData)) {
            // set the owning side to null (unless already changed)
            if ($customData->getApiInvoiceRecieved() === $this) {
                $customData->setApiInvoiceRecieved(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, products>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProducts(ApiProducts $apiProduct): self
    {
        if (!$this->products->contains($apiProduct)) {
            $this->products[] = $apiProduct;
            $apiProduct->setProducts($this);
        }

        return $this;
    }

    public function removeProducts(ApiProducts $apiProduct): self
    {
        if ($this->products->removeElement($apiProduct)) {
            // set the owning side to null (unless already changed)
            if ($apiProduct->getProducts() === $this) {
                $apiProduct->setProducts(null);
            }
        }

        return $this;
    }
}
