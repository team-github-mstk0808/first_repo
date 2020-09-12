@extends('layout')

@section('content')

{{ Form::open(['route' => 'project1.check'])}}
    <div class = 'form-group'>
        {{ Form::label('name','名前') }}<br>
        {{ Form::text('name', null) }}<br>
        {{ Form::label('mail','メールアドレス') }}<br>
        {{ Form::text('mail', null) }}<br>
        {{ Form::label('status','法人') }}
        {{ Form::radio('status','法人') }}
        {{ Form::label('status','個人') }}
        {{ Form::radio('status','個人') }}<br>
        {{ Form::label('message','お問い合わせ内容') }}<br>
        {{ Form::textarea('message', null, ['size' => '50x30']) }}<br>

    </div>

    <div class='form-group'>
        {{Form::submit('送信する',['class' => 'btn btn-primary'])}}
    </div>
{{ Form::close() }}

@endsection