@extends('_layouts.admin')

@section('content')

    <div class="container">
        <h1>
            {{ $connection->name }} - Connection Details
        </h1>
        
        <div class="row">
            <div class="col-xs-6 col-md-2"><strong>URL</strong></div>
            <div class="col-xs-6 col-md-10">{{ $connection->url }}</div>
            <div class="col-xs-6 col-md-2"><strong>Username</strong></div>
            <div class="col-xs-6 col-md-10">{{ $connection->username }}</div>
            <div class="col-xs-6 col-md-2"><strong>Password</strong></div>
            <div class="col-xs-6 col-md-10">{{ $connection->password }}</div>
        </div>
        
        <h3>
            Translations
            <a href="{{ route('admin.translation.create', $connection->id) }}" class="btn btn-primary float-right">Create Translation</a>
        </h3>
        @foreach($connection->translations as $translation)
            <h5>{{ $translation->class }}</h5>
        @endforeach
    </div>

@endsection