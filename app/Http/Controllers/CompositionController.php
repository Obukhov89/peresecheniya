<?php


namespace App\Http\Controllers;


use App\Models\Composition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompositionController extends Controller
{
    private Composition $composition;

    public function __construct()
    {
        $this->composition = new Composition();
    }

    public function download_composition(Request $request)
    {
        $this->composition->author_id = $request->user_id;
        $this->composition->name_composition = $request->name_composition;
        $this->composition->type_composition = $request->type_content;
        $this->composition->save();
        $lastId = $this->composition::max('id');

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

//            return exec(storage_path("app/public/bash_script/build.sh"));
        }
    }

    public function get_composition_author(Request $request)
    {
        $arr_compositions = [];
        $query = DB::select('select * from `compositions` where `author_id` =:author_id',
            ['author_id' => $request->user_id]);

        foreach ($query as $item)
        {
            if ($item->type_composition == 'text'){
                $arr_compositions['text'][] =
                    [
                        'id' => $item->id,
                        'name_composition' => $item->name_composition,
                        'id_author' => $item->author_id,
                    ];
            }
            if ($item->type_composition == 'audio'){
                $arr_compositions['audio'][] =
                    [
                        'id' => $item->id,
                        'name_composition' => $item->name_composition,
                        'id_author' => $item->author_id
                ];
            }
        }
        return $arr_compositions;
    }

    public function getArticle(Request $request)
    {
        $authorId = $request->author_id;
        $textId = $request->text_id;
        $query = DB::select("select `name_composition` from `compositions` where `id` =:id", ['id' => $textId]);
        $art =  $this->composition->getArticle($authorId, $textId);

        return [
          'name_composition' => $query[0]->name_composition,
          'text_composition' =>json_encode($art)
        ];
    }

    public function getAudioComposition(Request $request)
    {
        $compositionId = $request->id_composition;
        $query = DB::select("select `name_composition` from `compositions` where `id` =:id", ['id' => $compositionId]);

        return $query[0]->name_composition;
    }

    public function editComposition(Request $request)
    {
        $authorId = $request->idAuthor;
        $textId = $request->idText;
        $text = $request->text;

        return json_encode($this->composition->editComposition($authorId, $textId, $text));
    }

    public function delete_text(Request $request)
    {
        $textId = $request->textId;
        $authorId = $request->authorId;

        $this->composition->deleteComposition($textId, $authorId);

        $delComposition = $this->composition::find($textId);
        $delComposition->delete();

        return $delComposition;
    }

    public function delete_audio(Request $request)
    {
        $audioId = $request->audioId;
        $authorId = $request->authorId;

        $this->composition->delete_audio($audioId, $authorId);

        $delComposition = $this->composition::find($audioId);
        $delComposition->delete();

        return $delComposition;
    }

    public function get_names_compositions(Request $request)
    {
        return DB::select('select * from `compositions` where `author_id` =:author_id',
            ['author_id' => $request->user_id]);
    }
}
