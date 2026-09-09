<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Exception;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    public function index()
    {
        $occupations = Occupation::withCount('workers')->get();
        return view('occupations.index', [
            'occupations' => $occupations
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);
        $attributes['is_it'] = $request->boolean('is_it');

        try {
            $occupation = Occupation::firstOrCreate($attributes);
        } catch (Exception $e) {
            return back()->with('success', '追加に失敗しました');
        }
        return redirect(route('occupations.index'))->with('success', $occupation->name .'を追加しました！');
    }

    public function update(Occupation $occupation, Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);
        $attributes['is_it'] = $request->boolean('is_it');

        try {
            $occupation->updateOrFail($attributes);
        } catch (Exception $e) {
            return back()->with('success', '更新に失敗しました');
        }
        return redirect(route('occupations.index'))->with('success', $occupation->name .'を更新しました！');
    }

    public function destroy(Occupation $occupation)
    {
        try {
            $occupation->deleteOrFail();
        } catch (Exception $e) {
            return back()->with('success', '削除に失敗しました');
        }
        return redirect(route('occupations.index'))->with('success', $occupation->name .'を削除しました！');
    }
}
