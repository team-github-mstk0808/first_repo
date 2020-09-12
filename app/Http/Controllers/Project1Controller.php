<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Mail\ContactMail;
use App\Mail\ContactMail2;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class Project1Controller extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function check(Request $request, Question $question)
    {
        $rules = [
            
            'mail' => 'required|email|max:254',
            'status' => 'required',
            'message' => 'required|max:255',
            'name' => 'required|max:50'
        ];
        
        $msgs = [
            'name.required'=>'名前を入力してください',
            'name.max'=>'名前は50文字以内で入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.email' => 'メールアドレスを入力してください',
            'mail.max' => 'メールアドレスは254文字以内で入力してください',
            'status.required' => '選択してください',
            'message.required' => 'お問い合わせ内容を入力してください'
        ];

        $validator = Validator::make($request->all(),$rules,$msgs);
        if($validator->fails())
        {
            $errors = $validator->fails();
            return redirect('reform')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
            $question->name = $request->name;
            $question->mail = $request->mail;
            $question->status = $request->status;
            $question->message = $request->message;
            $question->save();
            return redirect() -> route('project1.mail');
        }
    }

    public function reform()
    {
        return view('reform');
    }

    public function savefunc(Request $request, Question $question)
    {
        $question->name = $request->name;
        $question->mail = $request->mail;
        $question->status = $request->status;
        $question->message = $request->message;
        $question->save();
        return redirect() -> route('project1.mail');
    }

    public function mail(Request $request, Mail $mail)
    {
        $msg = new ContactMail();
        $msg2 = new ContactMail2();
        Mail::to('exmple2-4faa47@inbox.mailtrap.io')->send($msg);
        Mail::to('ogsmstk.lax@gmail.com')->send($msg2);
        return redirect() -> route('project1.fin');
    }

    public function fin()
    {
        return view('fin');
    }
}
