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
    $user = User::find($request->user_id);
    $user->status = $request->status;
    $user->save();
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
    $request->image->storeAs('images', $name_of_image);

    // $file = Storage::disk('public')->put('storage', $name_of_image);
    //   Storage::putFileAs('public' . $name_of_image, $name_of_image);
    Subject::create([
      'subject_name' => $request->subject_name,
      'image' => $name_of_image,
    ]);


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
        'option' => $request->option1[$i],
      ]);
      Option::create([
        'question_id' => $a->id,
        'option' => $request->option2[$i],
      ]);
      Option::create([
        'question_id' => $a->id,
        'option' => $request->option3[$i],
      ]);
      Option::create([
        'question_id' => $a->id,
        'option' => $request->option4[$i],
      ]);
      Answer::create([
        'questionid' => $a->id,
        'answer' => $request->ans[$i],
      ]);
    }
  }
  public function displayquestion(Request $request)
  {
    $question = Question::where('subject_id', 15)->get();
    $option = Option::where('question_id', 6)->get();
    return view('admin.displayquestion', compact('question', 'option'));
  }
}
