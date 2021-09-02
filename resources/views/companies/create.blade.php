@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{trans('companies_lang.create_company') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('companies.store')}}" enctype="multipart/form-data">
                        @csrf
                        @include('companies.fields.fields')
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
