@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($forums as $forum)
                        <p>
                            {{ $forum->name }}
                            <a href="/forum/{{$forum->id}}" class="btn btn-primary">进入贴吧</a>
                            @can('allow-post-thread-in-forum', $forum->id)
                                <a class="btn btn-secondary">已关注</a>
                            @else
                                <a href="/forum/{{$forum->id}}/follow" class="btn btn-primary">+ 关注</a>
                            @endcan
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
