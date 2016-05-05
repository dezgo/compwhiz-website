<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery as m;

class CustomerInfoTest extends TestCase
{
    /**
     * Ensure customerinfo route OK
     *
     * @return void
     */
    public function testCustomerInfo()
    {
        $this->visit('/customerinfo')
             ->see('Customer Info');
    }

    public function testSubmitInvalidData()
    {
        $this->visit('/customerinfo')
             ->press('btnSubmit')
             ->see(trans('validation.required', ['attribute' => 'name']))
             ->see(trans('validation.required', ['attribute' => 'email']));
    }

    public function testSubmitOK()
    {
        Mail::shouldReceive('send')->once()
            ->with('emails.customerinfo', m::on(function($data) {
                return true;
            }), m::on(function($closure) {
                $message = m::mock('Illuminate\Mailer\Message');
                $message->shouldReceive('to')
                        ->with('mail@computerwhiz.com.au', 'Computer Whiz Mail')
                        ->andReturn(m::self());
                $message->shouldReceive('subject')
                        ->with(trans('customerinfo.email-subject', ['name' => 'Joe Bloggs']))
                        ->andReturn(m::self());
                $message->shouldReceive('from')
                        ->with('mail@computerwhiz.com.au', 'Computer Whiz Mail')
                        ->andReturn(m::self());
                $closure($message);
                return true;
            }));

        $this->visit('/customerinfo')
             ->type('Joe Bloggs', 'name')
             ->type('joe@bloggs.com','email')
             ->press('btnSubmit')
             ->see(trans('customerinfo.success', ['name' => 'Joe Bloggs']));
    }

    public function testShowTodaysDateForLastVisitByDefault()
    {
        $this->visit('/customerinfo')
            ->see('placeholder="e.g. 1 Jan 1957" value="'.date('j M Y').'">');
    }
}
