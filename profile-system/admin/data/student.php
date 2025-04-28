<?php
function getStudentByIdFromTable($student_id, $table, $conn)
{
  $allowedTables = ['students', 'students1', 'students2', 'students3', 'students4', 'students5', 'students6', 'students7', 'students8'];

  if (!in_array($table, $allowedTables)) {
    return 0; // tránh SQL Injection nếu table name không hợp lệ
  }

  $sql = "SELECT * FROM $table WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$student_id]);

  if ($stmt->rowCount() == 1) {
    return $stmt->fetch();
  }
  return 0;
}

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

function getAllStudents1($conn)
{
  $sql = "SELECT * FROM students1";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudents2($conn)
{
  $sql = "SELECT * FROM students2";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudents3($conn)
{
  $sql = "SELECT * FROM students3";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudents4($conn)
{
  $sql = "SELECT * FROM students4";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudents5($conn)
{
  $sql = "SELECT * FROM students5";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $studentsk = $stmt->fetchAll();
    return $studentsk;
  } else {
    return 0;
  }
}

function getAllStudents6($conn)
{
  $sql = "SELECT * FROM students6";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudents7($conn)
{
  $sql = "SELECT * FROM students7";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  } else {
    return 0;
  }
}

function getAllStudents8($conn)
{
  $sql = "SELECT * FROM students8";
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

function removeStudent1($id, $conn)
{
  $sql1  = "DELETE FROM students1 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudent2($id, $conn)
{
  $sql1  = "DELETE FROM students2 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudent3($id, $conn)
{
  $sql1  = "DELETE FROM students3 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudent4($id, $conn)
{
  $sql1  = "DELETE FROM students4 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudent5($id, $conn)
{
  $sql1  = "DELETE FROM students5 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudent6($id, $conn)
{
  $sql1  = "DELETE FROM students6 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudent7($id, $conn)
{
  $sql1  = "DELETE FROM students7 WHERE student_id=?";
  $stmt1 = $conn->prepare($sql1);
  $result1 = $stmt1->execute([$id]);

  return $result1;
}

function removeStudent8($id, $conn)
{
  $sql1  = "DELETE FROM students8 WHERE student_id=?";
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

function getStudentById1($id, $conn)
{
  $sql = "SELECT * FROM students1
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

function getStudentById2($id, $conn)
{
  $sql = "SELECT * FROM students2
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

function getStudentById3($id, $conn)
{
  $sql = "SELECT * FROM students3
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

function getStudentById4($id, $conn)
{
  $sql = "SELECT * FROM students4
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

function getStudentById5($id, $conn)
{
  $sql = "SELECT * FROM students5
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

function getStudentById6($id, $conn)
{
  $sql = "SELECT * FROM students6
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

function getStudentById7($id, $conn)
{
  $sql = "SELECT * FROM students7
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

function getStudentById8($id, $conn)
{
  $sql = "SELECT * FROM students8
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
function unameIsUnique($admission_num, $profile_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, profile_num, mssv, student_id FROM students
          WHERE admission_num=? AND profile_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $profile_num, $mssv]);

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

function unameIsUnique1($admission_num, $profile_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, profile_num, mssv, student_id FROM students1
          WHERE admission_num=? AND profile_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $profile_num, $mssv]);

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

function unameIsUnique2($admission_num, $profile_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, profile_num, mssv, student_id FROM students2
          WHERE admission_num=? AND profile_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $profile_num, $mssv]);

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

function unameIsUnique3($admission_num, $profile_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, profile_num, mssv, student_id FROM students3
          WHERE admission_num=? AND profile_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $profile_num, $mssv]);

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

function unameIsUnique4($admission_num, $profile_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, profile_num, mssv, student_id FROM students4
          WHERE admission_num=? AND profile_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $profile_num, $mssv]);

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

function unameIsUnique5($admission_num, $profile_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, profile_num, mssv, student_id FROM students5
          WHERE admission_num=? AND profile_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $profile_num, $mssv]);

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

function unameIsUnique6($admission_num, $profile_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, profile_num, mssv, student_id FROM students6
          WHERE admission_num=? AND profile_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $profile_num, $mssv]);

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

function unameIsUnique7($admission_num, $profile_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, profile_num, mssv, student_id FROM students7
          WHERE admission_num=? AND profile_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $profile_num, $mssv]);

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

function unameIsUnique8($admission_num, $profile_num, $mssv,  $conn, $student_id = 0)
{
  $sql = "SELECT admission_num, profile_num, mssv, student_id FROM students8
          WHERE admission_num=? AND profile_num=? AND mssv=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$admission_num, $profile_num, $mssv]);

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
  $key_escaped = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  // Tạo key cho LIKE và key cho so sánh chính xác
  $key_like = "%$key_escaped%";
  $key_exact = $key;

  $sql = "SELECT * FROM students
            WHERE admission_num = ?
                OR mssv = ?
                OR fname LIKE ?
                OR status = ?
                OR note LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key_exact, $key_exact, $key_like, $key_exact, $key_like]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudents1($key, $conn)
{
  $key_escaped = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  // Tạo key cho LIKE và key cho so sánh chính xác
  $key_like = "%$key_escaped%";
  $key_exact = $key;

  $sql = "SELECT * FROM students1
            WHERE admission_num = ?
                OR mssv = ?
                OR fname LIKE ?
                OR status = ?
                OR note LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key_exact, $key_exact, $key_like, $key_exact, $key_like]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudents2($key, $conn)
{
  $key_escaped = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  // Tạo key cho LIKE và key cho so sánh chính xác
  $key_like = "%$key_escaped%";
  $key_exact = $key;

  $sql = "SELECT * FROM students2
            WHERE admission_num = ?
                OR mssv = ?
                OR fname LIKE ?
                OR status = ?
                OR note LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key_exact, $key_exact, $key_like, $key_exact, $key_like]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudents3($key, $conn)
{
  $key_escaped = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  // Tạo key cho LIKE và key cho so sánh chính xác
  $key_like = "%$key_escaped%";
  $key_exact = $key;

  $sql = "SELECT * FROM students3
            WHERE admission_num = ?
                OR mssv = ?
                OR fname LIKE ?
                OR status = ?
                OR note LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key_exact, $key_exact, $key_like, $key_exact, $key_like]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudents4($key, $conn)
{
  $key_escaped = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  // Tạo key cho LIKE và key cho so sánh chính xác
  $key_like = "%$key_escaped%";
  $key_exact = $key;

  $sql = "SELECT * FROM students4
            WHERE admission_num = ?
                OR mssv = ?
                OR fname LIKE ?
                OR status = ?
                OR note LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key_exact, $key_exact, $key_like, $key_exact, $key_like]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudents5($key, $conn)
{
  $key_escaped = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  // Tạo key cho LIKE và key cho so sánh chính xác
  $key_like = "%$key_escaped%";
  $key_exact = $key;

  $sql = "SELECT * FROM students5
            WHERE admission_num = ?
                OR mssv = ?
                OR fname LIKE ?
                OR status = ?
                OR note LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key_exact, $key_exact, $key_like, $key_exact, $key_like]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudents6($key, $conn)
{
  $key_escaped = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  // Tạo key cho LIKE và key cho so sánh chính xác
  $key_like = "%$key_escaped%";
  $key_exact = $key;

  $sql = "SELECT * FROM students6
            WHERE admission_num = ?
                OR mssv = ?
                OR fname LIKE ?
                OR status = ?
                OR note LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key_exact, $key_exact, $key_like, $key_exact, $key_like]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudents7($key, $conn)
{
  $key_escaped = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  // Tạo key cho LIKE và key cho so sánh chính xác
  $key_like = "%$key_escaped%";
  $key_exact = $key;

  $sql = "SELECT * FROM students7
            WHERE admission_num = ?
                OR mssv = ?
                OR fname LIKE ?
                OR status = ?
                OR note LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key_exact, $key_exact, $key_like, $key_exact, $key_like]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}

function searchStudents8($key, $conn)
{
  $key_escaped = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  // Tạo key cho LIKE và key cho so sánh chính xác
  $key_like = "%$key_escaped%";
  $key_exact = $key;

  $sql = "SELECT * FROM students8
            WHERE admission_num = ?
                OR mssv = ?
                OR fname LIKE ?
                OR status = ?
                OR note LIKE ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key_exact, $key_exact, $key_like, $key_exact, $key_like]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả
}
