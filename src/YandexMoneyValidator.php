<?php

namespace QEEP\YandexMoneyValidator;


use QEEP\YandexMoneyValidator\Model\YandexMoneyRequest;

class YandexMoneyValidator
{
    public function isValid(YandexMoneyRequest $request) : bool
    {
        return $this->validate($request)['status'];
    }

    public function getErrors(YandexMoneyRequest $request) : array
    {
        return $this->validate($request)['errors'];
    }

    private function validate(YandexMoneyRequest $request) : array
    {
        $errors = [];
        $status = true;

        $hashValid = $this->validateHash($request);
        if (!$hashValid) {
            $status = false;
            $errors = ['md5 hash invalid'];
        }

        return [
            'status' => $status,
            'errors' => $errors,
        ];
    }

    private function validateHash(YandexMoneyRequest $request) : bool
    {
        $floatToString = function (?float $number) {
            return round($number) == $number
                ? strval($number)
                : number_format($number, 2);
        };

        $parameters = [
            $request->getAction(),
            $floatToString($request->getOrderSumAmount()),
            $floatToString($request->getOrderSumCurrencyPaycash()),
            $floatToString($request->getOrderSumBankPaycash()),
            $floatToString($request->getShopId()),
            $floatToString($request->getInvoiceId()),
            $request->getCustomerNumber(),
            $request->getShopPassword(),
        ];

        $hash = mb_strtoupper(md5(implode(';', $parameters)));

        return $hash === $request->getHash();
    }
}
