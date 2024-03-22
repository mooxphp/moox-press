<?php

it('can render login page', function () {
    $response = $this->get('admin/login');
    $response->assertStatus(200);
    $response->assertSee('Login');
    $response->assertSee('Password');

});

it('will redirect to login', function(){
    $this->get('admin')->assertRedirect('admin/login');
});
