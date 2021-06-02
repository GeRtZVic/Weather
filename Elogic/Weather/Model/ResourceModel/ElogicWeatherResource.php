<?php
declare(strict_types=1);

namespace Elogic\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class ElogicWeatherResource
 * @package Elogic\Weather\Model\ResourceModel
 */
class ElogicWeatherResource extends AbstractDb
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('elogic_weather', 'entity_id');
    }
}
