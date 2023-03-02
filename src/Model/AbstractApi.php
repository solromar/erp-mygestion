<?php

namespace App\Model;

use App\DBAL\Type\EventType;
use App\Service\Serializer;
use App\Repository\AbstractBillAddressRepository;
use Doctrine\ORM\Mapping as ORM;

abstract class AbstractApi
{
    protected string $id;

    protected $referenceCurrency = 'EUR';

    protected $monetaryAmountTerm;
    
    protected $storeOutputErpText;
    
    protected $storeOutputErp;

    protected $expirationDate;

    protected $erpName;
    
    protected $holderBookNif;

    protected $buyerNif;

    protected $buyerAlternativeNifId;

    protected $holderAlternativeNifId;
    
    protected $supplierNif;
    
    protected $supplierAlternativeNifId;

    protected $supplierSocialDenomination;
    
    protected $counterpartNameSocial;
    
    protected $counterpartNif;
    
    protected $counterpartAlternativeNifId;
    
    protected $counterpartCountry;
    
    protected $counterpartAlternativeNifIdType;
    
    public function __construct($value)
    {
        
        $serializer = (new Serializer())->serializer;

        $this->setStoreOutputErp('');
        $this->setStoreOutputErpText($serializer->serialize($value, 'json'));
        $this->setErpNameAutomatically();
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        
        return $this;
    }

    public function setErpNameAutomatically() {
        $this->setErpName(strtoupper('billage'));
    }

    public function finalSetUps() {
        if (get_class($this) == EventType::CLASS_INVOICE_ISSUED) {
            $this->setCounterpartNameSocial('');
        }

        if (get_class($this) == EventType::CLASS_INVOICE_RECIEVED) {
            $this->setCounterpartNameSocial('');
        }
    }

    public function getReferenceCurrency(): ?string
    {
        return strtoupper($this->referenceCurrency) ?? 'EUR';
    }

    public function setReferenceCurrency(?string $referenceCurrency): self
    {
        $this->referenceCurrency = strtoupper($referenceCurrency) ?? 'EUR';

        return $this;
    }

    public function setBuyerNif(?string $buyerNif): self 
    {
        $this->buyerNif = $buyerNif;

        return $this;
    }

    public function setBuyerAlternativeNifId(?string $buyerAlternativeNifId): self 
    {
        $this->buyerAlternativeNifId = $buyerAlternativeNifId;

        return $this;
    }

    public function setHolderBookNif(?string $holderBookNif): self 
    {
        $this->holderBookNif = $holderBookNif;

        return $this;
    }

    public function setHolderAlternativeNifId(?string $holderAlternativeNifId): self 
    {
        $this->holderAlternativeNifId = $holderAlternativeNifId;

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
    
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
    
    public function setExpirationDate(?string $expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }
     
    public function getStoreOutputErpText()
    {
        return $this->storeOutputErpText;
    }
    
    public function setStoreOutputErpText($storeOutputErpText): self
    {
        $this->storeOutputErpText = $storeOutputErpText;

        return $this;
    }
    
    public function getStoreOutputErp()
    {
        return $this->storeOutputErp;
    }
    
    public function setStoreOutputErp($storeOutputErp): self
    {
        $this->storeOutputErp = $storeOutputErp;

        return $this;
    }

    public function getMonetaryAmountTerm()
    {
        return $this->monetaryAmountTerm;
    }
    
    public function setMonetaryAmountTerm($monetaryAmountTerm): self
    {
        $this->monetaryAmountTerm = $monetaryAmountTerm;

        return $this;
    }

    public function setBuyerNifOrAlternativeNif(?string $nifTitular) {
        $pattern = "/^[A-Z]+$/i";
        $str = $nifTitular;
        
        if(strlen($str) == 9) {
            $sub = substr($str, 1);
            $cond1 = preg_match($pattern, $str[0]) && (int) $sub != 0;
            
            $sub = substr($str, 0, -1);
            $cond2 = preg_match($pattern, $str[strlen($str) - 1]) && (int) $sub != 0;

            if ($cond1 || $cond2) {
                $this->setBuyerNif($str);
            } else {
                $this->setBuyerAlternativeNifId($str);
            }
        } else {
            $this->setBuyerAlternativeNifId($str);
        }
    }

    public function setHolderCifOrAlternativeCif(?string $cifTitular) {
        $pattern = "/^[A-Z]+$/i";
        $str = $cifTitular;
        
        if(strlen($str) == 9) {
            $sub = substr($str, 1);
            $cond1 = preg_match($pattern, $str[0]) && (int) $sub != 0;
            
            $sub = substr($str, 0, -1);
            $cond2 = preg_match($pattern, $str[strlen($str) - 1]) && (int) $sub != 0;

            if ($cond1 || $cond2) {
                $this->setHolderBookNif($str);
            } else {
                $this->setHolderAlternativeNifId($str);
            }
        } else {
            $this->setHolderAlternativeNifId($str);
        }
    }

    public function setSupplierCifOrAlternativeCif(?string $cifProveedor) {
        $pattern = "/^[A-Z]+$/i";
        $str = $cifProveedor;
        
        if(strlen($str) == 9) {
            $sub = substr($str, 1);
            $cond1 = preg_match($pattern, $str[0]) && (int) $sub != 0;
            
            $sub = substr($str, 0, -1);
            $cond2 = preg_match($pattern, $str[strlen($str) - 1]) && (int) $sub != 0;

            if ($cond1 || $cond2) {
                $this->setSupplierNif($str);
            } else {
                $this->setSupplierAlternativeNifId($str);
            }
        } else {
            $this->setSupplierAlternativeNifId($str);
        }
    }

    public function setCounterpartNifOrAlternativeNif(?string $nifProveedor) {
        $pattern = "/^[A-Z]+$/i";
        $str = $nifProveedor;
        
        if(strlen($str) == 9) {
            $sub = substr($str, 1);
            $cond1 = preg_match($pattern, $str[0]) && (int) $sub != 0;
            
            $sub = substr($str, 0, -1);
            $cond2 = preg_match($pattern, $str[strlen($str) - 1]) && (int) $sub != 0;

            if ($cond1 || $cond2) {
                $this->setCounterpartNif($str);
            } else {
                $this->setCounterpartAlternativeNifId($str);
            }
        } else {
            $this->setCounterpartAlternativeNifId($str);
        }
    }
    
    public function getCounterpartNameSocial()
    {
        return $this->counterpartNameSocial;
    }
    
    public function setCounterpartNameSocial(?string $counterpartNameSocial): self
    {
        $this->counterpartNameSocial = $counterpartNameSocial;

        return $this;
    }
    
    public function getCounterpartNif()
    {
        return $this->counterpartNif;
    }

    public function setCounterpartNif(?string $counterpartNif): self
    {
        $this->counterpartNif = $counterpartNif;

        return $this;
    }
    
    public function getCounterpartAlternativeNifId()
    {
        return $this->counterpartAlternativeNifId;
    }
    
    public function setCounterpartAlternativeNifId(?string $counterpartAlternativeNifId): self
    {
        $this->counterpartAlternativeNifId = $counterpartAlternativeNifId;

        return $this;
    }
    
    public function getCounterpartCountry()
    {
        return $this->counterpartCountry;
    }
    
    public function setCounterpartCountry(?string $counterpartCountry): self
    {
        $this->counterpartCountry = $counterpartCountry;

        return $this;
    }
    
    public function getCounterpartAlternativeNifIdType()
    {
        return $this->counterpartAlternativeNifIdType;
    }
    
    public function setCounterpartAlternativeNifIdType(?string $counterpartAlternativeNifIdType): self
    {
        $this->counterpartAlternativeNifIdType = $counterpartAlternativeNifIdType;

        return $this;
    }
    
    public function getSupplierNif()
    {
        return $this->supplierNif;
    }
    
    public function setSupplierNif(?string $supplierNif): self
    {
        $this->supplierNif = $supplierNif;

        return $this;
    }
    
    public function getSupplierAlternativeNifId()
    {
        return $this->supplierAlternativeNifId;
    }
    
    public function setSupplierAlternativeNifId(?string $supplierAlternativeNifId): self
    {
        $this->supplierAlternativeNifId = $supplierAlternativeNifId;

        return $this;
    }
    
    public function getSupplierSocialDenomination()
    {
        return $this->supplierSocialDenomination;
    }
    
    public function setSupplierSocialDenomination(?string $supplierSocialDenomination): self
    {
        $this->supplierSocialDenomination = $supplierSocialDenomination;

        return $this;
    }
}
