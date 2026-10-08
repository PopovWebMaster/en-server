<div class = 'header_left_wrap'>
    <a href = '#' class = 'siteLogo' >
        <span class = 'SL_cercle'></span>
        <span class = 'SL_leng'>Leng</span>
        <span class = 'SL_dash'>-</span>
        <span class = 'SL_learn'>Learn</span>
        <span class = 'SL_dom'>.ru</span>
    </a>
    <a href = {{ $links[ 'home' ][ 'route' ] }} class = {{ $links[ 'home' ][ 'isActive' ]? 'isActive': '' }} >Главная</a>
    <a href = {{ $links[ 'lessons' ][ 'route' ] }} class = {{ $links[ 'lessons' ][ 'isActive' ]? 'isActive': '' }} >Уроки</a>

</div>
<div class = 'header_right_wrap'>
    @if( isset( $mySuccessList ) )
    <div class = 'MySuccessBtn'>
        <span class = 'MySuccessBtn_text'>Мой успех:</span>

        @foreach( $mySuccessList as $item )
            <span class = 'MySuccessBtn_count'><img src = "{{ $item[ 'icon' ] }}"/>{{ $item[ 'countString' ] }}</span>
        @endforeach

        
    </div>
    @endif
    @if( $isAdmin )
        <a href = '/admin'>admin</a>
    @endif
    @if( Auth::check() )
        <a href = '{{ $links[ 'logout' ][ 'route' ] }}' >Выйти</a>
    @endif
    
</div>