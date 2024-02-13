<?php


namespace App\Http\Controllers;


use App\Models\Composition;
use App\Models\Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function get_contest_item(Request $request)
    {
        $arr_contest = [];
        $contest_id = $request->contest_id;
        $query = DB::select('select * from `contests` where `id`=:contest_id', ['contest_id' => $contest_id]);
        $text_contest = $this->get_contest_text($contest_id);

        foreach ($query as $item)
        {
            $arr_contest = [
              'name_contest' => $item->contest_name,
              'date_start' => $item->date_start,
              'date_end' => $item->date_end,
              'contest_positions' => $text_contest
            ];
        }

        return $arr_contest;
    }

    public function get_contest_text($id_contest)
    {
        $path = storage_path('app/public/contests_positions/'.$id_contest.'/'.$id_contest.'.txt');
        $text = '';

        $fh = fopen($path, 'r');

        while ($string = fgets($fh)) {
            $text .= $string;
        }
        fclose($fh);

        return json_encode($text);
    }

    public function save_contest($name_contest, $date_start, $date_end)
    {
        $this->contest->contest_name = $name_contest;
        $this->contest->date_start = $date_start;
        $this->contest->date_end = $date_end;
        $this->contest->status = 'new';
        $this->contest->save();
    }

    public function save_new_contest_text(Request $request)
    {
        $name_contest = $request->contest_name;
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $text = $request->text;
        $this->save_contest($name_contest, $date_start, $date_end);

        $last_id = $this->contest::max('id');

        $fileName = $last_id.'.txt';
        $path = storage_path('app/public/contests_positions/'.$last_id);
        if (!is_dir($path))
        {
            mkdir($path, 777);
        }

        $saveFile = $path .'/'.$fileName;

        $fn = fopen($saveFile , 'w');
        $res = fwrite($fn, $text);
        fclose($fn);
        return $res;
    }

    public function save_new_contest_file(Request $request)
    {
        $name_contest = $request->contest_name;
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $text = $request->text;
        $this->save_contest($name_contest, $date_start, $date_end);

        $last_id = $this->contest::max('id');

        $fileName = $last_id.'.txt';
        $path = storage_path('app/public/contests_positions/'.$last_id);
        if (!is_dir($path))
        {
            mkdir($path, 777);
        }
        $file = $request->file('file');
        $file->move($path, $fileName);
    }

    public function accept_judge(Request $request)
    {
        $id_user = $request->id_user;
        $id_contest = $request->id_contest;

        return DB::table('judges')->insert([
            'id_user' => $id_user,
            'id_contest' => $id_contest
        ]);
    }

    public function get_judges_contest(Request $request)
    {
        return DB::select("select * from `judges`
                       left join `users` on `users`.`id` = `judges`.`id_user`
                       where `judges`.`id_contest` =:id_contest", ['id_contest' => $request->contest_id]);
    }

    public function newCompositionToContest(Request $request)
    {
        $composition = new Composition();

        $composition->author_id = $request->user_id;
        $composition->name_composition = $request->name_composition;
        $composition->type_composition = $request->type_content;

        $composition->save();
        $lastId = $composition::max('id');

        $fileWay = storage_path('app/public/compositions/' . $request->user_id);

        if (!is_dir($fileWay)) {
            mkdir($fileWay, 777);
        }

        if ($request->type_content == 'text') {
            $file = $request->file('file');
            $fileName = $lastId . '.txt';
            $path = storage_path('app/public/compositions/' . $request->user_id . '/text');
            if (!is_dir($path)) {
                mkdir($path);
            }
            $file->move($path, $fileName);
        }
        if ($request->type_content == 'audio') {
            $file = $request->file('file');
            $fileName = $lastId . '.mp3';
            $path = storage_path('app/public/compositions/' . $request->user_id . '/audio');
            if (!is_dir($path)) {
                mkdir($path);
            }
            $file->move($path, $fileName);
        }

        $this->contest->save_data_contest($request->contest_id, $request->user_id, $lastId, $request->type_content);

         return exec(storage_path("app/public/bash_script/build.sh"));
    }

    public function postCompositionToContest(Request $request)
    {
        $id_author = $request->user_id;
        $id_contest = $request->contest_id;
        $id_composition = $request->id_composition;

        $select_data = DB::select("select `type_composition` from `compositions` where `id` =:id_composition",
                                        ['id_composition' => $id_composition]);
        $type_composition = $select_data[0]->type_composition;

        $this->contest->save_data_contest($id_contest, $id_author, $id_composition, $type_composition);
    }

    public function getContestParticipantsList(Request $request)
    {
        return DB::select('select * from contest_participants
                                 left join users as u on u.id = contest_participants.author_id
                                 left join compositions as c on c.id = contest_participants.id_composition
                                 where contest_participants.id_contest = :contest_id ',
            ['contest_id' => $request->contest_id]);
    }

    public function getJudgeContest(){
        return DB::select('select u.id as id_user, u.name from users as u
                                left join judges on judges.id_user = u.id
                                left join contests on judges.id_contest = contests.id where contests.status = "new"');
    }

    public function getContestParticipantsUsers()
    {
        return DB::select('select u.id as id_user, u.name from users as u
                                left join contest_participants as cp on cp.author_id = u.id
                                left join contests on cp.id_contest = contests.id where contests.status = "new"');
    }
}
