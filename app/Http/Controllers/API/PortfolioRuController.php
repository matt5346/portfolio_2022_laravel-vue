<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioRu;
use Illuminate\Support\Facades\Log;

class PortfolioRuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = PortfolioRu::all();

        foreach($portfolio as $item) {
            $item->images_array = json_decode($item->images_array, true);
            Log::emergency(gettype($item->images_array));
        }
        Log::emergency($portfolio);
        Log::emergency('PORTFOLIo');

        return $portfolio;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $portfolioItem = new PortfolioRu();
        $portfolioItem->id=$request->id;
        $portfolioItem->image_preview=$request->image_preview;
        $portfolioItem->images_array=$request->images_array;
        $portfolioItem->title=$request->title;
        $portfolioItem->link=$request->link;
        $portfolioItem->body=$request->body;
        $portfolioItem->save();

        return response()->json([
            'comment' => $portfolioItem,
            'message'=> 'Success'
        ], 200);
    }

    public function getPortfolioById(int $id)
    {
        $portfolio=PortfolioRu::where(['id'=>$id])->get();

        return $portfolio;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::emergency('portfolioCONTROLLER');
        Log::emergency($request);

        $portfolioItem=PortfolioRu::findOrFail($id);

        $portfolioItem->id=$request->id;
        $portfolioItem->image_preview=$request->image_preview;
//        $t = json_decode($portfolioItem->images_array, true);
//        $t[] = $request->images_array;
//        $portfolioItem->images_array = json_encode($t);

        $portfolioItem->images_array=$request->images_array;

        $portfolioItem->link=$request->link;
        $portfolioItem->title=$request->title;
        $portfolioItem->body=$request->body;
        $portfolioItem->save();


        return response()->json([
            '$portfolioItem' => $portfolioItem,
            'message'=> 'Success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio=PortfolioRu::findOrFail($id);

        $portfolio::destroy($id);
        return response()->json([
            'message'=> '$portfolio Deleted'
        ], 200);
    }
}
