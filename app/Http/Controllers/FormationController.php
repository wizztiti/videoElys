<?php

namespace App\Http\Controllers;

use App\Exceptions\StripeException;
use App\Models\Formation;
use App\Models\Category;
use App\Models\Tag;
use App\Stripe;
use App\StripeFake;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;


class FormationController extends Controller
{
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Display all resume formations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.formation-index', [
            'formations' => Formation::get()->load('category'),
        ]);
    }


    /**
     * Display the formation.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($category, $slug)
    {
        $formation = Formation::where('slug', $slug)->first();
        $chapters = $formation->chapters()->get()->sortBy('num');

        return view('public.formation', [
            'formation' => $formation,
            'chapters' => $chapters
        ]);
    }

    /**
     * Display all resume formations of category.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function indexCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $formations = $category->formations()->with('category')->get();
        return view('public.formation-index', [
            'category' => $category,
            'formations' => $formations,
        ]);
    }

    /**
     * Display all resume posts of tag.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function indexTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $formations = $tag->formations()->with('tag')->get()->sortByDesc('created_at');
        return view('public.formation-index', [
            'tag' => $tag,
            'formations' => $formations,
        ]);
    }

    public function purchase($category, $slug) {

        $user = $this->auth->user();
        $formation = Formation::where('slug', $slug)->first();

        if(auth()->guest()) {
            flash('Vous devez être connecté pour acheter une formation', 'warning');
            return redirect(route('login'));
        }

        // SI l'utiisateur a pas déjà cette formation
        if( $user->formations()->where('formation_id', '=', $formation->id)->count() ){
            flash('Vous possédez déjà cette formation', 'warning');
            return redirect()->back();
        }

        return view('public.formation-purchase', compact('category', 'formation'));
    }

    public function payment(Request $request) {
        $user = $this->auth->user();
        $request->validate([
            'stripeToken' => ['required'],
        ]);

        $formation = Formation::where('id', $request->formationID)->first();

        $stripe = app(StripeFake::class);
        //$stripe = app(Stripe::class);
        try {
            $last4 = $stripe->charge('tok_visa', $formation->price * 100);
            //$last4 = $stripe->charge($request->stripeToken, $formation->price * 100);

            // Ajout Facture

            // Ajout de la formation au compte de l'utilisateur
            $user->formations()->attach($formation, [
                'bought_at' => Carbon::now(),
            ]);

            flash('Merci pour votre achat', 'success');
            return redirect(route('formation.show', [
                'category' => $formation->category->slug,
                'formation' => $formation->slug,
            ]));
        } catch(StripeException $e) {
            flash('Une erreur est survenue lors du paiement', 'warning');
            return redirect()->back();
        }

    }
}
