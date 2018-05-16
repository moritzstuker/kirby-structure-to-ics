<?php // Edit according to https://github.com/texnixe/kirby-structure-id

c::set('structure.id.data', [
  'events' => ['events']
]);

c::set('structure.id.hashfield', 'event_id');

c::set('routes', array(
  array(
    'pattern' => 'event=(:all)',
    'action'  => function($allPlaceholder) {

      // Here we call the 'ics.php' snippet and pass it our event_id (at present stored in $allPlaceholder)
      return snippet('ics', ['event_id' => $allPlaceholder]);
      }
    )
  ));
