@extends('layouts.layout')

@section('link_css')
    <link href= {{ $css_lesson }} rel="stylesheet">
@endsection

@section('topNav')
    @include('layouts.topNav')
@endsection


@section('content')
    @include('layouts.lesson')
@endsection



@section('script_js')
    <script type="text/javascript" src={{ $js_lesson }}></script>
@endsection 