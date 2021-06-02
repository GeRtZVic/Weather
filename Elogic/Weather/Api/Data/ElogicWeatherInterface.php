<?php

namespace Elogic\Weather\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface ElogicWeatherInterface
 * @package Elogic\Weather\Api\Data
 */
interface ElogicWeatherInterface extends ExtensibleDataInterface
{
    /**
     * String constants for property names
     */
    const ENTITY_ID = "entity_id";
    const INFO = "info";
    const MAIN = "main";
    const WIND = "wind";
    const NAME = "name";
    const IN_TOWN = "in_town";
    const CREATED_AT = "created_at";

    /**
     * Getter for EntityId.
     *
     * @return int
     */
    public function getEntityId(): int;

    /**
     * Setter for EntityId.
     *
     * @param int $entityId
     *
     * @return void
     */
    public function setEntityId(int $entityId): void;

    /**
     * Getter for Info.
     *
     * @return string|null
     */
    public function getInfo(): string;

    /**
     * Setter for Info.
     *
     * @param string|null $info
     *
     * @return void
     */
    public function setInfo(string $info): void;

    /**
     * Getter for Main.
     *
     * @return string|null
     */
    public function getMain(): ?string;

    /**
     * Setter for Main.
     *
     * @param string|null $main
     *
     * @return void
     */
    public function setMain(string $main): void;

    /**
     * Getter for Wind.
     *
     * @return string|null
     */
    public function getWind(): ?string;

    /**
     * Setter for Wind.
     *
     * @param string|null $wind
     *
     * @return void
     */
    public function setWind(string $wind): void;

    /**
     * Getter for Name.
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Setter for Name.
     *
     * @param string|null $name
     *
     * @return void
     */
    public function setName(string $name): void;

    /**
     * Getter for InTown.
     *
     * @return int
     */
    public function getInTown(): int;

    /**
     * Setter for InTown.
     *
     * @param int $inTown
     *
     * @return void
     */
    public function setInTown(int $inTown): void;

    /**
     * Getter for CreatedAt.
     * @return string|null
     */
    public function getCreatedAt(): string;

    /**
     * @return \Elogic\Weather\Api\Data\ElogicWeatherExtensionInterface
     */
    public function getExtensionAttributes(): \Elogic\Weather\Api\Data\ElogicWeatherExtensionInterface;

    /**
     * @param \Elogic\Weather\Api\Data\ElogicWeatherExtensionInterface $extensionAttributes
     * @return void
     */
    public function setExtensionAttributes(\Elogic\Weather\Api\Data\ElogicWeatherExtensionInterface $extensionAttributes): void;
}
