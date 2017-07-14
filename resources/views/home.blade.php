<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function(){
        $.get( "http://127.0.0.1:8000/course", function( data ) {
            $( ".result" ).html( data );
        });
    });
</script>
                    <div class="result">test</div>
https://apple-com-p.surfly.com/www/ST/mgSjdDRagRAiVFgUs03trmg//////////us-hed/SURFLYROOT//////////us-hed/shop/buy-mac/macbook-air/macbook-air?SURFLY=T?SURFLY_TAB_PREFIX=_surfly_tab0