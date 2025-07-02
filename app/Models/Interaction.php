<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interaction extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'client_id',
        'user_id',
        'type',
        'content',
    ];

    /**
     * The client this interaction belongs to.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * The user who performed the interaction.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
