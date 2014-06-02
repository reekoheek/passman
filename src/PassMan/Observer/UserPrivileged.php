<?php

namespace PassMan\Observer;

class UserPrivileged
{
    public function searching($collection)
    {
        $collection->criteria['$privileges'] = @$_SESSION['user']['username'];
    }
}
