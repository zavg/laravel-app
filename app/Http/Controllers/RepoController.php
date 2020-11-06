<?php

namespace App\Http\Controllers;


use Auth;
use App\Repo;
use App\Jobs\ProcessGithubRepo;
use Illuminate\Http\Request;

class RepoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $repos = Repo::where('user_id', $user->id)->get();

        return view("repo.index", compact('repos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("repo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => [
                'required',
                'regex:/https?:\/\/github\.com\/[A-Za-z0-9-]+\/[A-Za-z0-9_.-]+$/u'
            ]
        ]);

        $repo = new Repo([
            'url'     => $request->get('url'),
            'comment' => $request->get('comment'),
            'user_id' => Auth::user()->id
        ]);
        $repo->save();

        ProcessGithubRepo::dispatch($repo);

        return redirect('/repos');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repo = Repo::find($id);

        return view("repo.show", compact('repo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repo = Repo::find($id);

        return view("repo.edit", compact('repo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'url' => 'required'
        ]);

        $repo = Repo::find($id);

        $repo->url     = $request->get('url');
        $repo->comment = $request->get('comment');
        $repo->save();

        return redirect()->action('RepoController@show', compact("repo"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repo = Repo::findOrFail($id);
        $repo->delete();

        return redirect('/repos');
    }
}
