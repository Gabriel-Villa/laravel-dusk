<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\LoginPage;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseTruncation;

    /**
     * A Dusk test example.
     */
    public function test_login_successfully(): void
    {
        set_time_limit(0);

        $user = User::factory()->create([
            'password' => bcrypt('123')
        ]);

        $this->browse(function (Browser $browser) use($user)
        {
            $browser->visit('/')
                ->assertSee('Laravel')
                ->clickLink('Log in')
                ->assertRouteIs('login')
                ->value('#email', $user->email)
                ->value('#password', '123')
                ->press('LOG IN')
                ->assertRouteIs('dashboard');
        });
    }

    public function test_login_with_page(): void
    {
        set_time_limit(0);

        $user = User::factory()->create([
            'password' => bcrypt('123')
        ]);

        $this->browse(function (Browser $browser) use($user)
        {
            $browser
                ->visit(new LoginPage)
                ->value('@email', $user->email)
                ->value('@password', '123')
                ->press('LOG IN')
                ->assertRouteIs('dashboard');
        });
    }

    public function test_login_with_page_refactor(): void
    {
        set_time_limit(0);

        $user = User::factory()->create([
            'password' => bcrypt('123')
        ]);

        $this->browse(function (Browser $browser) use($user)
        {
            $browser
                ->visit(new LoginPage)
                ->signIn($user->email, 123);
        });
    }
}
