<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contest extends Model
{
    public function save_data_contest($id_contest, $id_author, $id_composition, $type_composition)
    {
        return DB::table('contest_participants')->insert([
            'id_contest' => $id_contest,
            'author_id' => $id_author,
            'id_composition' => $id_composition,
            'type_compositions' => $type_composition
        ]);
    }
}
