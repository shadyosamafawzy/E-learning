<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Messages\Store;
use App\Mail\Reply;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class Messages extends BackController
{

    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function show(){
        return view('BackEnd.messages.show');
    }
    public function store(Store $request){
        $this->model->create($request->all());
        return redirect()->route('frontend.home');
    }
    public function reply(\App\Http\Requests\BackEnd\Reply\Store $request,$id){
        $message = $this->model->findOrFail($id);
        Mail::to($message->email)->send(new Reply($message,$request));
        return redirect()->route('messages.index');
    }

}
