<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;
use Illuminate\Support\Str;

class MemeCreatorController extends Controller
{
    public function createMeme()
    {
        $i = 0;
        $memes = Meme::all();
        $year = now()->year;
        $month = now()->month;
        $path = 'content/' . $year . '/' . $month;
        foreach ($memes as $meme) {


            $image = imagecreate(400, 400);
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);
            $color = imagecolorallocate($image, $red, $green, $blue);
            $black = imagecolorallocate($image, 0, 0, 0);

            $title = Str::random(10);
            $text = "Meme number " . $i;


            imagefilledrectangle($image, 0, 0, 400, 400, $color);
            imagestring($image, 5, 100, 100, $text, $black);
            imagepng($image, $path . "/" . $title . ".png");
            $url = $path . "/" . $title.".png";
            $i++;
            Meme::Where('id',$meme->id)->update([
                'file_patch' => $url,
            ]);
        }
    }
}
