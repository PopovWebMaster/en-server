@extends('layouts.layout')

@section('link_css')
    <link href= {{ $css_test }} rel="stylesheet">
@endsection

@section('topNav')
    @include('layouts.topNav')
    @include('layouts.topHeaderInfo')
@endsection


@section('content')
    @include('layouts.one_test')
@endsection



@section('script_js')
    <script type="text/javascript" src={{ $js_test }}></script>
@endsection 