<?php


namespace App\Service;

use Symfony\Contracts\Translation\TranslatorInterface;

class Translator
{
    /**
     * @var TranslatorInterface $translatorInterface
     */
    protected TranslatorInterface $translatorInterface;

    /**
     * @param TranslatorInterface $translatorInterface
     */
    public function __construct(TranslatorInterface $translatorInterface)
    {
        $this->translatorInterface = $translatorInterface;
    }

    /**
     * @param string $key
     * @param array $parameters
     * @param string $domain
     * @param string $locale
     * 
     * @return string
     */
    public function trans(string $key, array $parameters = [], string $domain = null, string $locale = null): string
    {
        return $this->translatorInterface->trans($key, $parameters, $domain, $locale);
    }
}
