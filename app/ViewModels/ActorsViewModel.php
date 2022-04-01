<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ActorsViewModel extends ViewModel
{

    public $populerActors;
    public $page;
    
    public function __construct($populerActors, $page)
    {
        $this->populerActors = $populerActors;
        $this->page = $page;
    }

    public function populerActors()
    {
        return  collect($this->populerActors)->map(function($actor){
            return collect($actor)->merge([
                'profile_path' =>'https://image.tmdb.org/t/p/w300/'.$actor['profile_path'],
                'known_for' =>collect($actor['known_for'])->where('media_type','movie')->pluck('title')->union(
                    collect($actor['known_for'])->where('media_type','tv')->pluck('name'))->implode(', '),
            ])->only([
                'name','id','profile_path','known_for'
            ]);
        });
    }

    public function previous(){
        return $this->page > 1 ? $this->page -1 : null;
    }
    public function next(){
        return $this->page < 500 ? $this->page  + 1 : null;
    }
}