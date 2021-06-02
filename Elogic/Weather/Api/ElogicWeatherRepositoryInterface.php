<?php


namespace Elogic\Weather\Api;

use Elogic\Weather\Api\Data\ElogicWeatherInterface;
use Elogic\Weather\Api\Data\ElogicWeatherSearchResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface ElogicWeatherRepositoryInterface
 * @package Elogic\Weather\Api
 */
interface ElogicWeatherRepositoryInterface
{
    /**
     * @param int $id
     * @return ElogicWeatherInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): ElogicWeatherInterface;

    /**
     * @param ElogicWeatherInterface $model
     * @return ElogicWeatherInterface
     */
    public function save(ElogicWeatherInterface $model): ElogicWeatherInterface;

    /**
     * @param ElogicWeatherInterface $model
     * @return void
     */
    public function delete(ElogicWeatherInterface $model);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ElogicWeatherSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
