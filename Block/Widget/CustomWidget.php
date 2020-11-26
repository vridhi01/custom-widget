<?php
 
namespace Excellence\Widget\Block\Widget;
 
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

 
class CustomWidget extends Template implements BlockInterface
{

    protected $_productCollectionFactory;
    public $productRepository;
    protected $_productVisibility;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context, 
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Visibility $productVisibility,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Catalog\Api\ProductRepositoryInterfaceFactory $productRepositoryFactory,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory; 
        $this->_productVisibility = $productVisibility; 
        $this->imageHelper = $imageHelper;
         $this->_productRepository = $productRepository;
         $this->productFactory = $productFactory;
         $this->_productRepositoryFactory = $productRepositoryFactory;
        parent::__construct($context, $data);
        $this->setTemplate('Excellence_Widget::widget/customwidget.phtml');
    }

    public function getProductCollection($product_count) {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');

        // filter current website products
        $collection->addWebsiteFilter();

        $collection->addAttributeToSort('entity_id','desc');

        // filter current store products
        $collection->addStoreFilter();

        // set visibility filter
        $collection->setVisibility($this->_productVisibility ->getVisibleInSiteIds());

        // fetching only 5 products
        $collection->setPageSize($product_count); 

        $collection->addUrlRewrite();

        return $collection;
    }

//   public function getProductImageUrl($id)
// {
//     try 
//     {
//         $product = $this->productFactory->create()->load($id);
//     } 
//     catch (NoSuchEntityException $e) 
//     {
//         return 'Data not found';
//     }
//     $url = $this->imageHelper->init($product, 'product_small_image')->getUrl();
//     return $url;
// }

}