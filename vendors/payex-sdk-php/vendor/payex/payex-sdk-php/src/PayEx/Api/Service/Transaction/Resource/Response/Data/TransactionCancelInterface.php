<?php

namespace PayEx\Api\Service\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Resource\Data\ResponseInterface;

/**
 * Transaction cancel response data interface
 *
 * @api
 */
interface TransactionCancelInterface extends ResponseInterface
{
    const PAYMENT = 'payment';
    const CANCELLATION = 'cancellation';

    /**
     * @return string
     */
    public function getPayment();

    /**
     * @param string $payment
     * @return $this
     */
    public function setPayment($payment);

    /**
     * @return CancellationInterface
     */
    public function getCancellation();

    /**
     * @param CancellationInterface $cancellation
     * @return $this
     */
    public function setCancellation($cancellation);
}
