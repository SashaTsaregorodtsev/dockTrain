<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Authors extends Model
{
    public $timestamps = false;
    protected $fillable = ['initial'];
    public function books():BelongsToMany
    {
        return $this->belongsToMany(Books::class,'authors_books');
    }
}