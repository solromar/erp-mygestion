<?php

namespace App\Controller;

use DateTime;
use App\Entity\Products;
use App\Entity\ApiProducts;
use App\Service\ApiService;
use App\Entity\CustomFields;
use App\Entity\ApiCustomData;
use App\Entity\ApiInvoiceRecieved;
use App\Entity\InvoiceRecievedEvent;
use App\Entity\InvoiceRecievedRegistry;
use App\Controller\AbstractAppController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InvoiceRecievedController extends AbstractAppController
{
    /**
     * @Route("/invoice/recieved", name="app_invoice_recieved")
     */
    public function index(Request $request): JsonResponse
    {
        $data = (object) $request->attributes->all('');

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
            $apiInvoiceRecieved = new ApiInvoiceRecieved($value);

            // Invoice basic info...
            $apiInvoiceRecieved->setId('');
            $apiInvoiceRecieved->setInvoiceNumber('');
            $apiInvoiceRecieved->setReferenceCurrency('');

            // Invoice expiration date...
            $apiInvoiceRecieved->setExpirationDate('');



            // Invoice Target NIF...
            $apiInvoiceRecieved->setBuyerSocialDenomination('');
            $apiInvoiceRecieved->setBuyerNifOrAlternativeNif('');

            // Invoice Issuer NIF/CIF...
            $apiInvoiceRecieved->setHolderBookSocialName('');
            $apiInvoiceRecieved->setHolderCifOrAlternativeCif('');

            // Invoice Supplier NIF/CIF...
            $apiInvoiceRecieved->setSupplierSocialDenomination('');
            $apiInvoiceRecieved->setSupplierCifOrAlternativeCif('');


            
            // Invoice Dates...
            $apiInvoiceRecieved->setInvoiceDate('');
            $apiInvoiceRecieved->setDatePaymentTerm('');

            // Invoice Amounts...
            $apiInvoiceRecieved->setMonetaryAmountTerm('');
            $apiInvoiceRecieved->setTotalAmountInvoice('');
            $apiInvoiceRecieved->setTotalAmountTaxInvoic('');

            // Invoice extras...
            $apiInvoiceRecieved->setDescriptionObject('');
            $apiInvoiceRecieved->setTaxableBaseTotal('');
            $apiInvoiceRecieved->setExchangeRateInvoiceCux('');
            $apiInvoiceRecieved->setTotalGlobalDiscounts('');

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
                    
                $apiInvoiceRecieved->addProducts($apiProduct); 
            }

            // Custom datas
            $customData = new ApiCustomData();
            $customData->setId('');
            $customData->setDescription('');
            $customData->setDataString('');
            
            $apiInvoiceRecieved->addCustomData($customData);

            // END...
            dd($apiInvoiceRecieved);
            
            $this->api->post($apiInvoiceRecieved, 'invoice_emitteds', '');
        }

        return new JsonResponse($data->controllerName . ": " . $this->api->getSummary());
    }
}