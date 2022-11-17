<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Google\Cloud\Core\Timestamp;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class UserService
{
    private UserRepository $user;

    /**
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
//        parent::__construct();
        $this->user = $user;
    }

    public function where($array)
    {
        return $this->user->where($array);
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function all_users()
    {
        return $this->user->all();
    }

    public function create($array)
    {
        return $this->user->create($array);
    }

    public function do_login($request)
    {
        $phone_number = $request->phone_code.$request->phone;

        $data_user = $this->all_users()->where('phoneNumber','=',$request->phone_code.$request->phone)->limit(1)->documents();

        //--------------------------------------
        if (!empty($data_user->rows()[0])) {

            if ($data_user->rows()[0]->data()['status'] == 0) {
                return response()->json(['status'=>409,'url'=>'/'],409);
            }
            $user = User::updateOrCreate(
                ['firestore_user_id' => $data_user->rows()[0]->id(), 'phoneNumber' => $phone_number],
                $data_user->rows()[0]->data()
            );
            Auth::login($user);
        }


        if (auth()->check()) {
            return response()->json(['status'=>'login','url'=>url('/')],200);
        } else {
            $data =[
                "avatar" => "",
                "createdDate" =>  new Timestamp(new DateTime()),
                "deliveryInformation" => [],
                "deviceToken" => [],
                "favorites" => (object)[],
                "id" => "",
                "firstName" =>"",
                "language" => app()->getLocale(),
                "lastName"=> "",
                "phoneNumber" => $request->phone_code.$request->phone,
                "status" =>1,
                "username" => "user".$request->phone
//                "username" => "user".$this->user->orderBy('createdDate','DESC')->limit(1)->documents()->rows()[0]->data()
            ];
            $user_id = $this->user->create($data);
            $user = User::updateOrCreate(
                ['firestore_user_id' => $user_id, 'phoneNumber' => $data['phoneNumber']],
                $data
            );
            Auth::login($user);
            return response()->json(['url'=>url('/'),'status'=>'register'],200);
        }

    }

    public function update_profile($request)
    {
        $link_avatar = '';
        $user = $this->user->find(Auth::user()->firestore_user_id);
        if($request->file('avatar')) {
            $image = $request->file('avatar');

            $firebase_storage_path = 'Customers/';
            $name = $user->id();
            $localfolder = public_path('firebase-temp-uploads') . '/';
            $extension = $image->getClientOriginalExtension();
            $file = $name . '.' . $extension;
            if ($image->move($localfolder, $file)) {
                $uploadedfile = fopen($localfolder . $file, 'r');
                $req = app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $name]);
                //will remove from local laravel folder
                unlink($localfolder . $file);
                $link_avatar = $req->info()['mediaLink'];
            } else {
                echo 'error';
            }
        }
        $data =[
            'avatar' => $link_avatar? $link_avatar : $user->data()['avatar'],
            'firstName' =>$request->firstName,
            'lastName'=> $request->lastName,
            'id'=> Auth::user()->firestore_user_id,
        ];
        $user = User::find(Auth::user()->id);
        $this->user->update($data);
        $user->avatar = $link_avatar? $link_avatar : $data['avatar'];
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->save();
        return $user;
    }

}
