<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Moox\Press\Models\WpUser;
use Moox\Press\Resources\WpUserResource;

beforeEach(function () {
    if(!Schema::hasTable('wp_users')){
        $sqlFilePath = 'moox-press.sql';
        $sql = file_get_contents($sqlFilePath);
        DB::unprepared($sql);
    }
    $this->user = WPUser::factory()->create();
});

afterEach(function () {
    $this->user->delete();
});

test('Database has User', function () {
    $this->assertDatabaseHas('wp_users', [
        'user_email' => $this->user->email,
        'user_pass' => $this->user->password,
    ]);
});

it('can login', function () {
    $this->actingAs($this->user)->get('/admin')->assertSuccessful();
});

it('can get WpUserResource', function () {
    $this->actingAs($this->user)->get(WPUserResource::getUrl('index'))->assertSuccessful();
});

test('Unauthorized cant get WpUserResource', function () {
    $this->get(WPUserResource::getUrl('index'))->assertRedirect('admin/login');
});
