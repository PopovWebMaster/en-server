@extends('layouts.layout')



@section('link_css')
    <link href= {{ $css_lesson }} rel="stylesheet">
    
@endsection

@section('topNav')
    @include('layouts.topNav')
    @include('layouts.topHeaderInfo')
@endsection


@section('content')
    @include('layouts.one_lesson')
@endsection



@section('script_js')
    @include('layouts.words_json')
    <script type="text/javascript" src={{ $js_lesson }}></script>
@endsection 