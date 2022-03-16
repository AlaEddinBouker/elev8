<?php

namespace App\Models;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Action extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'status',
        'user_id',
        'customer_id',
        'description',
        'date',
    ];
    protected $hidden = [
        'user_id',
        'customer_id',
    ];
    protected $casts = [
        'date' => 'datetime',
    ];

   public function customer()
   {
       return $this->belongsTo(Customer::class);
   }

   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
