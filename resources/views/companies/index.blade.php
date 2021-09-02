@extends('layouts.app')

@section('content')
@include('companies.components.modal_companies')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{trans('companies_lang.title_table') }}
                    <a class="btn btn-success "  href="{{ route('companies.create') }}" style="float:right">{{trans('companies_lang.button_create_company') }}</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <th>{{trans('companies_lang.name_table') }}</th>
                                <th>{{trans('companies_lang.email_table') }}</th>
                                <th>{{trans('companies_lang.logo_table') }}</th>
                                <th>{{trans('companies_lang.website_table') }}</th>
                                <th>{{trans('companies_lang.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $companie)
                                    <tr>
                                        <td>{{ $companie->name }}</td>
                                        <td>{{ $companie->email }}</td>
                                        <td>
                                            @if($companie->logo)
                                                <img src="{{asset('storage/logos/'.$companie->logo ?? '')}}" style="width: 20px; height: 20px;">
                                            @endif
                                        </td>
                                        <td>{{ $companie->website }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a class="btn btn-primary "  href="{{ route('companies.edit',$companie->id) }}" style="float:right">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button
                                                        onclick="event.preventDefault(); document.getElementById('delete{{$companie->id}}').submit();"
                                                        class="btn btn-xs btn-danger" type="button" data-toggle="tooltip"
                                                        title="Eliminar">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                    <form id="delete{{$companie->id}}"
                                                        action="{{ route('companies.destroy',$companie->id) }}" method="POST"
                                                        style="display: none;">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                            
                                            &nbsp;&nbsp;
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$companies->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
