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
            ->to("jkiprotich@intellisoftkenya.com")
            ->subject(Text::insert("Test Email", "This is a sample text file: Just a check if the credentials are working well"));
        $this->Email->send(Text::insert("This is a sample text email: Just a check if the credentials are working well","hey"));
        $this->out('Hello world.');
    }
}
