<div class="form-group">
    <label for="first_name">{{trans('employees_lang.first_name_table') }}</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="{{trans('employees_lang.placeholder_first_name') }}" value="{{$employee->first_name ?? ''}}">
    @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="last_name">{{trans('employees_lang.last_name_table') }}</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="{{trans('employees_lang.placeholder_last_name') }}" value="{{$employee->last_name ?? ''}}">
    @error('last_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="website">{{trans('employees_lang.company_table') }}</label>
    <select class="form-control" id="company_id" name="company_id">
        <option value="" disabled Selected >{{trans('employees_lang.placeholder_company') }}</option>
        @foreach($companies as $companie)
            <option value="{{$companie->id}}" @isset($employee) @if($companie->id == $employee->company_id ?? '') selected @endif @endisset>{{ $companie->name }}</option>
        @endforeach
    </select>
    @error('company_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="email">{{trans('employees_lang.email_table') }}</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="{{trans('employees_lang.placeholder_email') }}" value="{{$employee->email ?? ''}}">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="phone">{{trans('employees_lang.phone_table') }}</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="{{trans('employees_lang.placeholder_phone') }}" value="{{$employee->phone ?? ''}}">
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>