<?php
$con = mysql_connect("localhost","root","");
mysql_select_db("imagerank");

?>


<html>
<head>
    <link href ="styles/index.css" type="text/css" rel="stylesheet"/>
    <link href ="styles/reset.css" type="text/css" rel="stylesheet"/>
    <script src="scripts/library.js"></script>

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



<!---->
<!--                var winnerImage = $(this).attr("image-name");-->
<!--                var rightImage = $("#rightpic").attr("image-name");-->
<!--                var leftImage = $("#leftpic").attr("image-name");-->
<!---->
<!--                var left = $("#leftpic").attr('id');-->
<!--                var right =  $("#rightpic").attr('id');-->
<!---->
<!--                var loserImage = ( winnerImage == rightImage) ? leftImage : rightImage ;-->
<!---->
<!--                 var loser = (winnerImage == rightImage ) ? left : right ;-->
<!---->
<!---->
<!--                var json_data = { 'winner': winnerImage ,'loser': loserImage ,'lostimage':loser };-->
<!---->
<!--                $.ajax({-->
<!--                    type: 'POST',-->
<!--                    url: ('./updatewinner.php'),-->
<!--                    data: { 'winner': winnerImage , 'loser':loserImage ,'lostimage':loser},-->
<!--                    success: function(result) {-->
<!--                        $(".right").html(result);-->
<!--//                        console.log(result);-->
<!--                          console.log("losername : "+loserImage);-->
<!--                          console.log("loser : "+loser);-->
<!--                    }-->
<!--                });-->
<!---->
<!---->
<!---->
<!--            });-->
<!--        });-->
<!--    </script>-->



<script>

    $(window).load(function() {


    var theParent = document.querySelector(".wrapper");
    theParent.addEventListener("click", doSomething, false);

    function doSomething(e) {


    if (e.target != e.currentTarget) {
    var clickedItem = e.target.id;
    console.log("clicked : " + clickedItem);

    }
        var winnerImage = clickedItem;

        var rightImage = $("#rightpic").attr("image-name");
        var leftImage = $("#leftpic").attr("image-name");

        var left = $("#leftpic").attr('id');
        var right =  $("#rightpic").attr('id');

        var loserImage = ( winnerImage == right) ? leftImage: rightImage ;



        var loser = (winnerImage == right ) ? left : right ;

//        var winname = $(winnerImage).attr("image-name");

        var div = (winnerImage == left)? ".right" : ".left";

        var divid = (winnerImage == left)? "#rightpic" : "#leftpic";


        winnerImage = (winnerImage == right) ? rightImage:leftImage;

        var json_data = { 'winner': $(winnerImage).attr("image-name") ,'loser': loserImage ,'lostimage':loser };



        $.ajax({
            type: 'POST',
            url: ('./updatewinner.php'),
            data: { 'winner': winnerImage , 'loser':loserImage ,'lostimage':loser},
            success: function(result) {
                $(div).html(result);
                console.log("winnerImage : "+winnerImage);
                console.log("losername : "+loserImage);
                console.log("loser : "+loser);
                $(div).slideToggle("slow");
                $(div).slideToggle("slow");

            }
        });

        e.stopPropagation();

    }

    });

</script>


    <script>

    </script>

















    <title>
        FACEMASH

    </title>
</head>

<body>




<header>
    <h1>
        FACEMASH
    </h1>
</header>

<h1 id="teaser">LEFT OR RIGHT (CLICKTOCHOOSE)??</h1>



<div class="wrapper">

   <div class="left">

        <?php
        $random  = mt_rand(0,312);



        $name = mysql_query("SELECT imgname FROM imagename WHERE imgno IN ($random)") ;

        $result = mysql_fetch_array($name);

        $leftname = $result{'imgname'};

        $scorequery = mysql_query("SELECT score FROM imagename WHERE imgno IN ($random)");
        $winsquery = mysql_query("SELECT wins FROM imagename WHERE imgno IN ($random)");
        $lossesquery = mysql_query("SELECT losses FROM imagename WHERE imgno IN ($random)");
        $ratingquery = mysql_query("SELECT rating FROM imagename WHERE imgno IN ($random)");

        $l_score = mysql_fetch_array($scorequery);
        $l_wins = mysql_fetch_array($winsquery);
        $l_losses = mysql_fetch_array($lossesquery);
        $l_rating = mysql_fetch_array($ratingquery);

//        echo "$leftname";


        $l_score = $l_score{'score'};
        $l_wins = $l_wins{'wins'};
        $l_losses = $l_losses{'losses'};
        $l_rating = $l_rating{'rating'};

        ?>

       <div class="card">

           <h1>EXPECTATION : <?php echo "$l_score"." "; ?></h1>
           <h1>RATING : <?php echo "$l_rating"; ?></h1>
           <h1>WINS : <?php echo "$l_wins"." "; ?></h1>
           <h1>LOSES : <?php echo "$l_losses"; ?></h1>
       </div>




       <img class="image" id="leftpic" image-name="<?php echo $leftname; ?>" src="images/emma/<?php echo $leftname; ?>" >





        </div>

    <div id="or">
        <h1>OR</h1>
    </div>



    <div class="right">

        <?php
        $random  = mt_rand(0,312);

        $name = mysql_query("SELECT imgname FROM imagename WHERE imgno IN ($random)") ;

        $result = mysql_fetch_array($name);

        $rightname = $result{'imgname'};

        $scorequery = mysql_query("SELECT score FROM imagename WHERE imgno IN ($random)");
        $winsquery = mysql_query("SELECT wins FROM imagename WHERE imgno IN ($random)");
        $lossesquery = mysql_query("SELECT losses FROM imagename WHERE imgno IN ($random)");
        $ratingquery = mysql_query("SELECT rating FROM imagename WHERE imgno IN ($random)");

        $r_score = mysql_fetch_array($scorequery);
        $r_wins = mysql_fetch_array($winsquery);
        $r_losses = mysql_fetch_array($lossesquery);
        $r_rating = mysql_fetch_array($ratingquery);



//        echo "$rightname";


        $r_score = $r_score{'score'};
        $r_wins = $r_wins{'wins'};
        $r_losses = $r_losses{'losses'};
        $r_rating = $r_rating{'rating'};


        ?>


        <div class="card">

            <h1>EXPECTATION : <?php echo "$l_score"." "; ?></h1>
            <h1>RATING : <?php echo "$l_rating"; ?></h1>
            <h1>WINS : <?php echo "$l_wins"." "; ?></h1>
            <h1>LOSES : <?php echo "$l_losses"; ?></h1>
        </div>




        <img class="image" id="rightpic" image-name="<?php echo $rightname;?>" src="images/emma/<?php echo $rightname; ?>">


    </div>
</div>




</body>
</html>



<?php

mysql_close($con);


?>