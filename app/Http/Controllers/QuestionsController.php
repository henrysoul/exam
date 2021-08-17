<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Exam;
use App\Models\Option;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{

    public function fetch_questions(Request $request){
        $questions = Question::where('exam_id',$request->exam)->get();
    
        return view('exam.question.exam_room',compact('questions'));
    }

    public function questions(){
        $exams = Exam::all();
        return view('exam.question.questions',compact('exams'));
    }

    public function exams(){
        $exams = Exam::all();
        return view('exam.question.exam', compact('exams'));
    }

    public function exam_store(Request $request){
        $this->validate($request,[
            'exam' => ['required', 'unique:exams'],
        ]);

        Exam::create(['exam'=>$request->exam]);
        return back()->with("success","Exam created successfully");
    }

    public function exam_update(Request $request){
        $this->validate($request,[
            'exam' => ['required'],
        ]);

        Exam::find($request->id)->update(['exam'=>$request->exam]);
        return back()->with("success","Exam Updated successfully");
    }


    public function questions_index()
    {
        $exams = Exam::all();
        $categories = Category::all();
        $questions  = Question::all();
        return view('exam.question.index', compact('questions', 'categories', 'exams'));
    }

    public function questions_store(Request $request)
    {
        $this->validate($request, [
            'exam' => ['required'],
            'category' => ['required'],
            'question' => ['required'],
            'options.*' => ['required'],
        ]);

        $quest = Question::create([
            'exam_id' => $request->exam,
            'category_id' => $request->category,
            'question' => $request->question
        ]);

        foreach ($request->options as $opt) {
            Option::create([
                'question_id' => $quest->id,
                'option'=>$opt
            ]);
        }

        return back()->with("success","Question created successfully");
    }

    public function question_categories()
    {
        $categories = Category::all();
        return view('exam.question.question_categories', compact('categories'));
    }

    public function category_store(Request $request)
    {

        $this->validate($request, [
            'category' => ['required', 'unique:categories,']
        ]);

        Category::create($request->all());
        return back()->with("success", "Category created successfully");
    }

    public function category_update(Request $request)
    {
        $this->validate($request, [
            'category' => 'required'
        ]);

        Category::find($request->id)->update(['category' => $request->category]);
        return back()->with("success", "Category updated successfully");
    }

    public function category_delete($id)
    {
        Category::find($id)->delete();
        return back()->with("success", "Deleted updated successfully");
    }
}
