<?php


namespace App\Model;

require_once 'app/Model.php';
require_once 'app/Traits/Auth.php';

use App\Model;
use App\Traits\Auth;

class User extends Model
{
    use Auth;

    protected $table = 'users';

    protected $columns = [
        'name',
        'email',
        'password'
    ];

    protected $unique = ['name','email'];
}