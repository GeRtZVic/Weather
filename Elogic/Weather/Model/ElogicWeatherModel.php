<?php

namespace Elogic\Weather\Model;

use Elogic\Weather\Model\ResourceModel\ElogicWeatherResource;
use Magento\Framework\Model\AbstractModel;

class ElogicWeatherModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'elogic_weather_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ElogicWeatherResource::class);
    }
}
