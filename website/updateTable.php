<?php
require "../php/connect.php";
/*
This is the initial part of the table that will be inserted in the div of HTML.
It was impossible to write just the <tr> and <td> into the code to avoid
the copying of this initial part of the table
*/

echo"<table>
      <tr>
        <th style='border-right:1px solid transparent'></th>
        <th style='border-right:1px solid transparent'></th>
        <th style='border-right:1px solid transparent'></th>
        <th style='border-right:1px solid transparent; text-align:center;'>Now</td>
        <th style='border-right:1px solid transparent; text-align:center;'>Max</td>
        <th style='border-right:1px solid transparent; text-align:center;'>Min</td>
      </tr>";
for ($i=1; $i <= 13; $i++) {
  /* join is inserted to select the "last record" */
/*
  $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
					  FROM sensors
					  JOIN (SELECT id,sensor{$i}
					      FROM sensors
					      ORDER BY sensors.id DESC
					      LIMIT 1) lastTable";
  $resultQuery = mysqli_query($connect, $query);
  $resultRow=mysqli_fetch_assoc($resultQuery);
  */
  /*
  Data order
  Main room:
  1 - Sound
  2 - Gas
  3 - Light
  13 - Fire

  Red room:
  7 - Fire
  8 - Temperature
  9 - Humidity

  Blue room:
  10 - Fire
  11 - Smoke
  12 - Light

  Yellow room:
  4 - Gas
  5 - Temperature
  6 - Humidity
  */

  echo "<tr>";
  if($i == 1){
    $query = "SELECT lastTable.sensor1 AS lastRecord,MAX(sensors.sensor1) AS maxRecord,MIN(sensors.sensor1) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor1
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th rowspan='4' style='border-right:1px solid transparent; text-orientation: inherit; text-align:right;'>Main room</th>";
    echo "<th rowspan='4' ><img src='brace.png' height='130px'></th>";
    echo "<th class='tableTop'>Sound sensor</th>";
    $resultLast = (int)$resultRow['lastRecord']-100;
    $resultMax = (int)$resultRow['maxRecord']-100;
    $resultMin = (int)$resultRow['minRecord']-100;
    echo "<td class='tableTop'>{$resultLast} dB</td>";
    echo "<td class='tableTop'>{$resultMax} dB</td>";
    echo "<td class='tableTop'>{$resultMin} dB</td>";
  } else if ($i == 2) {
    $query = "SELECT lastTable.sensor2 AS lastRecord,MAX(sensors.sensor2) AS maxRecord,MIN(sensors.sensor2) AS minRecord
  					  FROM sensors
  					  JOIN (SELECT id,sensor2
  					      FROM sensors
  					      ORDER BY sensors.id DESC
  					      LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th>Gas</th>";
    $resultLast = (int)$resultRow['lastRecord']/2;
    $resultMax = (int)$resultRow['maxRecord']/2;
    $resultMin = (int)$resultRow['minRecord']/2;
    if($resultLast < 500){
      echo "<td>No gas ({$resultLast})</td>";
    } else {
      echo "<td>Gas detected ({$resultLast})</td>";
    }
    echo "<td>{$resultMax} smc</td>";
    echo "<td>{$resultMin} smc</td>";
  } elseif ($i == 3) {
    $query = "SELECT lastTable.sensor3 AS lastRecord,MAX(sensors.sensor3) AS maxRecord,MIN(sensors.sensor3) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor3
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th>Light</th>";
    $resultLast = (int)$resultRow['lastRecord']/2;
    $resultMax = (int)$resultRow['maxRecord']/2;
    $resultMin = (int)$resultRow['minRecord']/2;
    echo "<td>{$resultLast} lux</td>";
    echo "<td>{$resultMax} lux</td>";
    echo "<td>{$resultMin} lux</td>";
  } elseif ($i == 4) {
    $query = "SELECT lastTable.sensor13 AS lastRecord,MAX(sensors.sensor13) AS maxRecord,MIN(sensors.sensor13) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor13
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th>Fire</th>";
    $resultLast = (int)$resultRow['lastRecord']/2;
    $resultMax = (int)$resultRow['maxRecord']/2;
    $resultMin = (int)$resultRow['minRecord']/2;

    if($resultLast > 500){
      echo "<td>Fire detected ({$resultLast})</td>";
    } else {
      echo "<td>No fire ({$resultLast})</td>";
    }

    echo "<td>{$resultMax}</td>";
    echo "<td>{$resultMin}</td>";
  } elseif ($i == 5) {
    $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor{$i}
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th rowspan='3' style='border-right:1px solid transparent; text-orientation: inherit; text-align:right;'>Red room</th>";
    echo "<th rowspan='3' ><img src='brace.png' height='100px'></th>";
    echo "<th class='tableTop'>Fire</th>";
    $resultLast = (int)$resultRow['lastRecord']/2;
    $resultMax = (int)$resultRow['maxRecord']/2;
    $resultMin = (int)$resultRow['minRecord']/2;

    if($resultLast > 500){
      echo "<td class='tableTop'>Fire detected ({$resultLast})</td>";
    } else {
      echo "<td class='tableTop'>No fire ({$resultLast})</td>";
    }

    echo "<td class='tableTop'>{$resultMax}</td>";
    echo "<td class='tableTop'>{$resultMin}</td>";
  } elseif ($i == 6) {
    $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor{$i}
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th>Temperature</th>";

    $resultLast = round((int)$resultRow['lastRecord']-32*(5/9));
    $resultMax = round((int)$resultRow['maxRecord']-32*(5/9));
    $resultMin = round((int)$resultRow['minRecord']-32*(5/9));

    echo "<td>{$resultLast} °C</td>";
    echo "<td>{$resultMax} °C</td>";
    echo "<td>{$resultMin} °C</td>";
  } elseif ($i == 7) {
    $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
  					  FROM sensors
  					  JOIN (SELECT id,sensor{$i}
  					      FROM sensors
  					      ORDER BY sensors.id DESC
  					      LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th>Humidity</th>";
    $resultLast = (int)$resultRow['lastRecord']/2;
    $resultMax = (int)$resultRow['maxRecord']/2;
    $resultMin = (int)$resultRow['minRecord']/2;
    echo "<td>{$resultLast} %</td>";
    echo "<td>{$resultMax} %</td>";
    echo "<td>{$resultMin} %</td>";
  } elseif ($i == 8) {
    $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor{$i}
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th rowspan='3' style='border-right:1px solid transparent; text-orientation: inherit; text-align:right;'>Blue room</th>";
    echo "<th rowspan='3' ><img src='brace.png' height='100px'></th>";
    echo "<th class='tableTop'>Fire</th>";
    $resultLast = (int)$resultRow['lastRecord']/2;
    $resultMax = (int)$resultRow['maxRecord']/2;
    $resultMin = (int)$resultRow['minRecord']/2;
    if($resultLast > 500){
      echo "<td class='tableTop'>Fire detected ({$resultLast})</td>";
    } else {
      echo "<td class='tableTop'>No fire ({$resultLast})</td>";
    }
    echo "<td class='tableTop'>{$resultMax}</td>";
    echo "<td class='tableTop'>{$resultMin}</td>";
  } elseif ($i == 9) {
    $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor{$i}
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th>Smoke</th>";
    $resultLast = (int)$resultRow['lastRecord']/2;
    $resultMax = (int)$resultRow['maxRecord']/2;
    $resultMin = (int)$resultRow['minRecord']/2;

    echo "<td>No smoke ({$resultLast})</td>";
    echo "<td>{$resultMax}</td>";
    echo "<td>{$resultMin}</td>";
  } elseif ($i == 10) {
    $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
  					  FROM sensors
  					  JOIN (SELECT id,sensor{$i}
  					      FROM sensors
  					      ORDER BY sensors.id DESC
  					      LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th>Light</th>";
    $resultLast = (int)$resultRow['lastRecord']/2;
    $resultMax = (int)$resultRow['maxRecord']/2;
    $resultMin = (int)$resultRow['minRecord']/2;
    echo "<td>{$resultLast} lux</td>";
    echo "<td>{$resultMax} lux</td>";
    echo "<td>{$resultMin} lux</td>";
  } elseif ($i == 11) {
    $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor{$i}
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th rowspan='3' style='border-right:1px solid transparent; text-orientation: inherit; text-align:right;'>Yellow room</th>";
    echo "<th rowspan='3' ><img src='brace.png' height='100px'></th>";
    echo "<th class='tableTop'>Gas</th>";
    $resultLast = (int)$resultRow['lastRecord']/2;
    $resultMax = (int)$resultRow['maxRecord']/2;
    $resultMin = (int)$resultRow['minRecord']/2;
    if($resultLast < 500){
      echo "<td class='tableTop'>No gas ({$resultLast})</td>";
    } else {
      echo "<td class='tableTop'>Gas detected ({$resultLast})</td>";
    }
    echo "<td class='tableTop'>{$resultMax}</td>";
    echo "<td class='tableTop'>{$resultMin}</td>";
  } elseif ($i == 12) {
    $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor{$i}
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th>Temperature</th>";

    $resultLast = round((int)$resultRow['lastRecord']-32*(5/9));
    $resultMax = round((int)$resultRow['maxRecord']-32*(5/9));
    $resultMin = round((int)$resultRow['minRecord']-32*(5/9));

    echo "<td>{$resultLast} °C</td>";
    echo "<td>{$resultMax} °C</td>";
    echo "<td>{$resultMin} °C</td>";
  } elseif ($i == 13) {
    $query = "SELECT lastTable.sensor{$i} AS lastRecord,MAX(sensors.sensor{$i}) AS maxRecord,MIN(sensors.sensor{$i}) AS minRecord
              FROM sensors
              JOIN (SELECT id,sensor{$i}
                  FROM sensors
                  ORDER BY sensors.id DESC
                  LIMIT 1) lastTable";
    $resultQuery = mysqli_query($connect, $query);
    $resultRow=mysqli_fetch_assoc($resultQuery);

    echo "<th style='border-bottom: 1px solid black;'>Humidity</th>";
    $resultLast = (int)$resultRow['lastRecord']/40;
    $resultMax = (int)$resultRow['maxRecord']/40;
    $resultMin = (int)$resultRow['minRecord']/40;
    echo "<td style='border-bottom: 1px solid black;'>{$resultLast} %</td>";
    echo "<td style='border-bottom: 1px solid black;'>{$resultMax} %</td>";
    echo "<td style='border-bottom: 1px solid black;'>{$resultMin} %</td>";
  } else {
    $sensorName = "Too many sensors";
  }
  echo "</tr>";
}
echo "</table>";
 ?>
