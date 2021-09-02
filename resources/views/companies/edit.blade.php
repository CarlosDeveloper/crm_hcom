@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{trans('companies_lang.update_company') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('companies.update',$companie)}}" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        @include('companies.fields.fields')
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection