<?php

namespace App;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExpertDetails extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo('App\User','expert_id','id');
    }
    public function getNameAttribute()
    {
    return $this->user->name;
    }
    public function getWorkFromAttribute($date)
    {

        // return $this->attributes['WorkFrom'] = Carbon::now('Africa/Khartoum')->format('h:i:s A');
    
        return Carbon::parse($date)->format('h:i A');

    }  
    public function getWorkToAttribute($date)
    {

        // return $this->attributes['WorkTo'] = Carbon::now()->format('h:i:s A');
        return Carbon::parse($date)->format('h:i A');

    
    }  
    
}
