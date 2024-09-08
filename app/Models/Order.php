<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function Division() {
        return $this->belongsTo(Division::class);
    }

    public function District() {
        return $this->belongsTo(District::class);
    }

    public function State() {
        return $this->belongsTo(State::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}
