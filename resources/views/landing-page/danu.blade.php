<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
		<a href="{{ route('logout') }}" class="dropdown-item">Log Out</a>
        <h1 class="text-primary">Curriculum Vitae</h1>
        <div class="contact-info bg-light p-3 mb-3">
            <h2>Contact Information</h2>
            <p>Name: John Doe</p>
            <p>Email: john@example.com</p>
            <p>Phone: (123) 456-7890</p>
            <p>Address: 123 Main St, City, State, Zip</p>
        </div>

        <div class="education bg-light p-3 mb-3">
            <h2>Education</h2>
            <ul>
                <li>
                    <strong>University of XYZ</strong>
                    <p>Bachelor of Science in Computer Science</p>
                    <p>Graduated: May 20XX</p>
                </li>
            </ul>
        </div>

        <div class="experience bg-light p-3 mb-3">
            <h2>Work Experience</h2>
            <ul>
                <li>
                    <strong>ABC Company</strong>
                    <p>Software Engineer</p>
                    <p>June 20XX - Present</p>
                    <p>Responsibilities:</p>
                    <ul>
                        <li>Developing web applications</li>
                        <li>Collaborating with cross-functional teams</li>
                    </ul>
                </li>
                <li>
                    <strong>DEF Corporation</strong>
                    <p>Intern</p>
                    <p>May 20XX - August 20XX</p>
                    <p>Responsibilities:</p>
                    <ul>
                        <li>Assisting with software testing</li>
                        <li>Learning about software development processes</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="skills bg-light p-3 mb-3">
            <h2>Skills</h2>
            <ul>
                <li>Programming Languages: Java, Python, JavaScript</li>
                <li>Web Development: HTML, CSS, PHP</li>
                <li>Database Management: MySQL, MongoDB</li>
                <li>Version Control: Git</li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
