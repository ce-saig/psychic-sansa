<?php
//use Eloquent;

class Daisydetail extends Eloquent {
    protected $table = 'daisydetail';
    
    public $timestamps = false;
    public function daisy()   { return $this->belongsTo('Daisy','daisy_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
