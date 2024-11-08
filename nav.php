<nav>
    <a class="<?php
    if ($pathParts['filename'] == "index") {
        print 'activePage';
    }
    ?>" href="index.php">Home</a>

    <a class="<?php
    if ($pathParts['filename'] == "about") {
        print 'activePage';
    }
    ?>" href="about.php">About Us</a>
    
    <a class="<?php
    if ($pathParts['filename'] == "array") {
        print 'activePage';
    }
    ?>" href="array.php">Book Archive</a>

    <a class="<?php
    if ($pathParts['filename'] == "form") {
        print 'activePage';
    }
    ?>" href="form.php">Response Form</a>
</nav>
