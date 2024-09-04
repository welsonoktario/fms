<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;
    protected $table ='spareparts';
    protected $guarded = [];

    public function sparepart_categories()
    {
        return $this->belongsTo(SparepartCategory::class);
    }
    public function sparepart_brands()
    {
        return $this->belongsTo(SparepartBrand::class);
    }
}
