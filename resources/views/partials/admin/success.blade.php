@if(session('status'))
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h3 class="alert-heading font-size-h4 my-2">Success</h3>
         <li>{{ session('status') }}</li>
    </div>
@endif