<?php
session_start();
include_once "../classes/log.classes.php"; // include calsses for debugging;
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
        color: white;
        background-color: #123C69;
    }

    h1 {
        text-align: center;
        margin: 20px 0;
    }

    h3 {
        margin: 30px 0;
    }

    .game-results-wrapper {
        display: flex;
    }


    .panel-left p {
        font-size: 20px;
    }

    .panel-left,
    .panel-right {
        border: 3px solid red;
        display: inline-block;
        width: 48%;
        overflow: hidden;
        margin: 40px auto 0;
        text-align: center;
        height: 250px;
        width: 550px;
    }

    .panel h3 {
        text-align: center;
    }

    h1,
    h3 {
        text-transform: uppercase;
    }

    h2 {
        font-size: 40px;
    }

    .select {
        overflow: hidden;
        text-align: center;
        margin: 0 auto;
        max-width: 1000px;
    }

    .select img {
        width: 200px;
        margin: 20px;
        display: inline-block;
    }

    button {
        display: block;
        padding: 5px 20px;
        border: 2px solid black;
        text-transform: uppercase;
        background-color: #fff;
        font-weight: bold;
        margin: 10px auto;
        transition: .3s;
        font-size: 30px;
        cursor: pointer;
        color: black;
    }


    button:hover {
        background-color: rgb(20, 20, 20);
        color: white;
    }

    span {
        font-weight: bold;
    }

    #paper:hover,
    #stone:hover,
    #sissors:hover {
        border: 3px solid red;
    }
</style>

<body>
    <!-- Logo go to Homepage  -->
    <nav id="nav-bar-section" style="padding: 1%;">
        <div class="nav-bar">
            <a id="logo-nav-bar" href="../index.php">
                <img id="logo-icon" style="width: 150px; height: 80px;" src=" ../photos/svgator-seeklogo.com.svg" alt="My Logo">
            </a>
        </div>
    </nav>


    <h1 class="play">
        Play this game
        <?php
        echo $_SESSION["useremail"];
        ?>
    </h1>

    <div class="select">
        <h3>Please, pick your choice!</h3>

        <img id="paper" data-option="paper" src="../photos/papier.jpg" alt="" title="paper">
        <img id="stone" data-option="stone" src="../photos/kamien.jpg" alt="" title="stone">
        <img id="sissors" data-option="sissors" src="../photos/nozyczki.jpg" alt="" title="sissors">
    </div>

    <button class="start">Let's play the game</button>

    <div class="game-results-wrapper">

        <div class="saved-results-containter panel-left">
            <h3>Your results to date</h3>
            <p class="attemptsx">Number of attempts: <span>0</span> </p>
            <p class="wonx">Games won: <span>0</span></p>
            <p class="lostx">Games lost: <span>0</span></p>
            <p class="drawsx">Draws:<span>0</span></p>
        </div>

        <div class="panel-left">
            <h3>Your score</h3>
            <p>Your choice: <span data-summary="your-choice" id="playerChoice"></span></p>
            <p>Computer's choice: <span data-summary="AI-choice" id="AIChoice"></span></p>
            <h1>The winner is: <span data-summary="who-won" id="winner"></span></h1>

        </div>

        <div class="panel-right">
            <h3>Results</h3>

            <!-- Will try to create a form to pass on the data; albo cookie i to drugie bedzie lepsze chyba bo szybsze * stworzyc tabele view i potem baze danych i polaczyc z danymi uzytkownika -->

            <p class="attempts">Number of attempts: <span>0</span> </p>
            <p class="won">Games won: <span>0</span></p>
            <p class="lost">Games lost: <span>0</span></p>
            <p class="draws">Draws:<span>0</span></p>

            <button id="end-game">End and save results</button>
        </div>
    </div>

</body>
<!-- This is under construction: -->
<!-- I want to transfer the results to cookies and retrive them by PHP and save it in the database. The part for loading historical data will be easier as I will be working only with php vs db -->

<!-- I am using cookie Js library  -->
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js">
</script>

<script>
    //object that stores game data
    const gameSummary = {
        numbers: 0,
        wins: 0,
        losses: 0,
        draws: 0
    }

    // metoda ktora odwola mnie do kontrolera ktory polaczy i zaciagnie z bazy danych
    // object that stores current game data

    const game = {
        playerChoice: "",
        AIChoice: "",
        //playerChoiceHTML:"" //for highlights of player's choice, ale instruktor potem zrezygnowal
    }



    //get all the choices stone paper sicissors
    const hands = [...document.querySelectorAll('.select img')];



    // The Player's choice
    function handSelection() {

        game.playerChoice = this.dataset.option;
        //clear the other player choices
        hands.forEach(hand => hand.style.boxShadow = '');
        //highlight the most recent player choice
        this.style.boxShadow = '0 0 0 4px yellow'
    }



    //loop through all choices and add event listener on click for each of them
    hands.forEach(hand => hand.addEventListener("click", handSelection));



    // AI choice
    function ComputerChoice() {
        //randomise
        const RandomAIChoice = hands[Math.floor(Math.random() * hands.length)].dataset.option;
        return RandomAIChoice
    }


    //result check
    function checkResult(player, AI) {

        if (player === AI) {
            return "draw";
        } else if ((player === "paper" && AI === "stone") || (player === "stone" && AI === "sissors") || (player === "sissors" && AI === "paper")) {
            return "win"
        } else {
            return "lost"
        }
    }


    //publish results
    function publishResults(player, AI, result) {
        document.querySelector('[data-summary="your-choice"]').textContent = player;
        document.querySelector('[data-summary="AI-choice"]').textContent = AI;
        document.querySelector('[data-summary="who-won"]').textContent = result;


        document.querySelector('p.attempts span').textContent = ++gameSummary.numbers;

        if (result === "win") {
            document.querySelector('p.won span').textContent = ++gameSummary.wins;
            document.querySelector('[data-summary="who-won"]').textContent = "You!"
            document.querySelector('[data-summary="who-won"]').style.color = "green";
        } else if (result === "lost") {
            document.querySelector('p.lost span').textContent = ++gameSummary.losses;
            document.querySelector('[data-summary="who-won"]').textContent = "The computer!"
            document.querySelector('[data-summary="who-won"]').style.color = "red";
        } else {
            document.querySelector('p.draws span').textContent = ++gameSummary.draws;
            document.querySelector('[data-summary="who-won"]').textContent = "It's a tie!"
            document.querySelector('[data-summary="who-won"]').style.color = "yellow";
        }
    }


    // all things that need to happen after a single game is finished
    function endGame() {
        //find the right element by data-option
        // document.querySelector(`[data-option= ${game.playerChoice}]`).style.boxShadow = ""; //odznaczamy ramkę
        hands.forEach(hand => hand.style.boxShadow = '');
        game.playerChoice = ""; //czyscimy wybór
    }

    //all processes that happen in the game
    function startGame() {

        if (game.playerChoice === "") {
            return alert("choose");
        }

        game.AIChoice = ComputerChoice();

        const gameResult = checkResult(game.playerChoice, game.AIChoice);

        publishResults(game.playerChoice, game.AIChoice, gameResult);

        endGame();
    }

    //this part is under construction: it saves the data into a cookie on the website. Cookies are working fine;
    function saveResults() {

        console.log("dziala end game");

        let numbers = gameSummary.numbers;
        let wins = gameSummary.wins;
        let losses = gameSummary.losses;
        let draws = gameSummary.draws;

        Cookies.set('numbers', numbers);
        Cookies.set('wins', wins);
        Cookies.set('losses', losses);
        Cookies.set('draws', draws);

        //I need to reload the page to save the results in the cookies (don't know why?)
        location.reload();
    }

        //the buttons which start the game and save the results;
    document.querySelector('.start').addEventListener("click", startGame);
    document.getElementById('end-game').addEventListener("click", saveResults);

</script>

<?php

$numAttempts = $_COOKIE["numbers"];
$numWins = $_COOKIE["wins"];
$numLosses = $_COOKIE["losses"];
$numDraws = $_COOKIE["draws"];
echo $numAttempts;
echo $numWins;
echo $numLosses;
echo $numDraws;

// Private notes:
// stworzyc klase z metodami do polaczenia z baza danych.. wykorzystaj to co juz masz. 
//stworzyc tabele w bazie danych przynajmniej na probe ale z foreign key
//stworzyc model do polaczenia i wrzicenia tych danych. 
//stworzyc kontroler kotry te dane wyciagnie
//NAJLEPIEJ UZYĆ AJAXa - przećwiczyć to i dowiedzieć sie więcej;

?>

</html>