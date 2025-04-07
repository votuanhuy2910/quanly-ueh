<?php
// All Students 
function getAllStudents($conn)
{
  $sql = "SELECT * FROM students";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudentsK51($conn)
{
  $sql = "SELECT * FROM students51";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudentsK50($conn)
{
  $sql = "SELECT * FROM students50";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudentsK49($conn)
{
  $sql = "SELECT * FROM students49";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudentsK48($conn)
{
  $sql = "SELECT * FROM students48";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students48 = $stmt->fetchAll();
    return $students48;
  } else {
    return 0;
  }
}

function getAllStudentsK47($conn)
{
  $sql = "SELECT * FROM students47";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudentsK46($conn)
{
  $sql = "SELECT * FROM students46";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudentsK45($conn)
{
  $sql = "SELECT * FROM students45";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudentsK44($conn)
{
  $sql = "SELECT * FROM students44";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudentsK43($conn)
{
  $sql = "SELECT * FROM students43";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

// DELETE
function removeStudent($id, $conn)
{
  $sql1  = "DELETE FROM students WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudentK51($id, $conn)
{
  $sql1  = "DELETE FROM students51 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudent50($id, $conn)
{
  $sql1  = "DELETE FROM students50 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudentK49($id, $conn)
{
  $sql1  = "DELETE FROM students49 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudentK48($id, $conn)
{
  $sql1  = "DELETE FROM students48 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudentK47($id, $conn)
{
  $sql1  = "DELETE FROM students47 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudentK46($id, $conn)
{
  $sql1  = "DELETE FROM students46 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudentK45($id, $conn)
{
  $sql1  = "DELETE FROM students45 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudentK44($id, $conn)
{
  $sql1  = "DELETE FROM students44 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudentK43($id, $conn)
{
  $sql1  = "DELETE FROM students43 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

// Get Student By Id 
function getStudentById($id, $conn)
{
  $sql = "SELECT * FROM students
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}

function getStudentByIdK51($id, $conn)
{
  $sql = "SELECT * FROM students51
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}

function getStudentByIdK50($id, $conn)
{
  $sql = "SELECT * FROM students50
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}

function getStudentByIdK49($id, $conn)
{
  $sql = "SELECT * FROM students49
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}

function getStudentByIdK48($id, $conn)
{
  $sql = "SELECT * FROM students48
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}

function getStudentByIdK47($id, $conn)
{
  $sql = "SELECT * FROM students47
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}

function getStudentByIdK46($id, $conn)
{
  $sql = "SELECT * FROM students46
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}

function getStudentByIdK45($id, $conn)
{
  $sql = "SELECT * FROM students45
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}

function getStudentByIdK44($id, $conn)
{
  $sql = "SELECT * FROM students44
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}

function getStudentByIdK43($id, $conn)
{
  $sql = "SELECT * FROM students43
           WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    return $student;
  } else {
    return 0;
  }
}


// Check if the username Unique
function unameIsUnique($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

function unameIsUniqueK51($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students51
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

function unameIsUniqueK50($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students50
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

function unameIsUniqueK49($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students49
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

function unameIsUniqueK48($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students48
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

function unameIsUniqueK47($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students47
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

function unameIsUniqueK46($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students46
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

function unameIsUniqueK45($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students45
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

function unameIsUniqueK44($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students44
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

function unameIsUniqueK43($admission_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, mssv, student_id FROM students43
           WHERE admission_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $mssv]);

  if ($student_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $student = $stmt->fetch();
      if ($student['student_id'] == $student_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}

// Search 
function searchStudents($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudentsK51($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students51
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudentsK50($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students50
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudentsK49($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students49
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudentsK48($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students48
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudentsK47($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students47
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudentsK46($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students46
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudentsK45($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students45
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudentsK44($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students44
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudentsK43($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM students43
            WHERE CAST(student_id AS CHAR) LIKE ?
               OR admission_num LIKE ?
               OR mssv LIKE ?
               OR fname LIKE ?
               OR lname LIKE ?
               OR status = ?
               OR note LIKE ?
               OR CONCAT(fname, ' ', lname) LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}
