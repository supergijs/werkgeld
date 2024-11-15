<?php

return function ($kirby, $page) {
    $alerts  = [];
    $success = '';

    if ($kirby->request()->is('post') && get('submit')) {

        // CSRF Protection
        // if (!csrf('validate')) {
        //     $alerts['csrf'] = 'Invalid CSRF token.';
        // }

        // Retrieve submitted data
        $name    = get('name');
        $email   = get('email');
        $comment = get('comment');
        $date    = date('Y-m-d');
        $time    = date('H:i:s');
        
        // Validation
        if (empty($name) || strlen($name) < 3) {
            $alerts['name'] = 'Please enter a valid name (minimum 3 characters).';
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $alerts['email'] = 'Please enter a valid email address.';
        }

        if (empty($comment) || strlen($comment) < 3 || strlen($comment) > 3000) {
            $alerts['comment'] = 'Please enter a comment between 3 and 3000 characters.';
        }

        if (empty($alerts)) {
            try {
                // Impersonate to allow writing
                $kirby->impersonate('kirby');

                // Define the path to the comments file
                $filePath = kirby()->root('content') . '/site.txt';

                // Prepare the new comment in YAML format with exact indentation
                $newComment = "- \n" .
                              "  commentname: \"" . addslashes(htmlspecialchars($name, ENT_QUOTES, 'UTF-8')) . "\"\n" .
                              "  commentemail: \"" . addslashes(htmlspecialchars($email, ENT_QUOTES, 'UTF-8')) . "\"\n" .
                              "  commentcontent: \"" . $comment . "\"\n" .
                              "  commentdate: " . $date . " " . $time . "\n" .
                              "  commentpublished: false\n";

                // Read the existing content of the file
                $fileContents = file_get_contents($filePath);

                if ($fileContents === false) {
                    throw new Exception('Unable to read the comments file.');
                }

                // Define the marker for the Comments section
                $commentsMarker = "Comments:";

                // Find the position of the "Comments:" line
                $commentsPos = strpos($fileContents, $commentsMarker);

                if ($commentsPos === false) {
                    throw new Exception('Comments section not found in the file.');
                }

                // Find the position of the closing delimiter (assuming '----' is used)
                $closingDelimiter = "\n----";
                $closingPos = strpos($fileContents, $closingDelimiter, $commentsPos);

                if ($closingPos === false) {
                    // If closing delimiter not found, append the new comment at the end of Comments section
                    // Find the end of 'Comments:' line
                    $commentsEndPos = strpos($fileContents, "\n", $commentsPos);
                    if ($commentsEndPos === false) {
                        throw new Exception('Malformed Comments section.');
                    }

                    // Insert the new comment after 'Comments:' line
                    $insertion = "\n" . $newComment;
                    $updatedContent = substr_replace($fileContents, $insertion, $commentsEndPos, 0);
                } else {
                    // Insert the new comment before the closing delimiter '----'
                    // Ensure there's exactly one newline before the new comment
                    $insertion = "" . $newComment;
                    $updatedContent = substr_replace($fileContents, $insertion, $closingPos, 0);
                }

                // Write the updated content back to the file
                $result = file_put_contents($filePath, $updatedContent, LOCK_EX);

                if ($result === false) {
                    throw new Exception('Unable to write to the comments file.');
                }

                $success = 'Your comment has been added successfully!';
            } catch (Exception $e) {
                $alerts['error'] = 'Failed to save your comment. Please try again later.';
                // Optionally log the error message for debugging
                // error_log($e->getMessage());
            }
        }
    }

    return compact('alerts', 'success');
};

