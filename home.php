<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eLibrary</title>
    <link rel="stylesheet" href="style.css"> 
</head>

<body>
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



    <!-- <li>nav bar <br>
        <ol>home<br></ol>
        <ol>about<br></ol>
        <ol>books<br></ol>
        <ol>signIn/LogIn <br></ol>
    search<br></li> -->

</body>
</html>