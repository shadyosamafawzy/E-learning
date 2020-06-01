<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontEnd\Comments\Store;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;

class Welcome extends Controller
{
    public function index()
    {
        $videos = Video::published()->orderBy('id' , 'desc');
        $videosCount = Video::count();
        $skillsCount = Skill::count();
        $tagsCount = Tag::count();
        if(request()->has('search') && request()->search != ''){
            $videos = Video::published()->where('name' , 'like' , '%'.request()->search.'%');
        }
        $videos = $videos->paginate(15);
        return view('welcome',compact('videos','skillsCount','videosCount','tagsCount'));
    }
    public function category($id)
    {

        $cat = Category::findOrFail($id);
        $videos = Video::published()->where('cat_id' , $id)->orderBy('id' , 'desc')->paginate(15);
        return view('FrontEnd.category.index',compact('videos' , 'cat'));
    }
    public function video($id)
    {

        $video = Video::published()->with('skills','cat','comments.user','user' ,'tags')->findOrFail($id);
        return view('FrontEnd.video.index',compact('video' ));
    }
    public function skill($id)
    {
        $skill = Skill::findOrFail($id);

        $videos = Video::published()->whereHas('skills' , function ($query) use ($id){
            $query->where('skill_id' , $id);
        })->orderBy('id' , 'desc')->paginate(15);
        return view('FrontEnd.skill.index',compact('videos' , 'skill'));
    }
    public function tag($id)
    {
        $tag = Tag::findOrFail($id);

        $videos = Video::published()->whereHas('tags' , function ($query) use ($id){
            $query->where('tag_id' , $id);
        })->orderBy('id' , 'desc')->paginate(15);
        return view('FrontEnd.tag.index',compact('videos' , 'tag'));
    }

    public function commentUpdate($id,Store $request)
    {
        $comment = Comments::findOrFail($id);
        if($comment->user_id == auth()->user()->id){
            $comment->update(['comment' => $request->comment]);
        }

        return redirect(url('video/'.$comment->video_id.'?#comments'));
    }
    public function commentStore($id,Store $request)
    {
        $video = Video::published()->findOrFail($id);
        Comments::create(
            [
                'video_id' => $video->id,
                'comment' => $request->comment,
                'user_id'  => auth()->user()->id
            ]
        );
        return redirect(url('video/'.$video->id.'?#comments'));
    }
}
