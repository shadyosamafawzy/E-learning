<?php
/**
 * Created by PhpStorm.
 * User: Shadow
 * Date: 5/26/2020
 * Time: 12:38 AM
 */

namespace App\Http\Controllers\BackEnd;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackController extends Controller
{
    protected $model;
    protected function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function index(){
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if(!empty($with))
            $rows = $rows->with($with);
        $rows = $rows->paginate(10);
        return view('BackEnd.'.$this->getClassNameFromModel().'.index', compact('rows'));
    }

    public function create(){
        $append = $this->append();
        return view('BackEnd.'.$this->getClassNameFromModel().'.create')->with($append);
    }


    public function destroy($id){
        $this->model->FindOrFail($id)->delete();
        return redirect(route($this->getClassNameFromModel().'.index'));

    }

    public function edit($id){
        $rows = $this->model->FindOrFail($id);
        $append = $this->append();

        return view('BackEnd.'.$this->getClassNameFromModel().'.edit' , compact('rows'))->with($append);
    }

    protected function filter($rows){

        return $rows;
    }



    protected function getClassNameFromModel(){
        return str::plural(strtolower(class_basename($this->model)));
    }

    protected function with(){
        return [];
    }

    protected function append(){
        return [];
    }
}