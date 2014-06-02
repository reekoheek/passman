<?php

namespace PassMan\Controller;

class CredentialController extends \Norm\Controller\NormController
{
    public function mapRoute()
    {
        parent::mapRoute();

        $this->map('/:id/privileges', 'privileges')->via('GET', 'POST');
    }

    public function privileges($id)
    {
        $entry = $this->collection->findOne($id);

        if ($this->app->request->isPost()) {
            $entry['$privileges'] = array();

            foreach ($this->app->request->post('privilege') as $key) {
                $key = trim($key);
                if (empty($key)) {
                    continue;
                }
                $entry['$privileges']->add($key);
            }

            $entry->save();

            h('notification.info', 'Privileges updated.');
        }

        $this->data['entry'] = $entry;
    }
}
