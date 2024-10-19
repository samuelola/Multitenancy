<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterByTenant;
// use Illuminate\Database\Eloquent\Builder;

class Project extends Model
{
    use HasFactory, FilterByTenant;

    protected $fillable = ['name'];

    public function task(){
        
        return $this->hasOne(Task::class);
    }
}
