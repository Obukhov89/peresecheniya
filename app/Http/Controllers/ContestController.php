<?php


namespace App\Http\Controllers;


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
}
