<?php

namespace App\Entity;

use App\Model\AbstractApi;
use App\Entity\ApiBillAddress;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\AbstractApiController;
use Doctrine\Common\Collections\Collection;
use App\Repository\ApiEventContactsRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ApiContactsRepository::class)
 */
class ApiEventContacts extends AbstractApi
{
    protected $counterpartNameSocial;

    protected $counterpartEmail;
   
    protected $counterpartTags;
    
    protected $counterpartIban;
    
    protected $counterpartNif;

    protected $counterpartyName;

    protected $counterpartAlternativaNifId;
    
    protected $counterpartCountry;

    protected $counterpartySwift;

    protected $counterpartPhone;
    
    protected $counterpartMobilePhone;
    
    protected $counterpartWeb;
   
    protected $referenceHolderContact;

    protected $customerRegistration;

    protected $supplierRegistration;

    protected $companyType;
   
    protected $holderBookSocialName;

    /**
     * @ORM\OneToMany(targetEntity=ApiShippingAddresses::class, mappedBy="apiEventContacts")
     */
    protected $addresses;

    /**
     * @ORM\OneToMany(targetEntity=ApiNotes::class, mappedBy="apiEventContacts")
     */
    protected $notes;

    /**
     * @ORM\OneToMany(targetEntity=ApiContactPersons::class, mappedBy="apiEventContacts")
     */
    protected $personContact;

    /**
     * @ORM\OneToMany(targetEntity=ApiCustomData::class, mappedBy="apiEventContacts")
     */
    protected $customData;

    /**
     * @ORM\OneToOne(targetEntity=ApiConfig::class, cascade={"persist", "remove"})
     */
    protected $config;

    /**
     * @ORM\OneToOne(targetEntity=ApiBillAddress::class, cascade={"persist", "remove"})
     */
    protected $billingAddress;

    public function __construct($value)
    {
        parent::__construct($value);

        $this->addresses = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->personContact = new ArrayCollection();
        $this->customData = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }
    

    public function getCounterpartNameSocial(): ?string
    {
        return $this->counterpartNameSocial;
    }

    public function setCounterpartNameSocial(?string $counterpartNameSocial): self
    {
        $this->counterpartNameSocial = $counterpartNameSocial;

        return $this;
    }

    public function getCounterpartEmail(): ?string
    {
        return $this->counterpartEmail;
    }

    public function setCounterpartEmail(?string $counterpartEmail): self
    {
        $this->counterpartEmail = $counterpartEmail;

        return $this;
    }

    public function getCounterpartTags(): ?string
    {
        return $this->counterpartTags;
    }

    public function setCounterpartTags(?string $counterpartTags): self
    {
        $this->counterpartTags = $counterpartTags;

        return $this;
    }

    public function getCounterpartIban(): ?string
    {
        return $this->counterpartIban;
    }

    public function setCounterpartIban(?string $counterpartIban): self
    {
        $this->counterpartIban = $counterpartIban;

        return $this;
    }

    public function getCounterpartNif(): ?string
    {
        return $this->counterpartNif;
    }

    public function setCounterpartNif(?string $counterpartNif): self
    {
        $this->counterpartNif = $counterpartNif;

        return $this;
    }

    public function getCounterpartyName(): ?string
    {
        return $this->counterpartyName;
    }

    public function setCounterpartyName(?string $counterpartyName): self
    {
        $this->counterpartyName = $counterpartyName;

        return $this;
    }

    public function getCounterpartAlternativaNifId(): ?int
    {
        return $this->counterpartAlternativaNifId;
    }

    public function setCounterpartAlternativaNifId(?string $counterpartAlternativaNifId): self
    {
        $this->counterpartAlternativaNifId = $counterpartAlternativaNifId;

        return $this;
    }

    public function getCounterpartCountry(): ?string
    {
        return $this->counterpartCountry;
    }

    public function setCounterpartCountry(?string $counterpartCountry): self
    {
        $this->counterpartCountry = $counterpartCountry;

        return $this;
    }

    public function getCounterpartySwift(): ?string
    {
        return $this->counterpartySwift;
    }

    public function setCounterpartySwift(?string $counterpartySwift): self
    {
        $this->counterpartySwift = $counterpartySwift;

        return $this;
    }

    public function getCounterpartPhone(): ?string
    {
        return $this->counterpartPhone;
    }

    public function setCounterpartPhone(?string $counterpartPhone): self
    {
        $this->counterpartPhone = $counterpartPhone;

        return $this;
    }

    public function getCounterpartMobilePhone(): ?string
    {
        return $this->counterpartMobilePhone;
    }

    public function setCounterpartMobilePhone(?string $counterpartMobilePhone): self
    {
        $this->counterpartMobilePhone = $counterpartMobilePhone;

        return $this;
    }    public function getCounterpartWeb(): ?string
    {
        return $this->counterpartWeb;
    }

    public function setCounterpartWeb(?string $counterpartWeb): self
    {
        $this->counterpartWeb = $counterpartWeb;

        return $this;
    }
    
    public function getReferenceHolderContact(): ?string
    {
        return $this->referenceHolderContact;
    }

    public function setReferenceHolderContact(?string $referenceHolderContact): self
    {
        $this->referenceHolderContact = $referenceHolderContact;

        return $this;
    }

    public function getCustomerRegistration(): ?string
    {
        return $this->customerRegistration;
    }

    public function setCustomerRegistration(?string $customerRegistration): self
    {
        $this->customerRegistration = $customerRegistration;

        return $this;
    }

    public function getSupplierRegistration(): ?string
    {
        return $this->supplierRegistration;
    }

    public function setSupplierRegistration(?string $supplierRegistration): self
    {
        $this->supplierRegistration = $supplierRegistration;

        return $this;
    }

    public function getCompanyType(): ?string
    {
        return $this->companyType;
    }

    public function setCompanyType(?string $companyType): self
    {
        $this->companyType = $companyType;

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

    /**
     * @return Collection<int, addresses>
     */
    public function getApiShippingAddress(): Collection
    {
        return $this->addresses;
    }

    public function addApiShippingAddress(ApiShippingAddresses $apiShippingAddress): self
    {
        if (!$this->addresses->contains($apiShippingAddress)) {
            $this->addresses[] = $apiShippingAddress;
            $apiShippingAddress->setApiEventContacts($this);
        }

        return $this;
    }

    public function removeApiShippingAddress(ApiShippingAddresses $apiShippingAddress): self
    {
        if ($this->addresses->removeElement($apiShippingAddress)) {
            // set the owning side to null (unless already changed)
            if ($apiShippingAddress->getApiEventContacts() === $this) {
                $apiShippingAddress->setApiEventContacts(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, notes>
     */
    public function getnotes(): Collection
    {
        return $this->notes;
    }

    public function addApiNote(ApiNotes $apiNote): self
    {
        if (!$this->notes->contains($apiNote)) {
            $this->notes[] = $apiNote;
            $apiNote->setApiEventContacts($this);
        }

        return $this;
    }

    public function removeApiNote(ApiNotes $apiNote): self
    {
        if ($this->notes->removeElement($apiNote)) {
            // set the owning side to null (unless already changed)
            if ($apiNote->getApiEventContacts() === $this) {
                $apiNote->setApiEventContacts(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, personContact>
     */
    public function getpersonContact(): Collection
    {
        return $this->personContact;
    }

    public function addApiPersonContact(ApiContactPersons $apiPersonContact): self
    {
        if (!$this->personContact->contains($apiPersonContact)) {
            $this->personContact[] = $apiPersonContact;
            $apiPersonContact->setApiEventContacts($this);
        }

        return $this;
    }

    public function removeApiPersonContact(ApiContactPersons $apiPersonContact): self
    {
        if ($this->personContact->removeElement($apiPersonContact)) {
            // set the owning side to null (unless already changed)
            if ($apiPersonContact->getApiEventContacts() === $this) {
                $apiPersonContact->setApiEventContacts(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ApiCustomData>
     */
    public function getCustomData(): Collection
    {
        return $this->customData;
    }

    public function addCustomData(ApiCustomData $customData): self
    {
        if (!$this->customData->contains($customData)) {
            $this->customData[] = $customData;
            $customData->setApiEventContacts($this);
        }

        return $this;
    }

    public function removeCustomData(ApiCustomData $customData): self
    {
        if ($this->customData->removeElement($customData)) {
            // set the owning side to null (unless already changed)
            if ($customData->getApiEventContacts() === $this) {
                $customData->setApiEventContacts(null);
            }
        }

        return $this;
    }

    public function getApiConfig(): ?ApiConfig
    {
        return $this->config;
    }

    public function setApiConfig(?ApiConfig $config): self
    {
        $this->config = $config;

        return $this;
    }

    public function getBillingAddress(): ?ApiBillAddress
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?ApiBillAddress $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

  
  
}
