<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $quarded = ['id'];
    protected $fillable = ['title', 'slug', 'category_id', 'body', 'user_id', 'excerpt','image'];
    protected $with = ['user', 'category'];

    public function scopeFilter($query,  array $filter){
        // menggunakan ternary
        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('excerpt', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%');
        });
        // menggunakan callback
        $query->when($filter['kategori'] ?? false, function($query, $category){
            // penggunaan methode whereHas untuk relasi tabel apa 
            return $query->whereHas('category', function($query) use ($category){
                $query->where('title', $category);
            });
            
            
        });

        $query->when($filter['search'] ?? false, function($query, $category){
            // penggunaan methode whereHas untuk relasi tabel apa 
            return $query->whereHas('category', function($query) use ($category){
                $query->where('title', $category);
            });
            
            
        });
       
       
        // menggunakan arrow function
        $query->when($filter['authors'] ?? false, fn($query, $authors) =>
            $query->whereHas('user', fn($query) =>
                $query->where('name', $authors)
            )
        );
    
    }
    public function category(){
       return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'title';
    }
}


