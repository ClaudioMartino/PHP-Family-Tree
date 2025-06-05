<?php
include('familytreelib.php');
include('royalfamily.php')
?>
<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <main>
      <div>
<?php
// Number of ancestors' generations
$gen = 2;

// Define Viewport size
$tot_width = get_tot_width($node_width, $hline1, $gap1, $marginx, $gen);
$tot_height = get_tot_height($node_height, $vline, $marginy, $gen);
echo "<svg xmlns='http://www.w3.org/2000/svg' width='" . $tot_width . "' height='" . $tot_height . "'>";

// Generations loop
$offsetx = $marginx;
$offsety = $marginy;
$hline = $hline1;
$gap = $gap1;
for($i=$gen; $i>0; $i--) {
  // Couples loop
  $couples = pow(2, $i-1);
  $xc = $offsetx;
  for($k=0; $k<$couples; $k++) {
    draw_couple($xc, $offsety, $node_width, $node_height, $hline, $vline, $p[$i][2*$k], $p[$i][2*$k+1]);
    $xc += $node_width * 2 + $hline + $gap;
  }

  // Update values for next generation
  $offsetx += $hline / 2 + $node_width / 2;
  $offsety += $vline + $node_height / 2;
  $hline += $gap + $node_width;
  $gap = $hline;
}

// Draw child
draw_node($offsetx, $offsety, $node_width, $node_height, $p[0][0]);

echo "</svg>\n";
?>
      </div>
    </main>
  </body>
</html>
