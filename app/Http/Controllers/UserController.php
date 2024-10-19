<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\Invitation;
use Illuminate\Support\Str;
use App\Notifications\SendInvitationNotification;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function store(StoreUserRequest $request){

        $data = $request->validated();
        $data['tenant_id'] = auth()->user()->current_tenant_id;
        $data['token'] = Str::random(32);
        $invitation = Invitation::create($data);
        Notification::route('mail',$data['email'])->notify(new SendInvitationNotification($invitation));
        //Notification::send($request->email,new SendInvitationNotification($invitation));
        // $invitation = Invitation::create([
        //     'tenant_id'=> auth()->user()->current_tenant_id,
        //     'email' => $request->email,
        //     'token' => Str::random(32)
        // ]);

        return redirect()->back();
    }

    public function acceptInvitation($token){

        $invitation = Invitation::with('tenant')
                      ->where('token',$token)
                      ->whereNull('accepted_at') 
                      ->firstOrFail();
             
        //if we have logged in user
        
        // if(auth()->check())
        //$invitation->email == auth()->user()->email
        if(auth()->check()){
            $invitation->update(['accepted_at' => now()]);
           // assign a user 
           auth()->user()->tenants()->attach($invitation->tenant_id);
           auth()->user()->update(['current_tenant_id' => $invitation->tenant_id]);
           //$tenantDomain = str_replace('://','://'.$request->subdomain. '.', config('app.url'));
           //return redirect($tenantDomain.'/dashboard');
           return redirect('/dashboard');
        }else{
            // redirect to register
            return redirect()->route('signupform',['token'=>$invitation->token]);
        }
    }
}
