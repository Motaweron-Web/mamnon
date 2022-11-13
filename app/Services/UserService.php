<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;

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

    public function all_users()
    {
        return $this->user->all();
    }

    public function create($array)
    {
        return $this->user->create($array);
    }

}
