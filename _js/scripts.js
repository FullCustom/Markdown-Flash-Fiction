function loadStory(file) {
    fetch(file)
        .then(response => {
            if (!response.ok) throw new Error('Story not found');
            return response.text();
        })
        .then(data => {
            document.getElementById('storyContent').innerHTML = marked.parse(data);
        })
        .catch(error => {
            document.getElementById('storyContent').innerText = 'Error: ' + error.message;
        });
}

// Load the welcome page by default on page load
document.addEventListener('DOMContentLoaded', () => {
    loadStory('_txt/Welcome.md');
});