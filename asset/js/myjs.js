$( document ).ready(function() {
    $('.open-search a').click(function(e){
        e.preventDefault();
        $('.search-form').slideToggle(300);
    });
});