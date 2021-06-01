<?php

namespace Elogic\Weather\Block;

use Elogic\Weather\Model\ElogicWeatherModel;
use Elogic\Weather\Model\ResourceModel\ElogicWeatherModel\ElogicWeatherCollection;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\View\Element\Template;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\View\Element\Template\Context;

class Weather extends Template
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
     * @var ElogicWeatherCollection
     */
    protected $collection;

    /**
     * Weather constructor.
     * @param Context $context
     */
    public function __construct(
        Json $json,
        Context $context,
        ElogicWeatherCollection $collection
    )
    {
        $this->json = $json;
        $this->collection = $collection;
        parent::__construct($context);
    }

    /**
     * @return mixed
     */
    public function sayHello()
    {
        /** @var ElogicWeatherModel $model */
        $model = $this->collection->getLastItem();
        return [
            'info' => $this->json->unserialize($model->getInfo()),
            'main' => $this->json->unserialize($model->getMain()),
            'wind' => $this->json->unserialize($model->getWind()),
            'name' => $model->getName()
        ];
    }

    /**
     * @return Curl
     */
    public function getCurlClient(): Curl
    {
        return $this->curlClient;
    }
}
