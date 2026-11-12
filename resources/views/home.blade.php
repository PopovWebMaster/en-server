@extends('layouts.layout')

@section('link_css')
    <link href= {{ $css_home }} rel="stylesheet">
@endsection

@section('topNav')
    @include('layouts.topNav')
@endsection


@section('content')
    @include('layouts.home')
@endsection



@section('script_js')
    @include('layouts.userSuccessList_json')
    <script type="text/javascript" src={{ $js_home }}></script>
@endsection 