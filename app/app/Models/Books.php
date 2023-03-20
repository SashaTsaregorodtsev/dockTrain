<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Books extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','yearsPublic'];
    public function authors():BelongsToMany
    {
        return $this->belongsToMany(Authors::class,'authors_books');
    }
}
