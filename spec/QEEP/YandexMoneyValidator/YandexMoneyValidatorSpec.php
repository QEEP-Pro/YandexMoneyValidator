<?php

namespace spec\QEEP\YandexMoneyValidator;


use QEEP\YandexMoneyValidator\Model\YandexMoneyRequest;
use PhpSpec\ObjectBehavior;

class YandexMoneyValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('QEEP\YandexMoneyValidator\YandexMoneyValidator');
    }

    function it_doesnt_validate_empty_request()
    {
        $request = new YandexMoneyRequest();

        $this->isValid($request)->shouldReturn(false);
    }

    function it_doesnt_pass_invalid_request()
    {
        $request = (new YandexMoneyRequest())
            ->setAction('checkOrder')
            ->setOrderSumAmount(87.10)
            ->setOrderSumCurrencyPaycash(643)
            ->setOrderSumBankPaycash(1001)
            ->setShopId(13)
            ->setInvoiceId(55)
            ->setCustomerNumber('8123294469')
            ->setShopPassword('s<kY23653f,{9fcnshwq')
            ->setHash('it_is_invalid_hash');

        $this->isValid($request)->shouldReturn(false);
    }

    function it_return_error_for_invalid_hash()
    {
        $request = (new YandexMoneyRequest())
            ->setAction('checkOrder')
            ->setOrderSumAmount(87.10)
            ->setOrderSumCurrencyPaycash(643)
            ->setOrderSumBankPaycash(1001)
            ->setShopId(13)
            ->setInvoiceId(55)
            ->setCustomerNumber('8123294469')
            ->setShopPassword('s<kY23653f,{9fcnshwq')
            ->setHash('it_is_invalid_hash');

        $this->getErrors($request)->shouldContain('md5 hash invalid');
    }

    function it_pass_valid_request()
    {
        $request = (new YandexMoneyRequest())
            ->setAction('checkOrder')
            ->setOrderSumAmount(87.10)
            ->setOrderSumCurrencyPaycash(643)
            ->setOrderSumBankPaycash(1001)
            ->setShopId(13)
            ->setInvoiceId(55)
            ->setCustomerNumber('8123294469')
            ->setShopPassword('s<kY23653f,{9fcnshwq')
            ->setHash('1B35ABE38AA54F2931B0C58646FD1321');

        $this->isValid($request)->shouldReturn(true);
    }

    function it_doesnt_return_error_for_valid_request()
    {
        $request = (new YandexMoneyRequest())
            ->setAction('checkOrder')
            ->setOrderSumAmount(87.10)
            ->setOrderSumCurrencyPaycash(643)
            ->setOrderSumBankPaycash(1001)
            ->setShopId(13)
            ->setInvoiceId(55)
            ->setCustomerNumber('8123294469')
            ->setShopPassword('s<kY23653f,{9fcnshwq')
            ->setHash('1B35ABE38AA54F2931B0C58646FD1321');

        $this->getErrors($request)->shouldReturn([]);
    }
}
