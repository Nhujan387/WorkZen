<?php
// Assuming you have established a database connection
include 'database_configure.php';
// Get the seeker's skills from the seekerresume table
$seekerId = 5; // Replace with the actual seeker ID
$query = "SELECT skill FROM seekerresume WHERE Seeker_id = $seekerId";
$result = mysqli_query($conn, $query);

if ($result) {
  // Fetch the skills of the seeker
  $skills = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $skills[] = $row['skill'];
  }

  // Generate a comma-separated string of skills for the SQL query
  $skillsString = "'" . implode("', '", $skills) . "'";

  // Retrieve job postings that match the seeker's skills
  $query = "SELECT job_id, title, description, location, salary, skills
            FROM job_postings
            WHERE skills IN ($skillsString)";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // Display the recommended jobs
    while ($row = mysqli_fetch_assoc($result)) {
      echo "Job ID: " . $row['job_id'] . "<br>";
      echo "Title: " . $row['title'] . "<br>";
      echo "Description: " . $row['description'] . "<br>";
      echo "Location: " . $row['location'] . "<br>";
      echo "Salary: " . $row['salary'] . "<br><br>";
    }
  } else {
    echo "Error retrieving job postings: " . mysqli_error($conn);
  }
} else {
  echo "Error retrieving seeker's skills: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>