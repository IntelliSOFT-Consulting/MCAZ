<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Mailer\Email;
use Cake\Utility\Text;

class HelloShell extends Shell
{
    public function main()
    {
        
        $this->Email = new Email('default');
        $this->Email
            ->emailFormat('html')  
        //    ->to('jkiprotich@intellisoftkenya.com')
        ->to('lchirinda@gmail.com')
            ->subject(Text::insert("Email Configuration", "Email Configuration"));
        $this->Email->send(Text::insert("Test Email Configuration","Test Email Configuration"));
        $this->out('Email Sent!!.');
    }
}
