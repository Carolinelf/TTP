<?php
$headTemplate = new HeadTemplate('Cafe Details | The Perfect Pour', 'Cafe Details');


//$dao = new CafeDao();
//$sql = 'SELECT * FROM cafe';
//$cafe = $dao->find($sql);
//        

//$cafe = Utils::getObjByGetId($dao);
//$review = Utils::getObjByGetId($dao);



    


$id = $_GET['id'];
$rdao = new ReviewDao();
$rsql = 'SELECT * FROM review WHERE cafe_id = ' . $id;
$reviews = $rdao->find($rsql);


