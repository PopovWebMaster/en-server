<div class = 'header_left_wrap'>
    <a href = "{{ asset('/') }}" class = 'siteLogo' >
        <span class = 'SL_cercle'></span>
        <span class = 'SL_leng'>Lang</span>
        <span class = 'SL_dash'>-</span>
        <span class = 'SL_learn'>Learn</span>
        <span class = 'SL_dom'>.ru</span>
    </a>
    <a href = {{ $links[ 'home' ][ 'route' ] }} class = {{ $links[ 'home' ][ 'isActive' ]? 'isActive': '' }} >Главная</a>
    <a href = {{ $links[ 'lessons' ][ 'route' ] }} class = {{ $links[ 'lessons' ][ 'isActive' ]? 'isActive': '' }} >Уроки</a>

</div>
<div id = 'mySuccess'></div>
<div class = 'header_right_wrap'>


    @if( $isAdmin )
        <a href = '/admin'>admin</a>
    @endif
    @if( Auth::check() )
        <a href = '{{ $links[ 'logout' ][ 'route' ] }}' >Выйти</a>
    @endif
    
</div>