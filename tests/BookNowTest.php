<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery as m;

class BookNowTest extends TestCase
{
    /**
     * Ensure customerinfo route OK
     *
     * @return void
     */
    public function testBookNow()
    {
        $this->visit('/booknow')
             ->see('Request a booking');
    }

    public function testSubmitInvalidData()
    {
        $this->visit('/booknow')
             ->type('a', 'preferred_time')
             ->type('a', 'preferred_date')
             ->press('btnSubmit')
             ->see(trans('validation.required', ['attribute' => 'first name']))
             ->see(trans('validation.required', ['attribute' => 'last name']))
             ->see(trans('validation.required_without', ['attribute' => 'email', 'values' => 'phone number']))
             ->see(trans('validation.required_without', ['attribute' => 'phone number', 'values' => 'email']))
             ->see(trans('validation.custom.preferred_time.regex'))
             ->see(trans('validation.date', ['attribute' => 'preferred date']));
    }

    public function testSubmitOK()
    {
        Mail::shouldReceive('send')->once()
            ->with('emails.booknow', m::on(function($data) {
                return true;
            }), m::on(function($closure) {
                $message = m::mock('Illuminate\Mailer\Message');
                $message->shouldReceive('to')
                        ->with('mail@computerwhiz.com.au', 'Computer Whiz Mail')
                        ->andReturn(m::self());
                $message->shouldReceive('subject')
                        ->with(trans('booknow.email-subject', ['name' => 'Joe Bloggs']))
                        ->andReturn(m::self());
                $message->shouldReceive('from')
                        ->with('mail@computerwhiz.com.au', 'Computer Whiz Mail')
                        ->andReturn(m::self());
                $closure($message);
                return true;
            }));

        $this->visit('/booknow')
             ->type('Joe', 'first_name')
             ->type('Bloggs', 'last_name')
             ->type('0404123123', 'phone_number')
             ->type('joe@bloggs.com','email')
             ->select('email', 'contact_method')
             ->type('01/12/16', 'preferred_date')
             ->type('1:30 PM', 'preferred_time')
             ->select('remote', 'support_method')
             ->type('please come ASAP', 'message')
             ->press('btnSubmit')
             ->see(trans('booknow.success', ['name' => 'Joe Bloggs']));
    }
}
