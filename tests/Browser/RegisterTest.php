<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{

    use DatabaseTruncation;
    /**
     * A Dusk test example.
     */
    public function test_register_with_multiple_browsers(): void
    {
        $this->browse(function (Browser $first) {

            // Browser $second

            $first->visit('/register')
                ->assertSee('REGISTER')
                ->type('name', 'Gabriel')
                ->type('email', 'testt@gmail.com')
                ->type('password', 'secret1234A')
                ->type('password_confirmation', 'secret1234A')
                ->press('REGISTER')
                ->assertRouteIs('dashboard')
                ->assertPathIs('/dashboard');

            // $second->visit('/register')
            //     ->assertSee('REGISTER')
            //     ->type('name', 'Gabriel')
            //     ->type('email', 'dev@gmail.com')
            //     ->type('password', 'secret1234A')
            //     ->type('password_confirmation', 'secret1234A')
            //     ->press('REGISTER')
            //     ->assertRouteIs('dashboard')
            //     ->assertPathIs('/dashboard');
        });




    }
}
