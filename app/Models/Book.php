<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $table = 'books'; 
    
    protected $fillable =[ 
        'id',
        'title',
        'author',
        'description',
        'status',
        'image_fullpath',
        'image_filename',
        'user_id',
    ];
    
    public function borrowedBooks()
    {
        return $this->hasMany(UserBook::class, 'book_id');
    }
    


}
