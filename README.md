# Flashcard Deck WordPress Plugin

This WordPress plugin allows you to easily create and manage interactive flashcards on your WordPress site. Users can add decks of flashcards with questions on the front and answers on the back. Each flashcard can be flipped by clicking on it, and users can navigate through the cards in each deck using next and previous buttons.

## Features

- **Interactive Flashcards**: Hover to flip the cards to see the answer.
- **Customizable Colors**: Set background and font colors for the front and back of each card.
- **Responsive Design**: Flashcards adjust in size for optimal viewing on different devices.
- **Navigable Decks**: Users can cycle through flashcards within each deck using navigation buttons.
- **Shortcode Driven**: Easily add flashcards and decks anywhere on your WordPress site via shortcodes.

## Installation

1. **Download the Plugin**:
   - Download the zip file containing the Simple Flashcard plugin from the provided URL or from your WordPress plugin repository.
   
2. **Upload and Activate**:
   - Go to your WordPress dashboard.
   - Navigate to `Plugins` > `Add New` > `Upload Plugin`.
   - Upload the zip file and click `Install Now`.
   - After the installation is complete, click `Activate` to activate the plugin on your WordPress site.

3. **Include Required Files**:
   - Ensure the plugin’s CSS and JavaScript files are being loaded. This should be handled automatically upon activation.

## Example Usage

```plaintext
[flashcard_deck]
[simple_flashcard question="What is the capital of France?" answer="Paris" front_color="#ffcccb" back_color="#add8e6"]
[simple_flashcard question="What is the capital of Japan?" answer="Tokyo" front_color="#ffcccb" back_color="#add8e6"]
[/flashcard_deck]
```
## Customization

The Flashcard Deck plugin is designed to be easily customizable to fit the style and requirements of your WordPress site:

- **Card Colors**: Modify the `front_color` and `back_color` attributes in the `[simple_flashcard]` shortcode to change the background colors of the front and back of the cards, respectively.

- **Font Styles**: To change the text size, color, and font style, adjust the `.flashcard-front`, `.flashcard-back`, and `.flashcard-number` classes in the `flashcard-style.css` file.

- **Responsive Design**: Adjust the media queries in the `flashcard-style.css` to change how flashcards look on different devices.

These simple modifications can help the flashcards better integrate with your site's design and user experience.

## Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repository and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

Distributed under the MIT License. See `LICENSE` file for more information.
