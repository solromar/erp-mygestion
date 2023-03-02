<?php

namespace App\Controller;

use stdClass;
use App\Entity\ApiTaxes;
use App\Entity\EventTaxes;
use App\Entity\TaxesRegister;
use App\Controller\AbstractAppController;
use App\DBAL\Type\EventType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PollController extends AbstractAppController
{
    /**
     * @Route("/poll", name="app_poll")
     */
    public function validation(Request $request)
    {
        $msg = 'All data loaded successfully';
        $code = 200;
        $data = json_decode($request->getContent());

        $payload = [
            "username" => $data->username ?? null,
            "password" => $data->password ?? null,
            "apiKey" => $data->apiKey ?? null,
            "nif" => $data->nif ?? null,
            "lastUpdates" => $data->lastUpdates
        ];

        $currentLastUpdate = null;
        $bkLastUpdates = $payload['lastUpdates'];
        
        $controllers = EventType::EVENT_TYPES;
        
        $class = $controllers['FACTURA_EMITIDA'] . '::index';
        $jsonResponses = [];

        foreach ($bkLastUpdates as $controllerName => $lastUpdate) {
            if ($controllers[$controllerName]) {

                $class = $controllers[$controllerName] . '::index';
                $currentLastUpdate = $bkLastUpdates->$controllerName;
                $payload['lastUpdates'] = $currentLastUpdate;
                $payload['controllerName'] = $controllerName;

                $response = $this->forward($class, $payload);
                $jsonResponses[$controllerName] = $response->getContent();
                
                if (strlen($response->getContent()) > 100) {
                    $jsonResponses[$controllerName] = "$controllerName Fallo...";
                    $code = 500;
                }
                
                if (str_contains($response->getContent(), '401') || str_contains($response->getContent(), '400')) {
                    $code = 401;
                    $msg = "La ApiKey es invalida, esta vencida o no esta registrada.\nContacte con su proveedor...";
                    
                    return new JsonResponse($msg, $code);
                }
            }
        }

        $msg = implode("\n",$jsonResponses);

        return new JsonResponse($msg, $code);
    }
    
}
