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
        $phone_number = $request->phone_code.$request->phone;

        $data_user = $this->user->all_users()->where('phoneNumber','=',$request->phone_code.$request->phone)->limit(1)->documents();
//dd($data_user->rows()[0]);

        //--------------------------------------
        if (!empty($data_user->rows()[0])) {

            if ($data_user->rows()[0]->data()['status'] == 0) {
                return $this->final_response(null, 'sorry, this user is blocked', 409, 'no');
            }
            $user = User::updateOrCreate(
                ['firestore_user_id' => $data_user->rows()[0]->id(), 'phoneNumber' => $phone_number],
                $data_user->rows()[0]->data()
            );
            Auth::login($user);
        }


        if (auth()->check()) {
            return response()->json(['status'=>'login','url'=>'/'],200);
        } else {
            $data =[
                "avatar" => "",
                "createdDate" =>  new Timestamp(new DateTime()),
                "email" => "",
                "firstName" =>"",
                "language" => app()->getLocale(),
                "lastName"=> "",
                "phoneNumber" => $request->phone_code.$request->phone,
                "status" =>1,
                "userRole" => "Mandoob",
                "username" => "Mandoob_l7zv1172"
            ];
            $user_id = $this->user->create($data);
            $user = User::updateOrCreate(
                ['firestore_user_id' => $user_id, 'phoneNumber' => $data['phoneNumber']],
                $data
            );
            Auth::login($user);
            return response()->json(['url'=>'/','status'=>'register'],200);
        }
    }
}
