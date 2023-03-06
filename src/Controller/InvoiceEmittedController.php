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



        foreach ($json as $key => $value) {
            $apiInvoiceEmitted = new ApiInvoiceEmitted($value);

            // Invoice basic info...
            $apiInvoiceEmitted->setId($value->id);
            $apiInvoiceEmitted->setInvoiceNumber($value->factura);
            $apiInvoiceEmitted->setReferenceCurrency($value->divisa);



            // Invoice expiration date...
            $apiInvoiceEmitted->setExpirationDate($value->fecha_vto);



            // Invoice Target NIF...
            $apiInvoiceEmitted->setBuyerSocialDenomination($value->nombre_cliente);
            // NO TRAE LA API $apiInvoiceEmitted->setBuyerNifOrAlternativeNif('');

            // Invoice Issuer NIF/CIF...
            // NO TRAE LA API $apiInvoiceEmitted->setHolderBookSocialName('');
            // NO TRAE LA API $apiInvoiceEmitted->setHolderCifOrAlternativeCif('');

            // Invoice Supplier NIF/CIF... NO CORRESPONDE POR SER INVOICE EMITTED
            //$apiInvoiceEmitted->setSupplierSocialDenomination('');
            //$apiInvoiceEmitted->setSupplierCifOrAlternativeCif('');



            // Invoice Dates...
            $apiInvoiceEmitted->setInvoiceDate($value->fecha_factura);
            // TODO:$apiInvoiceEmitted->setDatePaymentTerm($value->fecha_pago);
            //la respuesta esta vacia y trae error

            // Invoice Amounts...
            $apiInvoiceEmitted->setMonetaryAmountTerm('');
            $apiInvoiceEmitted->setTotalAmountInvoice($value->total_factura);
            $apiInvoiceEmitted->setTotalAmountTaxInvoic($value->iva);

            // Invoice extras...
            $apiInvoiceEmitted->setDescriptionObject($value->concepto);
            $apiInvoiceEmitted->setTaxableBaseTotal($value->base_imponible);
            $apiInvoiceEmitted->setExchangeRateInvoiceCux($value->tasa_conversion);
            $apiInvoiceEmitted->setTotalGlobalDiscounts($value->porcen_dto_pp);



            // Invoice Products... TODO: LO TRAE EN OTRA API

            $xmlProducts = <<<xml
            
<detalles_facturas_cliente>
    <detalle>
        <id>37</id>
        <factura_id>34</factura_id>
        <detalle>1</detalle>
        <articulo>CAM-RS22</articulo>
        <descripcion>CAMARA DIGITAL 9MPX</descripcion>
        <cantidad>1.000000</cantidad>
        <precio_venta>65.000000</precio_venta>
        <base_imponible />
        <tipo_iva>21.00</tipo_iva>
        <iva />
        <porcen_dto>0.00</porcen_dto>
        <dto_lineal>0.000000</dto_lineal>
        <total_detalle />
        <agente>nul</agente>
        <porcen_comision>0.00</porcen_comision>
        <centro_coste />
        <proyecto />
        <albaran_id>24</albaran_id>
        <hinsert>2023-02-24 12:50:07</hinsert>
        <hupdate>2023-02-24 12:50:07</hupdate>
        <uinsert>_og</uinsert>
        <uupdate />
        <product_attribute_id />
        <desc_combinacion />
        <caducidad />
    </detalle>
</detalles_facturas_cliente>
xml;
            //Cargar el archivo XML
            $xmlProducts = simplexml_load_string($xmlProducts);

            //Transformar el archivo XML en formato JSON
            $jsonProducts = json_encode($xmlProducts);

            $jsonProducts = json_decode($jsonProducts);

            foreach ($jsonProducts as $key => $products) {
                $apiProduct = new ApiProducts('');

                // Product basic info...
                $apiProduct->setId($products->id);
                $apiProduct->setProductName($products->articulo);
                $apiProduct->setProductUnitsType($products->cantidad);
                $apiProduct->setProductDescription($products->descripcion);

                // Product amount...
                $apiProduct->setAmountWithTaxesLine($products->precio_venta);

                // Product totals...
                //no lo trae la API $apiProduct->setTotalWeightItem(''); 
                //no lo trae la API $apiProduct->setTotalPriceCostItem('');
                $apiProduct->setTotalDiscountsItem($products->dto_lineal);
                // TODO: no trae nada la API y me tira error $apiProduct->setTotalAmountTaxesArticle($product->iva);
                //no lo trae la API $apiProduct->setTotalAmountRetainedItem('');

                // Product references...
                //no lo trae la API $apiProduct->setReferenceProductAdditional('');
                //no lo trae la API $apiProduct->setReferenceProductSupplier('');

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
