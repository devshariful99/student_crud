<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function getStatus(){
        if($this->status == 1){
            return 'Active';
        }else{
            return 'Deactive';
        }
    }
    public function getStatusBg(){
        if($this->status == 1){
            return 'badge bg-success';
        }else{
            return 'badge bg-warning';
        }
    }
    public function getBtnStatusBg(){
        if($this->status == 1){
            return 'btn btn-warning btn-sm';
        }else{
            return 'btn btn-success btn-sm';
        }
    }
    public function getBtnStatus(){
        if($this->status == 1){
            return 'Deactive';
        }else{
            return 'Active';
        }
    }
}
