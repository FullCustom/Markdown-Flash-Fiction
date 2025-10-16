<?php
// Ensure PHP is configured to read _txt/*.md files
$stories = glob("_txt/*.md");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YNKZE1W7YW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YNKZE1W7YW');
</script>
    <meta charset="UTF-8">
    <title>3753 Cruithne</title>
    <meta name="google-site-verification" content="#" />
    <meta name="robots" content="index, follow, noarchive, noimageindex">
    <meta name="description" content="Short sci-fi stories by Timothy Eisenacher, rendered from Markdown.">
    <meta name="keywords" content="sci-fi, short stories, Radio Cruithne, Timothy Eisenacher">
    <meta name="author" content="Timothy Eisenacher">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="_css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="_js/scripts.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="https://quenbyolson.com/">
            <img src="_img/s_61294.png" alt="Logo" class="logo-img"> | Radio Cruithne
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-label="Toggle navigation" title="Open or close menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.fullcustommusic.com">Main Site</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.facebook.com/fullcustommusic">Facebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.narwhalindustries.net">Narwhal Industries</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-label="Select a story">Stories</a>
                    <div class="dropdown-menu" aria-labelledby="navbardrop">
                        <?php
                        foreach ($stories as $file) {
                            $name = basename($file, ".md");
                            echo "<a class='dropdown-item' href='#' onclick=\"loadStory('$file')\">$name</a>";
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <header class="container-fluid bg-1 text-center">
        <h1>Tales of the Absurd</h1>
        <p>Brought to you by Libro.fm</p>
        <div class="banner">
         <a rel="sponsored" href="https://www.awin1.com/cread.php?s=3846838&v=25361&q=432861&r=2579497">
         <img src="https://www.awin1.com/cshow.php?s=3846838&v=25361&q=432861&r=2579497" border="0">
         </a>
        </div>
    </header>
    <div class="container-fluid bg-2">
        <div id="storyContent">Select a story to read.</div>
    </div>
    <footer class="container-fluid bg-3 text-center">
        <p>&copy; 2025 Timothy Eisenacher. All rights reserved.</p>
        <p>The internet thrives on handcrafted code by creators like you.</p>
        <p>Learn how at <a href="https://www.w3schools.com">www.w3schools.com</a></p>
        <p>Spot an issue? <a href="https://github.com/FullCustom">Contribute on GitHub</a>.</p>
        <p>Website enhanced with assistance from Grok, created by xAI.</p>
    </footer>
</body>
</html>