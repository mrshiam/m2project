<?php
 
namespace Field\Attribute\Controller\Account;



 
class CreatePost extends \Magento\Customer\Controller\Account\CreatePost
{
    
    public function execute()
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/logfile.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info("Overiding Controller CreatePost");
		return parent::execute();
    }
}