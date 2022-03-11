<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reactions Controller
 *
 * @property \App\Model\Table\ReactionsTable $Reactions
 *
 * @method \App\Model\Entity\Reaction[] paginate($object = null, array $settings = [])
 */
class ReactionsController extends AppController
{

   

    /**
     * Delete method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reaction = $this->Reactions->get($id);
        if ($this->Reactions->delete($reaction)) {
            $this->Flash->success(__('The reaction has been deleted.'));
        } else {
            $this->Flash->error(__('The reaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
