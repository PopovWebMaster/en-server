@extends('layouts.layout')

@section('link_css')
    <link href= {{ $css_tests }} rel="stylesheet">
@endsection

@section('topNav')
    @include('layouts.topNav')
@endsection


@section('content')
    @include('layouts.tests')
@endsection



@section('script_js')
    <script type="text/javascript" src={{ $js_tests }}></script>
@endsection 