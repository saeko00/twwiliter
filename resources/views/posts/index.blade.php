@extends('layouts.login')

@section('content')
<div class='container'>
   <form action="tweet" method="post">
      @csrf
      <input type="text" name="newTweet" placeholder="何をつぶやこうか…？">
      <input type="image" src="/images/post.png">
   </form>
  <p class="pull-right"><a class="btn btn-success" href="/post/create-form">投稿する</a></p>

  <div class='container'>
   <table class='table table-hover'>
      <!--投稿された内容の表示-->
      @foreach ($timeline as $view)
      <tr>
         <td>{{ $view->user_id}}</td>
         <td>{{ $view->posts}}</td>
         <td>{{ $view->created_at }}</td>
         <td>
            <a class="btn btn-primary" href="/post/{{ $view->id }}/update-form">更新</a>
         </td>
          <td>
            <a class="btn btn-danger" href="/post/{{ $view->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a>
         </td>
      </tr>
      @endforeach
   </table>
  </div>

<form method="GET" action="{{ route('users.index') }}">
    <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('users.index') }}" class="text-white">
                クリア

            </a>
        </button>
    </div>
</form>

@foreach($users as $user)
    <a href="{{ route('users.show', ['users_id' => $user->id]) }}">
        {{ $user->name }}
    </a>
@endforeach

</div>
<h2>機能を実装していきましょう。</h2>


@endsection
