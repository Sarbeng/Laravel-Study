<?php

namespace App\Models;


use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    public function reviews () {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title','LIKE','%' . $title . '%') ;
    }

    public function scopePopular(Builder $query, $from = null, $to = null): Builder 
    {
        return $query->withCount(['reviews' => function (Builder $q) use ($from, $to) {
         'reviews'
        }])
        ->orderBy('reviews_count','desc');
    }

    public function scopeHighestRated(Builder $query): Builder 
    {
        return $query->withAvg('reviews','rating')
        ->orderBy('reviews_avg_rating','desc');        
    }

    // why a private function? because we do not want it to be accessed outside this page
    private function dateRangeFilter (Builder $query, $from = null, $to = null) {
        if ($from && !$to){
            $query->where('created_at','>=', $from);
        } elseif (!$from && $to) {
            $query->where('created_at', '<=', $to);
        } elseif ($from && $to) {
            $query->whereBetween('created_at',[$from, $to]);
        }
    }

}
