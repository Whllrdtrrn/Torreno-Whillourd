<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    use HasFactory;
    
    protected $table = 'user_books'; 
    
    protected $fillable =[ 
        'id',
        'user_id',
        'book_id',
        'status',
    ];
    
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    

}
