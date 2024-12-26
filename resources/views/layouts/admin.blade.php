<!DOCTYPE html>
<html lang="en">
@include('partials.admin_header')

@php
$themeid = Auth::user()->theme_id;
if($themeid=='1'){ $theme='sidebar-light'; }
else{ $theme='sidebar-dark'; }
@endphp

<body class="{{@$theme}} sidebar-icon-only">
<div class="container-scroller">
@include('partials.admin_nav')
<div class="container-fluid page-body-wrapper">
@include('partials.admin_sidebar')
<div class="main-panel">
    
@yield('content')

</div>
</div>
</div>
@include('partials.admin_footer')
@include('partials.admin_script')
@yield('script')
<script>
    $('input[name="_token"]').prop('disabled', false);
</script>

</body>
</html> 