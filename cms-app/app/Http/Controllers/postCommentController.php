<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCommentRequest;
class postCommentController extends Controller
{
    public function store(PostCommentRequest $request)
    {
        $data = $request()->only('cName','cEmail','cMessage');
        echo $data;
    }
}
