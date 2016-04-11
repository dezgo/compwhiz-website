<?php

namespace App;

use \DateTime;
use \DateTimeZone;
use \DateInterval;

class Voucher
{
    private $voucher_code;
    private $valid_to_datetime;
    private $description = '';

    private function getVoucherList()
    {
        $today = (new DateTime())->format('Y-m-d');
        $yesterday = (new DateTime())->sub(new DateInterval('P1D'))->format('Y-m-d');
        return [
            'VALID_VOUCHER' => [$today, 'Testing only - valid voucher.'],
            'INVALID_VOUCHER' => [$yesterday, 'Testing only - invalid voucher.'],

            'FYSHWICK20' => ['2016-05-31', 'Get $20 off your next support call.'],
        ];
    }

    public function __construct($voucher_code)
    {
        $this->voucher_code = strtoupper($voucher_code);
        if ($this->isValidKey())
        {
            $this->description = $this->getVoucherList()[$this->voucher_code][1];
            $valid_to = $this->getVoucherList()[$this->voucher_code][0];
            $this->valid_to_datetime = new DateTime($valid_to.' 23:59:59');
            $this->valid_to_datetime->setTimezone(new DateTimeZone('Australia/ACT'));
        }
    }

    private function isValidKey()
    {
        return array_key_exists($this->voucher_code, $this->getVoucherList());
    }

    public function isValid()
    {
        if ($this->isValidKey())
        {
            $today = new DateTime();
            $interval = $today->diff($this->valid_to_datetime);
            return $interval->invert == 0;
        }
        else
        {
            return false;
        }
    }

    public function getExpiryDate()
    {
        if ($this->isValidKey())
        {
            return $this->valid_to_datetime;
        }
    }

    public function getDescription()
    {
        if ($this->isValidKey())
        {
            return $this->description;
        }
    }
}
