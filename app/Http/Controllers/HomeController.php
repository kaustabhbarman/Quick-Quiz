<?php

namespace App\Http\Controllers;
use App\Questions;
use App\Scores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use App\Notifications\Congratulations;
use App\Notifications\ScoreBeat;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('qno',1);
        Session::put('score',0);
        Session::put('maxscore',User::all()->max('highscore'));
        $qno = Session::get('qno');
        $ses_score = Session::get('score');
        $fid = Questions::first()->id;
        $count = Questions::all()->count();
        $rand = rand($fid,$count);
        $question = Questions::find($rand);
        return view('home', compact('question', 'qno', 'ses_score'));
    }

    public function next(Request $request)
    {
        $qid = request('qid');
        $question = Questions::find($qid);
        $answer = request('answer');
        $id = Auth::user()->id;
        if ($answer==$question->answer) {
            // $score = Scores::where('user_id', $id)->orderBy('created_at')->first();
            // $score->score = $score->score+1;
            // $score->save();
            Session::put('score', Session::get('score')+1);
        }
        Session::put('qno',Session::get('qno')+1);
        $ses_score = Session::get('score');
        $qno = Session::get('qno');
        if ($qno>10) {
            $cur_score = Auth::user()->highscore;
            if ($ses_score>$cur_score) {
                $ses_max_score = Session::get('maxscore');
                Auth::user()->highscore = Session::get('score');
                Auth::user()->save();
                $max = User::all()->max('highscore');
                if (Auth::user()->highscore==$max) {
                    Auth::user()->notify(new Congratulations(Auth::user()));
                    if ($max>$ses_max_score) {
                        $second = User::where('highscore','<',$max)->max('highscore');
                        $toUsers = User::where('highscore', $second);
                        foreach ($toUsers as $user) {
                            $user->notify(new ScoreBeat(Auth::user()));
                        }
                    }   
                }
            }
            return redirect('/scoreboard');
        }
        $fid = Questions::first()->id;
        $count = Questions::all()->count();
        $rand = rand($fid,$count);
        $question = Questions::find($rand);
        return view('home', compact('question', 'qno', 'ses_score'));
    }

    public function skipnext()
    {
        Session::put('qno',Session::get('qno')+1);
        $ses_score = Session::get('score');
        $qno = Session::get('qno');
        if ($qno>10) {
            $cur_score = Auth::user()->highscore;
            if ($ses_score>$cur_score) {
                $ses_max_score = Session::get('maxscore');
                Auth::user()->highscore = Session::get('score');
                Auth::user()->save();
                $max = User::all()->max('highscore');
                if (Auth::user()->highscore==$max) {
                    Auth::user()->notify(new Congratulations(Auth::user()));
                    if ($max>$ses_max_score) {
                        $second = User::where('highscore','<',$max)->max('highscore');
                        $toUsers = User::where('highscore', $second);
                        foreach ($toUsers as $user) {
                            $user->notify(new ScoreBeat(Auth::user()));
                        }
                    }   
                }
            }
            return redirect('/scoreboard');
        }
        $fid = Questions::first()->id;
        $count = Questions::all()->count();
        $rand = rand($fid,$count);
        $question = Questions::find($rand);
        return view('home', compact('question', 'qno', 'ses_score'));
    }

    public function score()
    {
        $players = User::all()->sortByDesc('highscore');
        return view('leaderboard', compact('players'));
    }
}
