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
    public function test_authenticate_user_enter_to_dashboard_and_wait_for_message(): void
    {
        set_time_limit(0);

        $user = User::factory()->create()->first();

        $this->browse(function (Browser $browser) use($user)
        {
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->waitForText('Gabrielito', 5)
                ->assertSee("Gabrielito");
        });
    }

    public function test_authenticate_user_enter_to_dashboard_open_modal_and_then_close()
    {
        set_time_limit(0);

        $user = User::factory()->create()->first();

        $this->browse(function (Browser $browser) use($user)
        {
            $browser->loginAs(User::find(1))
                ->visit('/dashboard')
                ->click('#openModalButton')
                ->whenAvailable('#myModal', function($modal) use($user) {
                    $modal
                        ->assertSee($user->name." - ". $user->id)
                        ->click('#closeModal');
                })
                ->pause(1000)
                ->assertSee("cerrado");
        });
    }
}
