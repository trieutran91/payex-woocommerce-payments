<?php

namespace PayEx\Api\Service\Paymentorder\Resource\Collection\Item;

use PayEx\Framework\DataObjectCollectionItem;

use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderCampaignInvoiceInterface;
use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderCreditCardInterface;
use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderInvoiceInterface;
use PayEx\Api\Service\Paymentorder\Resource\Collection\Item\Data\PaymentorderItemInterface;
use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderSwishInterface;

/**
 * Payment order items data object
 */
class PaymentorderItem extends DataObjectCollectionItem implements PaymentorderItemInterface
{

    /**
     * @return PaymentorderCreditCardInterface
     */
    public function getCreditCard()
    {
        return $this->offsetGet(self::CREDIT_CARD);
    }

    /**
     * @param PaymentorderCreditCardInterface $creditCard
     * @return $this
     */
    public function setCreditCard($creditCard)
    {
        return $this->offsetSet(self::CREDIT_CARD, $creditCard);
    }

    /**
     * @return PaymentorderInvoiceInterface
     */
    public function getInvoice()
    {
        return $this->offsetGet(self::INVOICE);
    }

    /**
     * @param PaymentorderInvoiceInterface $invoice
     * @return $this
     */
    public function setInvoice($invoice)
    {
        return $this->offsetSet(self::INVOICE, $invoice);
    }

    /**
     * @return PaymentorderCampaignInvoiceInterface
     */
    public function getCampaignInvoice()
    {
        return $this->offsetGet(self::CAMPAIGN_INVOICE);
    }

    /**
     * @param PaymentorderCampaignInvoiceInterface $campaignInvoice
     * @return $this
     */
    public function setCampaignInvoice($campaignInvoice)
    {
        return $this->offsetSet(self::CAMPAIGN_INVOICE, $campaignInvoice);
    }

    /**
     * @return PaymentorderSwishInterface
     */
    public function getSwish()
    {
        return $this->offsetGet(self::SWISH);
    }

    /**
     * @param PaymentorderSwishInterface $swish
     * @return $this
     */
    public function setSwish($swish)
    {
        return $this->offsetSet(self::SWISH, $swish);
    }
}
