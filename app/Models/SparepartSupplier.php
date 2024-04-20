<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparepartSupplier extends Model
{
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(SparepartCategory::class, 'sparepart_supplier_categories');
    }

    public function brands()
    {
        return $this->belongsToMany(SparepartCategory::class, 'sparepart_supplier_brands');
    }

    public function spareparts()
    {
        return $this->belongsToMany(Sparepart::class, 'sparepart_suppliers');
    }
}
