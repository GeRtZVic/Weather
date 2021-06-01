<?php
declare(strict_types=1);

namespace Elogic\Weather\Block;

use Elogic\Weather\Model\ElogicWeatherModel;
use Elogic\Weather\Model\ResourceModel\ElogicWeatherModel\ElogicWeatherCollection;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Weather extends Template
{
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
     * @param Json $json
     * @param Context $context
     * @param ElogicWeatherCollection $collection
     */
    public function __construct(
        Json $json,
        Context $context,
        ElogicWeatherCollection $collection
    ) {
        $this->json = $json;
        $this->collection = $collection;
        parent::__construct($context);
    }

    /**
     * @return array
     */
    public function getWeatherData(): array
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
}
