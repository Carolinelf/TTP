<?php

$headTemplate = new HeadTemplate('Cafe list | The Perfect Pour', 'List of Cafes');

$dao = new CafeDao();

$sql = 'SELECT id, name, location, overview, average_rating date FROM cafe';
$cafes = $dao->find($sql);