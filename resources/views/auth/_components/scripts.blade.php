<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

<script type="text/javascript">
    @if(session('notification-status') == 'success')
        toastr.success("{{ session('notification-msg') }}");
    @elseif(session('notification-status') == 'warning')
        toastr.warning("{{ session('notification-msg') }}");
    @elseif(session('notification-status') == 'error')
        toastr.error("{{ session('notification-msg') }}");
    @endif
</script>