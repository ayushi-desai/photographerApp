<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $Album
     * @return \Illuminate\Http\Response
     */
    public function getAlbums(Request $request)
    {
        $userId = $request->query('user');
        $albumData = Album::join('users', 'albums.userId', '=', 'users.id')
            ->where('albums.userId', '=', $userId)
            ->get();
        return response()->json($albumData);
    }
}
