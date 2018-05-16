<?php snippet('header') ?>

<h1><?php echo $page->title()->html() ?></h1>

<?php // get all events
$events = $page->events()->toStructure(); ?>

<ul>

  <?php // loop through the collection of events:
  foreach($events as $event): ?>

  <li>
    <?= $event->event_title()->html() ?> - <a href="<?= url() . '/event=' . $event->event_id()->html() ?>">link</a>
  </li>

  <?php endforeach ?>

</ul>

<?php snippet('footer') ?>
