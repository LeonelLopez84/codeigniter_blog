
    <h2>
        <a href="#"><?php echo $post->title ?></a>
    </h2>
    <p class="lead">
        by <a href="index.php"><?php echo $post->author->username ?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> 
    <?php 
    echo unix_to_human(strtotime("$post->date")); ?></p>

    <hr>
    <img class="img-responsive img-thumbnail" src="<?php echo base_url('assets/img/post/'.$post->id).'.jpg'; ?>">
    <hr>
    <p><?php echo $post->article ?></p>
    <a class="btn btn-primary" href="<?php echo base_url('section/post/'.$post->id.'/'.url_title($post->title)) ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>