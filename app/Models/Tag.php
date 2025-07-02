<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Метки клиентов
 */
class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Клиенты с этой меткой
     */
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'client_tag');
    }
}
