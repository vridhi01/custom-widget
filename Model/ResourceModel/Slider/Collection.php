<?php


namespace Excellence\Widget\Model\ResourceModel\Slider;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Mageplaza\Productslider\Model\ResourceModel\Slider
 */
class Collection extends AbstractCollection
{
    /**
     * ID Field Name
     *
     * @var string
     */
    protected $_idFieldName = 'slider_id';

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'excellence_widget_slider_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'slider_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Excellence\Widget\Model\Slider', 'Excellence\Widget\Model\ResourceModel\Slider');
    }
}
