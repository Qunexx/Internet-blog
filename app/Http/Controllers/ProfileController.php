<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use App\Models\User;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index()
    {
        return view('profile.index');
    }

    public function create(ProfileStoreRequest $request)
    {
        if (Profile::where('user_id', Auth::id())->exists()) {
            return redirect()->route('profile.index')->with('error', 'You already have a profile.');
        }
        $data = $request->validated();
        $this->profileService->store($data);

        return redirect()->route('profile.index')->with('success', 'Profile created successfully.');
    }


    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.show', compact('profile'));
    }

    }
