<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Cake\Mailer\Email;
use Queue\Shell\Task\QueueTask;

/**
 * Imeja shell task.
 */
class ImejaTask extends QueueTask
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function run(array $data, $jobId)
    {
        $this->Email = new Email('default');
        $this->Email->emailFormat('html')
        ->to($data['email'])->subject($data['subject']);
        $this->Email->send(Text::insert($data['body'],[]));
        $this->out('Email Sent!!.'); 
    }
}
