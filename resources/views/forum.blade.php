@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-default">
            <div class="card-header">
                <div style="float: left">{{ $forum->name }}</div>
                @can('allow-post-thread-in-forum', $forum->id)
                    <div style="float: right"><a class="btn btn-secondary">已关注</a></div>
                @else
                    <div style="float: right"><a href="/forum/{{$forum->id}}/follow" class="btn btn-primary">+ 关注</a></div>
                @endcan

            </div>

            <div class="card-body">
                @foreach ($forum->threads as $thread)
                    <p>
                        <a href="/thread/{{$thread->id}}">{{ $thread->title }}</a>
                        <small>{{ $thread->user->name }}</small>
                        <small style="color: gray;">{{ $thread->created_at }}</small>
                    </p>
                @endforeach
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">发帖</div>

            <div class="card-body">
                @can('allow-post-thread-in-forum', $forum->id)
                    <form action="/forum/{{ $forum->id }}/post" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">标题</label>
                            <input class="form-control" id="title" name="title">
                            </div>
                        <div class="form-group">
                            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">发帖</button>
                    </form>
                @else
                    <p>请先关注才能发帖哦！</p>
                @endcan
            </div>
        </div>
    </div>
@endsection
