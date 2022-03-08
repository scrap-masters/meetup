<?php

declare(strict_types=1);

namespace Blumilk\Meetup\Core\Http\Controllers;

use Blumilk\Meetup\Core\Http\Requests\StoreMeetupRequest;
use Blumilk\Meetup\Core\Http\Requests\UpdateMeetupRequest;
use Blumilk\Meetup\Core\Models\Meetup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MeetupController extends Controller
{
    public function index(): View
    {
        $meetups = Meetup::latest()->with(["user"])->paginate(20);

        return view("meetups.index")
            ->with("meetups", $meetups);
    }

    public function create(): View
    {
        return view("meetups.create");
    }

    public function store(StoreMeetupRequest $request): RedirectResponse
    {
        $request->user()->meetups()->create($request->validated());

        return redirect()->route("meetups");
    }

    public function edit(Meetup $meetup): View
    {
        return view("meetups.edit")
            ->with("meetup", $meetup);
    }

    public function update(UpdateMeetupRequest $request, Meetup $meetup): RedirectResponse
    {
        $meetup->update($request->validated());

        return redirect()->route("meetups");
    }

    public function destroy(Meetup $meetup): RedirectResponse
    {
        $meetup->delete();

        return back();
    }
}