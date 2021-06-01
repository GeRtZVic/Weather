<?php
declare(strict_types=1);

namespace Elogic\Weather\Model\Data;

use Elogic\Weather\Api\Data\ElogicWeatherInterface;
use Magento\Framework\DataObject;

/**
 * Class ElogicWeatherData
 * @package Elogic\Weather\Model\Data
 */
class ElogicWeatherData extends DataObject implements ElogicWeatherInterface
{
    /**
     * @inheritDoc
     */
    public function getEntityId(): ?int
    {
        return $this->getData(self::ENTITY_ID) === null ? null
            : (int)$this->getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setEntityId(?int $entityId): void
    {
        $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @inheritDoc
     */
    public function getInfo(): ?string
    {
        return $this->getData(self::INFO);
    }

    /**
     * @inheritDoc
     */
    public function setInfo(?string $info): void
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
    public function setMain(?string $main): void
    {
        $this->setData(self::MAIN, $main);
    }

    /**
     * @inheritDoc
     */
    public function getWind(): ?string
    {
        return $this->getData(self::WIND) === null ? null
            : (string)$this->getData(self::WIND);
    }

    /**
     * @inheritDoc
     */
    public function setWind(?string $wind): void
    {
        $this->setData(self::WIND, $wind);
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME) === null ? null
            : (string)$this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName(?string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getInTown(): ?int
    {
        return $this->getData(self::IN_TOWN) === null ? null
            : (int)$this->getData(self::IN_TOWN);
    }

    /**
     * @inheritDoc
     */
    public function setInTown(?int $inTown): void
    {
        $this->setData(self::IN_TOWN, $inTown);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT) === null ? null
            : (string)$this->getData(self::CREATED_AT);
    }
}
