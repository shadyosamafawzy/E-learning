<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 5/30/2020
 * Time: 3:32 AM
 */

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comments;

trait CommentsTrait
{

    public function commentStore(Store $request){

        $requestArray = $request->all() + ['user_id' => auth()->user()->id];

        Comments::create($requestArray);
        return redirect()->back() ;
    }

    public function commentDestroy($id){

        Comments::FindOrFail($id)->delete();
        return redirect()->back();
    }


    public function commentUpdate($id , Store $request){

        $row = Comments::FindOrFail($id);
        $row->update($request->all());
        return redirect()->back();
    }

}