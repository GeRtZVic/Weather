<?php
declare(strict_types=1);

namespace Elogic\Weather\Block;

use Elogic\Weather\Api\Data\ElogicWeatherInterface;
use Elogic\Weather\Api\ElogicWeatherRepositoryInterface;
use Elogic\Weather\Model\ElogicWeather;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class Weather
 * @package Elogic\Weather\Block
 */
class Weather extends Template
{
    /**
     * @var Json
     */
    protected $json;

    /**
     * @var ElogicWeatherRepositoryInterface
     */
    protected $repository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * @var SortOrderBuilder
     */
    protected $sortOrderBuilder;

    /**
     * Weather constructor.
     * @param Json $json
     * @param Context $context
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SortOrderBuilder $sortOrderBuilder
     * @param ElogicWeatherRepositoryInterface $repository
     */
    public function __construct(
        Json $json,
        Context $context,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        ElogicWeatherRepositoryInterface $repository
    ) {
        $this->json = $json;
        $this->repository = $repository;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context);
    }

    /**
     * @return ElogicWeatherInterface
     */
    public function getWeatherData(): ElogicWeatherInterface
    {
        /** @var ElogicWeather $model */
        $sortOrder = $this->sortOrderBuilder
            ->setField(ElogicWeatherInterface::CREATED_AT)
            ->setDirection(SortOrder::SORT_DESC)
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder->setSortOrders([$sortOrder])->setPageSize(1)->create();
        $modelList = $this->repository->getList($searchCriteria);
        $models = $modelList->getItems();

        return array_shift($models);
    }
}
