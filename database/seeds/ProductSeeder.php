<?php

use Illuminate\Database\Seeder;

include 'simple_html_dom.php';

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $html = file_get_html('http://www.shopconverses.com/giay-converse-nu');
        $img = [];
        $price = [];
        $name = [];
        $arrSlug = [];
        foreach ($html->find('.main-product a img') as $element0) {
            $src = $element0->src;
            array_push($img, $src);
        };
        foreach ($html->find('.main-product a>span') as $element0) {
            $text = $element0->plaintext;
            $test = str_replace('.', '', substr($element0->plaintext, 2, strlen($text)));
            array_push($price, $test);
        };
        foreach ($html->find('.main-product h4 a') as $element0) {
            $text = $element0->plaintext;
            array_push($name, $text);

            $slug = trim(mb_strtolower($text));
            $slug = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $slug);
            $slug = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $slug);
            $slug = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $slug);
            $slug = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $slug);
            $slug = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $slug);
            $slug = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $slug);
            $slug = preg_replace('/(đ)/', 'd', $slug);
            $slug = preg_replace('/[^a-z0-9-\s]/', '', $slug);
            $slug = preg_replace('/([\s]+)/', '-', $slug);
            array_push($arrSlug, $slug);

        };
        for ($i = 0; $i < count($img); $i++) {
            \Illuminate\Support\Facades\DB::table('products')->insert([
                [
                    'category_id' => 4,
                    'name' => $name[$i],
                    'description' => 'It is a long established fact that a reader will be distracted by the
                    readable content of a page when looking at its layout.',
                    'price' => $price[$i],
                    'quantity' => 100,
                    'status' => 1,
                    'slug' => $arrSlug[$i]
                ]
            ]);
            \Illuminate\Support\Facades\DB::table('images')->insert([
                [
                    'product_id' => $i + 1,
                    'url' => $img[$i],
                ]
            ]);
            \Illuminate\Support\Facades\DB::table('sizes')->insert([
                [
                    'product_id' => $i + 1,
                    'size' => 35,
                ],
                [
                    'product_id' => $i + 1,
                    'size' => 36,
                ],
                [
                    'product_id' => $i + 1,
                    'size' => 37,
                ],
                [
                    'product_id' => $i + 1,
                    'size' => 38,
                ],
                [
                    'product_id' => $i + 1,
                    'size' => 39,
                ],
                [
                    'product_id' => $i + 1,
                    'size' => 40,
                ],
                [
                    'product_id' => $i + 1,
                    'size' => 41,
                ],
                [
                    'product_id' => $i + 1,
                    'size' => 42,
                ],
            ]);

        }
    }
}
