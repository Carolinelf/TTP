<?php

//~ Template for list.php
// variables:
//  $title - page title
//  $status - status of TODOs to be displayed
//  $todos - TODOs to be displayed
?>

<h1 class="underline">Users</h1>

<?php if (empty($users)): ?>
    <p>No users found.</p>
<?php else: ?>
    <ul class="list">
        <?php foreach ($users as $user): ?>
            <li class="card">                
                <h3><a href="<?php echo Utils::createLink('detail', 
                        array('id' => $user->getId())) ?>"><?php 
                        echo Utils::escape($user->getUsername()); ?></a></h3>                
                <p><span class="label">User Privilege:</span> 
                    <?php echo Utils::escape($user->getPrivilege())?>
                    <br>
                    <span class="label">Email Address:</span> 
                    <?php echo Utils::escape($user->getEmail());?>
                    <br><br>
                    
                    <?php 
                       if (array_key_exists('privilege', $_SESSION)){
                        if ($_SESSION['privilege'] === 'admin'){
                         ?>
                         <a href="index.php?module=user&page=add-edit&id=<?php echo $user->getId()?>">Edit</a> 
                        | <a href="index.php?module=user&page=delete&id=<?php echo $user->getId()?>">Delete</a>
                       
                       <?php }} ?>
                </p>               
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; 

