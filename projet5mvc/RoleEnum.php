<?php
namespace Projet5;
enum RoleEnum:string {
    case Admin="admin"; 
    case User="user";
    case Connected="_connected";
    case NotConnected="_notconnected";
    case ConnectedOrNot="_connected or not";

    public function isAvailable():bool{
       return !str_starts_with($this->value , "_" ); 
    }
}