<?php
declare(strict_types=1);

namespace Elogic\Weather\Model;

use Elogic\Weather\Api\Data\ElogicWeatherExtensionInterface;
use Elogic\Weather\Api\Data\ElogicWeatherInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

/**
 * Class ElogicWeather
 * @package Elogic\Weather\Model
 */
class ElogicWeather extends AbstractExtensibleModel implements ElogicWeatherInterface
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\ElogicWeatherResource::class);
    }

    /**
     * @inheritDoc
     */
    public function getEntityId(): int
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @param int $entityId
     * @return void
     */
    public function setEntityId($entityId)
    {
        $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @inheritDoc
     */
    public function getInfo(): string
    {
        return $this->getData(self::INFO);
    }

    /**
     * @inheritDoc
     */
    public function setInfo(string $info): void
    {
        $this->setData(self::INFO, $info);
    }

    /**
     * @inheritDoc
     */
    public function getMain(): ?string
    {
        return $this->getData(self::MAIN);
    }

    /**
     * @inheritDoc
     */
    public function setMain(string $main): void
    {
        $this->setData(self::MAIN, $main);
    }

    /**
     * @inheritDoc
     */
    public function getWind(): ?string
    {
        return $this->getData(self::WIND);
    }

    /**
     * @inheritDoc
     */
    public function setWind(string $wind): void
    {
        $this->setData(self::WIND, $wind);
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getInTown(): int
    {
        return $this->getData(self::IN_TOWN);
    }

    /**
     * @inheritDoc
     */
    public function setInTown(int $inTown): void
    {
        $this->setData(self::IN_TOWN, $inTown);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(
        ElogicWeatherExtensionInterface $extensionAttributes
    ) {
        $this->_setExtensionAttributes($extensionAttributes);
    }
}
