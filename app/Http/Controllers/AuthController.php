<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\SigninRequest;
use App\Models\Invitation;

class AuthController extends Controller
{
    public function signupForm(){
        $invitationEmail = NULL;
        if(request('token')){
           $invitation = Invitation::where('token',request('token'))
                         ->whereNull('accepted_at')
                         ->firstOrFail();
        //    $invitation->update(['accepted_at' => now()]);              
           $invitationEmail  =  $invitation->email;            
        }

        return view('signup',compact('invitationEmail'));
    }

    public function signup(SignupRequest $request){
        
        $data = $request->validated();
        $invitation = Invitation::with('tenant')
                      ->where('email',$data['email'])
                      ->whereNull('accepted_at') 
                      ->first();
        if(!empty($invitation->email)){
            $invitation->update(['accepted_at' => now()]);
            $user = User::create($data);
            $tenant = Tenant::create([
            'name'=>$request->name. 'Team',
            'subdomain' => 'NULL'
            ]);
            $get_tenant = Tenant::where('id', $invitation->tenant_id)->first();
            $get_tenant->users()->attach($user->id);
            $user->update(['current_tenant_id' => $invitation->tenant_id]); 
            Auth::login($user);
            return redirect()->route('dashboard');
         }else{
            $user = User::create($data); 
            $tenant = Tenant::create([
                'name'=>$request->name. 'Team',
                'subdomain' => $request->subdomain
            ]);
            $tenant->users()->attach($user->id);
            $user->update(['current_tenant_id'=>$tenant->id]);
            Auth::login($user);
            return redirect()->route('dashboard');

         }
                    

        
        //$tenantDomain = str_replace('://','://'.$request->subdomain. '.', config('app.url'));
        //$tenantDomain = str_replace('://','://'.$request->subdomain. '.',config('app.port'));
        //return redirect($tenantDomain.'/dashboard');
    }
    //http://abcd.localhost/dashboard
    // http://localhost:8000/dashboard
    

    public function signinForm(){

        return view('signin');
    }

    public function signin(SigninRequest $request){

        $credentials = $request->validated();
        if (Auth::attempt($credentials)) 
        {
             return redirect()->route('dashboard'); 
        }

        return back()->withErrors([
            'general_error' => 'The provided credentials do not match our records.',
        ]);
  
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('signinform');
    }

    
}
