<?php


namespace App\Http\Controllers;


use App\Models\Contest;

class ContestController extends Controller
{
    private Contest $contest;

    public function __construct()
    {
        $this->contest = new Contest();
    }

    public function get_all_contests()
    {
       return $this->contest::all();
    }
}
