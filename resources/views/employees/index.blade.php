@extends('layouts.app')

@section('content')
@include('companies.components.modal_companies')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{trans('employees_lang.title_table') }}
                    <a class="btn btn-success "  href="{{ route('employees.create') }}" style="float:right">{{trans('employees_lang.button_create_employee') }}</a>
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
                                <th>{{trans('employees_lang.first_name_table') }}</th>
                                <th>{{trans('employees_lang.last_name_table') }}</th>
                                <th>{{trans('employees_lang.company_table') }}</th>
                                <th>{{trans('employees_lang.email_table') }}</th>
                                <th>{{trans('employees_lang.phone_table') }}</th>
                                <th>{{trans('employees_lang.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->company->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a class="btn btn-primary "  href="{{ route('employees.edit',$employee->id) }}" style="float:right">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button
                                                        onclick="event.preventDefault(); document.getElementById('delete{{$employee->id}}').submit();"
                                                        class="btn btn-xs btn-danger" type="button" data-toggle="tooltip"
                                                        title="Eliminar">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                    <form id="delete{{$employee->id}}"
                                                        action="{{ route('employees.destroy',$employee->id) }}" method="POST"
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
                        {{$employees->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection