<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class SitesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['view']);
    }

    public function view($id = null)
    {           
        $site = $this->Sites->find('all', [
            'contain' => []
        ])->where(['description' => $id])->first();

        
        if (!empty($site)) {
            $this->set('site', $site);
            $this->set('_serialize', ['site']);
            return;
        
        } else {
            $this->response->body('Failed to get page with name!!');
            $this->response->statusCode(404);
            $this->set([
                'message' => 'Web page '.$id.' does not exist', 
                '_serialize' => ['message']]);
            return;
        }
        
    }
}
