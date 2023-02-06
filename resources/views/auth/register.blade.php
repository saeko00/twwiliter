@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('username') }}
{{ Form::text('username',null,['class' => 'input']) }}
<br>

{{ Form::label('mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<br>

{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}
<br>

{{ Form::label('password-confirm') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
<br>

{{ Form::submit('登録') }}
<br>


<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
