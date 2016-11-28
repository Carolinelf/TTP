<?php

//$smt = $db->prepare('SELECT name FROM cafe');
//$smt->execute();
//$data = $smt->fetchAll();


$sql = new mysqli("localhost","root","root","the_perfect_pour");
$sqlSelect="SELECT name FROM cafe";
$result = $sql -> query ($sqlSelect);

$headTemplate = new HeadTemplate('Add/Edit | The Perfect Pour', 'Edit or add a Review');
$coffeeTypes = ['','Long Black', 'Flat White', 'Macchiato', 'Cappuccino', 'Chemex', 'Espresso', 'Latte', 'Pour Over', 'Cold Brew', 'Affogato', 'Mochaccino' ];
$ratings = ['','1', '2', '3', '4', '5'];

$errors = array();
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $dao = new ReviewDao();
    $review = Utils::getObjByGetId($dao);
} else {
    // set defaults
    $review = new Review();
    $review->getComment();
    
    $userId = $_GET['user_id'];
    $review->setUserId($userId);
    $cafeId;
    $review->setCafeId($cafeId);
    $review->setStatus('pending');
    $review->getCoffeeType('');
    $review->getRating('');
}

if (array_key_exists('save', $_POST)) {
    // for security reasons, do not map the whole $_POST['todo']
    $data = array(
        'coffee_type' => $_POST['review']['coffee_type'],
        'cafe_id' => $_POST['review']['cafe_id'],
        'rating' => $_POST['review']['rating'],
        'comment' => $_POST['review']['comment']
    );
      
    // map
    ReviewMapper::map($review, $data); 
    // validate
   // $errors = ReviewValidator::validate($review); 
  
    // validate
    if (empty($errors)) {
        // save
        $dao = new ReviewDao(); 
        $review = $dao->save($review); 

        Flash::addFlash('Review saved successfully.');
        // redirect
        Utils::redirect('list', array('module'=>'review'));
    }
}





