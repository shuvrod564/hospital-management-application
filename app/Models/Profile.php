<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'avatar', 'phone',
        'date_of_birth', 'gender', 'address', 'meta'
    ];

    protected $casts = [
        'meta' => 'array',
        'date_of_birth' => 'date',
    ];

    /** Patient profile fields required for completion, weighted equally. */
    public const PATIENT_REQUIRED_FIELDS = [
        'first_name' => 'First name',
        'last_name' => 'Last name',
        'phone' => 'Phone number',
        'date_of_birth' => 'Date of birth',
        'gender' => 'Gender',
        'address' => 'Address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMeta($key, $default = null)
    {
        return data_get($this->meta ?? [], $key, $default);
    }

    public function setMeta($key, $value): void
    {
        $meta = $this->meta ?? [];
        data_set($meta, $key, $value);
        $this->meta = $meta;
    }

    /**
     * Return the percentage of required patient profile fields completed.
     * This includes the linked user's name/email plus profile fields and blood group.
     */
    public function getCompletionPercentageAttribute(): int
    {
        $user = $this->user;
        $completed = 0;
        $checks = [
            filled($user?->name),
            filled($user?->email),
        ];

        foreach (array_keys(self::PATIENT_REQUIRED_FIELDS) as $field) {
            $checks[] = filled($this->getAttribute($field));
        }

        $checks[] = filled($this->getMeta('blood_group'));
        $total = count($checks);
        $completed = count(array_filter($checks));

        return (int) round(($completed / $total) * 100);
    }

    /** Human-readable fields still needed to complete the patient profile. */
    public function getMissingFieldsAttribute(): array
    {
        $missing = [];
        $user = $this->user;

        if (! filled($user?->name)) $missing[] = 'Name';
        if (! filled($user?->email)) $missing[] = 'Email';

        foreach (self::PATIENT_REQUIRED_FIELDS as $field => $label) {
            if (! filled($this->getAttribute($field))) $missing[] = $label;
        }

        if (! filled($this->getMeta('blood_group'))) $missing[] = 'Blood group';

        return $missing;
    }

    public function getIsCompleteAttribute(): bool
    {
        return $this->completion_percentage === 100;
    }
}
