<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieReview;
use App\MovieReview\MovieReviewValidator;
use Illuminate\Http\Request;

class MovieReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MovieReviewValidator::makeReview($request)->validate();
        // ::create should be used here instead of ::insert
        $movieReview = MovieReview::insert([
            'reviewer_first_name' => $request->first_name,
            'reviewer_last_name' => $request->last_name,
            'movie_id' => Movie::where('name', $request->selected_movie)->first()->id,
            'movie_rating' => $request->movie_rating,
            'movie_review' => $request->movie_review,
            'would_recommend_to_friend' => $request->would_recommend_to_friend,
            'saw_in_gold_class' => $request->saw_in_gold_class,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
