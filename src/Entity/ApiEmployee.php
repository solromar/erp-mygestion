<?php

namespace App\Entity;

use App\Model\AbstractApi;
use App\Repository\ApiEmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiEmployeeRepository::class)
 */
class ApiEmployee extends AbstractApi
{    protected $surname;

    protected $descriptionSalary;

    protected $continuesInCompany;

    protected $durationWorkingDay;

    protected $email;

    protected $dateDeath;

    protected $dateEndContract;

    protected $dateStartContract;

    protected $dateBirth;

    protected $iban;

    protected $idContract;

    protected $taxesPayroll;

    protected $taxesPaidByTheCompanyPayroll;

    protected $modeWorkingDay;

    protected $nif;

    protected $acedemicLevel;

    protected $name;

    protected $numberPaySalary;

    protected $postWork;

    protected $holdingsPayroll;

    protected $salary;

    protected $grossSalaryPayroll;

    protected $salaryExtra;

    protected $salaryNetPayroll;

    protected $mobilePhone;

    protected $typeContract;

    protected $holderBookSocialName;

    /**
     * @ORM\OneToMany(targetEntity=ApiCustomData::class, mappedBy="apiEmployee")
     */
    protected $customData;

    public function __construct($value)
    {
        parent::__construct($value);

        $this->customData = new ArrayCollection();
    }
    

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of descriptionSalary
     */ 
    public function getDescriptionSalary()
    {
        return $this->descriptionSalary;
    }

    /**
     * Set the value of descriptionSalary
     *
     * @return  self
     */ 
    public function setDescriptionSalary($descriptionSalary)
    {
        $this->descriptionSalary = $descriptionSalary;

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
            $customData->setApiEmployee($this);
        }

        return $this;
    }

    public function removeCustomData(ApiCustomData $customData): self
    {
        if ($this->customData->removeElement($customData)) {
            // set the owning side to null (unless already changed)
            if ($customData->getApiEmployee() === $this) {
                $customData->setApiEmployee(null);
            }
        }

        return $this;
    }

    public function getContinuesInCompany(): ?string
    {
        return $this->continuesInCompany;
    }

    public function setContinuesInCompany(?string $continuesInCompany): self
    {
        $this->continuesInCompany = $continuesInCompany;

        return $this;
    }

    public function getDurationWorkingDay(): ?string
    {
        return $this->durationWorkingDay;
    }

    public function setDurationWorkingDay(?string $durationWorkingDay): self
    {
        $this->durationWorkingDay = $durationWorkingDay;

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

    public function getDateDeath(): ?string
    {
        return $this->dateDeath;
    }

    public function setDateDeath(?string $dateDeath): self
    {
        $this->dateDeath = $dateDeath;

        return $this;
    }

    public function getDateEndContract(): ?string
    {
        return $this->dateEndContract;
    }

    public function setDateEndContract(?string $dateEndContract): self
    {
        $this->dateEndContract = $dateEndContract;

        return $this;
    }

    public function getDateStartContract(): ?string
    {
        return $this->dateStartContract;
    }

    public function setDateStartContract(?string $dateStartContract): self
    {
        $this->dateStartContract = $dateStartContract;

        return $this;
    }

    public function getDateBirth(): ?string
    {
        return $this->dateBirth;
    }

    public function setDateBirth(?string $dateBirth): self
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getIdContract(): ?string
    {
        return $this->idContract;
    }

    public function setIdContract(?string $idContract): self
    {
        $this->idContract = $idContract;

        return $this;
    }

    public function getTaxesPayroll(): ?string
    {
        return $this->taxesPayroll;
    }

    public function setTaxesPayroll(?string $taxesPayroll): self
    {
        $this->taxesPayroll = $taxesPayroll;

        return $this;
    }

    public function getTaxesPaidByTheCompanyPayroll(): ?string
    {
        return $this->taxesPaidByTheCompanyPayroll;
    }

    public function setTaxesPaidByTheCompanyPayroll(?string $taxesPaidByTheCompanyPayroll): self
    {
        $this->taxesPaidByTheCompanyPayroll = $taxesPaidByTheCompanyPayroll;

        return $this;
    }

    public function getModeWorkingDay(): ?string
    {
        return $this->modeWorkingDay;
    }

    public function setModeWorkingDay(?string $modeWorkingDay): self
    {
        $this->modeWorkingDay = $modeWorkingDay;

        return $this;
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(?string $nif): self
    {
        $this->nif = $nif;

        return $this;
    }

    public function getAcedemicLevel(): ?string
    {
        return $this->acedemicLevel;
    }

    public function setAcedemicLevel(?string $acedemicLevel): self
    {
        $this->acedemicLevel = $acedemicLevel;

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

    public function getNumberPaySalary(): ?string
    {
        return $this->numberPaySalary;
    }

    public function setNumberPaySalary(?string $numberPaySalary): self
    {
        $this->numberPaySalary = $numberPaySalary;

        return $this;
    }

    public function getPostWork(): ?string
    {
        return $this->postWork;
    }

    public function setPostWork(?string $postWork): self
    {
        $this->postWork = $postWork;

        return $this;
    }

    public function getHoldingsPayroll(): ?string
    {
        return $this->holdingsPayroll;
    }

    public function setHoldingsPayroll(?string $holdingsPayroll): self
    {
        $this->holdingsPayroll = $holdingsPayroll;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(?string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getGrossSalaryPayroll(): ?string
    {
        return $this->grossSalaryPayroll;
    }

    public function setGrossSalaryPayroll(?string $grossSalaryPayroll): self
    {
        $this->grossSalaryPayroll = $grossSalaryPayroll;

        return $this;
    }

    public function getSalaryExtra(): ?array
    {
        return $this->salaryExtra;
    }

    public function setSalaryExtra(array $salaryExtra): self
    {
        $this->salaryExtra = $salaryExtra;

        return $this;
    }

    public function getSalaryNetPayroll(): ?string
    {
        return $this->salaryNetPayroll;
    }

    public function setSalaryNetPayroll(?string $salaryNetPayroll): self
    {
        $this->salaryNetPayroll = $salaryNetPayroll;

        return $this;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(?string $mobilePhone): self
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function getTypeContract(): ?string
    {
        return $this->typeContract;
    }

    public function setTypeContract(?string $typeContract): self
    {
        $this->typeContract = $typeContract;

        return $this;
    }

    public function getErpName(): ?string
    {
        return $this->erpName;
    }

    public function setErpName(?string $erpName): self
    {
        $this->erpName = $erpName;

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
