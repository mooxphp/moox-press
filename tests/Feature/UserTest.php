<?php

use Moox\Press\Models\WpUser;
use Moox\Press\Resources\WpUserResource;

beforeEach(function(){
    $this->user = WPUser::factory()->create();
});

afterEach(function(){
    $this->user->delete();
});

test('Database has User', function () {
    $this->assertDatabaseHas('wp_users', [
        'user_email' => $this->user->email,
        'user_pass' => $this->user->password,
    ]);
});

it('can login', function(){
    $this->actingAs($this->user)->get('/admin')->assertSuccessful();
});

it('can get WpUserResource', function(){
    $this->actingAs($this->user)->get(WPUserResource::getUrl('index'))->assertSuccessful();
});



