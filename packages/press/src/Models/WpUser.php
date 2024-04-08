<?php

namespace Moox\Press\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Moox\Press\Database\Factories\WpUserFactory;

/**
 * @property int $ID
 * @property string $user_login
 * @property string $user_nicename
 * @property string $user_email
 */
class WpUser extends Authenticatable implements FilamentUser
{
    use HasFactory;
    use Notifiable;

    public function userMeta()
    {
        return $this->hasMany(WpUserMeta::class, 'user_id');
    }

    protected $fillable = [
        'user_login',
        'user_pass',
        'user_nicename',
        'user_email',
        'user_url',
        'user_registered',
        'user_activation_key',
        'user_status',
        'display_name',

    ];

    protected $searchableFields = ['*'];

    protected $wpPrefix;

    protected $table;

    protected $primaryKey = 'ID';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->wpPrefix = config('press.wordpress_prefix');
        $this->table = $this->wpPrefix.'users';
    }

    public $timestamps = false;

    protected $casts = [
        'user_registered' => 'datetime',
        'spam' => 'boolean',
        'deleted' => 'boolean',
    ];

    public function getNameAttribute()
    {
        return $this->attributes['user_login'];
    }

    public function getEmailAttribute()
    {
        return $this->attributes['user_email'];
    }

    public function getPasswordAttribute()
    {
        return $this->attributes['user_pass'];
    }

    protected static function newFactory(): Factory
    {
        return WpUserFactory::new();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
