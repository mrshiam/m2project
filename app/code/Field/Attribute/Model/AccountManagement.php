<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Field\Attribute\Model;

use Magento\Customer\Api\Data\CustomerInterface;
/**
 * Handle various customer account actions
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 * @SuppressWarnings(PHPMD.CookieAndSessionMisuse)
 */
class AccountManagement extends \Magento\Customer\Model\AccountManagement
{
    
   
    /**
     * @inheritdoc
     *
     * @throws LocalizedException
     * @param \Magento\Customer\Api\Data\CustomerInterface $customer
     * @param string $confirmationKey
     * @return \Magento\Customer\Api\Data\CustomerInterface
     */
    public function createAccount(CustomerInterface $customer, $password = null, $redirectUrl = '')
    {

        //print_r($_POST); die;

        
        $customerNumber = $customer->getCustomAttribute('cellNumber')->getValue();
        if(substr($customerNumber, 0, 3) != '+88'){
            $newNumber = '+88' . $customerNumber;
            $customer->setCustomAttribute('cellNumber',$newNumber);
        }
        return Parent::createAccount($customer, $password = null, $redirectUrl = '');
    }

    
}
