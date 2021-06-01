<?php
declare(strict_types=1);

namespace Elogic\Weather\Controller\Adminhtml\ElogicWeather;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * ElogicWeather backend index (list) controller.
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     */
    const ADMIN_RESOURCE = 'Elogic_Weather::management';

    /**
     * Execute action based on request and return result.
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu('Elogic_Weather::management');
        $resultPage->addBreadcrumb(__('ElogicWeather'), __('ElogicWeather'));
        $resultPage->addBreadcrumb(__('Manage ElogicWeathers'), __('Manage ElogicWeathers'));
        $resultPage->getConfig()->getTitle()->prepend(__('ElogicWeather List'));

        return $resultPage;
    }
}
