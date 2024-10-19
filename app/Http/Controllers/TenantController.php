<?php

namespace App\Http\Controllers;


class TenantController extends Controller
{
    public function changeTenant($id){

        $tenant = auth()->user()->tenants()->findOrFail($id);
        auth()->user()->update(['current_tenant_id'=>$id]);
        return redirect()->route('dashboard');
       
    }
}
