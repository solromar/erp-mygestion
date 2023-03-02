<?php

namespace App\Controller;

use GuzzleHttp\Client;
use App\Security\Roles;
use App\Service\ApiService;
use App\Service\Serializer;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AbstractAppController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private TranslatorInterface $translator;
    private Security $security;
    protected $serializer;
    public $client;
    public $logger;
    public $api;

    /**
     * AppController constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param TranslatorInterface $translator
     * @param Security $security
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        Security $security,
        LoggerInterface $logger,
        TranslatorInterface $translator,
        String $urlErpGral,
        ApiService $api
    ) {
        $this->serializer = (new Serializer())->serializer;
        $this->entityManager = $entityManager;
        $this->translator = $translator;
        $this->security = $security;
        $this->logger = $logger;
        $this->client = new Client(['base_uri' => $urlErpGral]);
        $this->api = $api;
    }

    public function convertUnixTimeToDate(?int $unixTime) {
        return gmdate("Y-m-d\TH:i:s\Z", $unixTime);
    }

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    /**
     * @param string $id
     * @param array $parameters
     * @param string|null $domain
     * @param string|null $locale
     *
     * @return string
     */
    protected function trans(string $id, array $parameters = [], string $domain = null, string $locale = null): string
    {
        return $this->translator->trans($id, $parameters, $domain, $locale);
    }
}
