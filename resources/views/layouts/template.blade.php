<div id = "app">
    <div class = 'backgroundContainer'>
        <div class = 'bodyContainer'>
            <div class = 'contentArea'>
                <header>
                    <nav>
                        <div class = 'header_left_wrap'>
                            <a href = {{ $links[ 'home' ][ 'route' ] }} class = 'isActive' >Главная</a>
                            <a href = {{ $links[ 'lassons' ][ 'route' ] }} >Список уроков</a>
                            <a href = {{ $links[ 'tests' ][ 'route' ] }} >Тесты</a>
                        </div>

                        <div class = 'header_right_wrap'>
                            @if( $isAdmin )
                                <a href = '/admin'>admin</a>
                            @endif


                            @if( Auth::check() )
                                <a href = '{{ $links[ 'logout' ][ 'route' ] }}'>Выйти</a>
                            @else
                                <a href = '{{ $links[ 'login' ][ 'route' ] }}' >Войти</a>
                            @endif

                        </div>

                    </nav>

                    <h1>{{ $pageHeader  }}</h1>
                    
                </header>
                <main>
                    <div class = 'scrollContainer'
                        style = { maxHeight: 'calc( 100vh - 9em )' }
                    >
                    
                        @yield('pageContent')

                    </div>
                </main>

                <footer>
                    <span>2026г.</span>
                </footer>
            </div>
        </div>
    </div>
</div>