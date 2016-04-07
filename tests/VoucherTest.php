<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Voucher;

class VoucherTest extends TestCase
{
    public function testVoucherValid()
    {
        $voucher = new Voucher('VALID_VOUCHER');
        $this->assertTrue($voucher->isValid());
        $this->assertTrue($voucher->getDescription() == 'Testing only - valid voucher.');
    }

    public function testVoucherInvalid()
    {
        $voucher = new Voucher('INVALID_VOUCHER');
        $this->assertFalse($voucher->isValid());
        $this->assertTrue($voucher->getDescription() == 'Testing only - invalid voucher.');

        $voucher = new Voucher('dodgy name');
        $this->assertFalse($voucher->isValid());
    }
}
