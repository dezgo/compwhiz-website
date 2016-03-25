<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery as m;

class HomePageText extends TestCase
{
    /**
     * Ensure customerinfo route OK
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->visit('/')
                 ->see('Services')
                 ->see('Contact')
                 ->see(url('/images/logo.jpg'));
    }

    public function testRequestCallback()
    {
        Mail::shouldReceive('send')->once()
            ->with('emails.contact', m::on(function($data) {
                // $this->assertContains('joe@bloggs.com', $data);
                return true;
            }), m::on(function($closure) {
                $message = m::mock('Illuminate\Mailer\Message');
                $message->shouldReceive('to')
                        ->with('mail@computerwhiz.com.au', 'Computer Whiz Mail')
                        ->andReturn(m::self());
                $message->shouldReceive('subject')
                        ->with('Message from Joe Bloggs')
                        ->andReturn(m::self());
                $message->shouldReceive('from')
                        ->with('mail@computerwhiz.com.au', 'Computer Whiz Mail')
                        ->andReturn(m::self());
                $closure($message);
                return true;
            }));

        $this->visit('/')
             ->type('Joe Bloggs', 'name')
             ->type('0404 123 123','phone_number')
             ->press('btnSubmit')
             ->see(trans('homepage.success', [
                         'name' => ' Joe Bloggs',
                         'best_time' => 'shortly'
                     ]));
    }
}