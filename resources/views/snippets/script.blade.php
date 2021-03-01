<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }} "></script>

<!-- Plugins js-->
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/libs/chart-js/Chart.bundle.min.js')}}"></script>


<!-- App js-->
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script>

    $('#returnr-fetch-api').click(function(e){
        Swal.showLoading()
    })
</script>

{{--
<!-- Session-timeout -->
<!-- <script src="{{asset('assets/js/session-timeout/jquery.sessionTimeout.min.js')}}"></script> -->
<!-- <script src="{{asset('plugins/session-timeout/session-timeout-init.js')}}"></script> -->
<!-- <script type="text/javascript">
var SessionTimeout = function() {
var i = function() {
    $.sessionTimeout({
        title: "Session Timeout Notification",
        message: "Your session is expiring soon.",
        redirUrl: "{{url('/logout')}}",
        logoutUrl: "{{url('/logout')}}",
        warnAfter: 12e4,
        redirAfter: 18e4,
        ignoreUserActivity: 0,
        countdownMessage: "Redirecting in {timer} seconds.",
        countdownBar: !0
    })
};
return {
    init: function() {
        i()
    }
}
}();
jQuery(document).ready(function() {
SessionTimeout.init()
});
</script>       --}}
