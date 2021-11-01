
<?php
function generateRating($number)
{
$ratingHmtl="<ul class='star'>";

    for ($x = 1; $x <= $number; $x++) {
        $ratingHmtl.="<li><a href='#'><i class='fas fa-star'></i></a></li>";
    }
    $ratingHmtl.="</ul>";
    echo $ratingHmtl;
}

?>