<div class = 'testsPage'>
    @include('layouts.pageParagraphList')
    <div class = 'testsListOfAllLanguages'>
        <div class = "testsListForOneLanguage isOpen" data-language = "{{ $keyName }}" >

            <div class = 'LLFOL_lassons_place'>
            @for( $i = 0; $i < count( $testsList ); $i++ )
                <a href = "{{ $testsList[ $i ][ 'route' ] }}" class = 'LLFOL_lesson_link'>
                    <div class = 'LLFOL_lesson'>
                        <h4>
                            <img src = "{{ $languageIcon }}"/>
                            <div class = 'LLFOL_lesson_name'>
                                <span>{{ $testsList[ $i ][ 'testName' ] }}</span>
                            </div>
                            <div class = 'LLFOL_lesson_level_name'>
                                <span>{{ $testsList[ $i ][ 'levelName' ] }}</span>
                            </div>
                            <div class = 'LLFOL_lesson_word_len'>
                                <span>слов:</span>
                                <span>{{ $testsList[ $i ][ 'wordsLength' ] }}</span>
                            </div>
                            
                            

                        </h4>
                        <p class = 'LLFOL_description'>{{ $testsList[ $i ][ 'testSchortDescription' ] }}</p>
                    </div>
                </a>
            @endfor
            </div>
        </div>

        
    </div>

</div>