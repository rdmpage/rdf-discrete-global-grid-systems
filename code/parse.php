<?php


// parse KML and extract


// big file

$filename = '../kml/isea3h5.kml';
$filename = '../kml/isea3h5p.kml';

$filename = '../kml/isea3h8.kml';

$count = 0;
$in_placemark = false;
$xml = '';

$file_handle = fopen($filename, "r");
while (!feof($file_handle)) 
{
	$line = fgets($file_handle);
	
	if (preg_match('/<Placemark>/', $line))
	{
		$in_placemark = true;
	}
			
	if ($in_placemark)
	{
		$xml .= $line;
	}
	// We've got one page
	if (preg_match('/<\/Placemark>/', $line))
	{
		// process
		
		$geo = new stdclass;
		$geo->type = "Feature";
		$geo->properties = new stdclass;
		$geo->geometry = new stdclass;
		
		
		$name = '';
		$coordinates = '';
		
		$dom = new DOMDocument;
		$dom->loadXML($xml);
		$xpath = new DOMXPath($dom);

		$xpath_query = '//name';
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			$geo->properties->name = $node->firstChild->nodeValue;
		}		

		$xpath_query = '//coordinates';
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			$coordinates = $node->firstChild->nodeValue;
			
			$coordinates = preg_replace('/,0.0\\n/', "\n", $coordinates);
			$coordinates = preg_replace('/[ ]+/', '', $coordinates);
			$coordinates = preg_replace('/^\s+/', '', $coordinates);
			$coordinates = preg_replace('/\s+$/', '', $coordinates);
			
			$c = explode("\n", $coordinates);
			
			if (count($c) == 1)
			{
				$geo->geometry->type = "Point";
				foreach ($c as $row)
				{
					$pts = explode(",", $row);				
					$geo->geometry->coordinates = array((float)$pts[0], (float)$pts[1]);
				}
			}
			else
			{
				$geo->geometry->type = "Polygon";
				$geo->geometry->coordinates[] = array();
				
				foreach ($c as $row)
				{
					$pts = explode(",", $row);				
					$geo->geometry->coordinates[0][] = array((float)$pts[0], (float)$pts[1]);
				}
			}
		}		
		
		//print_r($geo);
		
		echo json_encode($geo);
		echo "\n";

		if ($geo->properties->name == '10')
		{
			exit();
		}

		// next
		$in_placemark = false;
		$xml = '';				
	}
}


/*
<Placemark>
<name>1</name>
      <styleUrl>#lineStyle1</styleUrl>
      <LineString>
         <tessellate>1</tessellate>
         <coordinates>
            7.108752,58.911035,0.0
            7.284221,58.237997,0.0
            7.441754,57.561550,0.0
            8.167983,57.004300,0.0
            8.860592,56.441327,0.0
            10.059290,56.297715,0.0
            11.250000,56.135764,0.0
            12.440710,56.297715,0.0
            13.639408,56.441327,0.0
            14.332017,57.004300,0.0
            15.058246,57.561550,0.0
            15.215779,58.237997,0.0
            15.391248,58.911035,0.0
            14.591716,59.452866,0.0
            13.773552,59.995505,0.0
            12.517306,60.266030,0.0
            11.250000,60.529601,0.0
            9.982694,60.266030,0.0
            8.726448,59.995505,0.0
            7.908284,59.452866,0.0
            7.108752,58.911035,0.0
         </coordinates>
      </LineString>
</Placemark>

<Placemark>
      <name>2432</name>
      <Point>
         <coordinates>
            -168.750000,-58.282526,0.0
         </coordinates>
      </Point>
   </Placemark>
*/

?>

