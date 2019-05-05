<div class="modal fade" id="logout">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('nav.logout_title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>@lang('nav.logout_description')</p>
                <form method="post" id="logout_form" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('nav.logout_cancel')</button>
                <button type="button" class="btn btn-danger" onclick="$('#logout_form').submit()">@lang('nav.logout_confirm')</button>
            </div>
        </div>
    </div>
</div>