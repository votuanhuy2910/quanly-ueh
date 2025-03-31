<?php

function getSetting($conn)
{
  $sql = "SELECT * FROM admin";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() == 1) {
    $admin = $stmt->fetch();
    return $admin;
  } else {
    return 0;
  }
}
