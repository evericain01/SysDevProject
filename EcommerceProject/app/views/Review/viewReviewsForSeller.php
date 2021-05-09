<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("View Review") ?></title>
    </head>
    <body>
        <h2><?= _("Viewing all Reviews") ?>:</h2> <br />
        <?php
        echo "<div class='review'>";
        foreach ($data['reviews'] as $review) {
            foreach ($data['buyers'] as $buyer) {
                if ($review->buyer_id == $buyer->buyer_id) {
                    $buyer_first_name = $buyer->first_name;
                    $buyer_last_name = $buyer->last_name;

                    echo "<div class='review'>";
                    echo "<u>" . _("Review By") . "</u>" . ": <b>$buyer_first_name, $buyer_last_name</b> &mdash; <i>($review->date)</i><br><br>";
                    echo "<u>" . _("Rating") . "</u>" . ": $review->rate<br><br>";
                    echo "<u>" . _("Review") . "</u>" . ": $review->text_review</b><br>";
                    echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
                    echo "</div>";
                }
            }
        }

        echo "</div>";

        if (empty($data['reviews'])) {
            echo _("There are no reviews for this item.");
        }

        echo "<br><br><br>";
            echo "<div class='homepageLink'><h4><a href='" . BASE . "/Seller/index' class='btn btn-light'>&#8592 " . _("Go Back to Main Page") . "</a></h4></div>";
        ?>
        
    </body>
</html>