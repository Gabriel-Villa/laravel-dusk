<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WaitingTest extends DuskTestCase
{

    // use DatabaseTruncation;

    /**
     * A Dusk test example.
     */
    public function test_authenticate_user_enter_to_dashboard(): void
    {
        $user = User::factory()->count(1)->create();

        $this->browse(function (Browser $browser) use($user)
        {
            $browser->loginAs(User::find(1))
                ->visit('/dashboard')
                ->pause(2000)
                ->waitForText('Gabrielito', 5)
                ->assertSee("Gabrielito");
        });
    }
}
