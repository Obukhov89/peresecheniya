<?php


namespace App\Http\Controllers;


use App\Models\Composition;
use Illuminate\Http\Request;

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

        $fileWay = storage_path('app/compositions/' . $request->user_id);

        if (!is_dir($fileWay)) {
            mkdir($fileWay, 777);
        }

        if ($request->type_content == 'text') {
            $file = $request->file('file');
            $fileName = $lastId . '.txt';
            $path = storage_path('app/compositions/' . $request->user_id . '/text');
            if (!is_dir($path)) {
                mkdir($path);
            }
            $file->move($path, $fileName);
        }
        if ($request->type_content == 'audio') {
            $file = $request->file('file');
            $fileName = $lastId . '.mp3';
            $path = storage_path('app/compositions/' . $request->user_id . '/audio');
            if (!is_dir($path)) {
                mkdir($path);
            }
            $file->move($path, $fileName);
        }
    }
}
