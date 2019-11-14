<!DOCTYPE html>
<html>
<head>
    @include('Front-end/includes/head')
</head>
<body class="class_body">
{{-- Navigasi --}}
@include('Front-end/includes/nav')

{{-- Main --}}
@yield('main')

{{-- Widget WA --}}
@include('Front-end/includes/widget_wa')

{{-- Footer --}}
@include('Front-end/includes/footer')

{{-- Js --}}
@include('Front-end/includes/js2')
</body>
</html>