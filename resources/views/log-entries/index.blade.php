@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-5 text-right">
            <a class="btn btn-primary" href="{{ route('log-entries.create') }}">Create Log Entry</a>
        </div>
        @foreach($logEntries as $key=>$entry)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $entry->user->name }}
                    ({{ $entry->created_at }})
                </div>
                <div class="card-body">
                    {{ $entry->text }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
