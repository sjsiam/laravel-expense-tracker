<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        return view('expenses.index');
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        // Validate and store the expense
    }

    public function edit($id)
    {
        return view('expenses.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the expense
    }

    public function show($id)
    {
        return view('expenses.show', compact('id'));
    }
}
