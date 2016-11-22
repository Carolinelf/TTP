<?php

//~ Template for list.php
// variables:
//  $title - page title
//  $status - status of TODOs to be displayed
//  $todos - TODOs to be displayed
?>

<h1>Cafes</h1>

<?php if (empty($cafes)): ?>
    <p>No cafes found.</p>
<?php else: ?>
    
    <ul class="list">
        <?php foreach ($cafes as $cafe): ?>
            
        <li class="card">                
                <h3><a href="<?php echo Utils::createLink('detail', 
                        array('module' => 'cafe', 'id' => $cafe->getId())) ?>"><?php 
                        echo Utils::escape($cafe->getName()); ?></a></h3>  
                <p><span class="label">Location:</span> <?php 
                echo Utils::escape($cafe->getLocation()); 
                ?></p>     
                <p><span class="label">Overview:</span> <?php 
                echo Utils::escape($cafe->getOverview()); 
                ?></p>
                 </li>
        <?php endforeach; ?>
    </ul>
        
<?php endif; ?>