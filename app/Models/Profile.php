<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'avatar', 'phone', 
        'date_of_birth', 'gender', 'address', 'meta'
    ];

    // Automatically encode/decode the JSON column
    protected $casts = [
        'meta' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper to easily get meta data
    public function getMeta($key, $default = null)
    {
        return $this->meta[$key] ?? $default;
    }

    // Helper to easily set meta data
    public function setMeta($key, $value)
    {
        $meta = $this->meta ?? [];
        $meta[$key] = $value;
        $this->meta = $meta;
    }
}