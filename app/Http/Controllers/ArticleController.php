<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Article;

class ArticleController extends Controller
{

    /**
     *
     * @OA\Get(
     *   tags={"Article"},
     *   path="/api/articles",
     *   summary="Article index",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *         type="array",
     *         @OA\Items(ref="#/components/schemas/Article")
     *       )
     *     )
     *   )
     * )
     */
    public function index()
    {
        return Article::all();
    }

    /**
     *
     * @OA\Get(
     *   tags={"Article"},
     *   path="/api/articles/{id}",
     *   summary="Article show",
     *   @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of articles to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Article")
     *     )
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }
}
