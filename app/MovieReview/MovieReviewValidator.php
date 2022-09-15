<?php

namespace App\MovieReview;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MovieReviewValidator
{
    private static function getReviewRules(Request $request)
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'selected_movie' => [
                'required',
                Rule::in(Movie::all()->pluck('name'))
            ],
            'movie_rating' => 'required|integer|between:1,5',
            'movie_review' => 'nullable|string|lt:300',
            'would_recommend_to_friend' => 'required|boolean',
            'saw_in_gold_class' => 'required|boolean',
        ];
    }

    private static function getReviewMessages()
    {
        return [
            'first_name.*' => 'Please enter a valid first name.',
            'last_name.*' => 'Please enter a valid last name.',
            'selected_movie.*' => 'Please select a movie from the drop-down menu.',
            'movie_rating.*' => 'Please select a movie rating between one and five.',
            'movie_review.*' => 'Please use less than 300 characters in your review.',
            'would_recommend_to_friend.*' => 'Invalid recommendation selection.',
            'saw_in_gold_class.*' => 'Invalid gold class selection.',
        ];
    }

    public static function makeReview(Request $request)
    {
        return Validator::make(
            $request->all(),
            self::getReviewRules($request),
            self::getReviewMessages()
        );
    }

}
