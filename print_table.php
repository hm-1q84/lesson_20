<?php
  function print_table($conn, $sql) {
    $counter = 0;
    $result = $conn->query($sql);
    $fields = $result->fetch_fields();
    echo "<table>";
    echo "<tr>";
    foreach ($fields as $field) {
      echo "<th>".$field->name."</th>";
    }
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    foreach ($conn->query($sql) as $row) {
      echo "<tr>";
      $counter++;
      foreach ($fields as $field) {
        echo "<td>".$row[$field->name]."</td>";
      }
      echo "<td><a href='main.php?action=edit&id=".$row[$fields[0]->name]."&c_n=".$row[$fields[1]->name]."&c_t=".$row[$fields[2]->name]."&c_r=".$row[$fields[3]->name]."&counter=".$counter."'>edit</a></td>";
      echo "<td><a href='main.php?action=delete&id=".$row[$fields[0]->name]."'>delete</a></td>";
      echo "</tr>";
    }
    echo "</table>";
  }
?>