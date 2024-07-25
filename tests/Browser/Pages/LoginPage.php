<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class LoginPage extends Page
{
    /**
     * Get the URL for the page.
     */
    public function url(): string
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     */
    public function assert(Browser $browser): void
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array<string, string>
     */
    public function elements(): array
    {
        return [
            '@email' => '#email',
            '@password' => '#password',
            // '@password' => 'input[name="password"]',
        ];
    }

    public function signIn(Browser $browser, $email, $password)
    {
        $browser
            ->value('@email', $email)
            ->value('@password', $password)
            ->press('LOG IN')
            ->assertRouteIs('dashboard');
    }
}
