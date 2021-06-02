<?php


namespace Elogic\Weather\Model\ResourceModel\ElogicWeather;

use Elogic\Weather\Model\ElogicWeather;
use Elogic\Weather\Model\ResourceModel\ElogicWeatherResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Elogic\Weather\Model\ResourceModel\ElogicWeather
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            ElogicWeather::class,
            ElogicWeatherResource::class
        );
    }
}
