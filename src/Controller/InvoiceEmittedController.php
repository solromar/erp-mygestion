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

        $xml = <<<xml
        <?xml version="1.0" encoding="UTF-8"?>
<facturas_cliente>
    <factura>
        <id>34</id>
        <empresa>1</empresa>
        <anio>2023</anio>
        <serie>A</serie>
        <factura>1</factura>
        <fecha_factura>2023-02-11</fecha_factura>
        <cliente>5</cliente>
        <nombre_cliente>ANDRADES CONSULTING S.A.</nombre_cliente>
        <delegacion />
        <almacen>CENTRAL </almacen>
        <concepto>De MODA</concepto>
        <asiento_ventas>2</asiento_ventas>
        <asiento_ejercicio>2023</asiento_ejercicio>
        <cuenta_grupo_ventas>700000003</cuenta_grupo_ventas>
        <fecha_traspaso>2023-02-11</fecha_traspaso>
        <agente />
        <nombre_agente />
        <forma_pago>CONTADO</forma_pago>
        <divisa>EUR</divisa>
        <presupuesto_id />
        <presupuesto_anio />
        <presupuesto_num />
        <albaran_id>24</albaran_id>
        <albaran_anio>2023</albaran_anio>
        <albaran_serie>A</albaran_serie>
        <albaran_num>100</albaran_num>
        <bultos>0</bultos>
        <tasa_conversion>1.0000</tasa_conversion>
        <valor_en_euros>175.00</valor_en_euros>
        <importe_detalles>175.00</importe_detalles>
        <base_imponible>175.00</base_imponible>
        <iva>36.75</iva>
        <recargo_equiv>0.00</recargo_equiv>
        <total_factura>211.75</total_factura>
        <porcen_dto_pp>0.00</porcen_dto_pp>
        <porcen_dto_especial>0.00</porcen_dto_especial>
        <porcen_rec_financiero>0.00</porcen_rec_financiero>
        <rec_financiero>0.00</rec_financiero>
        <entrega_a_cuenta>0.00</entrega_a_cuenta>
        <fecha_vto>2023-02-11</fecha_vto>
        <pagada>SI</pagada>
        <tiene_recibos>SI</tiene_recibos>
        <observaciones />
        <porcen_irpf>0.00</porcen_irpf>
        <irpf>0.00</irpf>
        <tipo_factura>FACTURA</tipo_factura>
        <check_intrastat />
        <regimen_iva />
        <trabajador />
        <hinsert>2023-02-24 12:50:07</hinsert>
        <hupdate>2023-02-24 12:50:07</hupdate>
        <uinsert>_og</uinsert>
        <uupdate />
        <tpv />
        <porcen_comision>0.00</porcen_comision>
        <check_impresa />
        <check_firmada>NO</check_firmada>
        <check_publicada>NO</check_publicada>
        <check_enviada />
        <alq_id />
        <alq_modalidad />
        <alq_porcentaje />
        <alq_unidades />
        <api_codigo_factura />
        <api_origen_factura />
        <medio_de_pago />
        <ultimos_digitos />
        <cobrado_moneda>0.00</cobrado_moneda>
        <cobrado_tarjeta>0.00</cobrado_tarjeta>
        <entregado_moneda>0.00</entregado_moneda>
        <entregado_tarjeta>0.00</entregado_tarjeta>
        <entregado_vales>0.00</entregado_vales>
        <entregado_otros>0.00</entregado_otros>
        <devuelto_moneda>0.00</devuelto_moneda>
        <fecha_pago />
        <caja_venta />
        <caja_cobro />
        <devuelto_tarjeta>0.00</devuelto_tarjeta>
        <devuelto_vales>0.00</devuelto_vales>
    </factura>
</facturas_cliente>
xml;

        //Cargar el archivo XML
        $xml = simplexml_load_string($xml);

        //Transformar el archivo XML en formato JSON
        $json = json_encode($xml);

        $json = json_decode($json);

        $response = <<<json
        {
            
        }
        json;

        $response = json_decode($response);

        foreach ($response as $key => $value) {
            $apiInvoiceEmitted = new ApiInvoiceEmitted($value);

            // Invoice basic info...
            $apiInvoiceEmitted->setId($value->id);            
            $apiInvoiceEmitted->setInvoiceNumber($value->factura);
            $apiInvoiceEmitted->setReferenceCurrency($value->divisa);

            

            // Invoice expiration date...
            $apiInvoiceEmitted->setExpirationDate($value->fecha_vto);

            dd($apiInvoiceEmitted);

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


            $this->api->post($apiInvoiceEmitted, 'invoice_emitteds', '');
        }

        return new JsonResponse($data->controllerName . ": " . $this->api->getSummary());
    }
}
