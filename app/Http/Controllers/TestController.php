<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Swift_Attachment;

include 'simple_html_dom.php';

class TestController extends Controller
{
    public function testSlug()
    {
        $name = 'ngô văn long';
        $slug = trim(mb_strtolower($name));
        $slug = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $slug);
        $slug = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $slug);
        $slug = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $slug);
        $slug = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $slug);
        $slug = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $slug);
        $slug = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $slug);
        $slug = preg_replace('/(đ)/', 'd', $slug);
        $slug = preg_replace('/[^a-z0-9-\s]/', '', $slug);
        $slug = preg_replace('/([\s]+)/', '-', $slug);

        echo $slug;
    }

    public function sendMail()
    {
        Mail::send([], [],
            function ($mes) {
//                $s = Swift_Attachment::fromPath('files/del.png');
                $mes->to('long24265@gmail.com','Ho Ten Nguoi Nhan')
                    ->from('yui.hatano.pornhub@gmail.com','Ho Ten Nguoi Gui')
                    ->setBody('noi Dung','text/html')
                    ->setSubject('NGO VAN LONG');
            }
        );

        dd(true);
    }

    public function tft() {
        $html = file_get_html('https://tftactics.gg/champions');
        echo $html;
    }

}

