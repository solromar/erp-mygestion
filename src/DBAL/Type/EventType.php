<?php


namespace App\DBAL\Type;

use App\Controller\InvoiceEmittedController;
use App\Controller\InvoiceRecievedController;
use App\DBAL\EnumType;

use App\Entity\Events\OrderStart\Event as EventOrderStart;
use App\Entity\Events\OrderSent\Event as EventOrderSent;
use App\Entity\Events\OrderRecieved\Event as EventOrderRecieved;
use App\Entity\Events\InvoiceEmitted\Event as EventInvoiceEmitted;
use App\Entity\Events\InvoiceRecieved\Event as EventInvoiceRecieved;
use App\Entity\Events\Charge\Event as EventCharge;
use App\Entity\Events\Payment\Event as EventPayment;

/**
 * Class De0051Type
 *
 * @see https://www.gs1.org/sites/default/files/docs/EDI/eancom/2012/ean02s3/part3/dc24.htm
 */
class EventType extends EnumType
{
  // Register Canonnical names.
  const INVOICE_ISSUED = "FACTURA_EMITIDA";
  const INVOICE_RECIEVED = "FACTURA_RECIBIDA";
  const DELIVERY_NOTE = "ALBARAN";
  const TAXES = "IMPUESTO";
  const CONTACT = "CONTACTO";
  const EMPLOYEE = "EMPLEADO";

  // Register class namespace.
  const CLASS_INVOICE_ISSUED = InvoiceEmittedController::class;
  const CLASS_INVOICE_RECIEVED = InvoiceRecievedController::class;
  const CLASS_DELIVERY_NOTE = null;
  const CLASS_TAXES = null;
  const CLASS_CONTACT = null;
  const CLASS_EMPLOYEE = null;

  // Assoc. canonical names with class names.
  const EVENT_TYPES = [
      self::INVOICE_ISSUED => self::CLASS_INVOICE_ISSUED,
      self::INVOICE_RECIEVED => self::CLASS_INVOICE_RECIEVED,
      self::DELIVERY_NOTE => self::CLASS_DELIVERY_NOTE,
      self::TAXES => self::CLASS_TAXES,
      self::CONTACT => self::CLASS_CONTACT,
      self::EMPLOYEE => self::CLASS_EMPLOYEE
   ];

   // A list of all events that uses or extends invoice.
   const INVOICE_EVENTS = [
      self::CLASS_INVOICE_ISSUED,
      self::CLASS_INVOICE_RECIEVED
    ];

  // Automatically register types in Database
  protected string $name = 'status';
  protected array $values = self::EVENT_TYPES;
}