<?php

namespace PassMan\Observer;

class UserPrivileged
{
    public function searching($collection)
    {
        $collection->criteria['$privileges'] = @$_SESSION['user']['username'];
    }

    public function saving($model)
    {
        if ($model->isNew() && isset($_SESSION['user']['username'])) {
            $model['$privileges'] = array(
                $_SESSION['user']['username'],
            );
        }

    }
}
