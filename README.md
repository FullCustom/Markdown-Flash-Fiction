# Short Stories Website

## Overview
This repository contains a simple website for displaying short stories stored as Markdown (`.md`) files in a `_txt` folder. The stories are rendered dynamically in HTML `<div>` tags using the Marked.js library. The default entry point is `index.html`, which uses a hardcoded Bootstrap dropdown for story selection. An optional `dynamic_index.php` provides a dynamic dropdown populated from `_txt/*.md` files using PHP. The site is developed in Visual Studio, versioned with Git, and deployed to BigRock hosting via cPanel's Git Version Control.

## Features
- Displays short stories from `_txt/*.md` files in a styled `<div>`.
- Uses Marked.js to convert Markdown to HTML for rich formatting (headings, bold, italic, lists, blockquotes).
- `index.html`: Hardcoded Bootstrap navbar dropdown for story selection.
- `dynamic_index.php`: Dynamic dropdown using PHP to list stories from `_txt/`.
- "House Flavor" styling with a sci-fi aesthetic (Orbitron font, earthy color palette).
- Responsive design with Bootstrap 4.3.1 and custom CSS.
- Deployable to BigRock hosting using cPanel Git integration.

## Project Structure
```
short-stories/
├── index.html          # Default HTML file with hardcoded story dropdown
├── dynamic_index.php   # Optional PHP file with dynamic story dropdown
├── _css/
│   └── styles.css      # CSS for styling the site and rendered Markdown
├── _img/
│   └── 61294.png       # Navbar logo
├── _js/
│   └── scripts.js      # JavaScript for fetching and rendering Markdown
├── _txt/
│   ├── story1.md       # Sample story: "The Lost Key"
│   └── story2.md       # Sample story: "Moonlit Path"
├── .cpanel.yml         # cPanel deployment configuration
└── README.md           # This file
```

## Prerequisites
- **Local Development**:
  - Visual Studio or Visual Studio Code
  - A modern web browser
  - Git installed
  - For `dynamic_index.php`: PHP 8.2 or 8.3 (download from [php.net](https://www.php.net/downloads.php)) or XAMPP/WAMP/MAMP
- **Hosting**:
  - BigRock hosting account with cPanel
  - GitHub repository (public or private)
  - SSH key access for private repositories (optional)
- **Dependencies**:
  - Marked.js (CDN: `https://cdn.jsdelivr.net/npm/marked/marked.min.js`)
  - Bootstrap 4.3.1 (CDN for CSS/JS)
  - jQuery, Popper.js (CDN for Bootstrap)
  - Google Fonts (Orbitron)

## Setup Instructions
### Local Development
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/short-stories.git
   cd short-stories
   ```
2. **Open in Visual Studio/VS Code**:
   - Open the `short-stories` folder.
   - Use the "Live Server" extension (VS Code) for `index.html` or a PHP server for `dynamic_index.php`.
3. **Test `index.html`**:
   - Run a local server:
     ```bash
     python -m http.server 8000
     ```
     Open `http://localhost:8000/index.html`.
   - Verify the Bootstrap navbar dropdown lists "The Lost Key" and "Moonlit Path," and stories render in `#storyContent`.
4. **Test `dynamic_index.php`**:
   - Install PHP 8.2/8.3 from [php.net](https://www.php.net/downloads.php) or use XAMPP.
   - Start a PHP server:
     ```bash
     php -S localhost:8000
     ```
     Open `http://localhost:8000/dynamic_index.php`.
   - Confirm the dropdown dynamically lists all `_txt/*.md` files and stories load correctly.
5. **Add Stories**:
   - Create new `.md` files in `_txt/` (e.g., `_txt/new-story.md`):
     ```markdown
     # Story Title
     **Once upon a time**, in a *quiet village*...
     ```
   - For `index.html`, update the dropdown manually:
     ```html
     <div class="dropdown-menu" aria-labelledby="navbardrop">
         <a class="dropdown-item" href="#" onclick="loadStory('_txt/new-story.md')">New Story</a>
     </div>
     ```
   - For `dynamic_index.php`, new stories appear automatically.

### Deployment to BigRock
1. **Push to GitHub**:
   - Commit and push changes:
     ```bash
     git add .
     git commit -m "Add new story or update"
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
   - Update `.cpanel.yml` to include `index.html` and `dynamic_index.php`:
     ```yaml
     ---
     deployment:
       tasks:
         - export DEPLOYMENT_PATH=/home/yourusername/public_html/stories
         - /bin/cp -r * $DEPLOYMENT_PATH
     ```
   - In `Git Version Control > Manage`, click “Deploy HEAD commit”.
5. **Verify**:
   - Visit `yourdomain.com/stories/index.html` (default) or `yourdomain.com/stories/dynamic_index.php`.
   - Confirm the navbar dropdown lists stories and renders them in `#storyContent`.
   - Check styling: orange header (`#e5771e`), teal body (`#75c8ae`), cream content (`#ffecb4`), brown/teal footer (`#5a3d2b`, `#75c8ae`).

## Usage
- **Adding Stories**: Place new `.md` files in `_txt/`. For `index.html`, update the dropdown manually. For `dynamic_index.php`, stories appear automatically.
- **Styling**: Edit `_css/styles.css` to customize fonts, colors, or layout.
- **Switching to Dynamic**: Use `dynamic_index.php` as the default by renaming it to `index.php` or setting a cPanel redirect.
- **Updating**: Commit changes to GitHub and pull/deploy in cPanel.

## Notes
- **BigRock Hosting**: Ensure file permissions are 644 for files, 755 for directories in cPanel’s File Manager. Verify PHP 8.2/8.3 support for `dynamic_index.php`.
- **Markdown**: Use standard Markdown syntax for stories. See `_txt/story1.md` for an example.
- **Security**: For user-uploaded `.md` files, add DOMPurify to prevent XSS:
  ```html
  <script src="https://cdn.jsdelivr.net/npm/dompurify@3.1.6/dist/purify.min.js"></script>
  <script>
      document.getElementById('storyContent').innerHTML = DOMPurify.sanitize(marked.parse(data));
  </script>
  ```
- **SEO**: Add meta tags in `index.html` or `dynamic_index.php` for better search visibility:
  ```html
  <meta name="description" content="Short sci-fi stories by Timothy Eisenacher, rendered from Markdown.">
  <meta name="keywords" content="sci-fi, short stories, Radio Cruithne, Timothy Eisenacher">
  ```

## Troubleshooting
- **Git Errors**: Verify SSH key setup or use HTTPS URL for public repositories.
- **Markdown Not Rendering**: Check browser Console (F12) for 404 errors on `_txt/*.md` or Marked.js CDN.
- **Dropdown Issues in `dynamic_index.php`**: Ensure PHP is enabled and `_txt/` contains `.md` files. Test PHP with:
  ```bash
  php -r "print_r(glob('_txt/*.md'));"
  ```
- **Deployment Issues**: Confirm `.cpanel.yml` path matches your setup and `public_html/stories` is correctly configured.

## Contributing
- Add new stories to `_txt/` as `.md` files.
- Suggest improvements via GitHub issues or pull requests.
- Update `styles.css` or `scripts.js` for new features.

## License
[Add your preferred license, e.g., MIT, or leave unspecified for proprietary use.]