<div class="form-group">
    <label for="name">{{trans('companies_lang.name_table') }}</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="{{trans('companies_lang.placeholder_name') }}" value="{{$companie->name ?? ''}}">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="email">{{trans('companies_lang.email_table') }}</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="{{trans('companies_lang.placeholder_email') }}" value="{{$companie->email ?? ''}}">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="logo">Logo</label>
    <div class="input-group mb-3">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="logo" name="logo">
            <label class="custom-file-label" for="logo">{{trans('companies_lang.logo_table') }}</label>
        </div>
    </div>
    @error('logo')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="website">{{trans('companies_lang.website_table') }}</label>
    <input type="text" class="form-control" id="website" name="website" placeholder="{{trans('companies_lang.placeholder_website') }}" value="{{$companie->website ?? ''}}">
</div>