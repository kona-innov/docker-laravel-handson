<h1>input</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <input type="submit" value="ログアウト">

</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('save')}}" method="post">
    @csrf
    <textarea name="content" cols="30" rows="10"></textarea>
    <input type="submit" value="コメント">
</form>


    @foreach ($items as $item)
        <hr>
        <p>名前:{{$item->user->name}}</p>
        <p>投稿:{{$item['content']}}</p>
    @endforeach

    {{ $items->links() }}
