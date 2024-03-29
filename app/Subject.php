<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\LatinSquare;
class Subject extends Model
{
    //

    protected $fillable = [
        'ip', 'name', 'email', 'occupation', 'degree', 'age', 'experience', 'subject_id', 'question_id', 'ref'
    ];

    public function questions(){
        return $this->belongsToMany('App\Question', 'subject_question')->withPivot('subject_time','has_changed_page', 'subject_answer', 'order', 'is_correct');
    }
    
    public function square(){
        $first = $this->belongsTo('App\LatinSquare', 'id', 'first_row_subject_id');
        
        $second = $this->belongsTo('App\LatinSquare', 'id', 'second_row_subject_id');
        if($first->exists())
            return $first;
        if($second->exists())
            return $second;
        
        return null;
    }
    public function getSquareIdAttribute(){
        $first = $this->belongsTo('App\LatinSquare', 'id', 'first_row_subject_id');
        $second = $this->belongsTo('App\LatinSquare', 'id', 'second_row_subject_id');
        if($first->exists())
            return 1;
        if($second->exists())
            return 2;
        
        return null;
    }
    public function getExperienceFormattedAttribute(){
        switch($this->attributes['experience']){
            case 1:
                return 'Less than a year';
            case 2:
                return 'Between 1 and 4 years';
            case 3:
                return 'Between 4 and 10 years';
            case 4:
                return 'Over 10 years';
            default:
                return 'not set experience level';

        }
    }
    
    public function getDegreeFormatedAttribute(){
        switch($this->attributes['degree']){
            case 1:
                return 'High school degree or equivalent';
            case 2:
                return 'Some university course but no degree';
            case 3:
                return 'Bachelor degree';
            case 4:
                return 'Master degree';
            case 5:
                return 'PhD';
            default:
                return 'not set experience level';

        }
    }
}
