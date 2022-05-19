<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected  $table = 'movies';

    protected $fillable = [
        'movie_name',
        'movie_description',
        'movie_release_date',
        'movie_thumbnail',
        'movie_duration'
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function categories(){
        return $this->hasMany(MovieCategories::class, 'movie_id' ,'id');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('movie_release_date', '<', date('Y-m-d'));
    }

    public function scopeUpcoming($query)
    {
        return $query->whereDate('movie_release_date', '>', date('Y-m-d'));
    }

}
