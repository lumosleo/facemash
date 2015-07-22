<?php
//error_reporting(E_ERROR);
/*
 * Created by PhpStorm.
 * User: Abhikalp
 * Date: 7/25/14
 * Time: 7:34 PM
 */


$con = mysql_connect("localhost","root","");
mysql_selectdb("imagerank");


$loser = $_POST['loser'];
$winner = $_POST['winner'];


$sqlwin = mysql_query("UPDATE imagename SET wins = wins+1 WHERE imgname = '". $winner . "'" , $con);
$sqllose = mysql_query("UPDATE imagename SET losses = losses+1 WHERE imgname = '". $loser . "'" , $con);

$rating_a = mysql_query("SELECT rating FROM imagename WHERE imgname = '".$winner."'");
$rating_b = mysql_query("SELECT rating FROM imagename WHERE imgname = '".$loser."'");

$score_a  = (400/(400+10*($rating_b - $rating_a) ));
$score_b  = (400/(400+10*($rating_a - $rating_b) ));
$winnerscore = mysql_query("UPDATE imagename SET score = $score_a  WHERE imgname = '". $winner . "'" , $con);
$winnerrating = mysql_query("UPDATE imagename SET rating = rating + 37*(score)  WHERE imgname = '". $winner . "'" , $con);
$loserscore =  mysql_query("UPDATE imagename SET score = $score_b  WHERE imgname = '". $loser . "'" , $con);
$loserrating =  mysql_query("UPDATE imagename SET rating = rating - 37*(score)  WHERE imgname = '". $loser . "'" , $con);


if (!$sqlwin || !$sqllose)
    echo mysql_error();


//-------------------------------------------random pic select logic here ---------------------------------------------


$random  = mt_rand(0,312);

$lost = $_POST['lostimage'];

//here $lost echoes which div the loser image belongs

$name = mysql_query("SELECT imgname FROM imagename WHERE imgno IN ($random)") ;

$result = mysql_fetch_array($name);

$lostname = $result{'imgname'};


$l_score = mysql_query("SELECT score FROM imagename WHERE imgno IN ($random)") ;
$l_wins = mysql_query("SELECT wins FROM imagename WHERE imgno IN ($random)") ;
$l_losses = mysql_query("SELECT losses FROM imagename WHERE imgno IN ($random)") ;
$l_rating = mysql_query("SELECT rating FROM imagename WHERE imgno IN ($random)") ;

$l_score = mysql_fetch_array($l_score);
$l_score = $l_score{'score'};

$l_wins = mysql_fetch_array($l_wins);
$l_wins = $l_wins{'wins'};

$l_losses = mysql_fetch_array($l_losses);
$l_losses = $l_losses{'losses'};

$l_rating = mysql_fetch_array($l_rating);
$l_rating = $l_rating{'rating'};




mysql_close($con);


?>
<!-------------------------------------------------partial index.php page contents ------------------------------------>
<head>
    <script>
        $(document).ready(function()
        {
            coverheight();
            $(window).resize(function()
            {
                coverheight();
            });
        });
        function coverheight()
        {
            var x= $('#leftpic').height() + $(".card").height();
            $('.left').height(x);

            var y = $('#rightpic').height() + $(".card").height();
            $('.right').height(y);

        }

        $(window).load(function()
        {
            coverheight();
        });


    </script>

</head>


<div class="lost">

    <div class="card">

        <h1>EXPECTATION : <?php echo "$l_score"." "; ?></h1>
        <h1>RATING : <?php echo "$l_rating"; ?></h1>
        <h1>WINS : <?php echo "$l_wins"." "; ?></h1>
        <h1>LOSES : <?php echo "$l_losses"; ?></h1>
    </div>








    <div class="img">
<img id="<?php echo $lost ?>"  image-name="<?php echo $result{'imgname'};?>" src="images/emma/<?php echo $result{'imgname'} ; ?>" width="100%">
</div>
</div>