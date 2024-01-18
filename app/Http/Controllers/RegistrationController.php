<?php


namespace App\Http\Controllers;


use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;


class RegistrationController extends Controller
{
    private Registration $registration;

    public function __construct()
    {
        $this->registration = new Registration();
    }

    public function new_registration(Request $request)
    {
        $newItem = $this->registration;

        $newItem->name = $request->fio;
        $newItem->phone = $request->tel;
        $newItem->email = $request->email;
        $newItem->id_role = $request->id_role;

        $newItem->save();
        return $newItem;
    }

//    public function reg_admin(){
//        $user = new User();
//
//        $user->name = 'Иванов Иван Иванович';
//        $user->email = 'admin@example.com';
//        $user->password = Hash::make('alk78NN_');
//        $user->save();
//    }
}
