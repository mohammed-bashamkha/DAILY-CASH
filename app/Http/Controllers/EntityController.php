<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntityController extends Controller
{
    public function index() {
        $entities = Auth::user()->entities;
        return view('entities.index', compact('entities'));
    }

    public function create() 
    {
        $type = Entity::get('type');
        return view('entities.create',compact('type'));
    }

    public function store(Request $request) {
        $user_id = Auth::user()->id;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:worker,project',
            'phone' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
        $data['user_id'] = $user_id;

        // $entity = Entity::create($data);
        Entity::create($data);
        // return response()->json($entity, 201);
        return redirect()->route('entities.index')->with('success', 'تم إنشاء الكيان بنجاح');
    }

    public function edit($id) {
        $user_id = Auth::user()->id;
        $entity = Entity::find($id);
        if ($entity->user_id !== $user_id) {
            abort(403,'غير مصرح لك بالتعديل هذا الكيان');
        }
        return view('entities.edit', compact('entity'));
    }


    public function update(Request $request, $id) {
        $user_id = Auth::user()->id;
        $entity = Entity::find($id);
        if ($entity->user_id !== $user_id) {
            abort(403,'غير مصرح لك بالتعديل هذا الكيان');
        }
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|in:worker,project',
            'phone' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
        // $entity->update($data);
        // return response()->json($entity);
        $entity->update($data);
        return redirect()->route('entities.index')->with('success', 'تم تحديث الكيان بنجاح');

    }

    // public function show($id) {
    //     $user_id = Auth::user()->id;
    //     $entity = Entity::findOrFail($id);
    //     if ($entity->user_id !== $user_id) {
    //         abort(403,'غير مصرح لك بالتعديل هذا الكيان');
    //     }
    //     return response()->json($entity);
    // }

    public function destroy($id) {
        $user_id = Auth::user()->id;
        $entity = Entity::find($id);
        if ($entity->user_id !== $user_id) {
            abort(403,'غير مصرح لك بحذف هذا الكيان');
        }
        $entity->delete();
        return redirect()->route('entities.index')->with('success', 'تم حذف الكيان بنجاح');
;
    }

    // public function getProjects() {
    //     $user_id = Auth::user()->id;
    //     $projects = Entity::where('user_id', $user_id)->where('type', 'project')->get();
    //     return response()->json($projects);
    // }

    // public function getWorkers() {
    //     $user_id = Auth::user()->id;
    //     $workers = Entity::where('user_id', $user_id)->where('type', 'worker')->get();
    //     return response()->json($workers);
    // }

    public function entitySearch(Request $request)
    {
        $user_id = Auth::user()->id;

        $query = Entity::where('user_id', $user_id);

        // بحث عام باستخدام keyword
        if ($request->filled('keyword')) {
            $keyword = '%' . $request->keyword . '%';

            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', $keyword)
                ->orWhere('type', 'like', $keyword)
                ->orWhere('phone', 'like', $keyword) // إذا عندك وصف
                ->orWhere('notes', 'like', $keyword);       // إذا عندك رقم هاتف
            });
        }

        // فلترة حسب الاسم
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // فلترة حسب النوع
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        return response()->json($query->get());
    }

}
