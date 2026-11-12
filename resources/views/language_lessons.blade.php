@extends('layouts.layout')

@section('link_css')
    <link href= {{ $css_lessons }} rel="stylesheet">
@endsection

@section('topNav')
    @include('layouts.topNav')
@endsection


@section('content')
    @include('layouts.language_lessons')
@endsection



@section('script_js')
    @include('layouts.userSuccessList_json')
    <script type="text/javascript" src={{ $js_lessons }}></script>
@endsection 