<?php
declare(strict_types=1);

namespace Elogic\Weather\Model;

use Elogic\Weather\Api\Data\ElogicWeatherInterface;
use Elogic\Weather\Api\Data\ElogicWeatherSearchResultInterface;
use Elogic\Weather\Api\ElogicWeatherRepositoryInterface;
use Elogic\Weather\Model\ResourceModel\ElogicWeather\CollectionFactory;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Elogic\Weather\Model\ResourceModel\ElogicWeatherResource;
use Elogic\Weather\Model\ResourceModel\ElogicWeather\CollectionFactory as ElogicWeatherCollectionFactory;
use Elogic\Weather\Api\Data\ElogicWeatherSearchResultInterfaceFactory;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Class ElogicWeatherRepository
 * @package Elogic\Weather\Model
 */
class ElogicWeatherRepository implements ElogicWeatherRepositoryInterface
{
    /**
     * @var ElogicWeatherFactory
     */
    private $elogicWeatherFactory;

    /**
     * @var CollectionFactory
     */
    private $elogicWeatherCollectionFactory;

    /**
     * @var ElogicWeatherSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @var ElogicWeatherResource
     */
    private $elogicWeatherResourse;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * ElogicWeatherRepository constructor.
     * @param ElogicWeatherFactory $elogicWeatherFactory
     * @param ElogicWeatherCollectionFactory $elogicWeatherCollectionFactory
     * @param ElogicWeatherResource $elogicWeatherResourse
     * @param CollectionProcessorInterface $collectionProcessor
     * @param ElogicWeatherSearchResultInterfaceFactory $searchResultFactory
     */
    public function __construct(
        ElogicWeatherFactory $elogicWeatherFactory,
        ElogicWeatherCollectionFactory $elogicWeatherCollectionFactory,
        ElogicWeatherResource $elogicWeatherResourse,
        CollectionProcessorInterface $collectionProcessor,
        ElogicWeatherSearchResultInterfaceFactory $searchResultFactory
    ) {
        $this->elogicWeatherFactory = $elogicWeatherFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->elogicWeatherCollectionFactory = $elogicWeatherCollectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->elogicWeatherResourse = $elogicWeatherResourse;
    }

    /**
     * @param int $id
     * @return ElogicWeatherInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): ElogicWeatherInterface
    {
        $model = $this->elogicWeatherFactory->create();
        $this->elogicWeatherResourse->load($model, $id);
        if (! $model->getId()) {
            throw new NoSuchEntityException(__('Unable to find entity with ID "%1"', $id));
        }
        return $model;
    }

    /**
     * @param ElogicWeatherInterface $model
     * @return ElogicWeatherInterface
     * @throws AlreadyExistsException
     */
    public function save(ElogicWeatherInterface $model): ElogicWeatherInterface
    {
        $this->elogicWeatherResourse->save($model);
        return $model;
    }

    /**
     * @param ElogicWeatherInterface $model
     * @throws CouldNotDeleteException
     */
    public function delete(ElogicWeatherInterface $model): void
    {
        try {
            $this->elogicWeatherResourse->delete($model);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ElogicWeatherSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ElogicWeatherSearchResultInterface
    {
        $collection = $this->elogicWeatherCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }
}
