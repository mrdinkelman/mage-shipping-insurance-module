<?php

class Itransition_ShippingInsurance_Model_Total_Quote extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    protected $_code = 'shipping_insurance';

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        /** @var $helper Itransition_ShippingInsurance_Helper_Data */
        $helper = Mage::helper('itransition_shippinginsurance');

        if ($helper->isFeatureEnabled()) {
            $items = $this->_getAddressItems($address);

            if (!count($items)) {
                return $this;
            }

            if ($address->getInsuranceShippingMethod() && $address->getShippingInsurance()) {
                $address->setGrandTotal($address->getGrandTotal() + $address->getShippingInsurance());
                $address->setBaseGrandTotal($address->getBaseGrandTotal() + $address->getShippingInsurance());

                $quote = $address->getQuote();
                $quote->setGrandTotal($quote->getGrandTotal() + $quote->getShippingInsurance());
                $quote->setBaseGrandTotal($quote->getBaseGrandTotal() + $quote->getShippingInsurance());
            }
        }

        return $this;
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        /** @var $helper Itransition_ShippingInsurance_Helper_Data */
        $helper = Mage::helper('itransition_shippinginsurance');

        if ($address->getInsuranceShippingMethod()) {
            $costInsurance = $address->getShippingInsurance();
            $address->addTotal(
                [
                    'code'  => $this->getCode(),
                    'title' => $helper->getTranslatedLabel(),
                    'value' => $costInsurance
                ]
            );
        }

        return $this;
    }
}
