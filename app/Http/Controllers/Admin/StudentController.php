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
        $data=User::get();
        return view('admin.student',compact('data'));
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
        $subject=Subject::get();
      return view('admin.displaysubject',compact('subject'));
    }
    public function addsubject(Request $request)
    {
      $detail = $request->file('image');
      $name_of_image = $detail->getClientOriginalName();
      $request->image->storeAs('images', $name_of_image);

    // $file = Storage::disk('public')->put('storage', $name_of_image);
    //   Storage::putFileAs('public' . $name_of_image, $name_of_image);
    //   Subject::create([
    //     'subject_name'=>$request->subject_name,
    //     'image'=> $name_of_image,
    //   ]);

   
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
        $id=$request->id;
        $data=Subject::find($id);
        $data->delete();
    }
    public function edit(Request $request)
    {
        $id=$request->id;
      $data=Subject::find($id);
      return $data;
    }
    public function update(Request $request)
    {
     if(isset($request->image)){ 
       $detail = $request->file('image');
       $name_of_image = $detail->getClientOriginalName();
       Subject::where('id',$request->id)->update([
         'subject_name' => $request->subject_name,
       'image'=> $name_of_image,
       ]);
     }
      else
      {
      Subject::where('id', $request->id)->update([
        'subject_name' => $request->subject_name,
        'image' =>$request->old_image,
      ]);
      }
    }
  public function question(Request $request)
  {
    return view('admin.question');
  }
  public function storequestion(Request $request)
  {
  dd($request->all());
  
  }
  public function questions($id)
  {
  $id=$id;
    return view('admin.questions',compact('id'));
  }
  public function storequestions(Request $request)
  {
   
    $len = count($request->question);

    for($i=1;$i<=$len;$i++) {
    $a= Question::create([
        'subject_id'=>$request->id,
        'question'=>$request->question[$i]
     ]);
     $questionid= $a->id;
     $x= Option::create([
        'question_id' => $questionid,
        'option1'=>$request->option1[$i],
        'option2'=>$request->option2[$i],
        'option3'=>$request->option3[$i],
        'option4'=>$request->option4[$i],
      ]);
   Answer::create([
        'question_id'=> $questionid,
        'answer'=>$request->ans[$i],
   ]);
   return view('admin.questions');
    }  

     
     
    
  }
  
}
  