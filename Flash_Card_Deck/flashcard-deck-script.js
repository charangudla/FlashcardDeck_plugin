jQuery(document).ready(function($) {
    // Show the first card on deck initialization
    $('.flashcard-deck .flashcard').first().addClass('active').show();

    function updateCardVisibility() {
        $('.flashcard-deck .flashcard').hide(); // Hide all cards
        $('.flashcard-deck .flashcard.active').show(); // Show only the active card
    }

    $('.flashcard-prev').click(function() {
        var current = $('.flashcard-deck .flashcard.active');
        var prev = current.prevAll('.flashcard').first(); // Use prevAll() and first() to correctly target the immediate previous sibling

        if (prev.length) {
            current.removeClass('active');
            prev.addClass('active');
            updateCardVisibility();
        }
    });

    $('.flashcard-next').click(function() {
        var current = $('.flashcard-deck .flashcard.active');
        var next = current.nextAll('.flashcard').first(); // Use nextAll() and first() to correctly target the immediate next sibling

        if (next.length) {
            current.removeClass('active');
            next.addClass('active');
            updateCardVisibility();
        }
    });

    // Initialize card visibility on document ready
    updateCardVisibility();
});

