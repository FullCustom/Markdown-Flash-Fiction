function loadStory(file) {
    if (!file) return;
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