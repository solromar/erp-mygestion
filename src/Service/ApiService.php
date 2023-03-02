<?php 

namespace App\Service;

use DateTime;
use stdClass;
use App\Model\AbstractApi;
use App\Controller\AbstractApiController;
use Exception;
use JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiService extends AbstractApiController
{

    public static function generateUniqueId(string $concatOfStrings) {
        return hash("md5", $concatOfStrings);
    }

    public function serializeResponse($response) {
        return $this->serializer->serialize($response, 'json');
    }

    public function getFromResource(string $path, $key, $params = '') {
        $response = $this->client->get($this->urlErp . $path . "$params",
        [
            'headers' => [
                'Accept' => 'application/json',
                'key' => $key
            ],
        ]);

        $response = json_decode($response->getBody()->getContents());

        return $response;
    }
    
    public function getAllFromResource(string $path, $key, $lastUpdate = null) {
        $isAnotherPage = true;
        $page = 1;
        $responses = [];

        while ($isAnotherPage) {
            $array = $this->getFromResource($path, $key, "?page=$page");
            $array = gettype($array) == "object" ? current($array) : $array;

            $isAnotherPage = $array != [];

            if (!isset($array[0]->updatedAt)) {
                return $array;
            }
            
            if ($lastUpdate != null) {
                $justNewestArray = [];

                foreach ($array as $key => $object) {
                    if (isset($object->updatedAt) && $object->updatedAt > $lastUpdate) {
                        $justNewestArray[] = $object;
                    }
                }

                $responses = array_merge($responses, $justNewestArray);
            } else {
                $responses = array_merge($responses, $array);
            }

            $page += 1;
        }

        return $responses;
    }

    public function post($data, $resource, $lastUpdate = null): JsonResponse
    {
        // If not last update metadata supplied, then, post data...
        $data->finalSetUps();
        
        $this->total += 1;

        if (!$lastUpdate) {
            try {
                $response = $this->client->post($this->urlErpGral . $resource, 
                    [
                        'headers' => ['Content-Type' => 'application/ld+json', 'Accept' => 'application/ld+json'],
                        'body' => $this->serializer->serialize($data, 'json')
                    ]);
            } catch (\Throwable $th) {
                // If fail try to update it...
                $response = $this->update($data, $resource);
                
                if ($response->getStatusCode() == 200) {
                    return $response;
                }
                
                $this->error += 1;
                return new JsonResponse($th->getMessage(), 500);
            }
        }

        // If there a update metadata supplied, then, update data...
        $lastUpdate = new DateTime($lastUpdate);
        return $this->update($data, $resource);
    }

    public function update($data, $resource): ?JsonResponse
    {
        $id = $data->getId();

        try {
            $response = $this->client->put($this->urlErpGral . $resource . "/$id",
            [
                'headers' => ['Content-Type' => 'application/ld+json', 'Accept' => 'application/ld+json'],
                'body' => $this->serializer->serialize($data, 'json')
            ]);
        } catch (\Throwable $th) {
            
            $this->error += 1;
            return new JsonResponse($th->getMessage(), 500);
        }

        return new JsonResponse($response, 200);
    }
}