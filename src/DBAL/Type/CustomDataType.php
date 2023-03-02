<?php


namespace App\DBAL\Type;


use App\DBAL\EnumType;

/**
 * Class De0051Type
 *
 * @see https://www.gs1.org/sites/default/files/docs/EDI/eancom/2012/ean02s3/part3/dc24.htm
 */
class CustomDataType extends EnumType
{
    const CUSTOM_DATA_TYPES = [
        000 => "denomination", 
        001 => "description", 
        002 => "miscellaneous", 
        003 => "amount",
        004 => "nif", 
        005 => "timestamp", 
        006 => "date"
    ];

    protected string $name = 'custom';
    protected array $values = self::CUSTOM_DATA_TYPES;
}