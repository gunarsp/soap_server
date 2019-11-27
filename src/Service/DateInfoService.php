<?php

namespace App\Service;

class DateInfoService
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function dateinfo()
    {
        return date('Y-m-d H:i:s');
    }
}
