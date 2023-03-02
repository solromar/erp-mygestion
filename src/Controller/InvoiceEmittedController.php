<?php

namespace App\Controller;

use DateTime;
use App\Entity\Products;
use App\Entity\ApiProducts;
use App\Service\ApiService;
use App\Entity\CustomFields;
use App\Entity\ApiCustomData;
use App\Entity\ApiInvoiceEmitted;
use App\Entity\InvoiceEmittedEvent;
use App\Entity\InvoiceEmittedRegistry;
use App\Controller\AbstractAppController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\Unique;

class InvoiceEmittedController extends AbstractAppController
{
    /**
     * @Route("/invoice/emitted", name="app_invoice_emitted")
     */
    public function index(Request $request): JsonResponse
    {
        $data = (object) $request->attributes->all();

        $response = <<<json
        {
            "ejemplo": [],
            "ejemplo1": 60,
            "ejemplo2": 1,
            "ejemplo3": 1,
            "ejemplo4": 1,
            "ejemplo5": 1
        }
        json;
        
        $response = json_decode($response);

        foreach ($response as $key => $value) {
            $apiInvoiceEmitted = new ApiInvoiceEmitted($value);

            // Invoice basic info...
            $apiInvoiceEmitted->setId('');
            $apiInvoiceEmitted->setInvoiceNumber('');
            $apiInvoiceEmitted->setReferenceCurrency('');

            // Invoice expiration date...
            $apiInvoiceEmitted->setExpirationDate('');
            
            

            // Invoice Target NIF...
            $apiInvoiceEmitted->setBuyerSocialDenomination('');
            $apiInvoiceEmitted->setBuyerNifOrAlternativeNif('');

            // Invoice Issuer NIF/CIF...
            $apiInvoiceEmitted->setHolderBookSocialName('');
            $apiInvoiceEmitted->setHolderCifOrAlternativeCif('');

            // Invoice Supplier NIF/CIF...
            $apiInvoiceEmitted->setSupplierSocialDenomination('');
            $apiInvoiceEmitted->setSupplierCifOrAlternativeCif('');



            // Invoice Dates...
            $apiInvoiceEmitted->setInvoiceDate('');
            $apiInvoiceEmitted->setDatePaymentTerm('');

            // Invoice Amounts...
            $apiInvoiceEmitted->setMonetaryAmountTerm('');
            $apiInvoiceEmitted->setTotalAmountInvoice('');
            $apiInvoiceEmitted->setTotalAmountTaxInvoic('');

            // Invoice extras...
            $apiInvoiceEmitted->setDescriptionObject('');
            $apiInvoiceEmitted->setTaxableBaseTotal('');
            $apiInvoiceEmitted->setExchangeRateInvoiceCux('');
            $apiInvoiceEmitted->setTotalGlobalDiscounts('');

            // Invoice Products...
            foreach ($response->ejemplo as $key => $product) {
                $apiProduct = new ApiProducts('');
                
                // Product basic info...
                $apiProduct->setId('');
                $apiProduct->setProductName('');
                $apiProduct->setProductUnitsType('');
                $apiProduct->setProductDescription('');

                // Product amount...
                $apiProduct->setAmountWithTaxesLine('');

                // Product totals...
                $apiProduct->setTotalWeightItem('');
                $apiProduct->setTotalPriceCostItem('');
                $apiProduct->setTotalDiscountsItem('');
                $apiProduct->setTotalAmountTaxesArticle('');
                $apiProduct->setTotalAmountRetainedItem('');

                // Product references...
                $apiProduct->setReferenceProductAdditional('');
                $apiProduct->setReferenceProductSupplier('');
                    
                $apiInvoiceEmitted->addProducts($apiProduct); 
            }

            // Custom datas
            $customData = new ApiCustomData('');
            $customData->setId('');
            $customData->setDescription('');
            $customData->setDataString('');

            $apiInvoiceEmitted->addCustomData($customData);

            // END...
            dd($apiInvoiceEmitted);
            
            $this->api->post($apiInvoiceEmitted, 'invoice_emitteds', '');
        }

        return new JsonResponse($data->controllerName . ": " . $this->api->getSummary());
    }
}
