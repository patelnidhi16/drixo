<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AttempttestDataTable;
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
use App\Models\Submission;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\Result;
use Carbon\Carbon;

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
        $email = Auth::guard('web')->user()->email;

        $len = count($request->id);
        for ($i = 0; $i < $len; $i++) {
            $x = Student::where('title', $request->title)->where('subject_id', $request->subject_id)->first();

            if ($x == null) {

                $y = Student::create([
                    'student_id' => $request->id[$i],
                    'subject_id' => $request->subject_id,
                    'title' => $request->title,
                    'status' => '1',
                ]);

                Mail::to($email)->send(new ApproveMail());
            }
        }
        $user = [];
        foreach ($request->id as $id) {
            $x = Student::where('student_id', $id)->where('title', $request->title)->where('subject_id', $request->subject_id)->first();
            if ($x == null) {
                Student::create([
                    'student_id' => $id,
                    'subject_id' => $request->subject_id,
                    'title' => $request->title,
                    'status' => '1',
                ]);
            } else {

                array_push($user, $id);
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
    public function index(Request $request)
    {

        return view('front.dashboard.index');
    }
    public function displaytest(Request $request)
    {
        $id = Auth::guard('web')->user()->id;
        $test = Student::with('getsubject')->where('student_id', $id)->get()->toArray();
        $result = Result::where('user_id', $id)->get()->toArray();
        return view('front.dashboard.displaytest', compact('test', 'result'));
    }
    public function test($id, $title)
    {
        $student_id = Auth::guard('web')->user()->id;

        $start_time = Carbon::now('Asia/Kolkata')->format('M d,Y H:i:s');

        $end_time = Carbon::now('Asia/Kolkata')->addMinutes(1)->format('M d,Y H:i:s');
        Student::where('student_id', $student_id)->where('title', $title)->update([
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);
        $question = Question::with('getoption', 'getsubject')->where('subject_id', $id)->where('title', $title)->get()->toArray();
        $route = route('viewquestion', ['id' => $id, 'title' => $title]);
        return $route;
    }
    public function viewquestion($id, $title)
    {
        $student_id = Auth::guard('web')->user()->id;
        $x = Student::where('student_id', $student_id)->where('title', $title)->select('end_time')->first()->toArray();
        $end_time = $x['end_time'];
        $question = Question::with('getoption', 'getsubject')->where('subject_id', $id)->where('title', $title)->get()->toArray();

        return view('front.dashboard.test', compact('question', 'end_time'));
    }
    public function storerecord(Request $request)
    {
        $title = $request->title;
        $subject_id = $request->subject_id;
        $subject_name = $request->subject_name;
        $id = Auth::user()->id;
        $x = Student::where('student_id', $id)->where('title', $title)->where('subject_id', $subject_id)->update([
            'status' => '0',
        ]);

        if ($request->answer) {



            foreach ($request->answer as $key => $value) {

                Submission::create([
                    'user_id' => $id,
                    'question_id' => $key,
                    'subject' => $subject_name,
                    'title' => $title,
                    'answer' => $value,
                ]);
            }
            $x = Submission::with('getanswer')->where('user_id', $id)->where('title', $title)->where('subject', $subject_name)->get()->toArray();
            $mark = 0;
            foreach ($x as $value) {

                if ($value['getanswer'][0]['answer'] == $x[0]['answer']) {
                    $mark++;
                }
            }
            Result::create([
                'user_id' => $id,
                'subject' => $subject_name,
                'title' => $title,
                'result' => $mark,
                'status' => '0',
            ]);
        }
        return view('front.dashboard.displaysubmission');
        // return redirect()->route('index');
    }
    public function result(AttempttestDataTable $Submission)
    {
        $student = Result::get();
        return $Submission->render('admin.result', compact('student'));
    }
    public function displayresult(Request $request)
    {
        foreach ($request->id as $key => $value) {
            $x = Result::where('id', $value)->get()->toArray();
            foreach ($x as $detail) {

                $x = Result::where('id', $value)->update([
                    'status' => '1',
                ]);
            }
        }
    }

    public function displaystudentresult()
    {
        $id = Auth::guard('web')->user()->id;

        $result =  Result::where('user_id', $id)->where('status', 1)->get();

        return view('front.dashboard.displaymark', compact('result'));
    }
    public function all()
    {
        $subject = Subject::all();
        return view('admin.displayallsubject', compact('subject'));
    }
    public function subjectdetail($id)
    {
        return view('admin.subjectdetail', compact('id'));
    }
    public function viewresponse($subject, $title)
    {

        $x = Subject::where('subject_name', $subject)->get()->toArray();
        $subject_id = $x[0]['id'];
        $question = Question::with('getoption', 'getsubject', 'getans','getanswer')->where('subject_id', $subject_id)->where('title', $title)->get()->toArray();
    //    dd($question[0]['getanswer'][0]['answer']);
        return view('front.dashboard.viewresponse', compact('question'));
    }
}
