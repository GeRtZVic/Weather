<?php


namespace Elogic\Weather\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class WeatherConfig
 * @package Elogic\Weather\Helper
 */
class WeatherConfig extends AbstractHelper
{
    /**
     * @var StoreManagerInterface
     */
    protected  $_storeManager;

    /**
     * DataImport constructor.
     * @param Context $context
     * @param StoreManagerInterface $_storeManager
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $_storeManager
    )
    {
        parent::__construct($context);
        $this->_storeManager = $_storeManager;
    }

    /**
     * @param $path
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getValue($path)
    {
        return $this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORE,
            $this->_storeManager->getStore()->getId()
        );
    }

    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getIsEnabled()
    {
        return $this->getValue('elogic/general/enable');
    }

    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getApiUrl()
    {
        return $this->getValue('elogic/general/api_url');
    }

    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getApiKey()
    {
        return $this->getValue('elogic/general/api_key');
    }

    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getTownId()
    {
        return $this->getValue('elogic/general/town_id');
    }

    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getUnits()
    {
        return $this->getValue('elogic/general/units');
    }
}
