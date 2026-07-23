@extends('layouts.layout')

@section('link_css')
    <link href= {{ $css_lessons }} rel="stylesheet">
@endsection

@section('topNav')
    @include('layouts.topNav')
@endsection


@section('content')
    @include('layouts.lessons')
@endsection



@section('script_js')
    <script type="text/javascript" src={{ $js_lessons }}></script>
@endsection 