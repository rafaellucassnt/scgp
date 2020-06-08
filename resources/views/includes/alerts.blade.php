@if(Session::has('success'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    {{Session::get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@push('other_js')
    <script>
        $().ready(function() {
            setTimeout(function () {
                $('.alert').fadeToggle();
            }, 3000);
        });
    </script>
@endpush
