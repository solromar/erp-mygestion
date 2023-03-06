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

        $xml = <<<xml
        <facturas_proveedor>
    <detalle>
        <id>31</id>
    </detalle>
</facturas_proveedor>   
xml;

        //Cargar el archivo XML
        $xml = simplexml_load_string($xml);

        //Transformar el archivo XML en formato JSON
        $json = json_encode($xml);

        $json = json_decode($json);

        foreach ($json as $key => $value) {
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
            /* LO TRAE EN OTRA API, ver si se puede traer por id factura asi
            traeria TODOS los productos y no uno solo (id20/id21)
            api : https://app05.mygestion.com/appMg/api/ApiDetallesFacturasProveedor/31?user=solromar23@hotmail.com&password=gestion2023
            */

            $xmlProducts = <<<xml
            
<detalles_facturas_proveedor>
    <detalle>
        <id>31</id>
        <factura_id>20</factura_id>
        <detalle>1</detalle>
        <articulo>HDD-DR21</articulo>
        <descripcion>DISCO DURO EXTERNO 650 GB</descripcion>
        <cantidad>30.000000</cantidad>
        <coste_divisa>100.000000</coste_divisa>
        <base_imponible>3000.000000</base_imponible>
        <tipo_iva>21.00</tipo_iva>
        <iva>630.000000</iva>
        <total_detalle>3630.000000</total_detalle>
        <porcen_dto>0.00</porcen_dto>
        <dto_lineal>0.000000</dto_lineal>
        <centro_coste />
        <proyecto />
        <albaran_id>22</albaran_id>
        <hinsert>2023-02-24 12:50:07</hinsert>
        <hupdate>2023-02-24 12:50:07</hupdate>
        <uinsert>_og</uinsert>
        <uupdate />
        <product_attribute_id />
        <desc_combinacion />
        <caducidad />
    </detalle>
</detalles_facturas_proveedor>
xml;
            //Cargar el archivo XML
            $xmlProducts = simplexml_load_string($xmlProducts);

            //Transformar el archivo XML en formato JSON
            $jsonProducts = json_encode($xmlProducts);

            $jsonProducts = json_decode($jsonProducts);


            foreach ($jsonProducts as $key => $product) {
                $apiProduct = new ApiProducts('');

                // Product basic info...
                $apiProduct->setId($product->id);
                $apiProduct->setProductName($product->articulo);
                $apiProduct->setProductUnitsType($product->cantidad);
                $apiProduct->setProductDescription($product->descripcion);

                // Product amount...
                $apiProduct->setAmountWithTaxesLine($product->total_detalle);

                // Product totals...
                $apiProduct->setTotalWeightItem('');
                $apiProduct->setTotalPriceCostItem($product->base_imponible);
                $apiProduct->setTotalDiscountsItem($product->dto_lineal);
                $apiProduct->setTotalAmountTaxesArticle($product->iva);
                $apiProduct->setTotalAmountRetainedItem('');

                // Product references...
                $apiProduct->setReferenceProductAdditional('');
                $apiProduct->setReferenceProductSupplier('');
                dd($apiProduct);

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

            $this->api->post($apiInvoiceRecieved, 'invoice_recieveds', '');
        }

        return new JsonResponse($data->controllerName . ": " . $this->api->getSummary());
    }
}
