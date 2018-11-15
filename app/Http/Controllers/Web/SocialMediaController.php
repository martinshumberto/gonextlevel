<?php

namespace App\Http\Controllers\Web;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaRequest;

class SocialMediaController extends Controller
{
    public function __invoke(SocialMediaRequest $request)
    {
        if (!SocialMedia::isValidSocialMedia($request->type)) {
            abort(422, 'Essa não é uma mídia social válida');
        }

        $socialMedia = SocialMedia::whereType($request->type)
            ->where('profile_id', $request->profile()->id)->first();

        if ($socialMedia) {
            $socialMedia->link = $request->link;
            $socialMedia->save();

            return response()->json([
                'message' => 'Sua mídia social foi alterada com sucesso.',
                'data' => $socialMedia
            ], 200);

            $socialMedia = SocialMedia::create([
                'user_id' => auth()->user()->id,
                'type' => $request->type,
                'link' => $request->link
            ]);

            return response()->json([
                'message' => 'Sua mídia social foi criada com sucesso.',
                'data' => $socialMedia
            ], 200);
        }
    }
}
