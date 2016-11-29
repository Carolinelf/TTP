<?php
$headTemplate = new HeadTemplate('Cafe Details | The Perfect Pour', 'Cafe Details');

$dao = new CafeDao();

$cafe = Utils::getObjByGetId($dao);


require '../page/review/detail-ctrl.php'; 


