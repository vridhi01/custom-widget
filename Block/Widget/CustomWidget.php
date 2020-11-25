<?php
 
namespace Excellence\Widget\Block\Widget;
 
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
 
class CustomWidget extends Template implements BlockInterface
{
    protected $_productCollectionFactory;

    protected $_productVisibility;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context, 
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Visibility $productVisibility,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory; 
        $this->_productVisibility = $productVisibility; 
        parent::__construct($context, $data);
    }

    public function getProductCollection() {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');

        // filter current website products
        $collection->addWebsiteFilter();

        $collection->addAttributeToSort('entity_id','desc');

        // filter current store products
        $collection->addStoreFilter();

        // set visibility filter
        $collection->setVisibility($this->productVisibility->getVisibleInSiteIds());

        // fetching only 10 products
        $collection->setPageSize(10); 

        return $collection;
    }
}
?>
