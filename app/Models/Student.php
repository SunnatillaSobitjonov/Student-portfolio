<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Mass assign qilish mumkin bo'lgan fieldlar
    protected $fillable = [
        'name',
        'email',
        'phone',
        'image', // agar rasm saqlayotgan bo‘lsangiz
        'user_id' // agar student user bilan bog‘liq bo‘lsa
    ];

    // Agar student biror userga tegishli bo'lsa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}