<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected  $table = 'card';
    protected $fillable = [
        'user_id',
        'card_number',
        'card_name',
        'card_expiry',
        'card_cvv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function getHiddenCardNumberAttribute()
    {
        return  '**** **** ****' . substr($this->card_number, -4);
    }

}
