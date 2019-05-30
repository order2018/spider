@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">测试采集百家姓氏数据 {{ $article->total() }} 条</div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach($article as $v)
                            <a href="{{ url('/article'.'/'.$v->id) }}" class="list-group-item list-group-item-action">{{ $v->title }}</a>
                        @endforeach
                    </div>
                </div>
                {{ $article->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
