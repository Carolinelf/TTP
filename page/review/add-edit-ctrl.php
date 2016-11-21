<?php

$headTemplate = new HeadTemplate('Add/Edit | The Perfect Pour', 'Edit or add a Review');
$coffeeTypes = ['','Long Black', 'Flat White', 'Cappacino', 'Chemex'];
$ratings = ['','1', '2', '3', '4', '5'];

$errors = array();
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $dao = new ReviewDao();
    $review = Utils::getObjByGetId($dao);
} else {
    // set defaults
    $review = new Review();
    $date = new DateTime("now");
    $date->setTime(0, 0, 0);
    $review->setDate($date);
    $review->getComment();
    $userId = 1;
    $review->setUserId($userId);
    $cafeId = 1;
    $review->setCafeId($cafeId);
    $review->setStatus('pending');
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
    $errors = ReviewValidator::validate($review);
    
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
