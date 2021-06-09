<?php if($ctab==1){ ?>
<ul class="list-group list-group-1 margin-none borders-none" style="height: 470px;overflow-y: scroll;">
    <?php
    if (!empty($dealers_info)):
        foreach ($dealers_info as $value):
            ?>
            <li class="list-group-item border-top-none">
                <a href="#" DealerId="<?php echo $value['DealerName']['dealer_id']; ?>" class="dealershipinfo"><?php echo $value['DealerName']['name']; ?></a>
                <span>Dealer ID # <?php echo $value['DealerName']['dealer_id']; ?></span></li>
            <?php
        endforeach;
    endif;
    ?>
</ul>
<?php
}else{
?>


    <ul class="list-group list-group-1 margin-none borders-none" style="height: 470px;overflow-y: scroll;">
        <?php
        if (!empty($weblead_info)):
            foreach ($weblead_info as $web):
                ?>
                <li class="list-group-item border-top-none">
                    <a href="#" DealerId="<?php echo $web['DealerName']['dealer_id']; ?>" class="dealershipinfo"><?php echo $web['DealerName']['name']; ?></a>
                    <span>Dealer ID # <?php echo $web['DealerName']['dealer_id']; ?></span></li>
                <?php
            endforeach;
        endif;
        ?>
    </ul>
<?php
}
?>