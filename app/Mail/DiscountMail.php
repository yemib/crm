<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProjectMail
 */
class DiscountMail extends Mailable
{
    use Queueable, SerializesModels;

    public $link;

    public $name  ;


    /**
     * ProjectMail constructor.
     *
     * @param  Project  $project
     * @param $projectMember
     */
    public function __construct($link)
    {
        $this->link = $link;
        $this->name  =  "Cutrico";

    }

    /**
     * @return ProjectMail
     */
    public function build()
    {
    return $this->from(config('mail.from.address'))
            ->subject('Discount Approval')
            ->markdown('emails.discount'); 

/* 
            return $this->view('emails.discount')
            ->with([
                'link' => $this->link,
            ]); */
    }
}
