<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>eLibrary</title>
        <link rel="stylesheet" href="style.css" />
        <script src="script.js" defer></script>
    </head>

    <body>
        <div class="page-container">
            <div id="navbar">
        <div id="eLibTitle">
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

                <div id="signup">
                    <h1>Sign Up - If Not Registered</h1>
                    <form class="signup">
                        <label for="firstname">First name:</label><br />
                        <input type="text" id="firstname" name="firstname" /><br />
                        <label for="lastname">Last name:</label><br />
                        <input type="text" id="lastname" name="lastname" /><br />
                        <label for="username">User name:</label><br />
                        <input type="text" id="username" name="username" /><br />
                        <label for="phone">Phone Number:</label><br />
                        <input type="tel" id="phone" name="phone" /><br />
                        <label for="email">Email Id:</label><br />
                        <input type="email" id="email" name="email" /><br />
                        <label for="password">Password:</label><br />
                        <input type="password" id="password" name="password" /><br />
                        <input class="submit" type="submit" value="Submit">
                    </form>
                    <h3>If already registered Please Login to proceed</h3>
                    <a id="loginbtn" href="login.php">Log In</a>

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
