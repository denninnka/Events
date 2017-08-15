<?php if(isLogged() && isUser()){


    /* sample usages */
    echo '<a class="col-lg-3" href="index.php?date='.$prev_date->format('F Y').'">'.$prev_date->format('F Y').'</a>';
    echo '<h2 class="col-lg-6 text-center" >'.$date->format('F Y').'</h2>';
    echo '<a class="col-lg-3 text-right"  href="index.php?date='.$next_date->format('F Y').'">'.$next_date->format('F Y').'</a>';
    echo draw_calendar((int)$date->format('n'),(int)$date->format('Y'), $notes);
    ?>

<?php }else{ ?>
<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-12">
            <h2>За да видите "СЪБИТИЯТА НА КАЛЕНДАРА" трябва да влезете в системата</h2>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
<?php } ?>
