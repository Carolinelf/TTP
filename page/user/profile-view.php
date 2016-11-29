<h1 class="underline"> User Profile</h1>

<div class="card">
    <p><span class="label">Username:</span> <?php echo $user->getUsername();  ?> </p>
    <p><span class="label">Email:</span> <?php echo $user->getEmail(); ?></p>


    <a href="index.php?module=user&page=add-edit&id=<?php echo $userId ?>">Edit Account Details</a> 
    | <a href="index.php?module=user&page=delete&id=<?php echo $userId ?>">Delete My Account</a>
</div>  


<h1 class="underline"> My Reviews</h1>

<?php require '../page/review/profile-view.php'; ?> 