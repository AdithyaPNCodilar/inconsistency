<?php

/**
 * File: Index.php
 *
 * This file contains the implementation of the Index class.
 * The Index class represents a controller action for the FAQ admin panel index page.
 *
 * @category Codilar
 * @package  Codilar\Inconsistency\Controller\Adminhtml\Inconsistency
 * @author   <your-name>
 * @license  MIT License
 * @link     https://example.com
 */

/**
 * Index class.
 * Represents a controller action for the FAQ admin panel index page.
 */
namespace Codilar\Inconsistency\Controller\Adminhtml\Inconsistency;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor.
     *
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Execute the controller action.
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Codilar_Inconsistency::Codilar');
        $resultPage->getConfig()->getTitle()->prepend(__('Inconsistent Products'));

        return $resultPage;
    }
}
