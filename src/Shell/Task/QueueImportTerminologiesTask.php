<?php
/**
 * @author eddyokemwa@gmail.com
 * @link http://github.com/zipate
 */

namespace App\Shell\Task;

use Cake\Mailer\Email;
use Queue\Shell\Task\QueueTask;
use Cake\Log\Log;
use Cake\Utility\Text;
use Cake\Datasource\ConnectionManager;

/**
 * Send registration emails.
 */
class QueueImportTerminologiesTask extends QueueTask {

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('WhoDrugs');
    }

    /* Timeout for run, after which the Task is reassigned to a new worker.     */
    public $timeout = 10;

    /* Number of times a failed instance of this task should be restarted before giving up. */
    public $retries = 3;

    /**
     * @param array $data The array passed to QueuedJobsTable::createJob()
     * @param int $jobId The id of the QueuedJob entity
     * @return bool Success
     */
    public function run(array $data, $jobId) {
        //Log::write('debug', 'Notification to ::: '.$data['email_address']);
        // Log::write('debug', $data['vars']['user']);
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('delete
                                    from meddras using meddras,
                                        meddras e1
                                    where meddras.id > e1.id
                                        and meddras.terminology = e1.terminology ');

        Log::write('debug', 'IMPORT DRUGS ::: delete duplicates');
        return true;
    }

}
