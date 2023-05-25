<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

use function PHPUnit\Framework\isNan;

class UsersComponent extends Component
{
  public $search = "";
  public $email = "";
  public $paginate;
    public function render()
    {
      if($this->paginate != null )
        $users = User::where("email", "like" , "%".$this->email."%")->where("name", "like", '%'.$this->search.'%')->paginate($this->paginate);  
      else 
      $users = User::where("email", "like" , "%".$this->email."%")->where("name", "like", '%'.$this->search.'%')->paginate(10); 

      return view('livewire.users-component', compact('users'));
    }
}
