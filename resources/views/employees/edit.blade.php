@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{trans('employees_lang.update_employee') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('employees.update', $employee)}}">
                        @csrf
                        @method("put")
                        @include('employees.fields.fields')
                        <button type="submit" class="btn btn-success">{{trans('employees_lang.save_button') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection