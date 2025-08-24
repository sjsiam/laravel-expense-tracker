<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Auth::user()->expenses()
            ->with('category')
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $expenseData = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        Auth::user()->expenses()->create($expenseData);

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully!');
    }

    public function edit(Expense $expense)
    {
        if (!Auth::user()->can('update', $expense)) {
            return redirect()->route('expenses.index')->with('error', 'You do not have permission to edit this expense.');
        }
        $categories = Category::all();
        return view('expenses.edit', compact('expense', 'categories'));
    }

    public function update(Request $request, Expense $expense)
    {

        if (!Auth::user()->can('update', $expense)) {
            return redirect()->route('expenses.index')->with('error', 'You do not have permission to edit this expense.');
        }

        $expenseData = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $expense->update($expenseData);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully!');
    }

    public function show(Expense $expense)
    {
        if (!Auth::user()->can('view', $expense)) {
            return redirect()->route('expenses.index')->with('error', 'You do not have permission to view this expense.');
        }
        return view('expenses.show', compact('expense'));
    }

    public function destroy(Expense $expense)
    {
        if (!Auth::user()->can('delete', $expense)) {
            return redirect()->route('expenses.index')->with('error', 'You do not have permission to delete this expense.');
        }

        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully!');
    }
}
