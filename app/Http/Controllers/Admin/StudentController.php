<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ApproveMail;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function student()
    {
        $data = User::get();
        return view('admin.student', compact('data'));
    }
    public function status(Request $request)
    {
        $user = User::find($request->id);
        if ($user->status == 1) {

            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();
        return $user;
    }

    public function subject(Request $request)
    {
        return view('admin.subject');
    }
    public function displaysubject(Request $request)
    {
        $subject = Subject::get();
        return view('admin.displaysubject', compact('subject'));
    }
    public function addsubject(Request $request)
    {
        $detail = $request->file('image');
        $name_of_image = $detail->getClientOriginalName();
        Subject::create([
            'subject_name' => $request->subject_name,
            'image' => $name_of_image,
        ]);
        $request->image->storeAs('public/', $name_of_image);
        $request->image->move('public/', $name_of_image);

        return view('admin.subject');
    }
    public function approve()
    {
        Mail::to('nidhipatel1632001@gmail.com')->send(new ApproveMail());
        return back();
        // $data = User::get();
        // return view('admin.student', compact('data'));
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $data = Subject::find($id);
        $data->delete();
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Subject::find($id);
        return $data;
    }

    public function update(Request $request)
    {
        if (isset($request->image)) {
            $detail = $request->file('image');
            $name_of_image = $detail->getClientOriginalName();
            Subject::where('id', $request->id)->update([
                'subject_name' => $request->subject_name,
                'image' => $name_of_image,
            ]);
            $request->image->storeAs('public/', $name_of_image);
            $request->image->move('public/', $name_of_image);
        } else {
            Subject::where('id', $request->id)->update([
                'subject_name' => $request->subject_name,
                'image' => $request->old_image,
            ]);
        }
    }
    public function question(Request $request)
    {
        return view('admin.question');
    }

    public function questions($id)
    {
        $id = $id;
        return view('admin.questions', compact('id'));
    }
    public function storequestions(Request $request)
    {
        $len = count($request->question);
        for ($i = 1; $i <= $len; $i++) {
            $a = Question::create([
                'subject_id' => $request->id,
                'question' => $request->question[$i]
            ]);

            Option::create([
                'question_id' => $a->id,
                'subject_id' => $request->id,
                'option' => $request->option1[$i],
            ]);
            Option::create([
                'question_id' => $a->id,
                'subject_id' => $request->id,
                'option' => $request->option2[$i],
            ]);
            Option::create([
                'question_id' => $a->id,
                'subject_id' => $request->id,
                'option' => $request->option3[$i],
            ]);
            Option::create([
                'question_id' => $a->id,
                'subject_id' => $request->id,
                'option' => $request->option4[$i],
            ]);
            Answer::create([
                'question_id' => $a->id,
                'subject_id' => $request->id,
                'answer' => $request->ans[$i],
            ]);
        }
    }
    public function questionlist($id)
    {

        $question = Question::where('subject_id', $id)->get()->toArray();
        for ($i = 0; $i < count($question); $i++) {

            $option[] = Option::where('question_id', $question[$i]['id'])->get()->toArray();
        }
        for ($i = 0; $i < count($question); $i++) {

            $answer[] = Answer::where('question_id', $question[$i]['id'])->get()->toArray();;
        }

        // $answer= Subject::find(1)->getanswer->toArray();
        return view('admin.displayquestion', compact('question', 'option', 'answer'));
    }
    public function editquestion(Request $request)
    {
        $id = $request->id;
        $questions = Question::where('id', $id)->first();
        $question = $questions['question'];
        $options = Option::where('question_id', $id)->get();
        for ($i = 0; $i < 4; $i++) {
            $option[] = ($options[$i]['option']);
        }

        $answers = Answer::where('question_id', $id)->first();
        $answer = $answers['answer'];
        return [$question, $option, $answer, $id];
    }
    public function updatequestion(Request $request)
    {

        Question::where('id', $request->id)->update([
            'question' => $request->question,
        ]);

        $x = Option::where('question_id', $request->id);
        $optionid = $x->first()->id;
        for ($i = 1; $i <= 4; $i++) {
            Option::where('id', $optionid)->update([
                'option' => $request->option[$i],
            ]);
            $optionid = $optionid + 1;
        }
        Answer::where('question_id', $request->id)->update([
            'answer' => $request->answer,
        ]);
    }
}
