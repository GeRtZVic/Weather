<?php


namespace Elogic\Weather\Cron;

use Elogic\Weather\Model\ElogicWeatherModelFactory;
use Elogic\Weather\Model\ResourceModel\ElogicWeatherResource;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Serialize\Serializer\Json;

/**
 * Class GetWeather
 * @package Elogic\Weather\Cron
 */
class GetWeather
{

    const API_KEY = "4a76ba7ef30be9b7edc467773a22ea3a";
    const TOWN_ID = "765876";
    const UNITS = "metric";

    /**
     * @var Curl
     */
    protected $curlClient;

    /**
     * @var Json
     */
    protected $json;

    /**
     * @var ElogicWeatherModelFactory
     */
    private $modelFactory;

    /**
     * @var ElogicWeatherResource
     */
    private $resource;

    /**
     * GetWeather constructor.
     * @param Json $json
     * @param Curl $curl
     * @param ElogicWeatherResource $resource
     * @param ElogicWeatherModelFactory $modelFactory
     */
    public function __construct(
        Json $json,
        Curl $curl,
        ElogicWeatherResource $resource,
        ElogicWeatherModelFactory $modelFactory
    )
    {
        $this->json = $json;
        $this->curlClient = $curl;
        $this->resource = $resource;
        $this->modelFactory = $modelFactory;
    }

    /**
     * @return mixed|string
     */
    public function execute()
    {
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?id=" . self::TOWN_ID .
            "&exclude=hourly,daily&appid=" . self::API_KEY . "&units=" . self::UNITS;
        try {
            $this->getCurlClient()->get($apiUrl);

            $response = $this->json->unserialize($this->getCurlClient()->getBody());

            $model = $this->modelFactory->create();
            $model->setData('info',$this->json->serialize($response['weather'][0]));
            $model->setData('main',$this->json->serialize($response['main']));
            $model->setData('wind',$this->json->serialize($response['wind']));
            $model->setData('name',$response['name']);
            $model->setData('in_town',$response['id']);
            $this->resource->save($model);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $response;
    }

    /**
     * @return Curl
     */
    public function getCurlClient(): Curl
    {
        return $this->curlClient;
    }

}
