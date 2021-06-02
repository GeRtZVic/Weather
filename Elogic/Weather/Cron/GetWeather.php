<?php
declare(strict_types=1);

namespace Elogic\Weather\Cron;

use Elogic\Weather\Api\ElogicWeatherRepositoryInterface;
use Elogic\Weather\Helper\WeatherConfig;
use Elogic\Weather\Model\ElogicWeatherFactory;
use Exception;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Serialize\Serializer\Json;

/**
 * Class GetWeather
 * @package Elogic\Weather\Cron
 */
class GetWeather
{

    /**
     * @var Curl
     */
    protected $curlClient;

    /**
     * @var Json
     */
    protected $json;

    /**
     * @var ElogicWeatherFactory
     */
    private $modelFactory;

    /**
     * @var ElogicWeatherRepositoryInterface
     */
    private $repository;

    /**
     * @var WeatherConfig
     */
    protected $weatherConfig;

    /**
     * GetWeather constructor.
     * @param Json $json
     * @param Curl $curl
     * @param WeatherConfig $weatherConfig
     * @param ElogicWeatherRepositoryInterface $repository
     * @param ElogicWeatherFactory $modelFactory
     */
    public function __construct(
        Json $json,
        Curl $curl,
        WeatherConfig $weatherConfig,
        ElogicWeatherRepositoryInterface $repository,
        ElogicWeatherFactory $modelFactory
    ) {
        $this->json = $json;
        $this->curlClient = $curl;
        $this->weatherConfig = $weatherConfig;
        $this->repository = $repository;
        $this->modelFactory = $modelFactory;
    }

    /**
     * @return $this|string
     * @throws NoSuchEntityException
     */
    public function execute()
    {
        if (!$this->weatherConfig->getIsEnabled()) {
            return $this;
        }
        $apiUrl = $this->getRequestUrl();
        try {
            $this->getCurlClient()->get($apiUrl);

            $response = $this->json->unserialize($this->getCurlClient()->getBody());
            if ($response['cod'] == 200) {
                $model = $this->modelFactory->create();
                $weatherArr = array_shift($response['weather']);
                $model->setData('info', $weatherArr);
                $model->setData('main', $response['main']);
                $model->setData('wind', $response['wind']);
                $model->setData('name', $response['name']);
                $model->setData('in_town', $response['id']);
                $this->repository->save($model);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $this;
    }

    /**
     * @return Curl
     */
    public function getCurlClient(): Curl
    {
        return $this->curlClient;
    }

    /**
     * @return string
     */
    public function getRequestUrl(): string
    {
        try {
            $queryParams = [
                'id' => $this->weatherConfig->getTownId(),
                'exclude' => 'hourly,daily',
                'appid' => $this->weatherConfig->getApiKey(),
                'units' => $this->weatherConfig->getUnits()
            ];
            $apiUrl = $this->weatherConfig->getApiUrl();
            $queryString = http_build_query($queryParams);
        } catch (NoSuchEntityException $e) {
            return $e->getMessage();
        }

        return $apiUrl . '?' . $queryString;
    }
}
