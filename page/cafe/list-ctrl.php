<?php

$headTemplate = new HeadTemplate('Cafe list | The Perfect Pour', 'List of Cafes');

$dao = new CafeDao();

$sql = 'SELECT * FROM cafe';
$cafes = $dao->find($sql);