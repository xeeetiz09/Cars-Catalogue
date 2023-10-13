<?php
echo '<li>';

// selecting specific manufacturer's detail with provided id...
$manufacturer = $allQueries->find($pdo, 'manufacturers', 'id', $car['manufacturerId']);

// selecting all data of a car_image table with provided id...
$stmt = $allQueries->select($pdo, 'car_image', 'car_id', $car['id']);

// extracting the selected data...
foreach($stmt as $rows){

    // if the column 'updated' returns 'Y', then the image is fetched from updated_carimage database table...
    if ($rows['updated'] == 'Y'){
        $stmt = $allQueries->selectAll($pdo, 'updated_carimage');
    }

    // if the column 'updated' returns 'N', then the image is fetched from car_image database table...
    else if ($rows['updated'] == 'N'){
        $stmt = $allQueries->selectAll($pdo, 'car_image');
    }
}

// fetching the car image...
foreach($stmt as $rows){

    // checking if the car_id from cars_image table equals with id from cars table...
    if ($rows['car_id'] == $car['id']){
        $imageN = $rows['img_name'];

        // in admin's portal, the directory is set...
        if ((isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] == true)) {
            if ($imageN) {
                echo '<a href="../images/cars/'.$imageN.'"><img src = "../images/cars/'.$imageN.'"></a>';
            }
        }

        // in user's portal, the directory is set...
        else{
            if ($imageN) {
                echo '<a href="./images/cars/'.$imageN.'"><img src = "./images/cars/'.$imageN.'"></a>';
            }
        }
    }
}
echo '<div class="details">';

// shows manufacturer and car's name
echo '<h2 style = "clear: left; margin-top: 110px; text-transform: capitalize;">' . $manufacturer['name'] . ' ' . $car['car_name'] . '</h2>';

// shows the name of admin who added the car...
echo '<p style = "float: right; text-transform: capitalize;">posted by: '.$car['postedBy'].'</p>';

// if the price of the car is updated, then the updated price is shown...
if ($car['cur_price']){
    echo '<h3>Was £' . $car['prev_price'] . ', Now £'.$car['cur_price'].'</h3>';
}

// if the car's price is not updated, the initial price is shown...
else{
    echo '<h3>£' . $car['prev_price'] . '</h3>';
}

// shows the engine type and mileage of the car...
echo '<h4 style = "margin: 10px 0;">' . $car['engine'].' engine, gives mileage of '.$car['mileage'].' miles per litre</h4>';

// shows  the description of the car...
echo '<p>' . $car['description'] . '</p>';

// the admin portal shows the option to archive and unarchive the car...
if ((isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] == true)) {

    // if the car is unarchived, it shows the option to archive the car...
    if ($car['archived'] == 'N'){
        echo '<a href = "showroom.php?arcId='.$car['id'].'">Archive</a>';
    }

    // if the car is archived, it shows the option to unarchive the car...
    else{
        echo '<a href = "showroom.php?unarcId='.$car['id'].'">Unarchive</a>';
    }

    // if the new price is not set, the option to change the price is shown...
    if (!$car['cur_price']){
        echo '<a href = "updatePrice.php?id='.$car['id'].'" style = "float: right;">Change Price</a>';
    }

    // if the new price is set, the option to restore the previous price is shown...
    else{
        echo '<a href = "showroom.php?resid='.$car['id'].'" style = "float: right;">Restore Price</a>';
    }
}
    echo '</div>';
    echo '</li>';
?>