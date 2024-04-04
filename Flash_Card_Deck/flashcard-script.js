jQuery(document).ready(function($) {
    $('.flashcard').click(function() {
        $(this).find('.flashcard-inner').toggleClass('is-flipped');
    });
});
