<div class = "{{ $isOpen? 'lessonsListForOneLanguage isOpen': 'lessonsListForOneLanguage'}}" data-language = "{{ $keyName }}" >

    <div class = 'LLFOL_btn_place'>
        <div class = "{{ $buttonIsActive? 'LLFOL_btn isActive': 'LLFOL_btn' }}">
            <img src = "{{ $languageIcon }}"/>
            <a href = "{{ $oneLanguageRoute }}">{{ $languageName }} язык</a>
        </div>
    </div>

    <div class = 'LLFOL_lassons_place'>
    @for( $i = 0; $i < count( $allLessonsList[ $keyName ][ 'lessons' ] ); $i++ )
        <a href = "{{ $allLessonsList[ $keyName ][ 'lessons' ][ $i ][ 'route' ] }}" class = 'LLFOL_lesson_link'>
            <div class = 'LLFOL_lesson'>
                <h4>
                    <img src = "{{ $languageIcon }}"/>
                    <div class = 'LLFOL_lesson_name'>
                        <span>{{ $allLessonsList[ $keyName ][ 'lessons' ][ $i ][ 'lessonName' ] }}</span>
                    </div>
                    <div class = 'LLFOL_lesson_level_name'>
                        <span>{{ $allLessonsList[ $keyName ][ 'lessons' ][ $i ][ 'levelName' ] }}</span>
                    </div>
                    <div class = 'LLFOL_lesson_word_len'>
                        <span>слов:</span>
                        <span>{{ $allLessonsList[ $keyName ][ 'lessons' ][ $i ][ 'wordsLength' ] }}</span>
                    </div>
                    
                    

                </h4>
                <p class = 'LLFOL_description'>{{ $allLessonsList[ $keyName ][ 'lessons' ][ $i ][ 'lessonSchortDescription' ] }}</p>
            </div>
        </a>
    @endfor
    </div>
</div>

    







    
        

            
