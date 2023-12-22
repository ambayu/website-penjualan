<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function scopeJumlah($query, array $filters)
    {
if (isset($filters['date1']) && isset($filters['date2'])) {

    $dateS = new Carbon($filters['date1']);
    $dateE = new Carbon($filters['date2']);
} else {
    $dateS = '';
    $dateE = '';
}

$query->when($dateS ?? false, function ($query, $search) use ($dateS, $dateE) {
    return $query->whereBetween('created_at', [$dateS, $dateE]);
});

$query->when($filters['menu_id'] ?? false, function ($query, $menu_id) {
    return $query->where('menu_id', $menu_id);
});

// $query->when($filters['meja'] ?? false, function ($query, $meja) {
//     return $query->whereHas('meja', function ($query) use ($meja) {
//         $query->where('no_meja', $meja);
//     });
// });

    }

    public function scopeFilter($query, array $filters)
    {
        if(isset($filters['date1']) && isset($filters['date2'])){

            $dateS = new Carbon($filters['date1']);
            $dateE = new Carbon($filters['date2']);
        }
        else{
             $dateS = '';
            $dateE = '';
        }

        $query->when($dateS ?? false,function($query, $search) use($dateS,$dateE){
            return $query->whereBetween('created_at', [$dateS, $dateE]) ;
        });

        $query->when($filters['menu_id'] ?? false,function($query, $menu_id) {
            return $query->where('menu_id', $menu_id);
        });

        // $query->when($filters['meja'] ?? false, function($query, $meja){
        //     return $query->whereHas('meja', function($query) use ($meja){
        //         $query->where('no_meja',$meja);
        //     });
        // });

        
    }


     public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

     public function ppns()
    {
        return $this->belongsTo(ppn::class,'invoice','invoice');
    }

   


}
