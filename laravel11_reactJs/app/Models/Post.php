<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'body', 'author_id', 'category_id'];
    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, $seacrh){
        if ($seacrh) {
            $query->where('title', 'like' , '%' . $seacrh. '%')
                   ->orWhereHas('author', function($query) use ($seacrh){
                    $query->where('name', 'like', "%{$seacrh}%",);
                   })
                   ->orWhereHas('category', function($query) use ($seacrh){
                    $query->where('name', 'like', "%{$seacrh}%");
                   })
                   ;   
         }
         return $query;
    }
}
