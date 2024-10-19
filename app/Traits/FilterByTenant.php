<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterByTenant
{
    // public static function boot(){

    //      parent::boot();

         
    //      $currentTenatID = auth()->user()->tenants()->first()->id;
    //      self::creating(function($model) use($currentTenatID){
    //          $model->tenant_id =  $currentTenatID;
    //      });

    //      self::addGlobalScope(function(Builder $builder) use ($currentTenatID){
           
    //           $builder->where('tenant_id',$currentTenatID);
    //      });
    // }
}
