<?php

//~ Template for detail.php
// variables:
//  $review - Review to be displayed
//  $tooLate - if the task should have been done already

/* @var $review Review */
?>

<h1>
    <?php if ($latestReview): ?>
        <img src="img/exclamation.png" alt="" title="Should be already done!" />
    <?php endif; ?>
    <?php echo Utils::escape($review->getCoffeeType()); ?>
</h1>

<table class="detail">
    <tr>
        <th>Priority</th>
        <td><img src="img/priority/<?php echo $review->getPriority(); ?>.png" alt="Priority <?php echo $review->getPriority(); ?>" title="Priority <?php echo $review->getPriority(); ?>" /></td>
    </tr>
    <tr>
        <th>Created On</th>
        <td><?php echo Utils::escape(Utils::formatDateTime($review->getCreatedOn())); ?></td>
    </tr>
    <tr>
        <th>Due On</th>
        <td>
            <?php if ($tooLate): ?><span class="too-late"><?php endif; ?>
            <?php echo Utils::escape(Utils::formatDateTime($review->getDueOn())); ?>
            <?php if ($tooLate): ?></span><?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Last Modified On</th>
        <td><?php echo Utils::escape(Utils::formatDateTime($review->getLastModifiedOn())); ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo Utils::escape($review->getDescription()); ?></td>
    </tr>
    <tr>
        <th>Comment</th>
        <td><?php echo Utils::escape($review->getComment()); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><img src="img/status/<?php echo $review->getStatus(); ?>.png" alt="" title="<?php echo Utils::capitalize($review->getStatus()); ?>" class="icon" /></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <th></th>
        <td>
            <div class="statuses">
            <?php foreach (Review::allStatuses() as $status): ?>
                <?php if ($status != $review->getStatus()): ?>
                    <a href="<?php echo Utils::createLink('change-status', array('id' => $review->getId(), 'status' => $status)); ?>" title="Change TODO status to <?php echo Utils::capitalize($status); ?>." class="change-status-link"
                       ><img src="img/status/<?php echo $status; ?>.png" alt="" title="Make it <?php echo Utils::capitalize($status); ?>." class="icon" /></a>
                <?php else: ?>
                    <img src="img/status/<?php echo $status; ?>-disabled.png" alt="" title="This TODO is already <?php echo Utils::capitalize($status); ?>." class="icon" />
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
            <div class="actions">
                <a href="<?php echo Utils::createLink('add-edit', array('id' => $review->getId())); ?>"><img src="img/action/edit.png" alt="" title="Edit it." class="icon" /></a>
                <a href="<?php echo Utils::createLink('delete', array('id' => $review->getId())); ?>" id="delete-link"><img src="img/action/delete.png" alt="" title="Delete it." class="icon" /></a>
            </div>
        </td>
    </tr>
</table>

<p>
    <?php $backLink = Utils::createLink('list', array('status' => $review->getStatus())); ?>
    <a href="<?php echo $backLink; ?>"><img src="img/action/back.png" alt="" title="Back to the list." class="icon"/></a>&nbsp;
    <a href="<?php echo $backLink; ?>">To the list</a>
</p>

<div id="delete-dialog" title="Delete this TODO?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This TODO will be deleted. Are you sure?</p>
</div>
<div id="change-status-dialog">
    <form id="change-status-form" method="post">
        <fieldset>
            <div class="field">
                <label>Comment:</label>
                <textarea name="comment" cols="1" rows="1"></textarea>
            </div>
        </fieldset>
    </form>
</div>
