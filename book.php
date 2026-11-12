<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eLibrary</title>
    <link rel="stylesheet" href="style.css"> 
    <script src="script.js" defer></script>
</head>

<body>
    <div class="page-container">
        <!-- <main class="content"> -->

    <div id="navbar">
        <div id="eLibTitle">
            <!-- <img id="logoimg" src="/Photos/logo1.jpg" alt="eLibrary"></img> -->
            <img id="logoimg" src="/Photos/logo1.jpg" alt="eLibrary" style="height:70px; width:70px;"></img>

            <h4>Get the knowledge online</h4>
        </div>

        <div class="search-container">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search books, authors, ISBN...">
                <button type="submit">Search</button>
            </form>
        </div>

        <span>

            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="book.php">books</a>
            <a href="login.php">Login / Signup</a>
        </span>
    </div>

 <div id="home">
    <div class="content">
        <h1>Welcome to the eLibrary</h1>
        <p class="hometagline">Your digital reading journey starts here.</p>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
    </div>
</div>

<!-- here add the book listing -->
 <div id="book-section">
    <h1>Available Books</h1>
    <div class="books-grid">

<!-- add book form -->
 <form action="add-book.php" method="GET">
    <button type="submit">Add New Book</button>
 </form>

        <?php
        $dbFile = __DIR__ . DIRECTORY_SEPARATOR . 'userInformation.db';
        try {
            $pdo = new PDO("sqlite:" . $dbFile);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query("SELECT * FROM books ORDER BY id DESC");
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($books)) {
                echo '<p>No books available in the library yet.</p>';
            } else {
                foreach ($books as $book) {
                    echo '<div class="book-card">';
                    echo '  <span class="book-category">' . htmlspecialchars($book['category']) . '</span>';
                    echo '  <h3>' . htmlspecialchars($book['title']) . '</h3>';
                    echo '  <p><strong>Author:</strong> ' . htmlspecialchars($book['author']) . '</p>';
                    echo '  <p><strong>ISBN:</strong> ' . htmlspecialchars($book['isbn']) . '</p>';
                    echo '  <a class="read-btn" href="read.php?id=' . (int)$book['id'] . '">Read / View</a>';
                    echo '</div>';
                }
            }
        } catch (PDOException $e) {
            echo '<p>Error loading books: ' . htmlspecialchars($e->getMessage()) . '</p>';
        }
        ?>
    </div>
</div>







<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-brand">
            <h3>eLibrary</h3>
            <p>Your gateway to digital knowledge.</p>
        </div>
        <ul class="footer-links">
            <li><a href="#privacy">Privacy Policy</a></li>
            <li><a href="#terms">Terms of Service</a></li>
            <li><a href="#contact">Contact Support</a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>&copy; <span id="current-year"></span> eLibrary. All rights reserved.</p>
    </div>
</footer>


</div>
</body>
</html>