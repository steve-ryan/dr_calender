
$dt = new DateTime;
if (isset($_GET['year']) && isset($_GET['week'])) {
    $dt -> setISODate($_GET['year'], $_GET['week']);
} else {
    $dt -> setISODate($dt -> format('o'), $dt -> format('W'));
}
$year = $dt -> format('o');
$week = $dt -> format('W');
$month = $dt -> format('F');
$year = $dt -> format('Y');
