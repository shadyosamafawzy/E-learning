<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Str;


class Videos extends BackController
{

    use CommentsTrait;
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

   protected function with(){
        return ['cat' , 'user'];
   }

   protected function append(){
        $array =  [
            'categories' => Category::all(),
            'skills' => Skill::all(),
            'tags' => Tag::all(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments'  => []
        ];
        if(request()->route()->parameter('video')){
            $array['selectedSkills'] = $this->model->find(request()->route()->parameter('video'))
                ->skills()->get()->pluck('id')->toArray();
            $array['selectedTags'] = $this->model->find(request()->route()->parameter('video'))
                ->tags()->get()->pluck('id')->toArray();
            $array['comments'] = $this->model->find(request()->route()->parameter('video'))
                ->comments()->orderBy('created_at' , 'desc')->with('user')->get();
        }

        return $array;
   }


    public function store(Store $request){

        $fileName = $this->uploadImage($request);
        $requestArray =  ['user_id' => auth()->user()->id , 'image' => $fileName] +$request->all() ;
        $row  = $this->model->create($requestArray);
        $this->syncTagsSkills($row , $requestArray);
        return redirect(route('videos.index'));

    }


    public function update($id,Update $request){
        $requestArray = $request->all();
        if($request->hasFile('image'))
        {
            $fileName = $this->uploadImage($request);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $row = $this->model->FindOrFail($id);
        $row->update($requestArray);
        $this->syncTagsSkills($row , $requestArray);
        return redirect(route('videos.index'));


    }
    protected function syncTagsSkills($row , $requestArray){
        if(isset($requestArray['skills']) && !empty($requestArray['skills']))
            $row->skills()->sync($requestArray['skills']);
        if(isset($requestArray['tags']) && !empty($requestArray['tags']))
            $row->tags()->sync($requestArray['tags']);
    }
    protected function uploadImage($request){
        $file = $request->file('image');
        $fileName = time().Str::random(12).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $fileName);
        return $fileName;
    }
}
