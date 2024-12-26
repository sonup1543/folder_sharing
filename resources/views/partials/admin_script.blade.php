<!-- plugins:js -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('public/data/admin/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('public/data/admin/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('public/data/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/data/admin/vendors/progressbar.js/progressbar.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- Plugin js for this page -->
<script src="{{asset('public/data/admin/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('public/data/admin/vendors/select2/select2.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('public/data/admin/js/off-canvas.js')}}"></script>
<script src="{{asset('public/data/admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('public/data/admin/js/template.js')}}"></script>
<script src="{{asset('public/data/admin/js/settings.js')}}"></script>
<script src="{{asset('public/data/admin/js/todolist.js')}}"></script>
<!--<script src="{{asset('data/admin/js/jquery.dataTables.min.js')}}"></script>-->
<script src="{{asset('public/data/admin/js/admin-panel.js')}}"></script>
<script src="{{asset('public/data/admin/js/management-panel.js')}}"></script>
<script src="{{asset('public/data/admin/js/operations-panel.js')}}"></script>
<script src="{{asset('public/data/admin/js/account-panel.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('public/data/admin/js/dashboard.js')}}"></script>
<script src="{{asset('public/data/admin/js/Chart.roundedBarCharts.js')}}"></script>
<script src="{{asset('public/data/admin/js/sweetalert.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<!-- End custom js for this page-->

@if(session()->has('success')) 
<script>
   swal("Success!", "{{session()->get('success')}}", "success");
</script>
@endif
@if(session()->has('error'))
<script>
   swal("Error!", "{{session()->get('error')}}", "error");
</script>
@endif
@if(session()->has('warning'))
<script>
   swal("Warning!", "{{session()->get('warning')}}", "warning");
</script>
@endif

<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
const sidebarLightTheme = document.getElementById("sidebar-light-theme");
var lightthemeid = 1;
sidebarLightTheme.addEventListener("click", function() {
    // Get the CSRF token from the meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });
        
    $.ajax({
        type: 'POST',
        url: "{{ route('dashboard.store') }}",
        data: { themeid: lightthemeid },
        success: function(data) {
            //alert(data);
        }
    });
});

const sidebarDarkTheme = document.getElementById("sidebar-dark-theme");
var darkthemeid = 2;
sidebarDarkTheme.addEventListener("click", function() {
    // Get the CSRF token from the meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });
    $.ajax({
        type: 'POST',
        url: "{{ route('dashboard.store') }}",
        data: { themeid: darkthemeid },
        success: function(data) {
            //alert(data);
        }
    });
});


$(document).ready(function() {
    // Select2 Multiple
    $('.select2-multiple').select2({
        placeholder: "Select",
        allowClear: true
    });
    
    
    
    /*  softcopy */
    



});






</script>

