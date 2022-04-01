<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actors;
    public $credits;
    
    public function __construct($actors, $credits)
    {
        $this->actors = $actors;
        $this->credits = $credits;
    }

    public function actor()
    {
        return collect($this->actors)->merge([
        'birthday' => Carbon::parse($this->actors['birthday'])->format('d M, Y '),
        'age' => Carbon::parse($this->actors['birthday'])->age,
        'profile_path' => $this->actors['profile_path'] ? 'https://image.tmdb.org/t/p/w300/' .$this->actors['profile_path'] : 'https://via.placeholder.com/300x450',
        
        ]);
    }

    public function knownForMovies()
    {
        $castMovies = collect($this->credits)->get('cast');
        
        return collect($castMovies)->where('media_type','movie')->sortByDesc('popularity')->take(6)       
        ->map(function($movie){
            return collect($movie)->merge([
                'poster_path' => $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w300/' .$movie['poster_path'] : 'https://via.placeholder.com/300x450',
                'title' => isset($movie['title']) ? $movie['title'] :'untitled',
            ]);
        });
    }

    public function credits(){
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->map(function($movie){
         if (isset($movie['release_date'])) {
           $releaseDate = $movie['release_date'];
         } elseif (isset($movie['first_air_date'])) {
            $releaseDate = $movie['first_air_date'];
         }else{
            $releaseDate ='';
         }

         
         if (isset($movie['title'])) {
            $title = $movie['title'];
          } elseif (isset($movie['name'])) {
             $title = $movie['name'];
          }else{
             $title ='Untitled';
          }

          return collect($movie)->merge([
            'release_date' =>$releaseDate,
            'release_year' =>isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future',
            'title' => $title,
            'character' => isset($movie['character']) ? $movie['character']: '',
        ]);
        })->sortByDesc('release_date');
    }
}