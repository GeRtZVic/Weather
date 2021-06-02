<?php

namespace Elogic\Weather\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface ElogicWeatherResultInterface
 * @package Elogic\Weather\Api\Data
 */
interface ElogicWeatherSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return ElogicWeatherInterface[]
     */
    public function getItems();

    /**
     * @param ElogicWeatherInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
