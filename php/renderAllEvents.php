<?php
require('db.php');
?>

<div class="event-holder add-event-button add-event">
    <div class="add-event-align">
        <p> <strong> + </strong> </p>
        <p> Add Event </p>
    </div>
</div>

<?php

$find_events = mysqli_query($db, "SELECT * FROM `events` ORDER BY `start-date`");

while( $event = mysqli_fetch_assoc($find_events) ) { ?>
    <div class="event-holder" data-aos="fade-up" data-aos-duration="1100" data-id="<?=$event['id']?>">
        <div class="event-box">
            <article class="event">
                <h3 class="event-title" data-type="<?=$event['type']?>">
                    <?=$event['title']?>
                </h3>
                <div class="event-info">
                    <h4 class="event-chapter-info">
                        <span class="event-chapter"> <?=$event['chapter']?> </span> - <span class="event-city"> <?=$event['city']?> </span>
                    </h4>
                    <div class="event-date">
                        <table class="event-date-table">
                            <tr>
                                <td class="event-date-bold">Start:</td>
                                <td class="event-date-td event-start-date" data-month="<?=date('m', strtotime($event['start-date']));?>">
                                    <?=date("d M Y", strtotime($event['start-date']));?>
                                </td>
                            </tr>
                            <tr>
                                <td class="event-date-bold">End:</td>
                                <td class="event-date-td event-end-date">
                                    <?=date("d M Y", strtotime($event['end-date']));?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p class="event-description">
                        <?=$event['description']?>
                    </p>
                    <p class="event-contact">
                        <span><i class="fa fa-envelope-o color-<?=$event['type']?>" aria-hidden="true"></i></span> <span> <?=$event['email']?> </span>
                    </p>
                    <div class="event-links clearfix">
                        <ul class="event-links-ul">
                            <?php if ($event['website'] != "") {?>
                                <li class="event-links-li">
                                    <a href="<?=$event['website']?>" class="event-links-link website color-<?=$event['type']?>" target="_blank"> Website </a>
                                </li>
                            <?php } ?>

                            <?php if ($event['facebook'] != "") {
                                ?>
                                <li class="event-links-li">
                                    <a href="<?=$event['facebook']?>" class="event-links-link color-<?=$event['type']?>" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
                                </li>
                            <?php } ?>

                            <?php if ($event['vk'] != "") {
                                ?>
                                <li class="event-links-li">
                                    <a href="<?=$event['vk']?>" class="event-links-link color-<?=$event['type']?>" target="_blank"> <i class="fa fa-vk" aria-hidden="true"></i> </a>
                                </li>
                            <?php } ?>

                            <?php if ($event['instagram'] != "") {
                                ?>
                                <li class="event-links-li">
                                    <a href="<?=$event['instagram']?>" class="event-links-link color-<?=$event['type']?>" target="_blank"> <i class="fa fa-instagram" aria-hidden="true"></i> </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </article>
        </div>
    </div>
<?php }?>
