<?php
declare(strict_types=1);

namespace Elogic\Weather\Model\ResourceModel\ElogicWeather;

use Elogic\Weather\Model\ElogicWeather;
use Elogic\Weather\Model\ResourceModel\ElogicWeatherResource;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Magento\Framework\DataObject;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\Serialize\Serializer\Json;
use Psr\Log\LoggerInterface;

/**
 * Class Collection
 * @package Elogic\Weather\Model\ResourceModel\ElogicWeather
 */
class Collection extends AbstractCollection
{
    /**
     * @var Json
     */
    protected $json;

    /**
     * Collection constructor.
     * @param Json $json
     * @param EntityFactoryInterface $entityFactory
     * @param LoggerInterface $logger
     * @param FetchStrategyInterface $fetchStrategy
     * @param ManagerInterface $eventManager
     * @param AdapterInterface|null $connection
     * @param AbstractDb|null $resource
     */
    public function __construct(
        Json $json,
        EntityFactoryInterface $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        AdapterInterface $connection = null,
        AbstractDb $resource = null
    ) {
        $this->json = $json;
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
    }

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

    /**
     * @param DataObject $item
     * @return DataObject
     */
    protected function beforeAddLoadedItem(DataObject $item): DataObject
    {
        $additional  = [
            'info' => $this->json->unserialize($item->getData('info')),
            'main' => $this->json->unserialize($item->getData('main')),
            'wind' => $this->json->unserialize($item->getData('wind')),
        ];
        $item->setData('additional', $additional);
        return parent::beforeAddLoadedItem($item);
    }
}
