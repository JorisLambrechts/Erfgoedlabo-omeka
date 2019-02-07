<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<section class="jumbo-section">
<div class="jumbotron">
  <div class='container' role="main" tabindex="-1">
      <div class="row">
        <div class="co-slogan col-md-4">
          <div class="title">
            <h1>Erfgoed<br><span>labo</span></h1>
          </div>
        </div>
        <div class="co-slogan col-md-6">
          <div class="slogan">
            <?php if ( $description = option('description')): ?>
            <p><span><?php echo $description; ?></span>
              </p>
            <?php endif; ?>
            <p>Het Erfgoedlabo Leuven is het netwerk van de professionele culturele erfgoedactoren. In dialoog met de brede erfgoedsector bundelen ze hun krachten door expertisedeling, overleg en samenwerking.</p>
            <div class="about-button">
              <a href="<?php echo url("about");?>">Lees meer</a>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
</section>
<section class="home partners">
  <div class='container'>
    <div class="row home-row">
      <div class="home-col col-md-6">
        <div class="home-image-1"></div>
      </div>
      <div class="home-col col-md-6">
        <div class="home-block">
          <h2>Ateliers</h2>
          <p>De werking vertaalt zich in 4 ateliers. Hier werken de leden structureel of projectmatig samen aan de belangrijkste thema’s. Participatie loopt als een rode draad door alle ateliers.</p>
          <ul>
            <li><a href="">Atelier behouden en borgen</a></li>
            <li><a href="">Atelier collectiebeleid</a></li>
            <li><a href="">Digitaal atelier</a></li>
            <li><a href="">Atelier presenteren en programmeren</a></li>
          </ul>
          <div class="about-button">
            <a href="<?php echo url("over-libis");?>">Lees meer over de 4 ateliers</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="home projects">
  <div class='container'>
    <h1>Projecten </h1>
    <div class="row">
      <?php $projects = get_records("Item",array('sort_field' => 'added', 'sort_dir' => 'd',"type" => "project"),3);?>
        <?php foreach($projects as $project):?>
          <div class="co col-md-6 col-lg-4">
              <a class="block-link" href="<?php echo record_url($project);?>">
                <div class="col-content">
                  <?php echo item_image('square_thumbnail', array(), 0, $project);?>
                </div>
                <div class="col-overlay">
                    <h2><?php echo metadata($project, array("Dublin Core", "Title"));?></h2>
                    <p><?php echo metadata($project, array("Dublin Core", "Description"));?></p>
                </div>
              </a>
          </div>
        <?php endforeach;?>
      </div>
      <div class="about-button">
        <a href="<?php echo url("projecten");?>">Meer informatie over de projecten</a>
      </div>
  </div>
</section>

<?php echo foot(); ?>
