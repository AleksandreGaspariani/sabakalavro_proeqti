<?php

namespace App\Models;
use App\Models\Sector;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Session extends Model
{
    use HasFactory;
    protected $table = 'sessions';

    protected $fillable = [
        'sector_id',
        'movie_id',
        'start_at',
        'end_at',
        'price',
        'language',
    ];

    protected $with =[
        'movie',
        'sector'
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

}
