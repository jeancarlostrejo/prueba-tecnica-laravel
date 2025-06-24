<?php

namespace App\Models;

use App\enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
{
    protected $fillable = [
        'subject',
        'destinatary',
        'body',
        'user_id',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'status' => Status::class
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
