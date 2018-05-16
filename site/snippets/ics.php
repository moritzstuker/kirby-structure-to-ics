<?php
// Find the right event and set is as $event
$event = page('events')->events()->toStructure()->findBy('event_id', $event_id);

// Set the file name
$filename = $event->event_title()->escape();

// Set the correct headers for this file
header('Content-type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename . 'ics');

// Echo out the ics file's contents
?>
BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//
CALSCALE:GREGORIAN
BEGIN:VEVENT
DTSTART;TZID=Europe/Zurich:<?= $event->date('Ymd\THis\Z', 'event_dtstart') . PHP_EOL ?>
DTEND;TZID=Europe/Zurich:<?= $event->date('Ymd\THis\Z', 'event_dtend') . PHP_EOL ?>
UID:<?= $event->event_id()->html() . PHP_EOL ?>
DTSTAMP:<?= date('Ymd\THis\Z', time()) . PHP_EOL ?>
LOCATION:<?= $event->event_location()->html() . PHP_EOL ?>
DESCRIPTION;LANGUAGE=fr-ch:<?= $event->event_description()->html() . PHP_EOL ?>
URL;VALUE=URI:http://google.com<?= PHP_EOL ?>
SUMMARY:<?= $event->event_title()->html() . PHP_EOL ?>
END:VEVENT
END:VCALENDAR
