<?php

namespace App\Http\Controllers\admin;


use App\DataTables\StudentDataTable;
use App\DataTables\TitleDataTable;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Eligible_Student;
use App\Mail\ApproveMail;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Else_;
use Whoops\Run;

class StudentController extends Controller
{
    public function student(UserDataTable $UserDataTable)
    {
        $student = User::get();
        return $UserDataTable->render('admin.student', compact('student'));
    }
    public function status(Request $request)
    {
        $x = User::find($request->id);

        $user = User::find($request->id);
        if ($user->status == 1) {

            $user->status = 0;
        } else {
            $user->status = 1;
            Mail::to($x->email)->send(new ApproveMail());
        }
        $user->save();
        return $user;
    }

    public function subject(Request $request)
    {
        return view('admin.subject');
    }

    public function addsubject(Request $request, StudentDataTable $StudentDataTable)
    {
        $detail = $request->file('image');
        $name_of_image = $detail->getClientOriginalName();
        Subject::create([
            'subject_name' => $request->subject_name,
            'image' => $name_of_image,
        ]);

        $request->image->move('public/', $name_of_image);
        return redirect()->route('admin.displaysubject');
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
    public function displaysubject(StudentDataTable $StudentDataTable)
    {
        $user = Subject::get();
        return $StudentDataTable->render('admin.displaysubject', compact('user'));
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
    public function storequestions(Request $request, StudentDataTable $StudentDataTable)
    {
        $x = Subject::where('id', $request->id)->first();
        // $request->validate([
        //     'title'=>'required|unique:questions,title,$request->id'
        // ]);















        //     dd($request->id);
        //        $subject=$x->subject_name;
        //    dd(1);
        $len = count($request->question);
        for ($i = 1; $i <= $len; $i++) {
            $a = Question::create([
                'subject_id' => $request->id,
                'title' => $request->title,
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
        // return view('')
        $user = Subject::get();
        // return redirect()->route('admin.displaysubject');
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
    public function alltest($id, TitleDataTable $TitleDatatable)
    {
        $title = Question::where('subject_id', $id)->groupby('title')->get();
        $subject_name = Subject::where('id', $id)->first()->subject_name;
        // return $TitleDatatable->render('admin.alltest',compact('title','subject_name'));
        return view('admin.alltest', compact('title', 'subject_name'));
    }
    public function display_title($id, $title)
    {

        $question = Question::where('title', $title)->where('subject_id', $id)->get()->toArray();
        for ($i = 0; $i < count($question); $i++) {

            $option[] = Option::where('question_id', $question[$i]['id'])->get()->toArray();
        }
        for ($i = 0; $i < count($question); $i++) {

            $answer[] = Answer::where('question_id', $question[$i]['id'])->get()->toArray();;
        }
        return view('admin.question_title', compact('question', 'option', 'answer'));
    }
    public function assign_test(Request $request)
    {
        $len=count($request->id);
        // for ($i = 0; $i < $len; $i++) {
        //     $x = Student::where('title', $request->title)->where('subject_id', $request->subject_id)->first();
        //    dd($x);
        //     if($x==null){
        //         dd($i);
        //         Student::create([
        //                         'student_id' => $request->id[$i],
        //                         'subject_id' => $request->subject_id,
        //                         'title' => $request->title,
        //                         'status' => '1',
        //                     ]);
        //     //     //     Mail::to($user->email)->send(new ApproveMail());

        //     }
            
            
        // }
        $user=[];
        foreach ($request->id as $id) {
            $x = Student::where('student_id', $id)->where('title', $request->title)->where('subject_id', $request->subject_id)->first();
            if($x==null){
                Student::create([
                                'student_id' => $id,
                                'subject_id' => $request->subject_id,
                                'title' => $request->title,
                                'status' => '1',
                            ]);
        }
        else{
           
            array_push($user,$id);
        }
        
        
    }
    return $user;
    }
    public function select_subject()
    {
        $subject = Subject::get();
        return $subject;
    }
    public function select_title(Request $request)
    {
        $title = Question::where('subject_id', $request->id)->groupby('title')->get();
        return $title;
    }
    public function test(Request $request)
    {
      
        $id=Auth::guard('web')->user()->id;
      $x= Student::where('student_id',$id)->get()->toArray();
     
        // $y= Subject::select('subject_name')->where('id',$x[0]['subject_id'])->get()->toArray();

  
    // dd($y);
        return view('front.layouts.master',compact('x'));
    }
}
