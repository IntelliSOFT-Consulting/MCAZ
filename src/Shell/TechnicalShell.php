<?php
namespace App\Shell;

use Cake\Console\Shell; 

/**
 * Technical shell command.
 */
class TechnicalShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
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
    public function main()
    {
        echo "****************************************************************\n";
        $this->loadModel('Queue.QueuedJobs'); 
        // generate the data for the queue
        $data = [
            'email' => 'jkiprotich@intellisoftkenya.com',
            'subject' => 'Technical Capacity Building Imeja ',
            'body' => __('Technical Capacity Building (TCB) is the process of improving and strengthening the technical skills, knowledge, and abilities of individuals, organizations, or communities. It aims to enhance the capability of people to efficiently and effectively perform their technical functions and duties, and improve the quality of work output. TCB can take many forms, including training programs, mentoring, coaching, knowledge-sharing sessions, and development of technical manuals and guidelines. The ultimate goal of TCB is to increase productivity, improve service delivery, and promote sustainable development. TCB is particularly important in fields such as engineering, science, health care, and information technology, where technical skills and knowledge are critical for success.'),
        ];
        // create the queue job [Requires a Task and data]
        $this->QueuedJobs->createJob('Technical', $data);
        echo "End of QueuedJobs";
        echo "****************************************************************\n";

    }
}
