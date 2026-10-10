<?php

test('renders the login page with a polished transport icon instead of the bus image', function (): void {
    $response = $this->get(route('login'));

    $response->assertOk();
    $response->assertSee('fa-plane-departure', false);
    $response->assertDontSee('icons8-bus.gif');
    $response->assertSee('Σύνδεση μέσω ΠΣΔ');
});
