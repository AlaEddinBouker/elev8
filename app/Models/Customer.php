<?php

namespace App\Models;

use App\Models\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'user_id'
    ];
    protected $hidden = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
