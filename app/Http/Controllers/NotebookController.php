<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Laravel OpenApi Demo Documentation",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="xgio2@mail.ru"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )
 *
 * @OA\Get(
 *     path="/api/v1/notebook",
 *     description="Home pages",
 *     link="http://127.0.0.1:8000/api/v1/notebook",
 *     @OA\Response(response="default", description="Welcome page")

 * )
 * @OA\Post(
 *     path="/api/v1/notebook",
 *     description="Create new person",
 *     @OA\Response(response="default", description="Create new person")
 * )
 *@OA\Get(
 *     path="/api/v1/notebook/create",
 *     description="Create pages",
 *     @OA\Response(response="default", description="Create page")
 * )
 * @OA\Get(
 *     path="/api/v1/notebook/{person}",
 *     description="Person pages",
 *     @OA\Response(response="default", description="Person page")
 * )
 * @OA\Get(
 *     path="/api/v1/notebook/{person}/edit",
 *     description="Edit pages",
 *     @OA\Response(response="default", description="Edit page")
 * )
 * @OA\patch(
 *     path="/api/v1/notebook/{person}/edit",
 *     description="Edit person",
 *     @OA\Response(response="default", description="Edit person")
 * )
 * @OA\delete(
 *     path="/api/v1/notebook/{person}",
 *     description="Delete person",
 *     @OA\Response(response="default", description="Delete person")
 * )
 *
 * @OA\Tag(
 *     name="Projects",
 *     description="API Endpoints of Projects"
 * )
 */

class NotebookController extends Controller
{
    public function index() {
        $persons = Person::where('is_published', 1)->get();
        return view('notebook.index', compact('persons'));
    }
    public function create() {
        return view('notebook.create');
    }
    public function store(Request $request) {
        $path = $request->file('image')->store('uploads', 'public');
        $data = request()->validate([
            'full_name' => 'string',
            'company' => 'string',
            'number' => 'string',
            'email' => 'string',
            'date_birthday' => 'string',
        ]);
        $data['image'] = $path;
        Person::create($data);
        return redirect()->route('notebook.index');

    }
    public function show(Person $person){
        return view('notebook.show', compact('person'));
    }
    public function edit(Person $person){
        return view('notebook.edit', compact('person'));

    }
    public function update(Request $request, Person $person) {
        $data = request()->validate([
            'full_name' => 'string',
            'company' => 'string',
            'number' => 'string',
            'email' => 'string',
            'date_birthday' => 'string',
        ]);
        if($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $path;
        }
        $person->update($data);
        return redirect()->route('notebook.index');
    }
    public function destroy(Person $person){
        $person->delete();
        return redirect()->route('notebook.index');
    }

}
