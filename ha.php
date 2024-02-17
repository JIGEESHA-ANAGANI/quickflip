<!DOCTYPE html>
<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "custom quizz";
    $conn = mysqli_connect($servername, $username, $password, $database);

    $unique = $_POST['unique'];

    $sql1 = "SELECT question FROM `custom` WHERE id='$unique' ";
    $result = mysqli_query($conn, $sql1);
    
    $sql2 =  "SELECT option1,options2,option3,option4 FROM `custom` WHERE id='$unique' ";
    $result2 = mysqli_query($conn, $sql2);

    $sql3 =  "SELECT answer FROM `custom` WHERE id='$unique' ";
    $result3 = mysqli_query($conn, $sql3);

    $ha=array();
    $ha2=array();
    $ha3=array();

    while( $row = mysqli_fetch_array( $result, MYSQLI_NUM ) ){
        array_push($ha,$row);   
    }

    while( $row2 = mysqli_fetch_array( $result2, MYSQLI_NUM ) ){
        array_push($ha2,$row2);   
    }

    while( $row3 = mysqli_fetch_array( $result3, MYSQLI_NUM ) ){
        array_push($ha3,$row3);   
    }
   
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
         label{
            color: #10002B; 
            margin-left: 1rem;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode';
            font-size: large;
            margin-right: 1rem;
        }

        .textarea{
            display: flex;
            flex-direction:column;
            margin:1rem;
            min-width: 10rem;
            font-size: 15px;
            font-weight: 600;
            padding: 13px;
            min-width:15px
        }

        .textarea:focus{
            outline: none;
        }

        #submit{
            padding: 1rem 1rem;
            font-size: 1rem;
            border:none;
            color: black;
            cursor: pointer;
            background-color: #b57edc;
            margin-left: 5.5rem;
            border-radius: 25px;
        }

        #submit:hover{  
            color:white;
            animation:forwards;
            background-color: #10002B;
            animation-delay: 1s;
        }
        
        .uniqueidcontainer{
            margin-left:40.5rem;
            min-width:100px;
            align-items:center;
        }

        .optionsbox{
            max-width: 10rem;
            display:flex;
            flex-direction:column;
            flex-direction: row;
            margin-top:1rem;
            margin-left:2rem;
            justify-content: space-between;
            align-items: center;
        }

        .options{
            min-width: 10rem;
            font-size: 15px;
            font-weight: 600;
            padding: 13px;
            border:none;
            background-color:#179a8a;

        }

        .options:focus{
            outline: none;      
        }

        #q:focus{
            outline: none;
        }

        #q{
            min-width: 50rem;
            font-size: 20px;
            font-weight: 600;
            padding: 13px;
            border:none;
            background-color:#179a8a;
        }

        #q:disabled {
            color: black;
        }

        .options:disabled {
            color: black;
        }

        .quizcontainer{
            margin-top:2rem;
            margin-left:18rem;
        }

        .optionsradio{
            width: 100px;
            height: 30px
        }

        .button{
            padding: 1rem 3rem;
            font-size: 1rem;
            border:none;
            color: black;
            background-color: #b57edc;
            cursor: pointer;
            margin-left: 3.3rem;
            border-radius: 25px;
            margin-top:3rem;
        }

        .button:hover{  
            color:white;
            background-color: #10002B;
            animation:forwards;
            animation-delay: 1s;
        } 
    </style>
</head>
<body style="background-color:#179a8a">
    <form method = 'post'>
        <div class="container">
            <div class="uniqueidcontainer">
                <label style="padding-left: 45px;" for = 'unique'>Enter Unique id:</label>
                <input class="textarea" name='unique' id='unique' type='text'>
                <button id='submit'>submit</button>
            </div>
        </div>  
    </form>
    <div class = "quizcontainer">
    <div class="Question">
        <label>Q.</label>
        <input id="q" disabled="disabled">
    </div>
    <div class="optionsbox"> 
        <input name="option" value=1 type="radio" class="optionsradio">
        <input id="label1" class="options" disabled="disabled">
        <input name="option" value=2 type="radio" class="optionsradio">
        <input id="label2" class="options" disabled="disabled">
        <input name="option" value=3 type="radio" class="optionsradio">
        <input id="label3" class="options" disabled="disabled">
        <input name="option" value=4 type="radio" class="optionsradio">
        <input id="label4" class="options" disabled="disabled">
    </div>
    <div class="nextbtn">
        <button class="button" id="prev">Previous</button>
        <button class="button" id="next">Next</button>
    </div>
    <script>
        var questions = <?= json_encode($ha)?>;
        var options = <?= json_encode($ha2)?>;
        var answers = <?= json_encode($ha3)?>;

        const prevBtn = document.getElementById('prev');
        const nextBtn = document.getElementById('next');

        console.log(questions);
        console.log(options);
        console.log(answers);
        console.log(questions.length);

        let qno = 0;

        document.getElementById("q").value = questions[qno][0];

        let option = document.querySelectorAll( ".options" );
        let radio = document.querySelectorAll( ".optionsradio" );
        
        for (let i = 0; i < option.length; i++) {
            option[i].value = options[qno][i];
        }

        

        nextBtn.addEventListener('click', (e) => {
            qno++;
            var index = [... document.querySelectorAll("input[name=option]")].findIndex(e=>e.checked)
            console.log(index);
            if(qno >= questions.length){
                qno = questions.length-1;
                radio.forEach((x) => x.checked = false);
            }
            document.getElementById("q").value = questions[qno][0];
            for (let i = 0; i < option.length; i++) {
                option[i].value = options[qno][i];
            }
            radio.forEach((x) => x.checked = false);
        });

        prevBtn.addEventListener('click', (e, index) => {
            qno--;
            if(qno < 0){
                qno = 0;
            }
            document.getElementById("q").value = questions[qno][0];
            for (let i = 0; i < option.length; i++) {
                option[i].value = options[qno][i];
            }
        });
        
    </script>
</body>
</html>