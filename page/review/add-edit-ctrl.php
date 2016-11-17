<?php

$headTemplate = new HeadTemplate('Add/Edit | The Perfect Pour', 'Edit or add a Review');
$coffeeTypes = ['','Long Black', 'Flat White', 'Cappacino', 'Chemex'];
$errors = array();
$todo = null;
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
    $review->setCoffeeType('');
    $review->setComment();
    $review->setUserId();
    $review->setCafeId();
    $review->setStatus('pending');
    $review->setRating();
}

//if (array_key_exists('cancel', $_POST)) {
//    // redirect
//    Utils::redirect('detail', array('id' => $todo->getId()));
//} else

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
