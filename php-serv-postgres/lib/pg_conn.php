<?php
$link = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=secret88");
if (!$link) {
  echo "Произошла ошибка.\n";
  exit;
}
