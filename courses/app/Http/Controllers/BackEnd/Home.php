<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Comments;
use App\Models\User;

class Home extends BackController
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function index(){
        $comments = Comments::with('user','video')->paginate(20);
        return view('BackEnd.home',compact('comments'));
    }
}
