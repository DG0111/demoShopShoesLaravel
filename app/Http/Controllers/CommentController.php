<?php

namespace App\Http\Controllers;

use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function created(Request $request) {

        $comment = new Comment();
        $comment->user_id = $request->idUser;
        $comment->product_id = $request->idProduct;
        $comment->content = $request->content2;
        $comment->create_date = Carbon::now();
        $comment->save();
    }
}
