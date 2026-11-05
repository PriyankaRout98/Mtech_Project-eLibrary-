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

                <div id="login">
                    <h1>Login - If Registered</h1>
                    <form class="login">
                        <label for="username">User name:</label><br />
                        <input type="text" id="username" name="username" /><br />
                        <label for="password">Password:</label><br />
                        <input type="password" id="password" name="password" /><br />
                        <input class="submit" type="button" value="Submit" id="submit">
                    </form>
                    <h3>If not registered Please Signup to proceed</h3>
                    <a id="signupbtn" href="signup.php">Sign Up</a>
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

<script>
    async function send_post_request(username, password) {
        let payload = JSON.stringify({
            'username': username,
            'password': password
        })

        let resp = await fetch("api.php", {
            'method': 'POST',
            'header': 'Content-Type: application/json;',
            'body': payload,
        })

        let response = await resp.json();

        console.log(response);
        return 0;
    }

    document.querySelector('#submit').addEventListener('click', (e) => {


        let username = document.querySelector('#username').value
        let password = document.querySelector('#password').value
console.log(username, password);

        send_post_request(username, password)
    })
    </script>


    </body>
</html>


