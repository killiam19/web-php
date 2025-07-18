<?php

/**
 * Controller for creating new links/projects.
 * Handles form submission, validation, and database insertion.
 */

$title = 'Registrar proyecto';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the incoming POST data with rules for each field
    $validator = new Validator($_POST, [
        'title' => 'required|min:3|max:190',
        'url' => 'required|url|max:190',
        'description' => 'required|min:3|max:500',
    ]);

    // If validation passes, insert the new link into the database
    if ($validator->passes()) {
        $db->query(
            'INSERT INTO links (title, url, description) VALUES (:title, :url, :description)',
            [
                'title'       => $_POST['title'],
                'url'         => $_POST['url'],
                'description' => $_POST['description'],
            ]
        );

        // Redirect to the links listing page after successful insertion
        header('Location: /links');
        exit;
    } else {
        // Collect validation errors to display back to the user
        $errors = $validator->errors();
    }
}

// Load the template for the link creation form
require __DIR__ . '/../../resources/links-create.template.php';
