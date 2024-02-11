<?php


namespace App\Http\Controllers;


use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $newItem->password = $request->password;

        $newItem->save();
        return $newItem;
    }

    public function get_turn_request()
    {
        return $select  = DB::select('select * from `registrations` left join `roles`
        on `roles`.`idRole` = `registrations`.`id_role` ');
    }

    public function save_user(Request $request)
    {
        $query = DB::select('select * from registrations where `id` =:request_id',
            ['request_id' => $request->id_request]);

        foreach ($query as $value)
        {
            $user = new User();
            $user->name = $value->name;
            $user->email = $value->email;
            $user->password = Hash::make($value->password);
            $user->save();
            $lastId = DB::select("select *  from `users` ORDER BY id DESC LIMIT 1");
            $maxId = 0;
            foreach ($lastId as $id){
                $maxId = $id->id;
            }

            $rightWrite = DB::table('users_role')->insert(['id_user' => $maxId, 'id_role' => $value->id_role]);
            DB::delete('delete from `registrations` where `id` =:id', ['id' => $value->id]);

            return json_encode($rightWrite);
        }
    }

    public function delete_request(Request $request)
    {
        $id_request = $request->id_request;
        DB::delete('delete from `registrations` where `id` =:id', ['id' => $id_request]);
    }
}
