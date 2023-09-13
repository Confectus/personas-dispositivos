<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $primaryKey = 'id';

    protected $fillable = [
        'names',
        'last_names',
        'phone',
        'email',
    ];

    protected $hidden = [
        'email',
    ];

    protected $casts = [
        'id' => 'string',
        'email' => 'hashed',
    ];

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }
}
