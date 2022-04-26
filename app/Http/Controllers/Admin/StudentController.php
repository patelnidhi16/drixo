<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AssigntestDataTable;
use App\DataTables\AssigntestListDataTable;
use App\DataTables\AttempttestDataTable;
use App\DataTables\NotAttemptDataTable;
use App\DataTables\ReturnresultDataTable;
use App\DataTables\StudentDataTable;
use App\DataTables\StudentsDataTable;
use App\DataTables\SubjectDataTable;
use App\DataTables\SubmissionDataTable;
use App\DataTables\TitleDataTable;
use App\DataTables\TitleTestDataTable;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Eligible_Student;
use App\Http\Requests\SubjectRequest;
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
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Subset;
use PDF;

class StudentController extends Controller
{
    public function assigntest(AssigntestDataTable $AssigntestDataTable)
    {
        $student = User::get();
        return $AssigntestDataTable->render('admin.assigntest', compact('student'));
    }
    public function student(StudentsDataTable $UserDataTable)
    {
        $student = User::get();
        return $UserDataTable->render('admin.student', compact('student'));
    }
    // public function status(Request $request)
    // {
    //     $x = User::find($request->id);

    //     $user = User::find($request->id);
    //     if ($user->status == 1) {

    //         $user->status = 0;
    //     } else {
    //         $user->status = 1;
    //         Mail::to($x->email)->send(new ApproveMail());
    //     }
    //     $user->save();
    //     return $user;
    // }

    public function subject(Request $request)
    {
        return view('admin.subject');
    }

    public function addsubject(SubjectRequest $request, SubjectDataTable $StudentDataTable)
    {

        $detail = $request->file('image');
        $name_of_image = $detail->getClientOriginalName();
        Subject::create([
            'subject_name' => $request->subject_name,
            'image' => $name_of_image,
            'slug' => $request->subject_name,
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
    public function displaysubject(SubjectDataTable $StudentDataTable)
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
        //    dd(1);
        $id = $id;
        $route = route('admin.displayquestions', $id);
        // dd($route);
        return $route;
    }
    public function displayquestions($id)
    {
        $id = $id;
        return view('admin.questions', compact('id'));
    }
    public function questiontitle(Request $request)
    {

        // $id = $id;
        return view('admin.questions', compact('id'));
    }

    public function storequestions(Eligible_Student  $request, SubjectDataTable $StudentDataTable)
    {
        // dd($request->all());
        //  dd($request->no_of_question);
        // dd($x->format('M d,Y H:i')) ;
        $x = Subject::where('slug', $request->subject_name)->first();
        $len = count($request->question);
        for ($i = 1; $i <= $len; $i++) {
            $a = Question::create([
                'subject_id' => $x->id,
                'title' => $request->title,
                'question' => $request->question[$i],
                'slug' => $request->title,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
            Option::create([
                'question_id' => $a->id,
                'subject_id' =>  $x->id,
                'option' => $request->option1[$i],
            ]);
            Option::create([
                'question_id' => $a->id,
                'subject_id' =>  $x->id,
                'option' => $request->option2[$i],
            ]);
            Option::create([
                'question_id' => $a->id,
                'subject_id' =>  $x->id,
                'option' => $request->option3[$i],
            ]);
            Option::create([
                'question_id' => $a->id,
                'subject_id' =>  $x->id,
                'option' => $request->option4[$i],
            ]);
            Answer::create([
                'question_id' => $a->id,
                'subject_id' =>  $x->id,
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
    public function alltest($subject, TitleTestDataTable $TitleTestDataTable)
    {
        // dd($subject);
        $x = Subject::where('slug', $subject)->first();
        $title = Question::with('getsubject')->where('subject_id', $x->id)->groupby('title')->get()->toArray();

        $subject_name = $subject;
        return view('admin.alltest', compact('title', 'subject_name'));
    }
    public function display_title($id, $title)
    {
        $x = Subject::where('subject_name', $id)->get()->toArray();
        $question = Question::with('getoption')->with('getans')->where('slug', $title)->where('subject_id', $x[0]['id'])->get()->toArray();

        return view('admin.question_title', compact('question'));
    }
    public function assign_test(Request $request)
    {
        $email = Auth::guard('admin')->user();
        $len = count($request->id);

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
                foreach ($request->id as $key => $val) {
                    $x = User::where('id', $val)->get();
                    $name = $x[0]['name'];
                    $subject_id = $request->subject_id;
                    $title = $request->title;
                    $subject = Subject::where('id', $request->subject_id)->get()->toArray();
                    $subject = $subject[0]['subject_name'];
                    Mail::to($x[0]['email'])->send(new ApproveMail($name, $subject_id, $title, $subject));
                }
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
    public function filter_title(Request $request)
    {
        $x = Subject::where('subject_name', $request->subject)->first();

        $title = Question::where('subject_id', $x->id)->groupby('title')->get();
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
        return view('front.dashboard.displaytest', compact('test'));
    }
    public function test($id, $title)
    {

        $student_id = Auth::guard('web')->user()->id;
        $question = Question::with('getoption', 'getsubject')->where('subject_id', $id)->where('title', $title)->get()->toArray();
        $min = count($question);
        $start_time = Carbon::now('Asia/Kolkata')->format('M d,Y H:i:s');

        $end_time = Carbon::now('Asia/Kolkata')->addMinutes($min)->format('M d,Y H:i:s');
        Student::where('student_id', $student_id)->where('title', $title)->update([
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);
        $route = route('viewquestion', ['id' => $id, 'title' => $title]);
        return $route;
    }
    public function viewquestion($id, $title)
    {
        $student_id = Auth::guard('web')->user()->id;
        $x = Student::where('student_id', $student_id)->where('title', $title)->select('end_time')->first()->toArray();
        $current_time = Carbon::now('Asia/Kolkata')->format('M d,Y H:i:s');
        $question = Question::with('getoption', 'getsubject')->where('subject_id', $id)->where('title', $title)->get()->toArray();

        return view('front.dashboard.test', compact('question', 'current_time'));
    }
    public function storerecord(Request $request)
    {;

        $title = $request->title;
        $subject_id = $request->subject_id;
        $subject_name = $request->subject_name;
        $totalmark = Question::where('subject_id', $subject_id)->where('title', $title)->get();
        $total = count($totalmark);
        // dd($total);
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
            // dd($x);
            $mark = 0;

            foreach ($x as $value) {

                if ($value['getanswer'][0]['answer'] == $value['answer']) {
                    $mark++;
                }
            }
            Result::create([
                'user_id' => $id,
                'subject' => $subject_name,
                'title' => $title,
                'result' => $mark,
                'status' => '0',
                'total_mark' => $total
            ]);
            echo '<script>alert("Your test will be submitted successfully")</script>';
        } else {
            Result::create([
                'user_id' => $id,
                'subject' => $subject_name,
                'title' => $title,
                'result' => 0,
                'status' => '0',
                'total_mark' => $total
            ]);
        }

        return view('front.dashboard.index');
    }
    public function result(ReturnresultDataTable $ReturnresultDataTable)
    {
        $student = Result::get();
        $subject = Subject::get();
        return $ReturnresultDataTable->render('admin.result', compact('student', 'subject'));
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

    public function subjectdetail($id)
    {
        return view('admin.subjectdetail', compact('id'));
    }
    public function viewresponse($subject, $title)
    {
        $id = Auth::guard('web')->user()->id;
        // dd($id);
        $x = Subject::where('subject_name', $subject)->get()->toArray();
        $subject_id = $x[0]['id'];
        $question = Question::with('getoption', 'getsubject', 'getans', 'getanswer')->where('subject_id', $subject_id)->where('title', $title)->get()->toArray();
        // dd($question);
        $result = Result::where('user_id', $id)->where('subject', $subject)->orderBy('user_id', 'asc')->get()->toArray();
        // dd($result);
        return view('front.dashboard.viewresponse', compact('question', 'result', 'id'));
    }
    public function attempt_test(SubmissionDataTable $SubmissionDataTable)
    {
        $student = Result::get();
        $subject = Subject::get();

        return $SubmissionDataTable->render('admin.attempt_test', compact('student', 'subject'));
    }
    public function notattempt_test(NotAttemptDataTable $NotAttemptDataTable)
    {
        $student = Student::where('status', '1')->get()->toArray();
        $subject = Subject::get();

        return $NotAttemptDataTable->render('admin.notattempt_test', compact('student', 'subject'));
    }
    public function assigntest_list(AssigntestListDataTable $AssigntestListDataTable, Request $request)
    {
        $student = Student::get();
        $subject = Subject::get();
        return $AssigntestListDataTable->render('admin.assigntest_list', compact('student', 'subject'));
    }
    public function viewresult()
    {
        $id = Auth::guard('web')->user()->id;
        $name = Auth::guard('web')->user()->name;
        $result = Result::where('user_id', $id)->get();

        return view('front.dashboard.viewresult', ['result' => $result, 'name' => $name]);
    }
    public function downloadresult()
    {
        $id = Auth::guard('web')->user()->id;
        $name = Auth::guard('web')->user()->name;

        $result = Result::where('user_id', $id)->get();
        return view('front.dashboard.downloadresult', ['result' => $result, 'name' => $name]);
    }
    public function pdf()
    {
        $id = Auth::guard('web')->user()->id;
        $result = Result::where('user_id', $id)->get();
        $name = Auth::guard('web')->user()->name;

        $pdf = PDF::loadView('front.dashboard.downloadresult', compact('result', 'name'));
        return $pdf->download('dashboard.pdf');
    }
    public function about()
    {
        return view('front.dashboard.about');
    }
    public function dashboard()
    {
        $student = User::get();
        $students = count($student);
        $subject = Subject::get();
        $subjects = count($subject);
        $test = Question::groupby('title')->get();
        $tests = count($test);
        $today_users = User::whereDate('created_at', Carbon::today())->get();
        $count['today_users_count'] = count($today_users);
        $weekly_users = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $count['weekly_users_count'] = count($weekly_users);
        $monthly_users = User::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        $count['monthly_users_count'] = count($monthly_users);
        $yearly_users = User::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        $count['yearly_users_count'] = count($yearly_users);
        $today_users = Result::whereDate('created_at', Carbon::today())->get();
        $count['today_result_count'] = count($today_users);
        $weekly_users = Result::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $count['weekly_result_count'] = count($weekly_users);
        $monthly_users = Result::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        $count['monthly_result_count'] = count($monthly_users);
        $yearly_users = Result::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        $count['yearly_result_count'] = count($yearly_users);
        return view('admin.dashboard', compact('students', 'subjects', 'tests','count'));
    }
    public function testgraph()
    {
        $tests =  Question::with('getsubject')->select(DB::raw('*, count(*) as total', 'subject_id'))->groupBy('subject_id')->get()->toArray();

        return $tests;
    }
    public function usergraph()
    {
        $today_users = User::whereDate('created_at', Carbon::today())->get();
        $count['today_users_count'] = count($today_users);
        $weekly_users = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $count['weekly_users_count'] = count($weekly_users);
        $monthly_users = User::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        $count['monthly_users_count'] = count($monthly_users);
        $yearly_users = User::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        $count['yearly_users_count'] = count($yearly_users);
        return $count;
    }
    public function attemptgraph(){
        $today_users = Result::whereDate('created_at', Carbon::today())->get();
        $count['today_users_count'] = count($today_users);
        $weekly_users = Result::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $count['weekly_users_count'] = count($weekly_users);
        $monthly_users = Result::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        $count['monthly_users_count'] = count($monthly_users);
        $yearly_users = Result::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        $count['yearly_users_count'] = count($yearly_users);
        return $count;
    }
  
}
