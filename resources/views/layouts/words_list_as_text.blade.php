<div id = 'wordsListAsText'>
    <div class = 'wordsListAsText'>
        @for( $i = 0; $i < count( $words ); $i++ )
            <span>{{ $words[ $i ][ 'foreign' ] }},</span>
        @endfor
    </div>
</div>
