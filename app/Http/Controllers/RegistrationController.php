<?php


namespace App\Http\Controllers;


use App\Models\Registration;
use Illuminate\Http\Request;


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
}
