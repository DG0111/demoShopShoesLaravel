<?php

namespace App\Http\Controllers;
include 'simple_html_dom.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function index()
    {
//        $html = file_get_html('https://thegioigiaythethao.vn/giay-the-thao-converse-t68.html?gclid=CjwKCAjw2a32BRBXEiwAUcugiD4DNf2DANb9vsIXaWuYWidqjyO1fImotS_JxaAEL2vqRWQM_F--AhoCcN0QAvD_BwE');
//        foreach ($html->find('dt>a>img') as $element0) {
//            echo 'https://thegioigiaythethao.vn/' . $element0->src;
//            echo "<br>";
//        };
//        foreach ($html->find('dd>a') as $element1) {
//            echo $element1->plaintext;
//            echo "<br>";
//        }
//
//        foreach ($html->find('dd>p>strong') as $element1) {
//            echo $element1->plaintext;
//            echo "<br>";
//        }

        $html = file_get_html('http://www.shopconverses.com/giay-converse-nam');

        $arr1 = [];
        $arr2 = [];
        $arr3 = [];

        foreach ($html->find('.main-product a img') as $element0) {
            $src = $element0->src;
            array_push($arr1, $src);
        };

        foreach ($html->find('.main-product a>span') as $element0) {
            $text = $element0->plaintext;
            $test = str_replace('.', '', substr($element0->plaintext, 2, strlen($text)));
            array_push($arr2, $test);
        };

        foreach ($html->find('.main-product h4 a') as $element0) {
            $text = $element0->plaintext;
            array_push($arr3, $text);
        };

        dd($arr2);
    }

}
