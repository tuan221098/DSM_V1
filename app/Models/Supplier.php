<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table ='suppliers';
    protected $fillable =[
        'id','code_supplier','name_supplier','email','phone','status',
    ];

    public function getStatusName()
    {
        $value = '';
        if ($this->status == config('constants.supplier_status.active')) {
            $value = trans('layout.supplier_status.active');
        } else if ($this->status == config('constants.supplier_status.in_active')) {
            $value = trans('layout.supplier_status.in_active');
        }
        return $value;
    }
}
