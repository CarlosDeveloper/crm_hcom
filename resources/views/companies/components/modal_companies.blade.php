@component('modal.modal')
    @slot('modal_id')
        companies
    @endslot
    @slot('title')
        Create Companie
    @endslot
    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="website">Logo</label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Logo</label>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="website">WebSite</label>
            <input type="website" class="form-control" id="website" placeholder="Enter website">
        </div>
    </form>
    @slot('footer')
    @endslot
@endcomponent