<?php

namespace App\Http\Controllers;

use App\Models\audio;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AudioController extends Controller
{
    public function audio_upload_index()
    {
        return view('user.audio_upload_index');
    }


    public function import_audio(Request $request)
    {
        // dd($request->all());
        // Normalize input into array even if it's a single file
        $files = $request->file('audio');

        // dd($files);

        // if (!$files) {
        //     return redirect()->back()->with('error', 'No audio file uploaded.');
        // }



        // Wrap single file into an array
        $files = is_array($files) ? $files : [$files];

        // Validate all files
        // foreach ($files as $file) {
        //     if (!$file->isValid() || !in_array($file->getClientOriginalExtension(), ['mp3', 'wav', 'ogg'])) {
        //         return redirect()->back()->with('error', 'One or more files are invalid or unsupported.');
        //     }

        //     if ($file->getSize() > 20480 * 1024) {
        //         return redirect()->back()->with('error', 'One or more files exceed the 20MB limit.');
        //     }
        // }

        foreach ($files as $file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('audios'), $fileName);

            $audio = new Audio();
            $audio->recording = $fileName;
            $audio->user_id = auth()->id();
            $audio->user_name = auth()->user()->name;
            $audio->date_to = Carbon::now()->toDateString();
            $audio->date_from = Carbon::now()->toDateString();
            $audio->extension = $file->getClientOriginalExtension();
            $audio->audio_type = 'Audio';
            $audio->save();
        }

        return redirect()->back()->with('success', 'Audio file(s) uploaded successfully!');
    }

    public function audio_check(Request $request)
    {
        return view('user.audio_check');
    }

    public function get_audio(Request $request)
    {
        $audios = Audio::where('date_to', '>=', $request->date_from)
            ->where('date_from', '<=', $request->date_to)
            ->get();

        // dd($audios);

        return response()->json($audios);
    }
}
