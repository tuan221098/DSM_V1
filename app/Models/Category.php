<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'name',
        'description',
        'status',
    ];

    public function getStatusName()
    {
        $value = '';
        if ($this->status == config('constants.category_status.active')) {
            $value = trans('layout.category_status.active');
        } else if ($this->status == config('constants.category_status.in_active')) {
            $value = trans('layout.category_status.in_active');
        }
        return $value;
    }
}
