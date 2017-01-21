<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Project;
use App\Company;

class ProjectsController extends Controller
{
    /**
 * Generates a slug.
 *
 * @param [type] $slug [description]
 *
 * @return [type] [description]
 */
public function generateSlug($slug)
{
    $slug = str_slug($slug, '-');

    return $slug;
}
    public function index()
    {
        return view('projects.index');
    }

    public function projectsApi(Request $request)
    {
        $projects = Project::all();
      // Assigning relationship to array
      foreach ($projects as $key => $project) {
          $project->company;
          $project->users;
      }
      // Check if the user is logged in
      if (Auth::user()) {
          return response()->json([
          'projects' => $projects->toArray(),
          'users' => User::all()->toArray(),
          'companies' => Company::all()->toArray(),
        ]);
      } else {
          return response()->json(null);
      }
    }

    public function create(Request $request)
    {

    // Validate
    $this->validate($request, [
        'name' => 'required|max:255|unique:projects',
    ]);
        $slug = $this->generateSlug($request->name);

    // Store
    $project = Project::create([
      'company_id' => $request->company_id,
      'user_id' => $request->user_id,
      'name' => $request->name,
      'slug' => $slug,
    ]);

      // Save project_user relationship
    foreach ($request->row as $row) {
        $project->users()->attach($row['user_id']);
    }

    // Add relationship to user
  //  $user->role = $user->role->get();
  //    $user->company = $user->company->get();

      return response()->json([
      'project' => $project->toArray(),
    ]);
    }
}
