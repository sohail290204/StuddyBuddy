<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emoji Picker Example</title>
    <!-- Add IcoMoon icon font styles -->
    <link rel="stylesheet" href="path/to/your/icomoon/style.css">
</head>
<body>

<!-- Your content here -->

<!-- Text area with emoji icons -->
<textarea id="msg" placeholder="Type your message..."></textarea>

<!-- Include IcoMoon script -->
<script src="path/to/your/icomoon/icomoon.js"></script>

<!-- Your other scripts here -->

<script>
    // Function to insert selected emoji into the text area
    function insertEmoji(emoji) {
        const msgInput = document.getElementById('msg');
        msgInput.value += emoji;
    }
</script>

</body>
</html>
