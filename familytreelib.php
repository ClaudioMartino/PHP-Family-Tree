<?php
// General parameters
$node_width = 200;
$node_height = 80;
$marginx = 10; // left margin
$marginy = 10; // upper margin
$vline = $node_height / 2 + 20; // vertical line

// Highest generation parameters
$gap1 = 30; // gap between couples
$hline1 = 20; // horizontal line

// $p = array(
//   "first_name" => "",
//   "family_name" => "",
//   "birthdate" => ,
//   "deathdate" =>,
//   "img" => "",
// );

function draw_node($x, $y, $w, $h, $p) {
  $mrgn = 10;
  $img_w = 50;
  $img_h = 60;

  echo "<svg id='node' x='" . $x . "' y='" . $y . "' width='" . $w . "' height='" . $h . "' style='overflow: visible;'>";
    echo "<rect class='node' width='" . $w . "' height='" . $h . "' rx='3' />";
    echo "<svg id='node_image' x='" . $mrgn . "' y='" . $mrgn . "' width='" . $img_w . "' height='" . $img_h . "' style='overflow: hidden'>";
      echo "<image href='" . $p['img'] . "' width='" . $img_w . "' />";
    echo "</svg>";
      echo "<svg x='" . $mrgn + $img_w + $mrgn . "' y='" . $mrgn . "' id='text' width='" . $w - ($mrgn + $img_w + $mrgn) . "'>";
        echo "<text y='15'>" . $p['first_name'] . "</text>";
        echo "<text y='35'>" . $p['family_name'] . "</text>";
        echo "<text y='55'>" . $p['birthdate'] . " - " . $p['deathdate'] . "</text>";
      echo "</svg>";
  echo "</svg>";
};

function draw_line($x1, $y1, $x2, $y2) {
  echo "<line class='line' x1='" . $x1 . "' y1='" . $y1 . "' x2='" . $x2 . "' y2='" . $y2 . "' />";
};

function draw_couple($x, $y, $node_width, $node_height, $hline, $vline, $p1, $p2) {
  // Left node
  draw_node($x, $y, $node_width, $node_height, $p1);
  // Right node
  draw_node($x + $node_width + $hline, $y, $node_width, $node_height, $p2);
  // Horizontal line
  draw_line($x + $node_width, $y + $node_height / 2, $x + $node_width + $hline, $y + $node_height / 2);
  // Vertical line
  draw_line($x + $node_width + $hline / 2, $y + $node_height / 2, $x + $node_width + $hline / 2, $y + $node_height / 2 + $vline);
};

function get_tot_width($node_width, $hline1, $gap1, $marginx, $gen) {
  $couples = pow(2, $gen - 1);
  return 2 * $marginx + (2 * $node_width + $hline1 + $gap1) * $couples - $gap1;
}

function get_tot_height($node_height, $vline, $marginy, $gen) {
  return 2 * $marginy + $gen * ($node_height / 2 + $vline) + $node_height;
}
?>
