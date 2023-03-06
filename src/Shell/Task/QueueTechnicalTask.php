<?php

namespace App\Shell\Task;

use Cake\Console\Shell;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Utility\Text;
use Queue\Shell\Task\QueueTask;

/**
 * QueueTechnical shell task.
 */
class QueueTechnicalTask extends QueueTask
{
    

    public function run(array $data, $id)
    {
        $this->Email = new Email('default');
        $this->Email->emailFormat('html')->to($data['email'])->subject(Text::insert($data['subject'],[]));
        $this->Email->send(Text::insert($data['body'],[]));
        $this->out('Email Sent!!.');
    }
}
