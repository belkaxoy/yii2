<?php

/* @var $this yii/web/View */
/* @var $twits \common\models\Twits[] */

  $this->title = "Лента твитов";

?>

<div class="col-sm-8 blog-main">
  <div class="row">
    <?php
    foreach ($twits as $tw) {
      $twit_link = '/index.php?r=blog/twit&id='.$tw->id;
    ?>
      <div class="col-sm-6">
        <section class="blog-post">
          <div class="panel panel-default">
            <img src="img/technology/unsplash-2.jpg" class="img-responsive"/>
            <div class="panel-body">
              <div class="blog-post-meta">
                <span class="label label-light label-primary">News</span>
                <p class="blog-post-date pull-right">February 16, 2016</p>
              </div>
              <div class="blog-post-content">
                <a href="post-image.html">
                  <h2 class="blog-post-title">Like a little drop of ink</h2>
                </a>
                <p><?= $tw->text?></p>
                <a class="btn btn-info" href="<?= $twit_link ?>">Подробнее</a>
                <a class="blog-post-share pull-right" href="#">
                  <i class="material-icons">&#xE80D;</i>
                </a>
              </div>
            </div>
          </div>
        </section><!-- /.blog-post -->
      </div>
    <?php
    }
    ?>
  </div>
</div>