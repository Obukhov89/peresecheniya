<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Validator;

class UserController
{
    public function login(Request $request)
    {
        $user = new User();
        $credentials =[
            'email' => $request->email,
            'password' => $request->password
        ];

        $res = auth()->attempt($credentials);

        if (!$token = $res){
            return response()->json(['error' => 'no auth'], 401);
        }

        $id_user = auth()->user()->getAuthIdentifier();

        $objUser = json_decode(auth()->user());

        $name_full = explode(' ', $objUser->name);
        $id_role = $user->get_user_right($id_user);

        $user_data = [
            'last_name' => $name_full[0],
            'first_name' => $name_full[1],
            'sur_name' => $name_full[2],
            'id_role' => $id_role,
            'email' => $objUser->email
        ];

        return $user_data;
    }
}
