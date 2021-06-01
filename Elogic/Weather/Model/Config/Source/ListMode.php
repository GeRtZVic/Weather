<?php


namespace Elogic\Weather\Model\Config\Source;

/**
 * Class ListMode
 * @package Elogic\Weather\Model\Config\Source
 */
class ListMode implements \Magento\Framework\Data\OptionSourceInterface
{

    /**
     * @inheritDoc
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'standard', 'label' => __('Standard')],
            ['value' => 'metric', 'label' => __('Metric')],
            ['value' => 'imperial', 'label' => __('Imperial')]
        ];
    }
}
