<?php
namespace Controllers;

use Models\User;
use Core\Request;

class UserController {

    private User $user;
  

    public function __construct() {
   
        $this->user = new User('users');
        
    }
   
    public function readUsers(Request $request) {       
        $res = $this->user->users(); 
        echo json_encode($res);
    }

    public function userFromId(int $id, Request $request): void {
        
        
        echo json_encode($request->getBody());
    }

    

}