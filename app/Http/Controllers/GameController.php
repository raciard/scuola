<?php

namespace App\Http\Controllers;

use App\Attraction;
use App\Category;
use function App\Helpers\getLangId;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function play(Request $request)
    {
        $categories = Category::query();
        $attractions = Attraction::query();
        $user = $request->user();

        if ($request->filled('category_id')) {
            $attractions->join(
                'attraction_category',
                'attraction_category.attraction_id',
                '=',
                'attractions.id'
            )->where('attraction_category.category_id', $request->get('category_id'));
        }

        if ($request->get('completed', 0) != 1) {
            $attractions->whereNotIn('id', function($query) use ($user) {
                $query->select('attraction_id')
                    ->from('attraction_user')
                    ->where('attraction_user.user_id', $user->id);
            });
        }

        return view('play')
            ->with('user', $request->user())
            ->with('categories', $categories->get())
            ->with('attractions', $attractions->paginate(12));
    }

    public function quiz(Request $request, $attraction_id)
    {
        $attraction = Attraction::findOrFail($attraction_id);
        $user = $request->user();

        if ($user->attractions()->where('id', $attraction_id)->count() !== 0)
            return redirect()->back()->withErrors(__('game.already_played'));

        $question = $attraction->questions()
            ->where('language_id', getLangId())
            ->get()->random();

        return view('quiz')
            ->with('question', $question)
            ->with('attraction', $attraction);
    }

    public function submit(Request $request, $attraction, $question)
    {
        $attraction = Attraction::findOrFail($attraction);
        $question = $attraction->questions()->findOrFail($question);
        $user = $request->user();

        $request->user()->attractions()->attach($attraction->id);

        $points = 0;
        $answer = null;

        if ($request->has('answer')) {
            $answer = $question->answers()->findOrFail($request->get('answer'));
            if ($answer->correct) $points = $request->get('time', 1);
        }

        $user->score += $points;
        $user->save();

        return view('reveal')
            ->with('question', $question)
            ->with('attraction', $attraction)
            ->with('user_answer', $answer)
            ->with('points', $points);
    }
}
