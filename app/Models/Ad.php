<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;


class Ad extends Model
{
    protected $fillable = ['title', 'body', 'price'];

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;

    }
    static public function ToBeRevisionedCount()
    {
        return Ad::where('is_accepted',null)->count();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
}


