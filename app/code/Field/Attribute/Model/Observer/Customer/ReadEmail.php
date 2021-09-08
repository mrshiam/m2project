<?php	
namespace Field\Attribute\Model\Observer\Customer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Customer\Api\CustomerRepositoryInterface;

class ReadEmail implements ObserverInterface
{
  protected $customerRepository;

  public function __construct(\Magento\Customer\Api\CustomerRepositoryInterface $customerRepository)
    {
      $this->customerRepository = $customerRepository;
        
    }
  

  public function execute(\Magento\Framework\Event\Observer $observer)
  {

    
    $customer = $observer->getData('customer');
    $customeNumber = $customer->getCustomAttribute('cellNumber')->getValue();
    
    if(substr($customeNumber, 0, 3) != '+88'){
      $newNumber = '+88' . $customeNumber;
      $customer->setCustomAttribute('cellNumber',$newNumber);
      $this->customerRepository->save($customer);
      
      // $customer->updateData($customerData);
      // $customer->save();
      return $this;
  }
    
    
    
  }
}


