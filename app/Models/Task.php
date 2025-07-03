<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'client_id',
        'title',
        'description',
        'status',
        'assigned_user_id',
        'created_by_user_id',
        'due_date',
        'recurrence_type',
        'recurrence_interval',
        'recurrence_until'
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'recurrence_until' => 'datetime',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
