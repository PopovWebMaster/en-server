<div class = 'header_left_wrap'>
    <a href = {{ $links[ 'home' ][ 'route' ] }} class = {{ $links[ 'home' ][ 'isActive' ]? 'isActive': '' }} >Главная</a>
    <a href = {{ $links[ 'lessons' ][ 'route' ] }} class = {{ $links[ 'lessons' ][ 'isActive' ]? 'isActive': '' }} >Список уроков</a>
    <a href = {{ $links[ 'tests' ][ 'route' ] }} class = {{ $links[ 'tests' ][ 'isActive' ]? 'isActive': '' }} >Тесты</a>
</div>
<div class = 'header_right_wrap'>
    @if( $isAdmin )
        <a href = '/admin'>admin</a>
    @endif
    @if( Auth::check() )
        <a href = '{{ $links[ 'logout' ][ 'route' ] }}' >Выйти</a>
    @else
        <a href = '{{ $links[ 'login' ][ 'route' ] }}' >Войти</a>
    @endif
</div>