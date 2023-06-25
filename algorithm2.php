<?php
// Job postings data
$jobPostings = [
    [
        'job_id' => 1,
        'employer_id' => 1,
        'title' => 'Software Developer',
        'description' => 'We are seeking a skilled software developer to join our team.',
        'requirements' => 'Requirements: Bachelor\'s degree in Computer Science, proficiency in Java and SQL.',
        'location' => 'New York',
        'salary' => '75000.00',
        'date_posted' => '2023-06-18',
        'skills' => 'HTML',
        'status' => '1'
    ],
    [
        'job_id' => 2,
        'employer_id' => 1,
        'title' => 'Graphic Designer',
        'description' => 'We are looking for a talented graphic designer to create visually appealing designs.',
        'requirements' => 'Requirements: Bachelor\'s degree in Graphic Design, proficiency in Adobe Creative Suite.',
        'location' => 'Los Angeles',
        'salary' => '60000.00',
        'date_posted' => '2023-06-19',
        'skills' => 'Photoshop',
        'status' => '1'
    ],
    // Add more job postings here...
];

// User data
$userData = [
    'user_id' => 15,
    'FullName' => 'John Doe',
    'EmailAddress' => 'john@example.com',
    'Contact' => 123456789,
    'Country' => 'United States',
    'Provience' => 'California',
    'City' => 'Los Angeles',
    'Address' => '123 Main St',
    'pdffile' => 'cv_file.pdf',
    'image' => 'profile_image.jpg',
    'Seeker_id' => 3,
    'Education' => 'Bachelor of Science',
    'Workexp' => '3 years',
    'skill' => 'HTML, CSS, JavaScript'
];

// Function to recommend jobs to the user based on skills
function recommendJobs($jobPostings, $userData) {
    $userSkills = explode(', ', $userData['skill']);
    $recommendedJobs = [];

    foreach ($jobPostings as $job) {
        $jobSkills = explode(', ', $job['skills']);
        $matchingSkills = array_intersect($userSkills, $jobSkills);

        if (count($matchingSkills) === count($userSkills)) {
            $job['matching_skill_count'] = count($matchingSkills);
            $recommendedJobs[] = $job;
        }
    }

    usort($recommendedJobs, function($a, $b) {
        return $b['matching_skill_count'] - $a['matching_skill_count'];
    });

    return $recommendedJobs;
}

// Get job recommendations for the user
$recommendedJobs = recommendJobs($jobPostings, $userData);

// Display recommended jobs
if (!empty($recommendedJobs)) {
    echo "Recommended Jobs:<br>";
    foreach ($recommendedJobs as $job) {
        echo "Job Title: " . $job['title'] . "<br>";
        echo "Description: " . $job['description'] . "<br>";
        echo "Requirements: " . $job['requirements'] . "<br>";
        echo "Location: " . $job['location'] . "<br>";
        echo "Salary: " . $job['salary'] . "<br>";
        echo "Date Posted: " . $job['date_posted'] . "<br>";
        echo "<br>";
    }
} else {
    echo "No job recommendations found.";
}
?>
