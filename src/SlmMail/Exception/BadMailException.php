<?php

namespace SlmMail\Exception;
use Application\Library\Exception\FormaevaException;

class BadMailException extends FormaevaException
{

    protected $httpStatusCode = 402;
    
    protected $title;
    
    protected $badMail;

    public function __construct($badMail)
    {
        $this->badMail = $badMail;
        parent::__construct( $this->getExceptionMessage(), $this->httpStatusCode );
    }

    public function getTitle()
    {
        if ( $this->title == NULL ) {
            $this->title = "Sender's e-mail error";
        }
        return $this->title;
    }

    protected function getExceptionMessage()
    {
        return "The sender's mail isn't valid : $this->badMail";
    }
}