jQuery(document).ready(function($) {
    // Initialize all decks
    $('.flashcard-deck').each(function() {
        var deckId = this.id.replace('flashcard-deck-', '');
        $(this).find('.flashcard').first().addClass('active').show();
    });

    // Handle navigation buttons
    $('.flashcard-prev').click(function() {
        var deckId = $(this).data('deck-id');
        var current = $('#flashcard-deck-' + deckId + ' .flashcard.active');
        var prev = current.prevAll('.flashcard').first();

        if (prev.length) {
            current.removeClass('active').hide();
            prev.addClass('active').show();
        }
    });

    $('.flashcard-next').click(function() {
        var deckId = $(this).data('deck-id');
        var current = $('#flashcard-deck-' + deckId + ' .flashcard.active');
        var next = current.nextAll('.flashcard').first();

        if (next.length) {
            current.removeClass('active').hide();
            next.addClass('active').show();
        }
    });
});
