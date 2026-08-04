<div class = "{{ $isOpen? 'testsListForOneLanguage isOpen': 'testsListForOneLanguage'}}" data-language = "{{ $keyName }}" >

    <div class = 'LLFOL_btn_place'>
        <div class = "{{ $buttonIsActive? 'LLFOL_btn isActive': 'LLFOL_btn' }}">
            <img src = "{{ $languageIcon }}"/>
            <a href = "{{ $oneLanguageRoute }}">{{ $languageName }} язык</a>
        </div>
    </div>

    <div class = 'LLFOL_lassons_place'>
    @for( $i = 0; $i < count( $allTestsList[ $keyName ][ 'tests' ] ); $i++ )
        <a href = "{{ $allTestsList[ $keyName ][ 'tests' ][ $i ][ 'route' ] }}" class = 'LLFOL_lesson_link'>
            <div class = 'LLFOL_lesson'>
                <h4>
                    <img src = "{{ $languageIcon }}"/>
                    <div class = 'LLFOL_lesson_name'>
                        <span>{{ $allTestsList[ $keyName ][ 'tests' ][ $i ][ 'testName' ] }}</span>
                    </div>
                    <div class = 'LLFOL_lesson_level_name'>
                        <span>{{ $allTestsList[ $keyName ][ 'tests' ][ $i ][ 'levelName' ] }}</span>
                    </div>
                    <div class = 'LLFOL_lesson_word_len'>
                        <span>слов:</span>
                        <span>{{ $allTestsList[ $keyName ][ 'tests' ][ $i ][ 'wordsLength' ] }}</span>
                    </div>
                    
                    

                </h4>
                <p class = 'LLFOL_description'>{{ $allTestsList[ $keyName ][ 'tests' ][ $i ][ 'testSchortDescription' ] }}</p>
            </div>
        </a>
    @endfor
    </div>
</div>

    







    
        

            
