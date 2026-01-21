<?php
namespace Projet5;
enum RoleEnum:string {
    case Admin="admin";
    case User="user";
    case Connected="_connected";
    case NotConnected="_notconnected";
    case ConnectedOrNot="_connected or not";
    
}