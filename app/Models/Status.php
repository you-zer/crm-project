<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Клиенты с этим статусом
     */
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }
}
