<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCategories extends Model
{
    use HasFactory;

    protected $table = 'movie_categories';

    protected $fillable = [
        'movie_id',
        'category'
    ];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movies', 'movie_id', 'id');
    }

}
