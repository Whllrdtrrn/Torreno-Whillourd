<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use DateFormatterTrait,SoftDeletes,HasFactory;

	protected $table = "banner";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'caption',
        'title' ,
        'url',
        'image_fullpath',
        'image_filename',
        'user_id',

    ];

    public $timestamps = true;


}
