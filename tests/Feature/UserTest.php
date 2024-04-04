<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Moox\Press\Models\WpUser;
use Moox\Press\Resources\WpUserResource;

beforeEach(function () {
    $wpPrefix = config('press.wordpress_prefix');
    $this->table = $wpPrefix.'users';

    if (! Schema::hasTable($this->table)) {
        $sqlFilePath = 'wp_full.sql';
        $sql = file_get_contents($sqlFilePath);
        DB::unprepared($sql);
    }
    $this->user = WPUser::factory()->create();
});

afterEach(function () {
    $this->user->delete();
});

test('Database has User', function () {
    $this->assertDatabaseHas($this->table, [
        'user_email' => $this->user->email,
        'user_pass' => $this->user->password,
    ]);
});

// it('can login', function () {
//     $this->actingAs($this->user)->get('/admin')->assertSuccessful();
// });

// it('can get WpUserResource', function () {
//     $this->actingAs($this->user)->get(WPUserResource::getUrl('index'))->assertSuccessful();
// });

test('Unauthorized cant get WpUserResource', function () {
    $this->get(WPUserResource::getUrl('index'))->assertRedirect('admin/login');
});
