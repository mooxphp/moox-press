<?php

namespace Moox\Press\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WpUserMeta extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(WpUser::class, 'ID');
    }

    protected $fillable = ['user_id', 'meta_key', 'meta_value'];

    protected $searchableFields = ['*'];

    protected $wpPrefix;

    protected $table;

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->wpPrefix = config('press.wordpress_prefix');
        $this->table = $this->wpPrefix.'usermeta';
    }
}