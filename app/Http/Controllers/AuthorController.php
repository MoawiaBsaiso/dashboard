<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Country;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('user')->withCount('articles')->orderBy('id', 'desc')->get();
        return response()->view('cms.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.author.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), []);

        if (!$validator->fails()) {
            $authors = new Author();
            $authors->email = $request->get('email');
            $authors->password = Hash::make($request->get('password'));
            // $authors->password = $request->get('password');
            if (request()->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . 'file.' . $file->getClientOriginalExtension();
                $file->move('storage/files/author', $fileName);
                $authors->file = $fileName;
            }

            $isSaved = $authors->save();

            if ($isSaved) {
                $users = new User();

                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/author', $imageName);
                    $users->image = $imageName;
                }
                $users->firstname = $request->get('firstname');
                $users->lastname = $request->get('lastname');
                $users->mobile = $request->get('mobile');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($authors);

                $isSaved = $users->save();
                return response()->json(['icon' => 'success', 'title' => 'Created is successfully'], 200);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $authors = Author::findOrFail($id);
        return response()->view('cms.author.edit', compact('countries', 'authors'));
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
        $validator = Validator($request->all(), [
            'image' => "required|image|max:2048|mimes:png,jpg,jpeg,pdf",
        ]);

        if (!$validator->fails()) {
            $authors = Author::FindOrFail($id);
            $authors->email = $request->get('email');
            // $authors->password = Hash::make($request->get('password'));
            $authors->password = $request->get('password');
            if (request()->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . 'file.' . $file->getClientOriginalExtension();
                $file->move('storage/files/author', $fileName);
                $authors->file = $fileName;
            }

            $isUpdate = $authors->save();

            if ($isUpdate) {
                $users = $authors->user;
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/author', $imageName);
                    $users->image = $imageName;
                }
                $users->firstname = $request->get('firstname');
                $users->lastname = $request->get('lastname');
                $users->mobile = $request->get('mobile');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($authors);

                $isUpdate = $users->save();

                return ['redirect' => route('authors.index')];
                return response()->json(['icon' => 'success', 'title' => 'Updated is successfully'], 200);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors  = Author::destroy($id);
    }
}
