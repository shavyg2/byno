<?php

class MailController
{

    public function receive()
    {
        if (empty($_POST)) {
            return header("location:/contact");
            exit;
        }

        $name = "No name provided";
        $email = "No Email Provided";
        $phone = "No Phone Provided";
        $message = "No Message";


        if (isset($_POST['tel'])) {
            $phone = ($_POST['tel']);
        }

        if (isset($_POST['message'])) {
            $message = ($_POST['message']);
        }

        if (isset($_POST['email'])) {
            $email = ($_POST['email']);
        }

        if (isset($_POST['name'])) {
            $name = ($_POST['name']);
        }

        $msg = sprintf("Byno.ca has been sent a message from\nFrom: $name\nEmail: $email\nMessage:\n$message\n\nTel:$phone\n");

        $result = mail("info@noblelaw.ca", "Byno.ca Message", $msg);
        ?>

        <h1>Appointment Sent</h1>

        <?php if ($result): ?>
        <p>
            Appointment has been made
        </p>
        <?php else: ?>
            <p>
                Error occurred appointment could not be sent
            </p>
        <?php endif ?>
        
        <p>Back <a href="/">home</a></p>
        <?php
    }
}
