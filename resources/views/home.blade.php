@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">测试采集百家姓氏数据</div>
                <div class="card-body">
                    <ul class="list-group">
                    @foreach($article as $v)
                        <li class="list-group-item">{{ $v->title }}</li>
                    @endforeach
                    </ul>
                </div>
                {{ $article->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
