<?php
 
 
namespace Excellence\Widget\Block\Widget;
 
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
 
class CustomWidget extends Template implements BlockInterface
{
 
    protected $_template = "view.phtml";
 
}