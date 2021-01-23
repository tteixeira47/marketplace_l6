@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $p)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $p->name }}</h4>
                    <p class="card-text">{{ $p->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection