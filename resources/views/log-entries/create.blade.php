@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                New Blog Entry
            </div>
            <div class="card-body">
                <form action="{{ route('log-entries.store') }}" method="POST">

                    @method('post')
                    @csrf

                    <div class="form-group">
                        <textarea required class="form-control" name="text" id="text" cols="30" rows="10">Your Text...</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
