<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usn = $_POST['usn'];
    $studentName = $_POST['studentName'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $college = $_POST['college'];
    $date = $_POST['date'];
    $signature = $_POST['signature'];
    $subjectCodes = $_POST['subjectCode'];
    $subjectNames = $_POST['subjectName'];
    $statuses = $_POST['status'];
    $fees = $_POST['feeAmount'];
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoPath = 'uploads/' . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="header-center">
                <h1>VISVESVARAYA TECHNOLOGICAL UNIVERSITY, BELAGAVI</h1>
                <h2>UG Student Application Form</h2>
            </div>
        </header>
        <section class="form-section">
            <h3>Student Details</h3>
            <table>
                <tr><th>USN</th><td><?= htmlspecialchars($usn) ?></td></tr>
                <tr><th>Student Name</th><td><?= htmlspecialchars($studentName) ?></td></tr>
                <tr><th>Branch Code</th><td><?= htmlspecialchars($branch) ?></td></tr>
                <tr><th>Semester</th><td><?= htmlspecialchars($semester) ?></td></tr>
                <tr><th>College</th><td><?= htmlspecialchars($college) ?></td></tr>
                <tr><th>Photo</th><td><img src="<?= $photoPath ?>" alt="Student Photo" width="100"></td></tr>
            </table>
        </section>
        <section class="form-section">
            <h3>Regular Subjects</h3>
            <table>
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($subjectCodes); $i++): ?>
                        <tr>
                            <td><?= htmlspecialchars($subjectCodes[$i]) ?></td>
                            <td><?= htmlspecialchars($subjectNames[$i]) ?></td>
                            <td><?= htmlspecialchars($statuses[$i]) ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </section>
        <section class="form-section">
            <h3>Fee Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Description</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fees as $index => $fee): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td>Fee Item <?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($fee) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section class="form-footer">
            <p>Date: <?= htmlspecialchars($date) ?></p>
            <p>Signature: <?= htmlspecialchars($signature) ?></p>
        </section>
    </div>
</body>
</html>
<?php
}
?>
