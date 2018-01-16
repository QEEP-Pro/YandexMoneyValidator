<?php

namespace QEEP\YandexMoneyValidator\Model;


class YandexMoneyRequest
{
    protected $action;

    protected $orderSumAmount;

    protected $orderSumCurrencyPaycash;

    protected $orderSumBankPaycash;

    protected $shopId;

    protected $invoiceId;

    protected $customerNumber;

    protected $shopPassword;

    protected $hash;

    public function getAction() : ?string
    {
        return $this->action;
    }

    public function setAction(string $action) : YandexMoneyRequest
    {
        $this->action = $action;

        return $this;
    }

    public function getOrderSumAmount() : ?float
    {
        return $this->orderSumAmount;
    }

    public function setOrderSumAmount(float $orderSumAmount) : YandexMoneyRequest
    {
        $this->orderSumAmount = $orderSumAmount;
        return $this;
    }

    public function getOrderSumCurrencyPaycash() : ?float
    {
        return $this->orderSumCurrencyPaycash;
    }

    public function setOrderSumCurrencyPaycash(float $orderSumCurrencyPaycash) : YandexMoneyRequest
    {
        $this->orderSumCurrencyPaycash = $orderSumCurrencyPaycash;

        return $this;
    }

    public function getOrderSumBankPaycash() : ?float
    {
        return $this->orderSumBankPaycash;
    }

    public function setOrderSumBankPaycash(float $orderSumBankPaycash) : YandexMoneyRequest
    {
        $this->orderSumBankPaycash = $orderSumBankPaycash;
        return $this;
    }

    public function getShopId() : ?int
    {
        return $this->shopId;
    }

    public function setShopId(int $shopId) : YandexMoneyRequest
    {
        $this->shopId = $shopId;

        return $this;
    }

    public function getInvoiceId() : ?int
    {
        return $this->invoiceId;
    }

    public function setInvoiceId(int $invoiceId) : YandexMoneyRequest
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    public function getCustomerNumber() : ?string
    {
        return $this->customerNumber;
    }

    public function setCustomerNumber(string $customerNumber) : YandexMoneyRequest
    {
        $this->customerNumber = $customerNumber;

        return $this;
    }

    public function getShopPassword() : ?string
    {
        return $this->shopPassword;
    }

    public function setShopPassword(string $shopPassword) : YandexMoneyRequest
    {
        $this->shopPassword = $shopPassword;

        return $this;
    }

    public function getHash() : ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash) : YandexMoneyRequest
    {
        $this->hash = $hash;

        return $this;
    }
}