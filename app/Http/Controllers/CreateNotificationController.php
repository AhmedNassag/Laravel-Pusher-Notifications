<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Notification;
use App\Events\NotificationEvent;
use App\Models\CreateNotification;
use App\Events\CreateNotificationEvent;
use App\Http\Requests\StoreCreateNotificationRequest;
use App\Http\Requests\UpdateCreateNotificationRequest;

class CreateNotificationController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreateNotificationRequest $request)
    {
        try
        {
            $validated = $request->validated();
            //upload image
            if ($request->photo) {
                $photo_name         = $this->uploadImage($request->photo, 'attachments/createNotification');
                $validated['photo'] = $photo_name;
            }
            //insert data
            $createNotification = CreateNotification::create($validated);

            if (!$createNotification) {
                session()->flash('error');
                return redirect()->back();
            }


            $notification = new Notification();
            $notification->user_id = 1;
            $notification->content  = 'Message From: ' .$notification->user_id. ' ,Its Content Is: ' .$validated['content'];
            $notification->save();

            //create notification
            $data = [
                'ID'            => 1,
                'NotifilableId' => 1,
                'Content'       => $createNotification->content,
            ];

            // event(new NotificationEvent($data));
            event(new CreateNotificationEvent($data));

            session()->flash('success');
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CreateNotification $createNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreateNotification $createNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreateNotificationRequest $request, CreateNotification $createNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreateNotification $createNotification)
    {
        //
    }
}
