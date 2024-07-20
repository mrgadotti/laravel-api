<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Courses::all();
        return response()->json($courses);
    }

    public function store(Request $request)
    {
        $course = new Courses;
        $course->ds_curso = $request->ds_curso;
        $course->ds_observacao = $request->ds_observacao;
        $course->save();
        return response()->json([
            "message" => "curso adicionado"
        ], 201);
    }

    public function storeReturnId(Request $request)
    {
        $course = new Courses;
        $course->ds_curso = $request->ds_curso;
        $course->ds_observacao = $request->ds_observacao;
        $course->save();

        return response()->json([
            "message" => "curso adicionado",
            "id" => $course->cd_curso
        ], 201);
    }

    public function course()
    {
        // $courses = Courses::select('ds_curso')->get();
        $courses = Courses::select('ds_curso', 'ds_observacao')
            ->where('ds_curso', 'like', '%Engenharia%')->get();
        return response()->json([
            "courses" => $courses
        ], 201);
    }

    public function delete(Request $request)
    {
        if (Courses::where('cd_curso', $request->id)->exists()) {
            $course = Courses::find($request->id);
            $course->delete();
            return response()->json([
                "message" => "deleted"
            ], 202);
        }
        return response()->json([
            "message" => "not found"
        ], 404);
    }
}
