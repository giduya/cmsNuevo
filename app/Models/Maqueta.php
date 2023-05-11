<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Maqueta extends Model
{
    use HasFactory;


    public function menu()
    {
      $config = Config::config()['menu'];

      return $menu;
    }





}
