<?php

namespace Field\Attribute\Model\Plugin\Model\ResourceModel;



class UpdateNumber{

    

    public function aroundSave(\Magento\Customer\Model\ResourceModel\CustomerRepository $subject, callable $proceed, $customer, $passwordHash = null)
    {

       
       
        // $customerArr = $customer->__toArray(); 
        //    print_r($customerArr); die;
        $customeNumber = $customer->getCustomAttribute('cellNumber')->getValue();
        
        if(substr($customeNumber, 0, 3) != '+88'){
            $newNumber = '+88' . $customeNumber;
            $customer->setCustomAttribute('cellNumber',$newNumber);
        }
        $result = $proceed($customer, $passwordHash = null);
        
        
        
            $customerMail = $customer->getEmail();
            $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/logfile.log');
            $logger = new \Zend\Log\Logger();
            $logger->addWriter($writer);
            $logger->info( $customerMail);
            return $result;
            
        
        
        
        
    }
}