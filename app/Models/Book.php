<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function User(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'transactions', 'book_id', 'user_id')->withPivot(['id', 'tglPinjam', 'tglKembali', 'status', 'denda']);
    }

    public function UserKomentar(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'comments', 'book_id', 'user_id')->withPivot(['comment']);
    }
}
