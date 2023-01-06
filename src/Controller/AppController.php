<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    use \Crud\Controller\ControllerTrait;

    public $sadr_contain = [
        'SadrListOfDrugs', 'SadrOtherDrugs', 'Attachments', 'RequestReporters', 'RequestEvaluators', 'Reactions',
        'Reviews', 'Reviews.Users', 'Reviews.SadrComments', 'Reviews.SadrComments.Attachments',
        'Committees', 'Committees.Users', 'Committees.SadrComments', 'Committees.SadrComments.Attachments',
        'ReportStages',
        'SadrFollowups', 'SadrFollowups.SadrListOfDrugs', 'SadrFollowups.Attachments',
        'OriginalSadrs', 'OriginalSadrs.SadrListOfDrugs', 'OriginalSadrs.Attachments', 'OriginalSadrs.Reactions',
        'InitialSadrs', 'InitialSadrs.SadrListOfDrugs', 'InitialSadrs.Attachments', 'InitialSadrs.Reactions'
    ];

    public $aefi_contain = [
        'AefiListOfVaccines', 'Attachments', 'AefiCausalities', 'AefiFollowups', 'RequestReporters', 'RequestEvaluators',
        'AefiCausalities.Users', 'AefiComments', 'AefiComments.Attachments',
        'Committees', 'Committees.Users', 'Committees.AefiComments', 'Committees.AefiComments.Attachments',
        'ReportStages', 'AefiReactions',
        'AefiFollowups.AefiListOfVaccines', 'AefiFollowups.Attachments',
        'OriginalAefis', 'OriginalAefis.AefiListOfVaccines', 'OriginalAefis.Attachments',
        'InitialAefis', 'InitialAefis.AefiListOfVaccines', 'InitialAefis.Attachments'
    ];

    public $saefi_contain = [
        'SaefiListOfVaccines', 'AefiListOfVaccines', 'Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees',
        'SaefiComments', 'SaefiComments.Attachments',
        'Committees.Users', 'Committees.SaefiComments', 'Committees.SaefiComments.Attachments',
        'ReportStages', 'AefiCausalities', 'AefiCausalities.Users', 'Reports','SaefiReactions',
        'OriginalSaefis', 'OriginalSaefis.SaefiListOfVaccines', 'OriginalSaefis.Attachments', 'OriginalSaefis.Reports','OriginalSaefis.SaefiReactions',
        'InitialSaefis', 'InitialSaefis.SaefiListOfVaccines', 'InitialSaefis.Attachments', 'InitialSaefis.Reports','InitialSaefis.SaefiReactions'
        
    ];

    public $adr_contain = [
        'AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'Attachments', 'RequestReporters', 'RequestEvaluators',
        'Reviews', 'Reviews.Users', 'Reviews.AdrComments', 'Reviews.AdrComments.Attachments',
        'Committees', 'Committees.Users', 'Committees.AdrComments', 'Committees.AdrComments.Attachments', 'ReportStages',
        'OriginalAdrs', 'OriginalAdrs.AdrListOfDrugs', 'OriginalAdrs.AdrOtherDrugs', 'OriginalAdrs.Attachments',
        'InitialAdrs', 'InitialAdrs.AdrListOfDrugs', 'InitialAdrs.AdrOtherDrugs', 'InitialAdrs.Attachments'
    ];

    public $ce2b_contain = [
        'Attachments', 'RequestReporters', 'RequestEvaluators',
        'Reviews', 'Reviews.Users', 'Reviews.Ce2bComments', 'Reviews.Ce2bComments.Attachments',
        'Committees', 'Committees.Users', 'Committees.Ce2bComments', 'Committees.Ce2bComments.Attachments', 'ReportStages',
    ];

    public $components = [
        'Acl' => [
            'className' => 'Acl.Acl'
        ],
        'RequestHandler',
        'Crud.Crud' => [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete'
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.ApiQueryLog'
            ]
        ]
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', ['viewClassMap' => ['csv' => 'CsvView.Csv']]);
        $this->loadComponent('Flash');

        //Custom for XOR implementation
        $this->loadComponent('Util');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');

        $this->loadComponent('Auth', [
            'authorize' => [
                'Acl.Actions' => ['actionPath' => 'controllers/']
            ],
            'loginAction' => [
                'plugin' => false,
                'prefix' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'plugin' => false,
                'prefix' => false,
                'controller' => 'Users',
                'action' => 'home'
            ],
            'logoutRedirect' => [
                'plugin' => false,
                'prefix' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => [
                'controller' => 'pages',
                'action' => 'home',
                'prefix' => false,
                'plugin' => false
            ],
            'authError' => 'You are not authorized to access that location.',
            'loginError' => 'You are not authorized to access that location.',
            'flash' => [
                'element' => 'error'
            ]
        ]);
        //$this->Auth->allow(); 
    }

    /*1. Ported from 1.2*/
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('display');
        //if admin prefix, redirect to admin
        // $this->viewBuilder()->setLayout('admin');
        if (
            $this->request->getParam('prefix') or $this->request->session()->read('Auth.User.group_id') == 1
            or $this->request->session()->read('Auth.User.group_id') == 2 or $this->request->session()->read('Auth.User.group_id') == 4
            or $this->request->session()->read('Auth.User.group_id') == 5
        ) {
            $this->viewBuilder()->setLayout('admin');
        }
    }
    /*end 1*/


    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (
            !array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        //pass prefix to all controllers
        $prefix = null;
        if ($this->request->session()->read('Auth.User.group_id') == 1) {
            $prefix = 'admin';
        }
        if ($this->request->session()->read('Auth.User.group_id') == 2) {
            $prefix = 'manager';
        }
        if ($this->request->session()->read('Auth.User.group_id') == 4) {
            $prefix = 'evaluator';
        }
        if ($this->request->session()->read('Auth.User.group_id') == 5) {
            $prefix = 'institution';
        }
        $this->set(['prefix' => $prefix]);
    }
}