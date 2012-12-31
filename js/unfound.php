<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<p><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:30px;color:#7BA6B4;"  > Unfound Words  </label> </br></p>
<pre>
<?php
echo "<table>";
        echo "<tr><td style='color:#0000A0'>3 letters</td>";
        echo "<td style='color:#0000A0'>4 letters</td>";
        echo "<td style='color:#0000A0'>5 letters</td></tr>";
		
$boggle = "fxie
           amlo
           ewbx
           astu";
echo $boggle;
$alphabet = str_split(str_replace(array("\n", " ", "\r"), "", strtolower($boggle)));
$rows = array_map('trim', explode("\n", $boggle));
$dictionary = file("/Data/op-line.txt");
$prefixes = array(''=>'');
$words = array();
$regex = '/[' . implode('', $alphabet) . ']{3,}$/S';
foreach($dictionary as $k=>$value) {
    $value = trim(strtolower($value));
    $length = strlen($value);
    if(preg_match($regex, $value)) {
        for($x = 0; $x < $length; $x++) {
            $letter = substr($value, 0, $x+1);
            if($letter == $value) {
                $words[$value] = 1;
            } else {
                $prefixes[$letter] = 1;
            }
        }
    }
}

$graph = array();
$chardict = array();
$positions = array();
$c = count($rows);
for($i = 0; $i < $c; $i++) {
    $l = strlen($rows[$i]);
    for($j = 0; $j < $l; $j++) {
        $chardict[$i.','.$j] = $rows[$i][$j];
        $children = array();
        $pos = array(-1,0,1);
        foreach($pos as $z) {
            $xCoord = $z + $i;
            if($xCoord < 0 || $xCoord >= count($rows)) {
                continue;
            }
            $len = strlen($rows[0]);
            foreach($pos as $w) {
                $yCoord = $j + $w;
                if(($yCoord < 0 || $yCoord >= $len) || ($z == 0 && $w == 0)) {
                    continue;
                }
                $children[] = array($xCoord, $yCoord);
            }
        }
        $graph['None'][] = array($i, $j);
        $graph[$i.','.$j] = $children;
    }
}

function to_word($chardict, $prefix) {
    $word = array();
    foreach($prefix as $v) {
        $word[] = $chardict[$v[0].','.$v[1]];
    }
    return implode("", $word);
}

function find_words($graph, $chardict, $position, $prefix, $prefixes, &$results, $words) {
    $word = to_word($chardict, $prefix);
    if(!isset($prefixes[$word])) return false;

    if(isset($words[$word])) {
        $results[] = $word;
    }

    foreach($graph[$position] as $child) {
        if(!in_array($child, $prefix)) {
            $newprefix = $prefix;
            $newprefix[] = $child;
            find_words($graph, $chardict, $child[0].','.$child[1], $newprefix, $prefixes, $results, $words);
        }
    }
}

$solution = array();
find_words($graph, $chardict, 'None', array(), $prefixes, $solution);
print_r($solution);


?>
</pre>
</body>
</html>