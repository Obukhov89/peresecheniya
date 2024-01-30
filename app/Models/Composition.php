<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    public function getArticle($idAuthor, $idText)
    {
        $path = storage_path('app/public/compositions/'.$idAuthor.'/text/'.$idText.'.txt');

        $text = '';

        $fh = fopen($path, 'r');

        while ($string = fgets($fh)) {
            $text .= $string;
        }
        fclose($fh);

        return $text;
    }

    public function editComposition($idAuthor, $idText, $text)
    {
        $path = storage_path('app/public/compositions/'.$idAuthor.'/text/'.$idText.'.txt');

        $fh = fopen($path, 'w');

        $res = fwrite($fh, $text);
        fclose($fh);

        return $res;
    }
}
