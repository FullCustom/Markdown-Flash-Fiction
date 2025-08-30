# Short Stories Website

## Overview
This repository contains a simple website for displaying short stories stored as Markdown (`.md`) files in a `_txt` folder. The stories are rendered dynamically in HTML `<div>` tags using the Marked.js library. The site is developed in Visual Studio, versioned with Git, and deployed to BigRock hosting via cPanel's Git Version Control.

## Features
- Displays short stories from `_txt/*.md` files in a styled `<div>`.
- Uses Marked.js to convert Markdown to HTML for rich formatting (headings, bold, italic, lists, blockquotes).
- Includes a story selector with buttons to load different stories.
- Responsive design with CSS for a clean reading experience.
- Deployable to BigRock hosting using cPanel Git integration.

## Project Structure
```
short-stories/
├── index.html          # Main HTML file with story selector and content div
├── css/
│   └── styles.css      # CSS for styling the site and rendered Markdown
├── js/
│   └── scripts.js      # JavaScript for fetching and rendering Markdown
├── _txt/
│   ├── story1.md       # Sample story in Markdown
│   └── story2.md       # Sample story in Markdown
├── .cpanel.yml         # cPanel deployment configuration
└── README.md           # This file
```

## Prerequisites
- **Local Development**:
  - Visual Studio or Visual Studio Code
  - A modern web browser
  - Git installed
- **Hosting**:
  - BigRock hosting account with cPanel
  - GitHub repository (public or private)
  - SSH key access for private repositories (optional)
- **Dependencies**:
  - Marked.js (loaded via CDN: `https://cdn.jsdelivr.net/npm/marked/marked.min.js`)

## Setup Instructions
### Local Development
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/short-stories.git
   cd short-stories
   ```
2. **Open in Visual Studio**:
   - Open the `short-stories` folder in Visual Studio or VS Code.
   - Use the "Live Server" extension (VS Code) or a local server (e.g., Python’s `http.server`) to test:
     ```bash
     python -m http.server 8000
     ```
     Open `http://localhost:8000` in your browser.
3. **Add Stories**:
   - Create new `.md` files in the `_txt` folder (e.g., `_txt/new-story.md`).
   - Example Markdown:
     ```markdown
     # Story Title
     **Once upon a time**, in a *quiet village*...
     ```
4. **Test Rendering**:
   - Open `index.html` and click story buttons to verify Markdown renders in the `<div>`.

### Deployment to BigRock
1. **Push to GitHub**:
   - Commit and push changes:
     ```bash
     git add .
     git commit -m "Add new story"
     git push origin main
     ```
2. **Set Up SSH Keys (for Private Repositories)**:
   - In cPanel, go to `Security > SSH Access > Manage SSH Keys > Generate a New Key`.
   - Use default key name (`id_rsa`) without a passphrase.
   - Authorize the key in cPanel.
   - Copy the public key to GitHub: `Settings > SSH and GPG keys > New SSH key`.
3. **Clone in cPanel**:
   - In cPanel, go to `Files > Git Version Control > Create Repository`.
   - Enable “Clone a Repository” and use the SSH URL: `git@github.com:your-username/short-stories.git`.
   - Set the repository path (e.g., `/home/yourusername/public_html/stories`).
   - Click `Create`.
4. **Deploy**:
   - The `.cpanel.yml` file copies files to the deployment path:
     ```yaml
     ---
     deployment:
       tasks:
         - export DEPLOYMENT_PATH=/home/yourusername/public_html/stories
         - /bin/cp -r * $DEPLOYMENT_PATH
     ```
   - In `Git Version Control > Manage`, click “Deploy HEAD commit”.
5. **Verify**:
   - Visit `yourdomain.com/stories` to confirm the site loads and stories render.

## Usage
- **Adding Stories**: Place new `.md` files in `_txt/` and update `index.html` with new buttons (or use a dynamic list with server-side scripting).
- **Styling**: Edit `css/styles.css` to customize fonts, colors, or layout.
- **Updating**: Commit changes to GitHub and pull/deploy in cPanel.

## Notes
- **BigRock Hosting**: Ensure file permissions are set (644 for files, 755 for directories) in cPanel’s File Manager.
- **Markdown**: Use standard Markdown syntax for stories. See `_txt/story1.md` for an example.
- **Security**: If allowing user-uploaded `.md` files, add DOMPurify for XSS protection:
  ```html
  <script src="https://cdn.jsdelivr.net/npm/dompurify@3.1.6/dist/purify.min.js"></script>
  <script>
      document.getElementById('storyContent').innerHTML = DOMPurify.sanitize(marked.parse(data));
  </script>
  ```
- **SEO**: Add meta tags in `index.html` for better search engine visibility.

## Troubleshooting
- **Git Errors**: If cloning fails, verify SSH key setup or use HTTPS URL for public repositories.
- **Markdown Not Rendering**: Check browser console (F12) for 404 errors on `_txt/*.md` files or Marked.js CDN.
- **Deployment Issues**: Ensure `.cpanel.yml` path matches your cPanel setup and `public_html/stories` is empty or correctly configured.

## Contributing
- Add new stories to `_txt/` as `.md` files.
- Suggest improvements via GitHub issues or pull requests.
- Update `styles.css` or `scripts.js` for new features.

## License
[Add your preferred license, e.g., MIT, or leave unspecified for proprietary use.]