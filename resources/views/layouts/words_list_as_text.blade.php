<div id = 'wordsListAsText'>
    <div class = 'wordsListAsText'>
        <div class = 'WLAT_ListRow WLAT_ListRowForeign'>
        @for( $i = 0; $i < count( $words ); $i++ )
            <span>{{ $words[ $i ][ 'foreign' ] }},</span>
            <div class = 'WLAT_OneRowItem '>
                <span class = 'WLAT_ORI_visibleLang visibleForeign'>{{ $words[ $i ][ 'foreign' ] }},</span>
                <span class = 'WLAT_ORI_hiddenLang'>{{ $words[ $i ][ 'ru' ] }},</span>
            </div>
        @endfor
        </div>
        
    </div>
</div>
