@extends('layout')

@section('content')

{{ Form::open(['route' => 'project1.check'])}}
    <div class = 'form-group'>
        @if($errors->has('name'))
            <font color="red"><strong>{{$errors->first('name')}}<strong></font><br>
        @endif
        {{ Form::label('name','名前') }}<br>
        {{ Form::text('name', null) }}<br>
        
        @if($errors->has('mail'))
            <font color="red"><strong>{{$errors->first('mail')}}<strong></font><br>
        @endif
        {{ Form::label('mail','メールアドレス') }}<br>
        {{ Form::text('mail', null) }}<br>

        @if($errors->has('status'))
            <font color="red"><strong>{{$errors->first('status')}}<strong></font><br>
        @endif
        {{ Form::label('status','法人') }}
        {{ Form::radio('status','法人') }}
        {{ Form::label('status','個人') }}
        {{ Form::radio('status','個人') }}<br>

        @if($errors->has('message'))
            <font color="red"><strong>{{$errors->first('message')}}<strong></font><br>
        @endif
        {{ Form::label('message','お問い合わせ内容') }}<br>
        {{ Form::textarea('message', null, ['size' => '50x30']) }}<br>

    </div>

    <div class='form-group'>
        {{Form::submit('送信する',['class' => 'btn btn-primary'])}}
    </div>
{{ Form::close() }}

@endsection