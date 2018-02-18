@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-default">
            <div class="card-header">{{ $thread->title }}</div>

            <div class="card-body">
                @foreach ($thread->posts as $post)
                    <div class="card card-default">
                        <div class="card-title">
                            {{ $post->content }}
                        </div>
                        <div class="card-text">
                            <small>{{ $post->user->name }}</small>
                            <small style="color: grey;">{{ $post->created_at }}</small>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">回复</div>

            <div class="card-body">
                <form action="/thread/{{ $thread->id }}/post" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">回复</button>
                </form>
            </div>
        </div>
    </div>
@endsection