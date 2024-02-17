<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your own quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        label{
            color: #10002B; 
            margin-left: 1rem;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode';
            font-size: large;
            margin-right: 1rem;
        }

        .questionbox{
            max-width: 10rem;
            display:flex;
            flex-direction: row;
            margin-right:1rem;
            padding-left: 2rem;
            justify-content: space-between;
            align-items: center;
        }

        .q{
            display: flex;
            min-width: 54.5rem;
            font-size: 15px;
            font-weight: 600;
            padding: 13px;
            margin-left: 30px;
        }

        .options{
            display: flex;
            min-width: 10rem;
            font-size: 15px;
            font-weight: 600;
            padding: 13px;
        }

        .customid{
            display: flex;
            min-width: 10rem;
            font-size: 15px;
            font-weight: 600;
            padding: 13px;

        }

        .optionsbox{
            max-width: 10rem;
            display:flex;
            flex-direction: row;
            margin-top:1rem;
            margin-left:2rem;
            justify-content: space-between;
            align-items: center;
        }

        .answer{
            max-width: 10rem;
            display:flex;
            flex-direction: row;
            margin:1rem;
            justify-content: space-between;
            align-items: center;
        }

        #submit{
            padding: 1rem 3rem;
            font-size: 1rem;
            border:none;
            color: black;
            background-color: #b57edc;
            cursor: pointer;
            margin-left: 3.3rem;
            border-radius: 25px;
        }

        #submit:hover{  
            color:white;
            background-color: #10002B;
            animation:forwards;
            animation-delay: 1s;
        } 

        #finish{
            padding: 1rem 3rem;
            font-size: 1rem;
            border:none;
            color: black;
            background-color: #b57edc;
            cursor: pointer;
            margin-left: 3.3rem;
            border-radius: 25px;
        }

        #finish:hover{  
            color:white;
            background-color: #10002B;
            animation:forwards;
            animation-delay: 1s;
        } 

        @media screen and (max-width: 600px) {
            .container{
                display: flex;
                flex-direction: column;
                min-width:5rem;
            }
        }

        .generator{
            max-width: 10rem;
            display:flex;
            flex-direction: row;
            margin-top:1rem;
            margin-left:2rem;
            margin-bottom:2rem;
            justify-content: space-between;
            align-items: center;
        }
    </style>
    <script>
        function generateID() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const idLength = 8;
        let id = '';
    
        for (let i = 0; i < idLength; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        id += characters.charAt(randomIndex);
        }
    
        return id;
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        const outputDiv = document.getElementById('idgen');
        const generateBtn = document.getElementById('finish');
        generateBtn.addEventListener('click', function() {
            const generatedID = generateID();
            document.getElementById('idgen').value = generatedID;
        });
    });
  
    </script>
</head>
<body style="background-color: white;">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $question = $_POST['question'];
            $option1 = $_POST['option1'];
            $option2 = $_POST['option2'];
            $option3 = $_POST['option3'];
            $option4 = $_POST['option4'];
            $answer = $_POST['answer'];
    
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "custom quizz";
    
            $conn = mysqli_connect($servername, $username, $password, $database);
        
            if (!$conn){
                die("Sorry we failed to connect: ". mysqli_connect_error());
            }
            else{
                $sql = "INSERT INTO `custom` (`id`, `question`, `option1`, `options2`, `option3`, `option4`, `answer`) VALUES ('$id', '$question', '$option1', '$option2', '$option3', '$option4', '$answer')";
                $result = mysqli_query($conn, $sql);
            }

            $conn->close();
        }
    
    ?>
    <div class="head">
        <b><h1 align="center" style=" color: #10002B; margin-left: 1rem; font-size: xx-large; font-family:'Trebuchet MS', 'Lucida Sans Unicode';">Custom Quizzes</h1>        
        <p align="center" style=" background-color:red; color: white; padding:0rem 0rem 0rem 1rem; font-family:'Trebuchet MS', 'Lucida Sans Unicode';">PLEASE REENTER THE GENERATED KEY AGAIN FOR ALL QUESTIONS.</p></b>
    </div>
    <div class="container">
        <button id="finish" name="finish">Generate</button><br>
        <form method="post" action="http://localhost/QuickFlip/CustomQuiz.php">
            <div class="generator">
                
                <label name='id'>Generated ID:</label>
                <input name="id" id="idgen" class="customid" style=" color: #8e0000; margin-left: 1rem; font-family:'Trebuchet MS', 'Lucida Sans Unicode';"></input><br>
            </div>
            <div class="questionbox">
                <label>Question:</label>
                <input name="question" type="text" class="q">
            </div>
            <div class="optionsbox">
                <label>Options:</label><br>
                <label>1.</label>
                <input name="option1" type="text" class="options">
                <label>2.</label>
                <input name="option2" type="text" class="options">
                <label>3.</label>
                <input name="option3" type="text" class="options">
                <label>4.</label>
                <input name="option4" type="text" class="options">
            </div>
            <div class="answer">
                <label>Answer:</label>
                <input name="answer" type="number" class="options" max="4" min="1" id="answer" oninput="bruh(this)">
            </div>
            <div class="submit">
                <button  id="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>