<?php

namespace Elogic\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ElogicWeatherResource extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'elogic_weather_resource_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('elogic_weather', 'entity_id');
        $this->_useIsObjectNew = true;
    }
}
