@extends('_layouts.admin')

@section('content')

    <div class="container">
        <h1>
            Connections
            <a href="{{ route('admin.connections.create') }}" class="btn btn-primary float-right">Create Connection</a>
        </h1>

        @if ($connections->count() >= 1)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>username</th>
                            <th>created at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($connections as $connection)
                            <tr>
                                <td>{{ $connection->name }}</td>
                                <td>{{ $connection->username }}</td>
                                <td>{{ \Carbon\Carbon::parse($connection->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.connections.show', $connection->id) }}" class="btn btn-primary">
                                        <span data-feather="edit"></span>
                                    </a>
                                    <a href="#" class="btn btn-danger ml-2">
                                        <span data-feather="trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>There are no connections to display.</p>
        @endif
    </div>

@endsection
