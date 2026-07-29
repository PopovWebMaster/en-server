
<div class = 'lessonsPage'>
    @include('layouts.pageParagraphList')
    <div class = 'lessonsListOfAllLanguages'>
        <div class = "lessonsListForOneLanguage isOpen" data-language = "{{ $keyName }}" >
            <div class = 'LLFOL_lassons_place'>

            @for( $i = 0; $i < count( $lessonsList ); $i++ )
                <a href = "{{ $lessonsList[ $i ][ 'route' ] }}" class = 'LLFOL_lesson_link'>
                    <div class = 'LLFOL_lesson'>
                        <h4>
                            <img src = "{{ $languageIcon }}"/>
                            <div class = 'LLFOL_lesson_name'>
                                <span>{{ $lessonsList[ $i ][ 'lessonName' ] }}</span>
                            </div>
                            <div class = 'LLFOL_lesson_level_name'>
                                <span>{{ $lessonsList[ $i ][ 'levelName' ] }}</span>
                            </div>
                            <div class = 'LLFOL_lesson_word_len'>
                                <span>слов:</span>
                                <span>{{ $lessonsList[ $i ][ 'wordsLength' ] }}</span>
                            </div>
                        </h4>
                        <p class = 'LLFOL_description'>{{ $lessonsList[ $i ][ 'lessonSchortDescription' ] }}</p>
                    </div>
                </a>
            @endfor
            </div>

        </div>
    </div>




    

    
</div>

</div>