<?php
$headTemplate = new HeadTemplate('Cafe Details | The Perfect Pour', 'Cafe Details');


$dao = new CafeDao();
$sql = 'SELECT * FROM cafe';
$cafe = $dao->find($sql);
        

$rdao = new ReviewDao();
$rsql = 'SELECT * FROM review WHERE status != "deleted" ';
$reviews = $rdao->find($rsql);



