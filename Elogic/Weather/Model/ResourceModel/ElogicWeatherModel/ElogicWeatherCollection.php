<?php
declare(strict_types=1);

namespace Elogic\Weather\Model\ResourceModel\ElogicWeatherModel;

use Elogic\Weather\Model\ElogicWeatherModel;
use Elogic\Weather\Model\ResourceModel\ElogicWeatherResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class ElogicWeatherCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'elogic_weather_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ElogicWeatherModel::class, ElogicWeatherResource::class);
    }
}
