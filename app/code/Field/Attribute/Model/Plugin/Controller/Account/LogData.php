<?php

namespace Field\Attribute\Model\Plugin\Controller\Account;

use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\UrlFactory;
use Magento\Framework\Message\ManagerInterface;

class LogData
{

    /** @var \Magento\Framework\UrlInterface */
    protected $urlModel;

    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    protected $resultRedirectFactory;

    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * RestrictCustomerEmail constructor.
     * @param UrlFactory $urlFactory
     * @param RedirectFactory $redirectFactory
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        UrlFactory $urlFactory,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager
    )
    {
        $this->urlModel = $urlFactory->create();
        $this->resultRedirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
    }

    /**
     * @param \Magento\Customer\Controller\Account\CreatePost $subject
     * @param \Closure $proceed
     * @return mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */

    

    
    public function aroundExecute(
        \Magento\Customer\Controller\Account\CreatePost $subject, $proceed
    )
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/logfile.log');
         $logger = new \Zend\Log\Logger();
         $logger->addWriter($writer);
         $logger->info('This is happening around submitting registration form');
         
    }

    
}