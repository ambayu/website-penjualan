<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    use HasFactory; use Sluggable;
    protected $guarded = ['id'];
 protected $table = "menus";
    public function level(){
        return $this->belongsTo(level::class);
    }

       public function transaksi(){
        return $this->hasMany(transaksi::class);
    }
 

    public function sluggable(): array{
        return[
            'slug' => [
                'source' => 'title'
            ]
            ];
    }
}
