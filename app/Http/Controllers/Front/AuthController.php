<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use DateTime;
use Google\Cloud\Core\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private UserService $user;

    /**
     * @param UserService $user
     */
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function login()
    {
        return view('front.auth.login');
    }

    public function dologin(Request $request)
    {
        return $this->user->do_login();
    }

    public function profile()
    {
        $data['user_data'] = $this->user->find(Auth::user()->firestore_user_id);
//        dd($data['user_data']);
        return view('front.auth.profile',$data);
    }

    public function update_profile(Request $request)
    {
        $data['user_data'] = $this->user->update_profile($request);
        if($data['user_data']) {
            toastr()->success('Data has been Updated successfully!');
            return back();
        }
        toastr()->error('An error has occurred please try again.');

        return back();
    }
}
